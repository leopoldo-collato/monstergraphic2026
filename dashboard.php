<?php
session_start();
if(!isset($_SESSION['user'])) { header("Location: login.php"); exit(); }
?>
<div class="bg-slate-900 min-h-screen text-white p-10">
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-3xl font-bold">Painel do Projeto</h1>
            <a href="logout.php" class="text-red-400 underline">Sair</a>
        </div>
        
        <div class="bg-slate-800 p-8 rounded-3xl border border-gray-700">
            <h2 class="text-xl text-gray-400 mb-2">Projeto em Andamento:</h2>
            <p class="text-4xl font-bold mb-6 text-indigo-400">ERP Customizado V1.2</p>
            
            <div class="w-full bg-slate-700 rounded-full h-4 mb-4">
                <div class="bg-indigo-500 h-4 rounded-full" style="width: 75%"></div>
            </div>
            <p class="text-right text-sm text-gray-400">75% concluído - Fase de Testes de Stress</p>
        </div>
    </div>
</div>