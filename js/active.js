(function ($) {
    'use strict';
    var browserWindow = $(window);
    // :: 1.0 Preloader Active Code
    browserWindow.on('load', function () {
       $('#preloader').fadeOut('slow', function () {
          $(this).remove();
       });
    });
    // :: 2.0 Newsticker Active Code
    $.simpleTicker($("#breakingNewsTicker"), {
       speed: 1250,
       delay: 3500,
       easing: 'swing',
       effectType: 'roll'
    });
    // :: 3.0 Nav Active Code
    if ($.fn.classyNav) {
       $('#deliciousNav').classyNav();
    }
    // :: 4.0 Search Active Code
    var searchwrapper = $('.search-wrapper');
    $('.search-btn').on('click', function () {
       searchwrapper.toggleClass('on');
    });
    $('.close-btn').on('click', function () {
       searchwrapper.removeClass('on');
    });
    // :: 5.0 Sliders Active Code
    if ($.fn.owlCarousel) {
       var welcomeSlide = $('.hero-slides');
       var receipeSlide = $('.receipe-slider');
       if ($.fn.owlCarousel) {
          var receipeSlide = $('.receipe-slider');
          receipeSlide.owlCarousel({
             items: 1, // Exibe 1 slide por vez
             margin: 0, // Sem margem entre slides
             loop: true, // Ativa o loop
             nav: true, // Mostra botões de navegação (anterior e próximo)
             navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'], // Personaliza botões
             dots: true, // Mostra os pontos de navegação
             autoplay: true, // Ativa o autoplay
             autoplayTimeout: 5000, // Intervalo entre os slides
             smartSpeed: 1000 // Velocidade de transição
          });
       }
       welcomeSlide.owlCarousel({
          items: 1,
          margin: 0,
          loop: true,
          nav: true,
          navText: ['Prev', 'Next'],
          dots: true,
          dotsData: false,
          autoplay: true,
          autoplayTimeout: 5000,
          smartSpeed: 1000
       });
       welcomeSlide.on('translate.owl.carousel', function () {
          var slideLayer = $("[data-animation]");
          slideLayer.each(function () {
             var anim_name = $(this).data('animation');
             $(this).removeClass('animated ' + anim_name).css('opacity', '0');
          });
       });
       welcomeSlide.on('translated.owl.carousel', function () {
          var slideLayer = welcomeSlide.find('.owl-item.active').find("[data-animation]");
          slideLayer.each(function () {
             var anim_name = $(this).data('animation');
             $(this).addClass('animated ' + anim_name).css('opacity', '1');
          });
       });
       $("[data-delay]").each(function () {
          var anim_del = $(this).data('delay');
          $(this).css('animation-delay', anim_del);
       });
       $("[data-duration]").each(function () {
          var anim_dur = $(this).data('duration');
          $(this).css('animation-duration', anim_dur);
       });
       // var dot = $('.hero-slides .owl-dot');
       // dot.each(function () {
       //     var index = $(this).index() + 1 + '.';
       //     if (index < 10) {
       //         $(this).html('0').append(index);
       //     } else {
       //         $(this).html(index);
       //     }
       // });
       receipeSlide.owlCarousel({
          items: 1,
          margin: 0,
          loop: true,
          nav: true,
          navText: ['Prev', 'Next'],
          dots: true,
          dotsData: true,
          autoplay: true,
          autoplayTimeout: 5000,
          smartSpeed: 1000
       });
    }
    // Expor funções ao escopo global
    window.openModal = function () {
       document.getElementById("premiumModal").style.display = "flex";
       const scrollUpButton = document.getElementById("scrollUp");
       if (scrollUpButton) {
          scrollUpButton.style.display = "none"; // Esconde o botão
       }
    };
    window.closeModal = function () {
       document.getElementById("premiumModal").style.display = "none";
       const scrollUpButton = document.getElementById("scrollUp");
       if (scrollUpButton) {
          scrollUpButton.style.display = "block"; // Mostra o botão novamente
       }
    };

    document.getElementById("premiumModal").addEventListener("click", function (event) {
      // Verifica se o clique foi fora do modal-content
      if (event.target === this) {
         closeModal();
      }
   });
    window.openreceipeModal = function openreceipeModal(element) {
       // Obter os dados do item clicado
       const title = element.getAttribute('data-title');
       const ingredients = element.getAttribute('data-ingredients');
       const time = element.getAttribute('data-time');
       const imageSrc = element.querySelector('img').getAttribute('src');
       const url = element.getAttribute('data-url');
       if (title && ingredients && time) {
          // Atualizar o modal com os dados obtidos
          document.getElementById('modalTitle').innerText = title;
          document.getElementById('modalIngredients').innerText = ingredients;
          document.getElementById('modalTime').innerText = time;
          document.getElementById('modalImage').setAttribute('src', imageSrc);
          document.getElementById('receipeModal').setAttribute('data-url', url); // Definir a URL no modal
          // Exibir o modal
          document.getElementById('receipeModal').style.display = 'block';
       } else {
          console.warn("Os dados necessários não estão presentes no elemento.");
       }
    };
    window.openReceipe = function () {
       const modal = document.getElementById('receipeModal');
       const url = modal.getAttribute('data-url'); // Obter a URL do modal
       if (url) {
          window.location.href = url; // Redirecionar para a URL
       } else {
          console.warn("URL não definida.");
       }
    };
    window.closereceipeModal = function () {
       document.getElementById("receipeModal").style.display = "none";
       const scrollUpButton = document.getElementById("scrollUp");
       if (scrollUpButton) {
          scrollUpButton.style.display = "block"; // Mostra o botão novamente
       }
       document.getElementById("receipeModal").addEventListener("click", function (event) {
          // Verifica se o clique foi fora do modal-content
          if (event.target === this) {
             closereceipeModal();
          }
       });
    };
    // window.knowMore = function () {
    // openLoginModal(); // Redireciona para o modal de login
    // // Redirecionar ou exibir lógica adicional
    // };
    //tabela de informação
    document.addEventListener("DOMContentLoaded", function () {
       const allTabButtons = document.querySelectorAll(".tab-button");
       allTabButtons.forEach(button => {
          button.addEventListener("click", function () {
             const parent = button.closest(".col-12"); // Seleciona o container da receita
             const tabContent = parent.querySelectorAll(".tab-panel");
             const tabButtons = parent.querySelectorAll(".tab-button");
             // Remove "active" de todas as abas dentro da receita
             tabButtons.forEach(btn => btn.classList.remove("active"));
             tabContent.forEach(panel => panel.classList.remove("active"));
             // Adiciona "active" apenas ao botão clicado e ao painel correspondente
             button.classList.add("active");
             const tabId = button.getAttribute("data-tab");
             parent.querySelector(`#${tabId}`).classList.add("active");
          });
       });
    });
    // :: 6.0 Gallery Active Code
    if ($.fn.magnificPopup) {
       $('.videobtn').magnificPopup({
          type: 'iframe'
       });
    }
    // :: 7.0 ScrollUp Active Code
    if ($.fn.scrollUp) {
       browserWindow.scrollUp({
          scrollSpeed: 1500,
          scrollText: '<i class="fa fa-angle-up"></i>',
          scrollName: 'scrollUp' // Adiciona este atributo para gerar o botão com o id correto
       });
    }
    if (document.getElementById("calcularBtn")) {
       // Calculadora tmb
       document.getElementById("calcularBtn").addEventListener("click", function () {
          // Captura os valores
          const genero = document.getElementById("genero").value;
          const altura = parseFloat(document.getElementById("altura").value);
          const peso = parseFloat(document.getElementById("peso").value);
          const idade = parseInt(document.getElementById("idade").value);
          const nivelAtividade = parseFloat(document.getElementById("nivelAtividade").value);
          if (isNaN(altura) || isNaN(peso) || isNaN(idade)) {
             alert("Por favor, preencha todos os campos corretamente!");
             return;
          }
          let tmb;
          // Calcula TMB baseado no gênero
          if (genero === "masculino") {
             tmb = 88.362 + (13.397 * peso) + (4.799 * altura) - (5.677 * idade);
          } else if (genero === "feminino") {
             tmb = 447.593 + (9.247 * peso) + (3.098 * altura) - (4.330 * idade);
          } else {
             alert("Por favor, selecione um gênero válido.");
             return;
          }
          // Aplica o fator do nível de atividade
          const tmbAtiva = tmb * nivelAtividade;
          // Calcula calorias para perder, manter e ganhar peso
          const perderPeso = tmbAtiva - 500; // Déficit calórico de 500 kcal
          const ganharPeso = tmbAtiva + 500; // Excesso calórico de 500 kcal
          const manterPeso = tmbAtiva; // Calorias para manter o peso
          // Exibe o resultado
          const resultadoDiv = document.getElementById("resultado");
          resultadoDiv.style.display = "block";
          // Definir cores
          const corManter = "#4c7bf4";
          const corPerder = "#40ba37";
          const corGanhar = "#e70014";
          // Inserir HTML com estilos dinâmicos
          resultadoDiv.innerHTML = `
 <p><strong>Resultado:</strong></p>
 <p>Sua <strong>Taxa Metabólica Basal</strong> (TMB) é: <strong>${tmb.toFixed(2)} kcal</strong></p>
 <p style="color: ${corManter};"><strong>Manter seu peso</strong>: <strong>${manterPeso.toFixed(2)} kcal</strong> por dia.</p>
 <p style="color: ${corPerder};"><strong>Perder peso</strong>: <strong>${perderPeso.toFixed(2)} kcal</strong> por dia.</p>
 <p style="color: ${corGanhar};"><strong>Ganhar peso</strong>: <strong>${ganharPeso.toFixed(2)} kcal</strong> por dia.</p>
 `;
       });
    } else {
       console.warn("Os elementos necessários não estão presentes nesta página.");
    }
    // :: 8.0 CouterUp Active Code
    if ($.fn.counterUp) {
       $('.counter').counterUp({
          delay: 10,
          time: 2000
       });
    }
    // :: 9.0 nice Select Active Code
    if ($.fn.niceSelect) {
       $('select').niceSelect();
    }
    // :: 10.0 wow Active Code
    if (browserWindow.width() > 767) {
       new WOW().init();
    }
    // :: 11.0 prevent default a click
    $('a[href="#"]').click(function ($) {
       $.preventDefault()
    });
 })(jQuery);