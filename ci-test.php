<?php
echo "Iniciando teste de conexão MySQL...\n";

$host = getenv('DB_HOST') ?: 'DB_HOST';
$db   = getenv('DB_DATABASE');
$user = getenv('DB_USERNAME');
$pass = getenv('DB_PASSWORD');

if (!$db || !$user || !$pass) {
    echo "[ERRO] Variáveis de ambiente não configuradas.\n";
    exit(1);
}

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "[SUCESSO] Conexão com banco '$db' OK!\n";
    exit(0);
} catch (PDOException $e) {
    echo "[FALHA] Erro ao conectar: " . $e->getMessage() . "\n";
    exit(1);
}
