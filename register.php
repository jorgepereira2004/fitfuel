<?php
include 'includes/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordConfirm = trim($_POST['password_confirm']);

    // Validação do username
    $usernameCheck = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $usernameCheck->bind_param("s", $username);
    $usernameCheck->execute();
    if ($usernameCheck->get_result()->num_rows > 0) {
        header("Location: index.html?error=" . urlencode("O username já está registrado"));
        exit();
    }
    $usernameCheck->close();

    // Validação do email
    $emailCheck = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $emailCheck->bind_param("s", $email);
    $emailCheck->execute();
    if ($emailCheck->get_result()->num_rows > 0) {
        header("Location: index.html?error=" . urlencode("O email já está registrado"));
        exit();
    }
    $emailCheck->close();

    // Verificação das passwords
    if ($password !== $passwordConfirm) {
        header("Location: index.html?error=" . urlencode("As passwords não coincidem"));
        exit();
    }

    // Inserção do utilizador
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (fullname, email, username, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fullname, $email, $username, $hashed_password);

    if ($stmt->execute()) {
        $_SESSION['username'] = $username;
        $_SESSION['fullname'] = $fullname;
        $_SESSION['email'] = $email;
        echo "<script>localStorage.setItem('userFullname', '" . $fullname . "'); window.location.href = 'home-premium.php';</script>";
        exit();
    } else {
        header("Location: index.html?error=" . urlencode("Erro ao registrar: " . $stmt->error));
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
