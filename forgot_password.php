<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Inclui o PHPMailer
require 'vendor/autoload.php';
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Verifica se o email existe
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Gera código de 6 caracteres
        $code = strtoupper(bin2hex(random_bytes(3)));
        $expires = date("Y-m-d H:i:s", strtotime("+15 minutes"));

        // Guarda na base de dados
        $update = $conn->prepare("UPDATE users SET reset_token = ?, reset_expires = ? WHERE email = ?");
        $update->bind_param("sss", $code, $expires, $email);
        $update->execute();

        // Configura o PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'fitfuel.istec@gmail.com';
            $mail->Password = 'bkso ernx mzhd xstn ';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            
            $mail->setFrom('fitfuel.istec@gmail.com', 'FitFuel');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = "Código de Recuperação de Palavra-passe";
            $mail->Body = "<p>O teu código de recuperação é: <strong>$code</strong></p><p>Este código expira em 15 minutos.</p>";

            
            if ($mail->send()) {
                echo json_encode(["status" => "success", "message" => "Código enviado com sucesso"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Erro ao enviar o email"]);
            }
        } catch (Exception $e) {
            echo json_encode(["status" => "error", "message" => "Erro: {$mail->ErrorInfo}"]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Email não registado"]);
    }
    $stmt->close();
    $conn->close();
}
?>
