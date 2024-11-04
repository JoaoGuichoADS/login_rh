<?php
include 'conexao.php'; 

if (!$conn) {
    die("Erro: Não foi possível conectar ao banco de dados.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $senha = $_POST['senha'];

    $sql = "SELECT senha FROM funcionarios WHERE username = '$username'"; 
    $resultado = $conn->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        $linha = $resultado->fetch_assoc();
        $senhaArmazenada = $linha['senha'];

        if ($senha === $senhaArmazenada) {
            session_start();
            $_SESSION['username'] = $username;
            header("Location: tela_boasvindas.html");
            exit();
        } else {
            echo "<h2>Usuário ou senha incorretos.</h2>";
        }
    } else {
        echo "<h2>Usuário ou senha incorretos.</h2>";
    }
}

$conn->close();
?>
