<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Verifica se o email existe na base de dados
    $sql = "SELECT id FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Gera um token único
        $token = bin2hex(random_bytes(50));

        // Guarda o token na base de dados com um tempo de expiração (ex: 1 hora)
        $expires = date("Y-m-d H:i:s", strtotime("+1 hour"));
        $stmt = $conn->prepare("UPDATE users SET reset_token = ?, reset_expires = ? WHERE email = ?");
        $stmt->bind_param("sss", $token, $expires, $email);
        $stmt->execute();

        // Link de redefinição (ajusta o caminho conforme necessário)
        $resetLink = "http://http://localhost/fitfuel/reset_password.php?token=" . $token;

        // Enviar email com o link de redefinição
        $to = $email;
        $subject = "Redefinição da Palavra-passe";
        $message = "Olá, <br><br> Clique no link abaixo para redefinir a sua palavra-passe:<br><a href='$resetLink'>$resetLink</a><br><br>Este link expira em 1 hora.";
        $headers = "Content-Type: text/html; charset=UTF-8\r\n";

        // Usa a função mail() para enviar o email (ou uma biblioteca como PHPMailer para melhor entrega)
        if (mail($to, $subject, $message, $headers)) {
            echo "Enviámos um link para redefinir a tua palavra-passe. Verifica o teu email!";
        } else {
            echo "Erro ao enviar email. Tenta novamente.";
        }
    } else {
        echo "Este email não está registado.";
    }

    $stmt->close();
    $conn->close();
}
?>
