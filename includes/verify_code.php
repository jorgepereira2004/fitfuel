<?php
include __DIR__ . '/db.php';

header('Content-Type: application/json');

// Verifica se é uma requisição POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["status" => "error", "message" => "Método inválido"]);
    exit;
}

// Verifica se o código foi enviado
if (!isset($_POST['verificationCode']) || empty($_POST['verificationCode'])) {
    echo json_encode(["status" => "error", "message" => "Código não fornecido"]);
    exit;
}

$verificationCode = trim($_POST['verificationCode']);

// Prepara a consulta para validar o código
$stmt = $conn->prepare("SELECT id FROM users WHERE reset_token = ? AND reset_expires > NOW()");
if (!$stmt) {
    echo json_encode(["status" => "error", "message" => "Erro ao preparar a consulta"]);
    exit;
}

$stmt->bind_param("s", $verificationCode);
$stmt->execute();
$stmt->store_result();

// Verifica o resultado
if ($stmt->num_rows > 0) {
    echo json_encode(["status" => "success", "message" => "Código válido"]);
} else {
    echo json_encode(["status" => "error", "message" => "Código inválido ou expirado"]);
}

$stmt->close();
$conn->close();
exit;
