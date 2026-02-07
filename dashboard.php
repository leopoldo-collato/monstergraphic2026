<?php
session_start();

// Proteção: Se não houver sessão ativa, redireciona para o login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$nomeUsuario = $_SESSION['user_nome'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | MonsterGraphic Control</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: #050505;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            margin: 0;
        }

        .dashboard-container {
            padding-top: 120px;
            max-width: 1200px;
            margin: 0 auto;
            padding-left: 5%;
            padding-right: 5%;
        }

        .welcome-card {
            background: linear-gradient(135deg, #0f0f0f 0%, #080808 100%);
            border: 1px solid #1a1a1a;
            padding: 40px;
            border-radius: 20px;
            border-left: 5px solid #00ff88;
        }

        .welcome-card h1 {
            font-family: 'Orbitron', sans-serif;
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .welcome-card span {
            color: #00ff88;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 40px;
        }

        .stat-box {
            background: #0f0f0f;
            padding: 25px;
            border-radius: 15px;
            border: 1px solid #1a1a1a;
            text-align: center;
            transition: 0.3s;
        }

        .stat-box:hover {
            border-color: #00ff88;
            transform: translateY(-5px);
        }

        .stat-box h3 {
            font-family: 'Orbitron', sans-serif;
            font-size: 0.8rem;
            color: #555;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .stat-box p {
            font-size: 1.8rem;
            font-weight: 700;
            color: #fff;
            margin-top: 10px;
        }

        .btn-logout {
            display: inline-block;
            margin-top: 30px;
            padding: 10px 25px;
            background: transparent;
            border: 1px solid #ff4444;
            color: #ff4444;
            text-decoration: none;
            border-radius: 5px;
            font-family: 'Orbitron', sans-serif;
            font-size: 0.8rem;
            transition: 0.3s;
        }

        .btn-logout:hover {
            background: #ff4444;
            color: #fff;
        }
    </style>
</head>
<body>

    <header>
        <nav class="navbar">
            <div class="logo">MONSTER<span>CONTROL</span></div>
            <ul class="nav-links">
                <li><a href="dashboard.php" style="color: #00ff88;">Painel</a></li>
                <li><a href="index.html">Ver Site</a></li>
                <li><a href="logout.php" class="btn-logout" style="border: none; padding: 0;">Sair</a></li>
            </ul>
        </nav>
    </header>

    <main class="dashboard-container">
        <div class="welcome-card">
            <h1>Sistema <span>Online</span></h1>
            <p>Bem-vindo de volta, <strong><?php echo htmlspecialchars($nomeUsuario); ?></strong>. O núcleo MonsterGraphic está operando normalmente.</p>
            <a href="logout.php" class="btn-logout">Encerrar Sessão</a>
        </div>

        <div class="stats-grid">
            <div class="stat-box">
                <h3>Acessos Hoje</h3>
                <p>1,284</p>
            </div>
            <div class="stat-box">
                <h3>Server Status</h3>
                <p style="color: #00ff88;">99.9%</p>
            </div>
            <div class="stat-box">
                <h3>Projetos Ativos</h3>
                <p>12</p>
            </div>
        </div>
    </main>

</body>
</html>