<?php
include __DIR__ . '/db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $verificationCode = $_POST['verificationCode'] ?? null;
    $newPassword = $_POST['password'] ?? null;
    $passwordConfirm = $_POST['password_confirm'] ?? null;

    if (!$verificationCode) {
        echo json_encode(["status" => "error", "message" => "Código de verificação não recebido"]);
        exit;
    }

    if ($newPassword !== $passwordConfirm) {
        echo json_encode(["status" => "error", "message" => "As passwords não coincidem"]);
        exit;
    }

    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // ✅ Verifica se o código é válido
    $stmt = $conn->prepare("SELECT id FROM users WHERE reset_token = ? AND reset_expires > NOW()");
    $stmt->bind_param("s", $verificationCode);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 0) {
        echo json_encode(["status" => "error", "message" => "Código de verificação inválido ou expirado"]);
        exit;
    }
    $stmt->close();

    // ✅ Atualiza a senha
    $stmt = $conn->prepare("UPDATE users SET password = ?, reset_token = NULL, reset_expires = NULL WHERE reset_token = ?");
    $stmt->bind_param("ss", $hashedPassword, $verificationCode);

    if ($stmt->execute() && $stmt->affected_rows > 0) {
        echo json_encode(["status" => "success", "message" => "Password redefinida com sucesso"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Falha ao redefinir a password"]);
    }

    $stmt->close();
    $conn->close();
}
?>
