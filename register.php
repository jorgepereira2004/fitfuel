<?php
include 'includes/db.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordConfirm = trim($_POST['password_confirm']);

    // Verifica se o username já existe
    $usernameCheck = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $usernameCheck->bind_param("s", $username);
    $usernameCheck->execute();
    $usernameCheck->store_result();
    if ($usernameCheck->num_rows > 0) {
        header("Location: index.html?error=" . urlencode("O username já está registrado"));
        exit();
    }
    $usernameCheck->close();

    // Verifica se o email já existe
    $emailCheck = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $emailCheck->bind_param("s", $email);
    $emailCheck->execute();
    $emailCheck->store_result();
    if ($emailCheck->num_rows > 0) {
        header("Location: index.html?error=" . urlencode("O email já está registrado"));
        exit();
    }
    $emailCheck->close();
    
    // Verifica se as passwords coincidem
    if ($password !== $passwordConfirm) {
        header("Location: index.html?error=" . urlencode("As passwords não coincidem"));
        exit();
    }

    // Criptografar a password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Inserir o novo users na tabela
    $sql = "INSERT INTO users (fullname, email, username, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $fullname, $email, $username, $hashed_password);

    if ($stmt->execute()) {
        // Redireciona para a página de receitas premium
        header("Location: home-premium.php");
        exit();
    } else {
        // Exibe um erro no modal
        $error = $stmt->error;
        header("Location: index.html?error=" . urlencode("Erro no registro: $error"));
        exit();
    }

    // Fechar a conexão
    $stmt->close();
    $conn->close();
}
?>
