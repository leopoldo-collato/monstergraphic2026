<?php
// Inicia a sessão para checar se o usuário já não está logado
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | MonsterGraphic - Leopoldo Collato</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #00ff88;
            --bg-dark: #050505;
        }

        body {
            background-color: var(--bg-dark);
            color: #fff;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            background: radial-gradient(circle at center, #111 0%, #050505 100%);
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 45px;
            background: rgba(15, 15, 15, 0.98);
            border: 1px solid #1a1a1a;
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.6);
            text-align: center;
            backdrop-filter: blur(10px);
        }

        .login-container h2 {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.8rem;
            margin-bottom: 5px;
            letter-spacing: 1px;
        }

        .login-container h2 span { color: var(--primary); }

        .login-container p {
            color: #555;
            font-size: 0.85rem;
            margin-bottom: 35px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* FORMULÁRIO */
        .form-group {
            position: relative;
            margin-bottom: 35px;
            text-align: left;
        }

        .form-group input {
            width: 100%;
            padding: 10px 0;
            background: transparent;
            border: none;
            border-bottom: 1px solid #333;
            color: #fff;
            font-size: 1rem;
            outline: none;
            transition: 0.3s;
        }

        .form-group label {
            position: absolute;
            left: 0;
            top: 10px;
            color: #444;
            transition: 0.3s;
            pointer-events: none;
        }

        /* Animação do Label */
        .form-group input:focus ~ label,
        .form-group input:valid ~ label {
            top: -20px;
            font-size: 0.75rem;
            color: var(--primary);
        }

        .form-group input:focus {
            border-bottom-color: var(--primary);
        }

        .btn-submit {
            width: 100%;
            padding: 15px;
            background: var(--primary);
            color: #000;
            border: none;
            border-radius: 5px;
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            cursor: pointer;
            text-transform: uppercase;
            transition: 0.4s;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background: #fff;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 255, 136, 0.3);
        }

        /* ALERTA DE ERRO */
        .error-alert {
            background: rgba(255, 68, 68, 0.1);
            color: #ff4444;
            padding: 12px;
            border-radius: 5px;
            font-size: 0.8rem;
            margin-bottom: 25px;
            border: 1px solid rgba(255, 68, 68, 0.2);
            font-weight: 600;
        }

        .footer-links {
            margin-top: 30px;
            font-size: 0.8rem;
            color: #333;
        }

        .footer-links a {
            color: var(--primary);
            text-decoration: none;
            transition: 0.3s;
        }

        .footer-links a:hover { color: #fff; }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Monster<span>Login</span></h2>
        <p>Acesso Restrito</p>

        <?php if(isset($_GET['erro'])): ?>
            <div class="error-alert">
                Acesso negado. Verifique usuário e senha.
            </div>
        <?php endif; ?>

        <form action="validar_login.php" method="POST">
            
            <div class="form-group">
                <input type="text" name="usuario" id="usuario" required autocomplete="off">
                <label for="usuario">ID de Usuário</label>
            </div>

            <div class="form-group">
                <input type="password" name="senha" id="senha" required>
                <label for="senha">Chave de Acesso</label>
            </div>

            <button type="submit" class="btn-submit">Autenticar Sistema</button>
        </form>

        <div class="footer-links">
            <a href="index.html">← Retornar ao site</a>
            <span style="margin: 0 10px;">|</span>
            <a href="cadastro.php">Solicitar Acesso</a>
        </div>
    </div>

</body>
</html>