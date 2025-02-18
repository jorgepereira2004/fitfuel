(function ($) {
    // Abrir o modal de login
    window.openLoginModal = function () {
        document.getElementById("loginModal").style.display = "block";
        showLogin();
    };

    // Fechar o modal
    window.closeLoginModal = function () {
        const loginModal = document.getElementById("loginModal");
        if (loginModal) {
            loginModal.style.display = "none"; // Esconde o modal
        }
        // Remove parâmetros da URL
        const url = new URL(window.location.href);
        url.searchParams.delete("login_error"); // Remove o parâmetro de erro do login
        window.history.replaceState({}, document.title, url.pathname); // Atualiza a URL sem recarregar

        // Limpa mensagens de erro no modal de login
        const loginErrorDiv = document.getElementById("loginError");
        if (loginErrorDiv) {
            loginErrorDiv.innerText = ""; // Remove o texto de erro
            loginErrorDiv.style.display = "none"; // Oculta o elemento
        }
    };

    // Adicionar o evento de clique fora do modal
    document.addEventListener("click", function (event) {
        const loginModal = document.getElementById("loginModal");
        const modalContent = document.querySelector("#loginModal .modal-content");

        // Verifica se o clique foi no modal, mas fora do conteúdo
        if (loginModal && loginModal.style.display === "block" && event.target === loginModal) {
            closeLoginModal(); // Fecha o modal
        }
    });

    // Mostrar o formulário de login
    window.showLogin = function () {
        document.getElementById("loginForm").style.display = "block";
        document.getElementById("registerForm").style.display = "none";
        document.getElementById("forgotPasswordForm").style.display = "none";
        document.getElementById("changePasswordForm").style.display = "none";
        document.getElementById("verifyCodeForm").style.display = "none";
    // Limpar mensagens de erro
        const registerErrorDiv = document.getElementById("registerError");
        if (registerErrorDiv) {
        registerErrorDiv.innerText = ""; // Remove o texto de erro
        registerErrorDiv.style.display = "none"; // Oculta o elemento
        }

        // Limpa mensagens de erro no modal de register
        const passwordErrorDiv = document.getElementById("passwordError");
        if (passwordErrorDiv) {
            passwordErrorDiv.innerText = ""; // Remove o texto de erro
            passwordErrorDiv.style.display = "none"; // Oculta o elemento
        }

        // Atualizar a URL para remover parâmetros de erro
        const url = new URL(window.location.href);
        url.searchParams.delete("error"); // Remove o parâmetro de erro do login
        window.history.replaceState({}, document.title, url.pathname);
    };

    // Exibir mensagens de erro no login
    document.addEventListener("DOMContentLoaded", function () {
        const params = new URLSearchParams(window.location.search);
        const loginError = params.get("login_error");

        if (loginError) {
            const loginErrorDiv = document.getElementById("loginError");
            if (loginErrorDiv) {
                loginErrorDiv.innerText = loginError; // Exibe o erro
                loginErrorDiv.style.display = "block"; // Mostra o elemento
            }

            // Abre o modal de login automaticamente
            openLoginModal();
        }
    });



    
      // Mostrar o formulário de recuperação de senha


// Enviar nova password
// document.getElementById("resetPasswordForm").addEventListener("submit", function(event) {
//     event.preventDefault();
//     const formData = new FormData(this);

//     fetch("includes/reset_password.php", {
//         method: "POST",
//         body: formData
//     })
//     .then(response => response.json())
//     .then(data => {
//         if (data.status === "success") {
//             document.getElementById("resetPasswordSuccess").innerText = data.message;
//             document.getElementById("resetPasswordSuccess").style.display = "block";
//             setTimeout(() => showLogin(), 2000);
//         } else {
//             document.getElementById("resetPasswordError").innerText = data.message;
//             document.getElementById("resetPasswordError").style.display = "block";
//         }
//     })
//     .catch(error => console.error("Erro:", error));
// });

    // Mostrar o formulário de registro
    window.showRegister = function () {
        document.getElementById("loginForm").style.display = "none";
        document.getElementById("registerForm").style.display = "block";
        document.getElementById("forgotPasswordForm").style.display = "none";   
        document.getElementById("changePasswordForm").style.display = "none";  
        
        // Exibir mensagens de erro do registro
        const params = new URLSearchParams(window.location.search);
        const error = params.get("error");
        if (error) {
            // Caso o erro seja específico para senha
            if (error.includes("senhas")) {
                const passwordErrorDiv = document.getElementById("passwordError");
                if (passwordErrorDiv) {
                    passwordErrorDiv.innerText = error;
                    passwordErrorDiv.style.display = "block";
                }
            } else {
                const registerErrorDiv = document.getElementById("registerError");
                if (registerErrorDiv) {
                    registerErrorDiv.innerText = error;
                    registerErrorDiv.style.display = "block";
                }
            }
        }
    };

    // Quando a página carregar, abre o modal se houver um erro
    window.onload = function () {
        const params = new URLSearchParams(window.location.search);

        if (params.get("error")) {
            document.getElementById("loginModal").style.display = "block";
            showRegister();
        } else if (params.get("login_error")) {
            document.getElementById("loginModal").style.display = "block";
            showLogin();
        }
    };

    // Tornar a função acessível globalmente
    window.logout = function() {
        // Fazer logout no servidor
        fetch('includes/logout.php', {
            method: 'POST'
        }).then(response => {
            if (response.ok) {
                // Redirecionar para a página inicial
                window.location.href = 'index.html';
            } else {
                alert('Erro ao tentar fazer logout.');
            }
        }).catch(error => console.error('Erro ao fazer logout:', error));
    };
})(jQuery);
