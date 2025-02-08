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
      <title>Fitfuel - Protein and Healthy Food | Sobremesa</title>
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
                                    <a href="#">Sobremesa</a>
                                    <ul class="dropdown">
                                    <li><a href="receipe_breakfast.php#recipe1">Pequeno-Almoço</a></li>
                                    <li><a href="receipe_lunch.php#recipe1">Almoço</a></li>
                                    <li><a href="receipe_breakfast.php#recipe2">Lanche</a></li>
                                    <li><a href="receipe_lunch.php#recipe2">Jantar</a></li>
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
      <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb2.jpg);">
         <div class="container h-100">
            <div class="row h-100 align-items-center">
               <div class="col-12">
                  <div class="breadcumb-text text-center">
                     <h2>Sobremesa</h2>
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
                        <img src="img/bg-img/desert_1.png">
                        <img src="img/bg-img/d1.png">
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
                           <span>214 Kcal</span>
                           <h2>Tarte Maçã em Pão de Forma</h2>
                           <div class="receipe-duration">
                              <h6><i class="fas fa-stopwatch"></i> 20 minutos</h6>
                              <h6><i class="fas fa-shopping-basket"></i> 5 ingredientes</h6>
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
                           <p>Começar por cortar e descascar (opcionalmente) meia maçã aos cubos.</p>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <h4>02.</h4>
                           <p>Numa frigideira, refogar a maçã com canela a gosto. Nesta fase opcionalmente acrescentar <br> o adoçante ou mel. Se for preciso, adicionar uma colher de sopa de água para ajudar a amolecer a maçã. Ir mexendo ocasionalmente, este processo deve demorar cerca de 5 minutos.</p>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <h4>03.</h4>
                           <p>Colocar 1 colher de leite morno em cada fatia de pão de forma e ir achatando com a colher. Colocar o recheio de maçã em cima de uma fatia de pão de forma. Tapar com a outra fatia de pão de forma, com um garfo selar as bordas do pão. Colocar canela por cima.</p>
                        </div>
                        <!-- Single Preparation Step -->
                        <div class="single-preparation-step d-flex">
                           <h4>04.</h4>
                           <p>Levar à Air Fryer por cerca de 15 minutos a 180º (ou até o pão ficar estaladiço)</p>
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
                                    <label class="custom-control-label" for="customCheck1">2 fatia Pão de forma</label>
                                 </div>
                                 <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label" for="customCheck2">75 grama Maçã (1/2)</label>
                                 </div>
                                 <!-- Custom Checkbox -->
                                 <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                    <label class="custom-control-label" for="customCheck3">1 colher de chá Canela</label>
                                 </div>
                                 <!-- Custom Checkbox -->
                                 <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck4">
                                    <label class="custom-control-label" for="customCheck4">1 colher de chá Adoçante ou mel</label>
                                 </div>
                                 <!-- Custom Checkbox -->
                                 <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck5">
                                    <label class="custom-control-label" for="customCheck5">2 colher de sopa 2 percent milk</label>
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
                                       <td>213 kcal</td>
                                       <td>3 g</td>
                                       <td>34 g</td>
                                       <td>7 g</td>
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
                        <img src="img/bg-img/desert_2.png">
                        <img src="img/bg-img/desert_2.jpg">
                     </div>
                  </div>
               </div>
            </div>
            <div class="receipe-content-area">
               <div class="container">
                  <div class="row">
                     <div class="col-12 col-md-8">
                        <div class="receipe-headline my-5">
                           <span>234 Kcal</span>
                           <h2>Doce Gelado de Chocolate</h2>
                           <div class="receipe-duration">
                              <h6><i class="fas fa-stopwatch"></i> 10 minutos</h6>
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
                           <p>Num recipiente adequado, coloca o iogurte grego.</p>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <h4>02.</h4>
                           <p>Adiciona a proteína whey de chocolate e o cacau em pó ao iogurte.</p>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <h4>03.</h4>
                           <p>Colocar a mistura num recipiente forrado a papel vegetal. Leva o recipiente ao congelador.</p>
                        </div>
                        <!-- Single Preparation Step -->
                        <div class="single-preparation-step d-flex">
                           <h4>04.</h4>
                           <p>Deixa a sobremesa solidificar durante pelo menos 2 horas ou até que atinja a consistência desejada.</p>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <h4>05.</h4>
                           <p>Após o congelamento, serve a tua Sobremesa de Chocolate Gelada e desfruta deste mimo saudável!</p>
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
                                 <label class="custom-control-label" for="customCheck6">150 grama Iogurte grego light</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck7">
                                 <label class="custom-control-label" for="customCheck7">30 grama Proteína de chocolate</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck8">
                                 <label class="custom-control-label" for="customCheck8">10 grama Cacau em pó</label>
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
                                    <td>234 kcal</td>
                                    <td>4 g</td>
                                    <td>11 g</td>
                                    <td>43 g</td>
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
         <section id="recipe3">
            <hr class="recipe-divider">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <div class="receipe-slider owl-carousel">
                        <img src="img/bg-img/mango.png">
                        <img src="img/bg-img/desert_3.png">
                     </div>
                  </div>
               </div>
            </div>
            <div class="receipe-content-area">
               <div class="container">
                  <div class="row">
                     <div class="col-12 col-md-8">
                        <div class="receipe-headline my-5">
                           <span>234 Kcal</span>
                           <h2>Doce Gelado de Chocolate</h2>
                           <div class="receipe-duration">
                              <h6><i class="fas fa-stopwatch"></i> 10 minutos</h6>
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
                           <p>Num recipiente adequado, coloca o iogurte grego.</p>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <h4>02.</h4>
                           <p>Adiciona a proteína whey de chocolate e o cacau em pó ao iogurte.</p>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <h4>03.</h4>
                           <p>Colocar a mistura num recipiente forrado a papel vegetal. Leva o recipiente ao congelador.</p>
                        </div>
                        <!-- Single Preparation Step -->
                        <div class="single-preparation-step d-flex">
                           <h4>04.</h4>
                           <p>Deixa a sobremesa solidificar durante pelo menos 2 horas ou até que atinja a consistência desejada.</p>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <h4>05.</h4>
                           <p>Após o congelamento, serve a tua Sobremesa de Chocolate Gelada e desfruta deste mimo saudável!</p>
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
                                 <label class="custom-control-label" for="customCheck6">150 grama Iogurte grego light</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck7">
                                 <label class="custom-control-label" for="customCheck7">30 grama Proteína de chocolate</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck8">
                                 <label class="custom-control-label" for="customCheck8">10 grama Cacau em pó</label>
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
                                    <td>234 kcal</td>
                                    <td>4 g</td>
                                    <td>11 g</td>
                                    <td>43 g</td>
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
      <script src="js/logins.js"></script>
   </body>
</html>.