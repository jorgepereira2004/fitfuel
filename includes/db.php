<?php
$servername = "localhost";
$username = "jorge"; // Alterar para o nome de utilizador correto
$password = "1234"; // A senha do MySQL (caso tenha)
$dbname = "db_fitfuel"; // Nome da base de dados

// Criar a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
