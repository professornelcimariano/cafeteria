<?php
$host = "localhost";     // Endereço do servidor do banco de dados
$dbname = "cafeteria";   // Nome do banco de dados
$user = "root";   // Usuário do banco de dados
$password = ""; // Senha do banco de dados
$base = 'http://localhost/cafeteria';
try {
    // Cria uma nova instância da classe PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Em caso de erro, exibe a mensagem
    echo "Falha na conexão: " . $e->getMessage();
}
?>
