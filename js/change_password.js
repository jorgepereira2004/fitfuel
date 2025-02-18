// change_password.js

// ✅ Obtém e atribui automaticamente o código armazenado
function assignVerificationCode() {
    const code = localStorage.getItem("verificationCode");
    if (code) {
        document.getElementById("hiddenVerificationCode").value = code;
        console.log("Código atribuído ao formulário:", code);
    } else {
        console.warn("Nenhum código de verificação encontrado.");
    }
}

// ✅ Mostra formulário de redefinição e atribui código automaticamente
function showChangePassword() {
    assignVerificationCode(); 
    document.getElementById("verifyCodeForm").style.display = "none";
    document.getElementById("changePasswordForm").style.display = "block";
}

const resetPasswordForm = document.getElementById("resetPasswordForm");

if (resetPasswordForm) {
    resetPasswordForm.addEventListener("submit", async (event) => {
        event.preventDefault();

        assignVerificationCode(); // Certifica-se de que o código está preenchido

        const formData = new FormData(resetPasswordForm);
        try {
            const response = await fetch("includes/reset_password.php", {
                method: "POST",
                headers: { "Accept": "application/json" },
                body: formData
            });

            const data = await response.json();
            if (data.status === "success") {
                document.getElementById("resetPasswordSuccess").innerText = data.message;
                document.getElementById("resetPasswordSuccess").style.display = "block";
                localStorage.removeItem("verificationCode");

                               // Cria e exibe o botão para abrir o modal de login
                const loginButton = document.createElement("button");
                loginButton.innerText = "Ir para Login";
                loginButton.classList.add("login-button");
                loginButton.addEventListener("click", () => {
                    openLoginModal(); // Abre o modal de login (chamando função do outro arquivo JS)
                });

                // Exibe o botão debaixo da mensagem de sucesso
                const successMessageDiv = document.getElementById("resetPasswordSuccess");
                successMessageDiv.insertAdjacentElement("afterend", loginButton); // Insere o botão logo abaixo da mensagem de sucesso

                // Esconde o botão de redefinir
                const resetButton = document.querySelector("#changePasswordForm button[type='submit']");
                if (resetButton) {
                    resetButton.style.display = "none"; // Esconde o botão de redefinir no formulário de mudança de senha
                }
            } else {
                document.getElementById("resetPasswordError").innerText = data.message;
                document.getElementById("resetPasswordError").style.display = "block";
            }
        } catch (error) {
            console.error("Erro ao comunicar com o servidor:", error);
            document.getElementById("resetPasswordError").innerText = "Erro ao comunicar com o servidor.";
            document.getElementById("resetPasswordError").style.display = "block";
        }
    });
} else {
    console.error("Formulário de redefinição de senha não encontrado.");
}
