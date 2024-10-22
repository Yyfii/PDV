<?php
// Função para carregar as variáveis de ambiente do arquivo .env
function loadEnv($path) {
    // Verifica se o arquivo .env existe
    if (!file_exists($path)) {
        throw new \Exception(".env file not found at path: " . $path);
    }
    
    // Lê o arquivo .env linha por linha
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // Ignora comentários (linhas que começam com #)
        if (strpos(trim($line), '#') === 0) {
            continue;
        }
        
        // Divide a linha em chave e valor usando o caractere '='
        list($name, $value) = explode('=', $line, 2);
        
        // Remove espaços em branco e aspas extras
        $name = trim($name);
        $value = trim($value, " \t\n\r\0\x0B\"");
        
        // Define a variável de ambiente se ela não estiver definida
        if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
            putenv(sprintf('%s=%s', $name, $value));
            $_ENV[$name] = $value;
            $_SERVER[$name] = $value;
        }
    }
}

// Carregar as variáveis do arquivo .env
loadEnv(__DIR__ . '/.env');

$servername = getenv('SERVERNAME');
$databasename = getenv('DATABASE');
$username = getenv('USER');
$password = getenv('PASSWORD');
$port = getenv('PORT');

$conexao = mysqli_connect($servername, $username, $password, $databasename, $port);

?>