<?php
session_start();

// Exibe erros para debug (remova isso em produção)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = "localhost";
$db   = "monster_db";
$user = "root"; 
$pass = ""; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST['usuario'] ?? '';
        $senha = $_POST['senha'] ?? '';

        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :u");
        $stmt->execute(['u' => $usuario]);
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user_data && password_verify($senha, $user_data['senha'])) {
            $_SESSION['user_id'] = $user_data['id'];
            $_SESSION['user_nome'] = $user_data['usuario'];
            header("Location: dashboard.php");
            exit();
        } else {
            header("Location: login.php?erro=1");
            exit();
        }
    } else {
        echo "O servidor diz: Você precisa enviar os dados via formulário (POST).";
    }
} catch (PDOException $e) {
    echo "Erro de Banco de Dados: " . $e->getMessage();
}
?>