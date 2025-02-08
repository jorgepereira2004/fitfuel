<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta para verificar se o username existe
    $sql = "SELECT fullname, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Verifica se encontrou o username
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($fullname, $hashed_password);
        $stmt->fetch();

        // Verifica se a password está correta
        if (password_verify($password, $hashed_password)) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['fullname'] = $fullname;
            header("Location: home-premium.php"); // Redireciona para a página premium
            exit();
        } else {
            header("Location: index.html?login_error=" . urlencode("Password incorreta. Tente novamente."));
            exit();
        }
    } else {
        // Se o username não foi encontrado
        header("Location: index.html?login_error=" . urlencode("Username não encontrado."));
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>


