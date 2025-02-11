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
      // :: 5.0 Modal Active Code
    function toggleModal(modalId, show) {
      const modal = document.getElementById(modalId);
      if (!modal) return;
      modal.style.display = show ? "flex" : "none";
   
      const scrollUpButton = document.getElementById("scrollUp");
      if (scrollUpButton) {
         scrollUpButton.style.display = show ? "none" : "block";
      }
   
      // Remover o evento duplicado
      modal.onclick = function (event) {
         if (event.target === modal) {
            toggleModal(modalId, false);
         }
      };
   }
   // Todas as funçoes de modal das receitas
   window.openModal = () => toggleModal("premiumModal", true);
   window.closeModal = () => toggleModal("premiumModal", false);
   window.openreceipeModal = (el) => {
      const title = el.dataset.title;
      const ingredients = el.dataset.ingredients;
      const time = el.dataset.time;
      const imageSrc = el.querySelector("img")?.src;
      const url = el.dataset.url;
   
      if (title && ingredients && time) {
         document.getElementById('modalTitle').textContent = title;
         document.getElementById('modalIngredients').textContent = ingredients;
         document.getElementById('modalTime').textContent = time;
         document.getElementById('modalImage').src = imageSrc;
         document.getElementById('receipeModal').dataset.url = url;
   
         toggleModal("receipeModal", true);
      } else {
         console.warn("Dados insuficientes para abrir o modal.");
      }
   };
   window.closereceipeModal = () => toggleModal("receipeModal", false);

   window.openReceipe = function () {
      const modal = document.getElementById('receipeModal');
      const url = modal.getAttribute('data-url'); // Obter a URL do modal
      if (url) {
          window.location.href = url; // Redirecionar para a URL
       } else {
          console.warn("URL não definida.");
       }
 };

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
    document.getElementById("calcularBtn")?.addEventListener("click", function () {
      const altura = parseFloat(document.getElementById("altura")?.value);
      const peso = parseFloat(document.getElementById("peso")?.value);
      const idade = parseInt(document.getElementById("idade")?.value);
      const genero = document.getElementById("genero")?.value;
      const nivelAtividade = parseFloat(document.getElementById("nivelAtividade")?.value);
   
      if (!altura || !peso || !idade) {
         alert("Por favor, preencha todos os campos corretamente!");
         return;
      }
   
      let tmb = genero === "masculino" 
         ? 88.362 + (13.397 * peso) + (4.799 * altura) - (5.677 * idade) 
         : 447.593 + (9.247 * peso) + (3.098 * altura) - (4.330 * idade);
   
      const manterPeso = tmb * nivelAtividade;
      const resultadoDiv = document.getElementById("resultado");

      // Definir cores
      const corManter = "#4c7bf4";
      const corPerder = "#40ba37";
      const corGanhar = "#e70014";

      resultadoDiv.style.display = "block";
   
      resultadoDiv.innerHTML = `
 <p><strong>Resultado:</strong></p>
 <p>Sua <strong>Taxa Metabólica Basal</strong> (TMB) é: <strong>${tmb.toFixed(2)} kcal</strong></p>
 <p style="color: ${corManter};"><strong>Manter seu peso</strong>: <strong>${manterPeso.toFixed(2)} kcal</strong> por dia.</p>
 <p style="color: ${corPerder};"><strong>Perder peso</strong>: <strong>${(manterPeso - 500).toFixed(2)} kcal</strong> por dia.</p>
 <p style="color: ${corGanhar};"><strong>Ganhar peso</strong>: <strong>${(manterPeso + 500).toFixed(2)} kcal</strong> por dia.</p>
 `;
   });
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