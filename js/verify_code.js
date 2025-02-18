// verify_code.js

console.log("Verify Code Script Carregado");

// Ajusta a comunicação com o servidor para a verificação de código
const verifyCodeForm = document.getElementById("verifyCodeForm");

if (verifyCodeForm) {
    verifyCodeForm.addEventListener("submit", async (event) => {
        event.preventDefault();
        try {
            // Criando o FormData a partir de event.target (o formulário)
            const formData = new FormData(event.target);
            const response = await fetch("includes/verify_code.php", {
                method: "POST",
                headers: { "Accept": "application/json" },
                body: formData
            });

            const data = await response.json();
            if (data?.status === "success") {
                // Armazena o código no localStorage
                const code = document.getElementById("verificationCode").value;
                localStorage.setItem("verificationCode", code);

                // Mostra o formulário de redefinição de senha
                document.getElementById("verifyCodeForm").style.display = "none";
                document.getElementById("changePasswordForm").style.display = "block";
            } else {
                showError("verifyCodeError", data?.message ?? "Código inválido ou expirado.");
            }
        } catch (error) {
            console.error("Erro ao comunicar com o servidor:", error);
            showError("verifyCodeError", "Erro ao comunicar com o servidor.");
        }
    });
} else {
    console.error("Formulário de verificação de código não encontrado.");
}

// Exibe mensagens de erro no elemento desejado
function showError(elementId, message) {
    const errorElement = document.getElementById(elementId);
    if (errorElement) {
        errorElement.innerText = message;
        errorElement.style.display = "block";
    }
}
