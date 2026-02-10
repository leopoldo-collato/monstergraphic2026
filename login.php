<?php
session_start();
if($_POST) {
    // Conexão fictícia para exemplo
    $db = new mysqli("localhost", "root", "", "monster_db");
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    $query = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $result = $db->query($query);
    
    if($result->num_rows > 0) {
        $_SESSION['user'] = $email;
        header("Location: dashboard.php");
    } else {
        $erro = "Acesso negado!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 h-screen flex items-center justify-center p-6">
    <div class="bg-slate-900 p-8 rounded-2xl w-full max-w-md border border-gray-800 shadow-2xl">
        <h2 class="text-2xl font-bold text-center mb-8">Área do Cliente</h2>
        <?php if(isset($erro)) echo "<p class='text-red-500 text-center mb-4'>$erro</p>"; ?>
        <form method="POST" class="space-y-4">
            <input type="email" name="email" placeholder="E-mail" class="w-full p-4 rounded-lg bg-slate-800 border border-gray-700 outline-none focus:ring-2 ring-indigo-500 text-white" required>
            <input type="password" name="senha" placeholder="Senha" class="w-full p-4 rounded-lg bg-slate-800 border border-gray-700 outline-none focus:ring-2 ring-indigo-500 text-white" required>
            <button type="submit" class="w-full bg-indigo-600 py-4 rounded-lg font-bold hover:bg-indigo-700">Entrar no Painel</button>
        </form>
        <p class="text-center mt-6 text-gray-500 text-sm">MonsterGraphic © 2026</p>
    </div>
</body>
</html>