<?php
include 'includes/db.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Verifica se o token existe e não expirou
    $stmt = $conn->prepare("SELECT email FROM users WHERE reset_token = ? AND reset_expires > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($email);
        $stmt->fetch();
    } else {
        die("Token inválido ou expirado.");
    }
} else {
    die("Token não fornecido.");
}

// Se o formulário for enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newPassword = $_POST['password'];
    $confirmPassword = $_POST['password_confirm'];

    if ($newPassword !== $confirmPassword) {
        die("As passwords não coincidem!");
    }

    // Criptografa a nova password
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Atualiza a password na base de dados e remove o token
    $stmt = $conn->prepare("UPDATE users SET password = ?, reset_token = NULL, reset_expires = NULL WHERE email = ?");
    $stmt->bind_param("ss", $hashedPassword, $email);

    if ($stmt->execute()) {
        echo "A tua palavra-passe foi redefinida com sucesso! Agora já podes fazer login.";
    } else {
        echo "Ocorreu um erro. Tenta novamente.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Redefinir Palavra-passe</title>
</head>
<body>
    <h2>Redefinir Palavra-passe</h2>
    <form method="POST">
        <label for="password">Nova Password:</label>
        <input type="password" id="password" name="password" required>
        <label for="password_confirm">Confirmar Password:</label>
        <input type="password" id="password_confirm" name="password_confirm" required>
        <button type="submit">Redefinir</button>
    </form>
</body>
</html>
