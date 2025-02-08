<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Limpar todas as variáveis de sessão
    session_unset();

    // Destruir a sessão
    session_destroy();

    // Redirecionar para a página inicial
    echo json_encode(["success" => true]);
    exit();
} else {
    http_response_code(405); // Método não permitido
    echo json_encode(["error" => "Método não permitido"]);
    exit();
}
?>
