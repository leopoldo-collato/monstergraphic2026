<?php
session_start();

// Configurações do Banco de Dados
$host = "localhost";
$db   = "monster_db";
$user = "root"; 
$pass = ""; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST['usuario']; // Nome do campo no seu HTML
        $senha   = $_POST['senha'];   // Nome do campo no seu HTML

        // Busca o usuário no banco
        $sql = "SELECT id, usuario, senha FROM usuarios WHERE usuario = :usuario";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['usuario' => $usuario]);
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica se usuário existe e se a senha (hash) é válida
        if ($user_data && password_verify($senha, $user_data['senha'])) {
            // Sucesso: Cria a sessão
            $_SESSION['user_id'] = $user_data['id'];
            $_SESSION['user_nome'] = $user_data['usuario'];

            // Redireciona para a área restrita ou index
            header("Location: index.html");
            exit();
        } else {
            // Falha: Redireciona de volta com erro
            header("Location: login.html?erro=1");
            exit();
        }
    }
} catch (PDOException $e) {
    die("Erro técnico: " . $e->getMessage());
}
?>