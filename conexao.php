<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "rh_bd";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>
