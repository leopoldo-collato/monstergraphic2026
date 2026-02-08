<?php
// Configurações do Banco de Dados
$host = "localhost";
$db   = "monster_db";
$user = "root"; // Altere se necessário
$pass = "Lmc@2025!";     // Altere se necessário

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $mensagem = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST['usuario'];
        $senhaRaw = $_POST['senha'];

        // Criptografando a senha para segurança
        $senhaHash = password_hash($senhaRaw, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (usuario, senha) VALUES (:usuario, :senha)";
        $stmt = $pdo->prepare($sql);

        try {
            $stmt->execute(['usuario' => $usuario, 'senha' => $senhaHash]);
            $mensagem = "<p style='color: #00ff88;'>Usuário cadastrado com sucesso! <a href='login.html' style='color:#fff;'>Ir para Login</a></p>";
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $mensagem = "<p style='color: #ff4444;'>Erro: Este usuário já existe.</p>";
            } else {
                $mensagem = "<p style='color: #ff4444;'>Erro ao cadastrar.</p>";
            }
        }
    }
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro | MonsterGraphic</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { background: #050505; color: #fff; font-family: 'Poppins', sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .cadastro-container { background: #0f0f0f; padding: 40px; border-radius: 15px; border: 1px solid #1a1a1a; width: 100%; max-width: 400px; text-align: center; }
        h2 { font-family: 'Orbitron', sans-serif; color: #00ff88; margin-bottom: 30px; }
        input { width: 100%; padding: 12px; margin-bottom: 20px; background: #1a1a1a; border: 1px solid #333; color: #fff; border-radius: 5px; }
        button { width: 100%; padding: 12px; background: #00ff88; border: none; font-family: 'Orbitron', sans-serif; font-weight: bold; cursor: pointer; border-radius: 5px; transition: 0.3s; }
        button:hover { background: #fff; transform: translateY(-3px); }
    </style>
</head>
<body>
    <div class="cadastro-container">
        <h2>Novo <span>Acesso</span></h2>
        <?php echo $mensagem; ?>
        <form method="POST">
            <input type="text" name="usuario" placeholder="Nome de Usuário" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Cadastrar Agora</button>
        </form>
        <p style="margin-top: 20px; font-size: 0.8rem; color: #555;">MonsterGraphic System v1.0</p>
    </div>
</body>
</html>