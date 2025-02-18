// forgot_password.js

console.log("Forgot Password Script Carregado");

// Mostrar o formulário de recuperação de senha
window.showForgotPassword = function () {
    document.getElementById("loginForm").style.display = "none";
    document.getElementById("forgotPasswordForm").style.display = "block";
    document.getElementById("registerForm").style.display = "none";
    document.getElementById("changePasswordForm").style.display = "none";
};

// Fechar o formulário de recuperação de senha
window.closeforgotPasswordForm = function () {
    const forgotPasswordForm = document.getElementById("forgotPasswordForm");
    if (forgotPasswordForm) {
        forgotPasswordForm.style.display = "none"; // Esconde o modal
    }
};

// Adicionar o evento de clique fora do modal para fechar
document.addEventListener("click", function (event) {
    const forgotPasswordForm = document.getElementById("forgotPasswordForm");
    if (forgotPasswordForm && forgotPasswordForm.style.display === "block" && event.target === forgotPasswordForm) {
        closeforgotPasswordForm(); // Fecha o modal
    }
});

// Evento para enviar email de recuperação
const forgotPasswordFormElement = document.querySelector("#forgotPasswordForm form");

if (forgotPasswordFormElement) {
    forgotPasswordFormElement.addEventListener("submit", async function (event) {
        event.preventDefault();

        const formData = new FormData(this);

        try {
            const response = await fetch("forgot_password.php", {
                method: "POST",
                body: formData
            });

            const data = await response.json();

            if (data.status === "success") {
                // Ir para o modal de verificação de código
                document.getElementById("forgotPasswordForm").style.display = "none";
                document.getElementById("verifyCodeForm").style.display = "block";
            } else {
                // Mostrar erro
                const forgotPasswordError = document.getElementById("forgotPasswordError");
                if (forgotPasswordError) {
                    forgotPasswordError.innerText = data.message;
                    forgotPasswordError.style.display = "block";
                }
            }
        } catch (error) {
            console.error("Erro ao comunicar com o servidor:", error);
            const forgotPasswordError = document.getElementById("forgotPasswordError");
            if (forgotPasswordError) {
                forgotPasswordError.innerText = "Erro ao comunicar com o servidor.";
                forgotPasswordError.style.display = "block";
            }
        }
    });
} else {
    console.error("Formulário de recuperação de senha não encontrado.");
}
