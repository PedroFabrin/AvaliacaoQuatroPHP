<?php
echo "Iniciando teste de conexão MySQL...\n";

// Pega as variáveis do ambiente (tanto DB_* quanto MYSQL_*)
$host = getenv('DB_HOST') ?: getenv('MYSQL_HOST') ?: 'db';
$db   = getenv('DB_DATABASE') ?: getenv('MYSQL_DATABASE');
$user = getenv('DB_USERNAME') ?: getenv('MYSQL_USER');
$pass = getenv('DB_PASSWORD') ?: getenv('MYSQL_PASSWORD');

if (!$db || !$user) {
    echo "[ERRO] Variáveis de ambiente não configuradas.\n";
    echo "Host: $host | DB: $db | User: $user | Pass: " . ($pass ? '***' : '(vazio)') . "\n";
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
