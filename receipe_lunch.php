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
      <title>Fitfuel - Protein and Healthy Food | Almoço/Jantar</title>
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
                                    <a href="#">Almoço/Jantar</a>
                                    <ul class="dropdown">
                                       <li><a href="receipe_breakfast.php#recipe1">Pequeno-Almoço</a></li>
                                       <li><a href="receipe_breakfast.php#recipe2">Lanche</a></li>
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
      <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.png);">
         <div class="container h-100">
            <div class="row h-100 align-items-center">
               <div class="col-12">
                  <div class="breadcumb-text text-center">
                     <h2>Almoço/Jantar</h2>
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
                        <img src="img/bg-img/l.jpg">
                        <img src="img/bg-img/dinner2.png">
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
                           <span>507 Kcal</span>
                           <h2>Esparguete Cremosa com Queijo e Frango caseiro</h2>
                           <div class="receipe-duration">
                              <h6><i class="fas fa-stopwatch"></i> 15 minutos</h6>
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
                           <p>Começa por colocar a massa a ferver numa panela quente com sal e cozinha de acordo com as instruções da embalagem.</p>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <h4>02.</h4>
                           <p>Numa frigideira em lume médio cozinha o frango temperado e cortado aos cubos.</p>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <h4>03.</h4>
                           <p>Numa liquidificadora adiciona o queijo de barrar, o leite magro, o queijo parmersão e o copo com a água da massa (isso ajuda o molho a engrossar). Tritura tudo. </p>
                        </div>
                        <!-- Single Preparation Step -->
                        <div class="single-preparation-step d-flex">
                           <h4>04.</h4>
                           <p>Na frigidideira antiaderente coloca o molho e deixar levantar fervura sempre mexendo até engrossar. </p>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <h4>05.</h4>
                           <p>Acrescenta a massa e envolve bem. Coloca o frango por cima e está pronta a servir. </p>
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
                                    <label class="custom-control-label" for="customCheck1">100 grama Philadelphia light</label>
                                 </div>
                                 <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label" for="customCheck2">200 mililitros Fat free milk
                                    </label>
                                 </div>
                                 <!-- Custom Checkbox -->
                                 <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                    <label class="custom-control-label" for="customCheck3">200 grama Peito de frango (cru)</label>
                                 </div>
                                 <!-- Custom Checkbox -->
                                 <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck4">
                                    <label class="custom-control-label" for="customCheck4">20 grama Queijo parmesão</label>
                                 </div>
                                 <!-- Custom Checkbox -->
                                 <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck5">
                                    <label class="custom-control-label" for="customCheck5">130 grama Esparguete (peso cru)</label>
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
                                       <td>507 kcal</td>
                                       <td>12 g</td>
                                       <td>54 g</td>
                                       <td>40 g</td>
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
                        <img src="img/bg-img/lunch.png">
                        <img src="img/bg-img/dinner1.png">
                     </div>
                  </div>
               </div>
            </div>
            <div class="receipe-content-area">
               <div class="container">
                  <div class="row">
                     <div class="col-12 col-md-8">
                        <div class="receipe-headline my-5">
                           <span>553 Kcal</span>
                           <h2>Massa Cremosa de Pimentos</h2>
                           <div class="receipe-duration">
                              <h6><i class="fas fa-stopwatch"></i> 15 minutos</h6>
                              <h6><i class="fas fa-shopping-basket"></i> 8 ingredientes</h6>
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
                           <p>Corta o frango aos cubos e tempera a teu gosto.</p>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <h4>02.</h4>
                           <p>Numa panela com água a ferver e sal coloca a massa. <br>
                               (O tempo de cozedura conforme a orientação na embalagem) </p>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <h4>03.</h4>
                           <p>Numa frigideira adicionar cebola, pimentos, o tomate triturado e refogar cerca de 5 minutos.</p>
                        </div>
                        <!-- Single Preparation Step -->
                        <div class="single-preparation-step d-flex">
                           <h4>04.</h4>
                           <p>Na liquidificadora acrescentar o conteúdo da frigideira, com os dentes de alho, iogurte grego e uma colher grande de água da massa. Triturar tudo. </p>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <h4>05.</h4>
                           <p>Na frigideira grelhar o frango, quando tiver dourado acrescenta a massa cozida e verte o molho da liquidifcadora para a frigideira e mexe e envolve tudo. </p>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <h4>06.</h4>
                           <p>Após o molho engrossar, está pronto a servir.</p>
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
                                 <label class="custom-control-label" for="customCheck6">150 grama Peito de frango (cru)</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck7">
                                 <label class="custom-control-label" for="customCheck7">75 grama Massa (peso cru)</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck8">
                                 <label class="custom-control-label" for="customCheck8">100 grama Tomate triturado</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck9">
                                 <label class="custom-control-label" for="customCheck9">100 grama Pimentos</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck10">
                                 <label class="custom-control-label" for="customCheck10">50 grama Cebola</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck11">
                                 <label class="custom-control-label" for="customCheck11">2 dente Alho</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck12">
                                 <label class="custom-control-label" for="customCheck12">50 grama Iogurte grego light</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck13">
                                 <label class="custom-control-label" for="customCheck13">1 colher de chá Especiarias a gosto</label>
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
                                    <td>553 kcal</td>
                                    <td>6 g</td>
                                    <td>68 g</td>
                                    <td>50 g</td>
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
                        <img src="img/bg-img/salmao.png">
                        <img src="img/bg-img/l.png">
                     </div>
                  </div>
               </div>
            </div>
            <div class="receipe-content-area">
               <div class="container">
                  <div class="row">
                     <div class="col-12 col-md-8">
                        <div class="receipe-headline my-5">
                           <span>466 Kcal</span>
                           <h2>Salmão com Batata</h2>
                           <div class="receipe-duration">
                              <h6><i class="fas fa-stopwatch"></i> 20 minutos</h6>
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
                           <p>Temperar o salmão com sal e ervas aromáticas. </p>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <h4>02.</h4>
                           <p>Grelhar o salmão ou colocar o salmão na Air Fryer a 180º por cerca de 12 minutos, ou no forno pré-aquecido a 200º por 12 minutos.</p>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <h4>03.</h4>
                           <p>Descascar as batatas e cozer ou assar conforme o gosto. Colocar ervas aromáticas e sal por cima.</p>
                        </div>
                        <!-- Single Preparation Step -->
                        <div class="single-preparation-step d-flex">
                           <h4>04.</h4>
                           <p>Opcionalmente. Acompanhar com salada ou legumes q.b (quanto basta)</p>
                        </div>
                        <div class="receipe-headline my-5">
                           <h2>Notas</h2>
                           <h3><span>Batatas</span></h3>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <p>A batata normal pode ser substituída por batata doce.</p></div>
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
                                 <label class="custom-control-label" for="customCheck14">125 grama Lombo de salmão (peso cru)</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck15">
                                 <label class="custom-control-label" for="customCheck15">300 grama Batatas</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck16">
                                 <label class="custom-control-label" for="customCheck16">1 colher de sopa Ervas aromáticas</label>
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
                                    <td>466 kcal</td>
                                    <td>15 g</td>
                                    <td>46 g</td>
                                    <td>31 g</td>
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
                        <img src="img/bg-img/l4.jpg">
                        <img src="img/bg-img/l4_2.jpg">
                     </div>
                  </div>
               </div>
            </div>
            <div class="receipe-content-area">
               <div class="container">
                  <div class="row">
                     <div class="col-12 col-md-8">
                        <div class="receipe-headline my-5">
                           <span>351 Kcal Kcal</span>
                           <h2>Hambúrguer de Atum</h2>
                           <div class="receipe-duration">
                              <h6><i class="fas fa-stopwatch"></i> 12 minutos</h6>
                              <h6><i class="fas fa-shopping-basket"></i> 7 ingredientes</h6>
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
                           <p>Começa por escorrer a lata de atum em água e adicionar a um recipiente </p>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <h4>02.</h4>
                           <p>Corta a cebola aos cubos e acrescenta ao atum.</p>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <h4>03.</h4>
                           <p>Coloca meio ovo por cima da mistura de atum e cebola.</p>
                        </div>
                        <!-- Single Preparation Step -->
                        <div class="single-preparation-step d-flex">
                           <h4>04.</h4>
                           <p>Nesta fase adiciona temperos e especiarias como sal, pimeta, alho entre outros a teu gosto (opcional) e mistura tudo. </p>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <h4>05.</h4>
                           <p>Numa frigideira antiaderente pré-aquecida em lume médio acrescenta untado em spray de azeite a mistura de atum e forma um hambúrguer com a espátula. Quando tiver feito (aprox 3 minutos de cada lado)</p>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <h4>06.</h4>
                           <p>Abre o pão de hambúrguer, coloca os teus molhos e mete o hambúrguer de atum por cima, colocando uma fatia de queijo, a alface e o tomate.</p>
                        </div>
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
                                 <label class="custom-control-label" for="customCheck22">85 grama Atum em água</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck23">
                                 <label class="custom-control-label" for="customCheck23">1 fatia Queijo magro</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck24">
                                 <label class="custom-control-label" for="customCheck24">1 pedaço Pão de hamburguer</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck25">
                                 <label class="custom-control-label" for="customCheck25">20 grama Onion</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck26">
                                 <label class="custom-control-label" for="customCheck26">27 grama (1/2 ovo)</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck27">
                                 <label class="custom-control-label" for="customCheck27">10 grama Ketchup zero</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck28">
                                 <label class="custom-control-label" for="customCheck28">15 grama Alface e tomate</label>
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
                                    <td>351 kcal</td>
                                    <td>8 g</td>
                                    <td>31 g</td>
                                    <td>38 g</td>
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
         <section id="recipe5">
            <hr class="recipe-divider">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <div class="receipe-slider owl-carousel">
                        <img src="img/bg-img/l5.png">
                        <img src="img/bg-img/l5.jpg">
                     </div>
                  </div>
               </div>
            </div>
            <div class="receipe-content-area">
               <div class="container">
                  <div class="row">
                     <div class="col-12 col-md-8">
                        <div class="receipe-headline my-5">
                           <span>455 Kcal</span>
                           <h2>Sopa de Noodles de Frango</h2>
                           <div class="receipe-duration">
                              <h6><i class="fas fa-stopwatch"></i> 20 minutos</h6>
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
                           <p>Numa panela em lume médio, untar com spray de azeite e refogar a cebola e a cenoura. </p>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <h4>02.</h4>
                           <p>Acrescentar o alho e mexer por 30 segundos. Adicionar o frango temperado a gosto e deixar cozinhar ligeiramente dos dois lados. </p>
                        </div>
                        <div class="single-preparation-step d-flex">
                           <h4>03.</h4>
                           <p>Adicionar 300ml de água (já fervida com caldo de frango dissolvido) e deixar o frango cozer. </p>
                        </div>
                        <!-- Single Preparation Step -->
                        <div class="single-preparation-step d-flex">
                           <h4>04.</h4>
                           <p>Após 7 minutos, adicionar os noodles e deixar cozinhar de acordo com as instruções da embalagem (em média 3-5 minutos, pois são mais finos e vão cozinhando na água mesmo após sair do lume). </p>
                        </div>
                     </div>
                     <!-- Ingredientes e Nutrição -->
                     <div class="col-12 col-lg-4">
                        <!-- Tabs -->
                        <div class="tabs">
                           <button class="tab-button active" data-tab="ingredients5">Ingredientes</button>
                           <button class="tab-button" data-tab="nutrition5">Nutrição</button>
                        </div>
                        <!-- Conteúdo das Tabs -->
                        <div class="tab-content">
                           <!-- Ingredientes -->
                           <div class="tab-panel active" id="ingredients5">
                              <h4>Ingredientes</h4>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck30">
                                 <label class="custom-control-label" for="customCheck30">25 grama Cebola</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck31">
                                 <label class="custom-control-label" for="customCheck31">1 dente Alho</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck32">
                                 <label class="custom-control-label" for="customCheck32">100 grama Peito de frango (cru)</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck33">
                                 <label class="custom-control-label" for="customCheck33">75 grama Noodles (peso cru)</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck34">
                                 <label class="custom-control-label" for="customCheck34">300 mililitros Caldo de frango</label>
                              </div>
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" id="customCheck35">
                                 <label class="custom-control-label" for="customCheck35">50 grama Cenoura</label>
                              </div>
                           </div>
                           <!-- Nutrição -->
                           <div class="tab-panel" id="nutrition5">
                              <h4>Nutrição</h4>
                              <table class="table">
                                 <tr>
                                    <th>Calorias</th>
                                    <th>Gordura</th>
                                    <th>Carboidratos líquidos</th>
                                    <th>Proteína</th>
                                 </tr>
                                 <tr>
                                    <td>455 kcal</td>
                                    <td>6 g</td>
                                    <td>58 g</td>
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
</html>