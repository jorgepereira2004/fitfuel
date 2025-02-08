<?php
   session_start();
   
   // Verifica se o usuário está logado
   if (!isset($_SESSION['username'])) {
       // Redireciona para a página inicial caso não esteja logado
       header('Location: index.html');
       exit(); // Encerra o script após o redirecionamento
   }
   
   // Verifica se o nome completo está na sessão
   if (isset($_SESSION['fullname'])) {
       echo "<script>
           document.addEventListener('DOMContentLoaded', function() {
               // Exibir a mensagem com o nome do usuário
               const userFullname = '" . htmlspecialchars($_SESSION['fullname'], ENT_QUOTES) . "';
               document.getElementById('userFullname').innerText = userFullname;
   
               // Tornar visível a opção de logout
               document.getElementById('logoutOption').style.display = 'inline';
           });
       </script>";
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="description" content="">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <!-- Title -->
      <title>Fitfuel - Protein and Healthy Food | Home</title>
      <!-- Favicon -->
      <link rel="icon" href="img/core-img/favicon.ico">
      <script src="https://kit.fontawesome.com/fc35c47a0f.js" crossorigin="anonymous"></script>
      <!-- Core Stylesheet -->
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="css/login.css">
   </head>
   <body>
      <!-- Preloader -->
      <div id="preloader">
         <i class="circle-preloader"></i>
      </div>
      <!-- Search Wrapper -->
      <!-- <div class="search-wrapper"> -->
      <!-- Close Btn -->
      <!-- <div class="close-btn"><i class="fa fa-times" aria-hidden="true"></i></div>
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <form action="#" method="post">
                     <input type="search" name="search" placeholder="What do you want to eat?">
                     <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                  </form>
               </div>
            </div>
         </div>
         </div> -->
      <!-- ##### Header Area Start ##### -->
      <header class="header-area">
         <!-- Top Header Area -->
         <div class="top-header-area">
            <div class="container h-100">
               <div class="row h-100 align-items-center justify-content-between">
                  <!-- Breaking News -->
                  <div class="col-12 col-sm-6">
                     <div class="breaking-news">
                        <div id="breakingNewsTicker" class="ticker">
                           <ul>
                              <li><a href="#">Welcome to Fitfuel!</a></li>
                              <li><a href="#">Protein and healthy food!</a></li>
                              <li><a href="#">Calculate your calories!</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <!-- Top Social Info -->
                  <div class="col-12 col-sm-6">
                     <div class="top-social-info text-right">
                        <!-- <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                           <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                           <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                           <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                           <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a> -->
                        <a href="https://www.linkedin.com/in/jorge-amadeu-pereira" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Navbar Area -->
         <div class="delicious-main-menu">
            <div class="classy-nav-container breakpoint-off">
               <div class="container">
                  <!-- Menu -->
                  <nav class="classy-navbar justify-content-between" id="deliciousNav">
                     <!-- Logo -->
                     <a class="nav-brand" href="home-premium.php"><img src="img/core-img/logo.png" alt=""></a>
                     <!-- Navbar Toggler -->
                     <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                     </div>
                     <!-- Menu -->
                     <div class="classy-menu">
                        <!-- close btn -->
                        <div class="classycloseIcon">
                           <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <!-- Nav Start -->
                        <div class="classynav">
                           <ul>
                              <li class="active"><a href="home-premium.php">Home</a></li>
                              <li>
                                 <a href="#">Receitas</a>
                                 <ul class="dropdown">
                                    <li><a href="receipe_breakfast.php">Pequeno-Almoço</a></li>
                                    <li><a href="receipe_lunch.php">Almoço</a></li>
                                    <li><a href="receipe_breakfast.php">Lanche</a></li>
                                    <li><a href="receipe_lunch.php">Jantar</a></li>
                                    <li><a href="receipe_desert.php">Sobremesa</a></li>
                                    </li>
                                 </ul>
                              </li>
                              <li><a href="calculate.php">Calcular calorias</a></li>
                              <li><a id="logoutOption" href="#" onclick="logout()">Olá, <span id="userFullname"></span>, Logout?</a></li>
                           </ul>
                        </div>
                        <!-- Nav End -->
                     </div>
                  </nav>
               </div>
            </div>
         </div>
      </header>
      <!-- ##### Header Area End ##### -->
      <!-- ##### Hero Area Start ##### -->
      <section class="hero-area">
         <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url('img/bg-img/breakfast.png');" data-dots="<span>Pequeno Almoço</span>">
               <div class="container h-100">
                  <div class="row h-100 align-items-center">
                     <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="hero-slides-content" data-animation="fadeInUp" data-delay="100ms">
                           <h2 data-animation="fadeInUp" data-delay="300ms">Rabanada Proteica</h2>
                           <p data-animation="fadeInUp" data-delay="700ms">
                              <i class="fas fa-stopwatch"></i> 15 minutos
                              <br>
                              <i class="fas fa-shopping-basket"></i> 6 ingredientes 
                           </p>
                           <a href="receipe_breakfast.php#recipe1" class="btn delicious-btn" data-animation="fadeInUp" data-delay="1000ms">See Recipe</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url('img/bg-img/lunch.png');">
               <div class="container h-100">
                  <div class="row h-100 align-items-center">
                     <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="hero-slides-content" data-animation="fadeInUp" data-delay="100ms">
                           <h2 data-animation="fadeInUp" data-delay="300ms">Massa Cremosa de Pimentos</h2>
                           <p data-animation="fadeInUp" data-delay="700ms">
                              <i class="fas fa-stopwatch"></i> 15 minutos
                              <br>
                              <i class="fas fa-shopping-basket"></i> 8 ingredientes 
                           </p>
                           <a href="receipe_lunch.php#recipe2" class="btn delicious-btn" data-animation="fadeInUp" data-delay="1000ms">See Recipe</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url('img/bg-img/snack.png');">
               <div class="container h-100">
                  <div class="row h-100 align-items-center">
                     <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="hero-slides-content" data-animation="fadeInUp" data-delay="100ms">
                           <h2 data-animation="fadeInUp" data-delay="300ms">Tosta Mista</h2>
                           <p data-animation="fadeInUp" data-delay="700ms">
                              <i class="fas fa-stopwatch"></i> 5 minutos
                              <br>
                              <i class="fas fa-shopping-basket"></i> 3 ingredientes 
                           </p>
                           <a href="receipe_breakfast.php#recipe2" class="btn delicious-btn" data-animation="fadeInUp" data-delay="1000ms">See Recipe</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="single-hero-slide bg-img" style="background-image: url('img/bg-img/dinner.png');">
               <div class="container h-100">
                  <div class="row h-100 align-items-center">
                     <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="hero-slides-content" data-animation="fadeInUp" data-delay="100ms">
                           <h2 data-animation="fadeInUp" data-delay="300ms">Esparguete Cremosa com Queijo e Frango</h2>
                           <p data-animation="fadeInUp" data-delay="700ms">
                              <i class="fas fa-stopwatch"></i> 15 minutos
                              <br>
                              <i class="fas fa-shopping-basket"></i> 5 ingredientes 
                           </p>
                           <a href="receipe_lunch.php#recipe1" class="btn delicious-btn" data-animation="fadeInUp" data-delay="1000ms">See Recipe</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- ##### Hero Area End ##### -->
      <!-- ##### Top Catagory Area Start ##### -->
      <section class="top-catagory-area section-padding-80-0">
         <div class="container">
            <div class="row">
               <!-- Top Catagory Area -->
               <div class="col-12 col-lg-6">
                  <div class="single-top-catagory">
                     <img src="img/bg-img/desert_1.png" alt="">
                     <!-- Content -->
                     <div class="top-cta-content">
                        <h3>Tarte Maçã em Pão de Forma</h3>
                        <p data-animation="fadeInUp" data-delay="700ms">
                           <i class="fas fa-stopwatch"></i> 20 minutos
                           <br>
                           <i class="fas fa-shopping-basket"></i> 2 ingredientes 
                        </p>
                        <a href="receipe_desert.php#recipe1" class="btn delicious-btn">See Full Receipe</a>
                     </div>
                  </div>
               </div>
               <!-- Top Catagory Area -->
               <div class="col-12 col-lg-6">
                  <div class="single-top-catagory">
                     <img src="img/bg-img/desert_2.png" alt="">
                     <!-- Content -->
                     <div class="top-cta-content">
                        <h3>Doce Gelado de Chocolate</h3>
                        <p data-animation="fadeInUp" data-delay="700ms">
                           <i class="fas fa-stopwatch"></i> 10 minutos
                           <br>
                           <i class="fas fa-shopping-basket"></i> 3 ingredientes 
                        </p>
                        <a href="receipe_desert.php#recipe2" class="btn delicious-btn">See Full Receipe</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- ##### Top Catagory Area End ##### -->
      <!-- Modal -->
      <div id="receipeModal" class="modal">
         <div class="modal-content">
            <span class="close" onclick="closereceipeModal()">&times;</span>
            <h2 id="modalTitle"></h2>
            <img id="modalImage" src="" alt="Imagem da Receita" style="width: 100%; height: auto;">
            <ul>
               <li><i class="fas fa-stopwatch"></i> <span id="modalTime"></span></li>
               <li><i class="fas fa-shopping-basket"></i> <span id="modalIngredients"></span></li>
            </ul>
            <div class="modal-buttons-premium">
               <button onclick="openReceipe();">Ver a receita</button>
            </div>
         </div>
      </div>
      <!-- ##### Best Receipe Area Start ##### -->
      <!-- ##### Best Receipe Area Start ##### -->
      <section class="best-receipe-area">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <div class="section-heading">
                     <h3>Algumas Receitas</h3>
                  </div>
               </div>
            </div>
            <div class="row">
               <!-- Imagem Bloqueada -->
               <div class="col-12 col-sm-6 col-lg-4" 
                  onclick="openreceipeModal(this)" 
                  data-title="Salmão com Batata" 
                  data-ingredients="3 ingredientes" 
                  data-time="20 minutos"
                  data-url="receipe_lunch.php#recipe3">
                  <a href="#">
                  <div class="single-best-receipe-area mb-30">
                     <img src="img/bg-img/salmao.jpg" alt="">
                     <div class="receipe-content">
                           <h5>Salmão com Batata</h5>                       
                     </div>
                  </div>
                  </a>
               </div>
               <!-- Single Best Receipe Area -->
               <div class="col-12 col-sm-6 col-lg-4" 
                  onclick="openreceipeModal(this)" 
                  data-title="Hambúrguer de Atum" 
                  data-ingredients="7 ingredientes" 
                  data-time="12 minutos"
                  data-url="receipe_lunch.php#recipe4">
                  <a href="#">
                  <div class="single-best-receipe-area mb-30">
                     <img src="img/bg-img/atum.png" alt="">
                     <div class="receipe-content">
                        <a href="#">
                           <h5>Hambúrguer de Atum</h5>
                     </div>
                  </div>
                  </a>
               </div>
               <div class="col-12 col-sm-6 col-lg-4" 
                  onclick="openreceipeModal(this)" 
                  data-title="Smoothie de Manga" 
                  data-ingredients="4 ingredientes" 
                  data-time="5 minutos"
                  data-url="receipe_desert.php#recipe3">
                  <a href="#">
                  <div class="single-best-receipe-area mb-30">
                     <img src="img/bg-img/desert_3.png" alt="">
                     <div class="receipe-content">
                           <h5>Smoothie de Manga</h5>
                        
                     </div>
                  </div>
                  </a>
               </div>
               <div class="col-12 col-sm-6 col-lg-4" 
                  onclick="openreceipeModal(this)" 
                  data-title="Sopa de Noodles de Frango" 
                  data-ingredients="6 ingredientes" 
                  data-time="20 minutos"
                  data-url="receipe_lunch.php#recipe5">
                  <a href="#">
                  <div class="single-best-receipe-area mb-30">
                     <img src="img/bg-img/noodles.png" alt="">
                     <div class="receipe-content">
                           <h5>Sopa de Noodles de Frango</h5>
                     </div>
                  </div>
                  </a>
               </div>
               <div class="col-12 col-sm-6 col-lg-4" 
                  onclick="openreceipeModal(this)" 
                  data-title="Papa Aveia com Oreo" 
                  data-ingredients="4 ingredientes" 
                  data-time="5 minutos"
                  data-url="receipe_breakfast.php#recipe3">
                  <a href="#">
                  <div class="single-best-receipe-area mb-30">
                     <img src="img/bg-img/oreo.png" alt="">
                     <div class="receipe-content">
                           <h5>Papa Aveia com Oreo</h5>
                     </div>
                  </div>
                  </a>
               </div>
               <div class="col-12 col-sm-6 col-lg-4" 
                  onclick="openreceipeModal(this)" 
                  data-title="Iogurte com Granola/Cereais" 
                  data-ingredients="3 ingredientes" 
                  data-time="5 minutos"
                  data-url="receipe_breakfast.php#recipe4">
                  <a href="#">
                  <div class="single-best-receipe-area mb-30">
                     <img src="img/bg-img/granola.png" alt="">
                     <div class="receipe-content">
                           <h5>Iogurte com Granola/Cereais</h5>
                     </div>
                  </div>
                  </a>
               </div>
            </div>
         </div>
      </section>
      <!-- ##### Best Receipe Area End ##### -->
      <!-- ##### CTA Area Start ##### -->
      <!-- ##### CTA Area End ##### -->
      <!-- ##### Small Receipe Area Start ##### -->
      <!-- ##### Small Receipe Area End ##### -->
      <!-- ##### Quote Subscribe Area Start ##### -->
      <!-- ##### Quote Subscribe Area End ##### -->
      <!-- ##### Follow Us Instagram Area Start ##### -->
      <!-- ##### Follow Us Instagram Area End ##### -->
      <!-- ##### Footer Area Start ##### -->
      <footer class="footer-area">
         <div class="container h-100">
            <div class="row h-100">
               <div class="col-12 h-100 d-flex flex-wrap align-items-center justify-content-between">
                  <!-- Footer Social Info -->
                  <div class="footer-social-info text-right">
                     <!-- <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a> -->
                     <a href="https://www.linkedin.com/in/jorge-amadeu-pereira" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                  </div>
                  <!-- Footer Logo -->
                  <div class="footer-logo">
                     <a href="home-premium.php"><img src="img/core-img/logo.png" alt=""></a>
                  </div>
                  <!-- Copywrite -->
                  <p>
                     <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                     Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Jorge Pereira 
                     <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  </p>
               </div>
            </div>
         </div>
      </footer>
      <!-- ##### Footer Area Start ##### -->
      <!-- ##### All Javascript Files ##### -->
      <!-- jQuery-2.2.4 js -->
      <script src="js/jquery/jquery-2.2.4.min.js"></script>
      <!-- Popper js -->
      <script src="js/bootstrap/popper.min.js"></script>
      <!-- Bootstrap js -->
      <script src="js/bootstrap/bootstrap.min.js"></script>
      <!-- All Plugins js -->
      <script src="js/plugins/plugins.js"></script>
      <!-- Active js -->
      <script src="js/active.js"></script>
      <script src="js/login.js"></script>
   </body>
</html>
