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
      <title>Fitfuel - Protein and Healthy Food | Pequeno-Almoço/Lanche</title>
      <!-- Script fontawesome -->
      <script src="https://kit.fontawesome.com/fc35c47a0f.js" crossorigin="anonymous"></script>
      <!-- Favicon -->
      <link rel="icon" href="img/core-img/favicon.ico">
      <!-- Core Stylesheet -->
      <link rel="stylesheet" href="style.css">
   </head>
   <body>
      <!-- Preloader -->
      <div id="preloader">
         <i class="circle-preloader"></i>
      </div>
      <!-- Search Wrapper -->
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
                                 <li><a href="home-premium.php">Home</a></li>
                                 <li class="active">
                                    <a href="#">Pequeno-Almoço/Lanche</a>
                                    <ul class="dropdown">
                                       <li><a href="receipe_lunch.php#recipe1">Almoço</a></li>
                                       <li><a href="receipe_lunch.php#recipe2">Jantar</a></li>
                                       <li><a href="receipe_desert.php#recipe1">Sobremesa</a></li>
                                    </ul>
                                 </li>
                                 <li><a href="calculate.php">Calcular calorias</a></li>
                                 <li><a id="logoutOption" href="#" onclick="logout()">Olá, <span id="userFullname"></span>, Logout?</a></li>
                              </ul>
                              <!-- Newsletter Form -->
                           </div>
                           <!-- Nav End -->
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- ##### Header Area End ##### -->
      <!-- ##### Breadcumb Area Start ##### -->
      <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb4.jpg);">
         <div class="container h-100">
            <div class="row h-100 align-items-center">
               <div class="col-12">
                  <div class="breadcumb-text text-center">
                     <h2>Pequeno-Almoço/Lanche</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- ##### Breadcumb Area End ##### -->
      <div class="receipe-post-area section-padding-80">
         <!-- Receipe Post Search -->
         <!-- <div class="receipe-post-search mb-80">
            <div class="container">
                <form action="#" method="post">
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <select name="select1" id="select1">
                                <option value="1">All Receipies Categories</option>
                                <option value="1">All Receipies Categories 2</option>
                                <option value="1">All Receipies Categories 3</option>
                                <option value="1">All Receipies Categories 4</option>
                                <option value="1">All Receipies Categories 5</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-3">
                            <select name="select1" id="select2">
                                <option value="1">All Receipies Categories</option>
                                <option value="1">All Receipies Categories 2</option>
                                <option value="1">All Receipies Categories 3</option>
                                <option value="1">All Receipies Categories 4</option>
                                <option value="1">All Receipies Categories 5</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-3">
                            <input type="search" name="search" placeholder="Search Receipies">
                        </div>
                        <div class="col-12 col-lg-3 text-right">
                            <button type="submit" class="btn delicious-btn">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            </div> -->
         <!-- Receipe Slider -->
         <section id="recipe1">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <div class="receipe-slider owl-carousel">
                        <img src="img/bg-img/rabanda1.png">
                        <img src="img/bg-img/rabanada2.png">
                     </div>
                  </div>
               </div>
            </div>
            <!-- Receipe Content Area -->
            <div class="receipe-content-area">
               <div class="container">
                  <div class="row">
                     <div class="col-12 col-md-8">
                        <div class="receipe-headline my-5">
                           <span>132 Kcal</span>
                           <h2>Rabanada Proteíca</h2>
                           <div class="receipe-duration">
                              <h6><i class="fas fa-stopwatch"></i> 15 minutos</h6>
                              <h6><i class="fas fa-shopping-basket"></i> 6 ingredientes</h6>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <!-- Passo a Passo -->
                     <div class="col-12 col-lg-8">
                        <h2>Passo a passo</h2>
                        <div class="single-preparation-step d-flex">
                           <h4>01.</h4>
                           <p>Adicionar a uma tigela a clara e ovo, proteína, extrato de baunilha, canela e leite até ficar tudo bem distribuído. <br>
                           (Caso se utilize proteína, misturar com um pouco de água primeiro e depois acrescentar à mistura)</p>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <h4>02.</h4>
                           <p>Mergulhar as fatias de pão na mistura e deixar absorver bem o líquido. </p>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <h4>03.</h4>
                           <p> 
                           Levar as fatias previamente mergulhadas à frigideira em lume médio e deixar cozinhar por 2 minutos de cada lado. Se sobrar líquido, acrescentar para cima das fatias de pão na frigideira. </p>
                        </div>
                        <div class="receipe-headline my-5">
                           <h2>Notas</h2>
                           <h3><span>Substituições</span></h3>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <p>O leite magro pode ser substituído por bebida vegetal. <br>
                           Podes só usar 2 ovos ou só 120g de claras em vez do que está na receita original. </p>
                        </div>
                     </div>
                     <!-- Ingredientes e Nutrição -->
                     <div class="col-12 col-lg-4">
                        <div class="tabs-container">
                           <!-- Tabs -->
                           <div class="tabs">
                              <button class="tab-button active" data-tab="ingredients">Ingredientes</button>
                              <button class="tab-button" data-tab="nutrition">Nutrição</button>
                           </div>
                           <!-- Content of Tabs -->
                           <div class="tab-content">
                              <div class="tab-panel active" id="ingredients">
                                 <h4>Ingredientes</h4>
                                 <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">1 ovo</label>
                                 </div>
                                 <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label" for="customCheck2">60 gramas de claras de ovo</label>
                                 </div>
                                 <!-- Custom Checkbox -->
                                 <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                    <label class="custom-control-label" for="customCheck3">3 pedaço Pão de forma</label>
                                 </div>
                                 <!-- Custom Checkbox -->
                                 <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck4">
                                    <label class="custom-control-label" for="customCheck4">15 grama Proteína de baunilha</label>
                                 </div>
                                 <!-- Custom Checkbox -->
                                 <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck5">
                                    <label class="custom-control-label" for="customCheck5">1 colher de chá Canela</label>
                                 </div>
                              </div>
                              <div class="tab-panel" id="nutrition">
                                 <h4>Nutrição</h4>
                                 <table class="table">
                                    <tr>
                                       <th>Calorias</th>
                                       <th>Gordura</th>
                                       <th>Carboidratos líquidos</th>
                                       <th>Proteína</th>
                                    </tr>
                                    <tr>
                                       <td>132 kcal</td>
                                       <td>3 g</td>
                                       <td>13 g</td>
                                       <td>11 g</td>
                                    </tr>
                                 </table>
                                 <div class="info-message">
                                 <span class="info-icon">i</span>
                                 Informação fornecida é uma estimativa
                              </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section id="recipe2">
            <hr class="recipe-divider">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <div class="receipe-slider owl-carousel">
                        <img src="img/bg-img/tosta.png">
                        <img src="img/bg-img/mista.png">
                     </div>
                  </div>
               </div>
            </div>
            <div class="receipe-content-area">
               <div class="container">
                  <div class="row">
                     <div class="col-12 col-md-8">
                        <div class="receipe-headline my-5">
                           <span>253 Kcal</span>
                           <h2>Tosta Mista</h2>
                           <div class="receipe-duration">
                              <h6><i class="fas fa-stopwatch"></i> 5 minutos</h6>
                              <h6><i class="fas fa-shopping-basket"></i> 3 ingredientes</h6>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <!-- Passo a Passo -->
                     <div class="col-12 col-lg-8">
                        <h2>Passo a passo</h2>
                        <div class="single-preparation-step d-flex">
                           <h4>01.</h4>
                           <p>Colocar os ingredientes por cima da fatia de pão de forma e fechar.</p>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <h4>02.</h4>
                           <p>Pode ser torrado ou prensado.</p>
                        </div>
                     </div>
                     <!-- Ingredientes e Nutrição -->
                     <div class="col-12 col-lg-4">
                      <div class="tabs-container">
                        <!-- Tabs -->
                        <div class="tabs">
                           <button class="tab-button active" data-tab="ingredients2">Ingredientes</button>
                           <button class="tab-button" data-tab="nutrition2">Nutrição</button>
                        </div>
                        <!-- Conteúdo das Tabs -->
                        <div class="tab-content">
                           <!-- Ingredientes -->
                           <div class="tab-panel active" id="ingredients2">
                              <h4>Ingredientes</h4>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck6">
                                 <label class="custom-control-label" for="customCheck6">2 fatia Pão de forma</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck7">
                                 <label class="custom-control-label" for="customCheck7">2 fatia Queijo flamengo light</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck8">
                                 <label class="custom-control-label" for="customCheck8">2 fatia Fiambre</label>
                              </div>
                           </div>
                           <!-- Nutrição -->
                           <div class="tab-panel" id="nutrition2">
                              <h4>Nutrição</h4>
                              <table class="table">
                                 <tr>
                                    <th>Calorias</th>
                                    <th>Gordura</th>
                                    <th>Carboidratos líquidos</th>
                                    <th>Proteína</th>
                                 </tr>
                                 <tr>
                                    <td>253 kcal</td>
                                    <td>6 g</td>
                                    <td>25 g</td>
                                    <td>23 g</td>
                                 </tr>
                              </table>
                              <div class="info-message">
                                 <span class="info-icon">i</span>
                                 Informação fornecida é uma estimativa
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section id="recipe3">
            <hr class="recipe-divider">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <div class="receipe-slider owl-carousel">
                        <img src="img/bg-img/bf3.jpg">
                        <img src="img/bg-img/bf3.png">
                     </div>
                  </div>
               </div>
            </div>
            <div class="receipe-content-area">
               <div class="container">
                  <div class="row">
                     <div class="col-12 col-md-8">
                        <div class="receipe-headline my-5">
                           <span>452 Kcal</span>
                           <h2>Papa Aveia com Oreo</h2>
                           <div class="receipe-duration">
                              <h6><i class="fas fa-stopwatch"></i> 5 minutos</h6>
                              <h6><i class="fas fa-shopping-basket"></i> 4 ingredientes</h6>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <!-- Passo a Passo -->
                     <div class="col-12 col-lg-8">
                        <h2>Passo a passo</h2>
                        <div class="single-preparation-step d-flex">
                           <h4>01.</h4>
                           <p>Adicionar a uma tigela a aveia e o leite magro.</p>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <h4>02.</h4>
                           <p>Levar ao micro-ondas por cerca de 1 minuto e 30 segundos.</p>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <h4>03.</h4>
                           <p>Adicionar a proteína até ficar bem integrada na aveia.</p>
                        </div>
                        <!-- Single Preparation Step -->
                        <div class="single-preparation-step d-flex">
                           <h4>04.</h4>
                           <p>Esmagar 2 Oreos e colocar por cima (Envolver ou deixar pedaços inteiros por cima).</p>
                        </div>
                     </div>
                     <!-- Ingredientes e Nutrição -->
                     <div class="col-12 col-lg-4">
                     <div class="tabs-container">
                        <!-- Tabs -->
                        <div class="tabs">
                           <button class="tab-button active" data-tab="ingredients3">Ingredientes</button>
                           <button class="tab-button" data-tab="nutrition3">Nutrição</button>
                        </div>
                        <!-- Conteúdo das Tabs -->
                        <div class="tab-content">
                           <!-- Ingredientes -->
                           <div class="tab-panel active" id="ingredients3">
                              <h4>Ingredientes</h4>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck14">
                                 <label class="custom-control-label" for="customCheck14">45 grama Aveia</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck15">
                                 <label class="custom-control-label" for="customCheck15">200 mililitros Leite magro</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck16">
                                 <label class="custom-control-label" for="customCheck16">25 grama Proteína de baunilha</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck17">
                                 <label class="custom-control-label" for="customCheck17">2 pedaço Oreo</label>
                              </div>
                           </div>
                           <!-- Nutrição -->
                           <div class="tab-panel" id="nutrition3">
                              <h4>Nutrição</h4>
                              <table class="table">
                                 <tr>
                                    <th>Calorias</th>
                                    <th>Gordura</th>
                                    <th>Carboidratos líquidos</th>
                                    <th>Proteína</th>
                                 </tr>
                                 <tr>
                                    <td>453 kcal</td>
                                    <td>9 g</td>
                                    <td>55 g</td>
                                    <td>35 g</td>
                                 </tr>
                              </table>
                              <div class="info-message">
                                 <span class="info-icon">i</span>
                                 Informação fornecida é uma estimativa
                              </div>
                           </div>
                        </div>
                     </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section id="recipe4">
            <hr class="recipe-divider">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <div class="receipe-slider owl-carousel">
                        <img src="img/bg-img/bf4.png">
                        <img src="img/bg-img/bf4.jpg">
                     </div>
                  </div>
               </div>
            </div>
            <div class="receipe-content-area">
               <div class="container">
                  <div class="row">
                     <div class="col-12 col-md-8">
                        <div class="receipe-headline my-5">
                           <span>309 Kcal</span>
                           <h2>Iogurte com Granola/Cereais</h2>
                           <div class="receipe-duration">
                              <h6><i class="fas fa-stopwatch"></i> 5 minutos</h6>
                              <h6><i class="fas fa-shopping-basket"></i> 3 ingredientes</h6>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <!-- Passo a Passo -->
                     <div class="col-12 col-lg-8">
                        <h2>Passo a passo</h2>
                        <div class="single-preparation-step d-flex">
                           <h4>01.</h4>
                           <p>Numa tigela colocar o iogurte, os frutos e o cereal à escolha. </p>
                        </div>
                        <div class="receipe-headline my-5">
                           <h2>Notas</h2>
                           <h3><span>Substituições</span></h3>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <p>Adiciona whey ao iogurte para teres uma versão mais proteica desta receita. </p></div>
                     </div>
                     <!-- Ingredientes e Nutrição -->
                     <div class="col-12 col-lg-4">
                     <div class="tabs-container">
                        <!-- Tabs -->
                        <div class="tabs">
                           <button class="tab-button active" data-tab="ingredients4">Ingredientes</button>
                           <button class="tab-button" data-tab="nutrition4">Nutrição</button>
                        </div>
                        <!-- Conteúdo das Tabs -->
                        <div class="tab-content">
                           <!-- Ingredientes -->
                           <div class="tab-panel active" id="ingredients4">
                              <h4>Ingredientes</h4>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck22">
                                 <label class="custom-control-label" for="customCheck22">250 grama Iogurte grego light</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck23">
                                 <label class="custom-control-label" for="customCheck23">50 grama Frutos vermelhos</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck24">
                                 <label class="custom-control-label" for="customCheck24">30 grama Granola, cereais ou muesli</label>
                              </div>
                           </div>
                           <!-- Nutrição -->
                           <div class="tab-panel" id="nutrition4">
                              <h4>Nutrição</h4>
                              <table class="table">
                                 <tr>
                                    <th>Calorias</th>
                                    <th>Gordura</th>
                                    <th>Carboidratos líquidos</th>
                                    <th>Proteína</th>
                                 </tr>
                                 <tr>
                                    <td>309 kcal</td>
                                    <td>6 g</td>
                                    <td>31 g</td>
                                    <td>30 g</td>
                                 </tr>
                              </table>
                              <div class="info-message">
                                 <span class="info-icon">i</span>
                                 Informação fornecida é uma estimativa
                              </div>
                           </div>
                        </div>
                     </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      <!-- ##### Follow Us Instagram Area End ##### -->
      <!-- ##### Footer Area Start ##### -->
      <footer class="footer-area">
         <div class="container h-100">
            <div class="row h-100">
               <div class="col-12 h-100 d-flex flex-wrap align-items-center justify-content-between">
                  <!-- Footer Social Info -->
                  <div class="footer-social-info text-right">
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
</html>.