<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<!-- templatemo 417 grill -->
<!-- 
Grill Template 
http://www.templatemo.com/preview/templatemo_417_grill 
-->
    <head>
        <meta charset="utf-8">
        <title>HolaCupcakes</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/templatemo_style.css">
        <link rel="stylesheet" href="css/templatemo_misc.css">
        <link rel="stylesheet" href="css/flexslider.css">
        <link rel="stylesheet" href="css/testimonails-slider.css">

        <link rel="shortcut icon" href="images/logoCupcake.png">

        <script src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->
            <header>
                <div id="top-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="home-account">
                                    <?php
                                    session_start();
                                    if(isset($_SESSION["usuario"])){
                                        echo '<span class="check-out-txt"><a> Bienvenido '.$_SESSION["usuario"].'</a></span>';
                                        echo '<a href="https://'.$_SERVER['HTTP_HOST'].'/hola/PROYECTO/perfil.php"> Perfil</a>';
                                        echo '<a href="autenticacion/cerrar_sesion.php"> Cerrar Sesión</a>';
                                    } else{
                                        echo '<a href="https://'.$_SERVER['HTTP_HOST'].'/hola/PROYECTO/registrarse.php">Registrar</a>';
                                        echo '<a href="https://'.$_SERVER['HTTP_HOST'].'/hola/PROYECTO/iniciar_sesion.php">Iniciar sesión</a>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cart-info">
                                    <a href="view_cart.php">Ver carrito <i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="main-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="logo">
                                    <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/hola/PROYECTO/index.php"><img src="images/logoCupcake.png" title="Holacupcakes" alt="holacupcakes" ></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="main-menu">
                                    <ul>                                     
                                        <li><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/hola/PROYECTO/index.php">Inicio</a></li>
                                        <li><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/hola/PROYECTO/about-us.php">Nosotros</a></li>
                                        <li><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/hola/PROYECTO/products.php">Productos</a></li>
                                        <li><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/hola/PROYECTO/contact-us.php">Contáctenos</a></li>
                                    </ul>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </header>            

            <div id="slider">
                <div class="flexslider">
                  <ul class="slides">
                    <li>
                        <div class="slider-caption">
                            <h1>Mesas de dulces</h1>
                            <p>Combinaciones personalizadas
                            <br><br>para diferentes eventos</p>
                            <a href="single-post.html">Descripción</a>
                        </div>
                      <img src="images/mesadulce.jpg" alt="" />
                    </li>
                    <li>
                        <div class="slider-caption">
                            <h1>Fiestas<br>infantiles</h1>
                            <p>Diferenrentes temas  
                            <br><br>y diseños variados</p>
                            <a href="single-post.html">Descripción</a>
                        </div>
                      <img src="images/fiestainfantil.jpg" alt="" />
                    </li>
                    <li>
                        <div class="slider-caption">
                            <h1>Queques</h1>
                            <p>Diferentes tipos y sabores,
                            <br><br>combinación de rellenos y sabores</p>
                            <a href="single-post.html">Descripción</a>
                        </div>
                      <img src="images/queque.jpg" alt="" />
                    </li>
                  </ul>
                </div>
            </div>           
            
            <div id="latest-blog">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-section">
                                <h2>Categorias</h2>
                                <img src="images/under-heading.png" alt="" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    <img src="images/canastilla.jpg" alt="" />
                                </div>
                                <div class="blog-content">
                                    <div class="content-show">
                                        <h4><a href="products.php">Tes de canastilla</a></h4>
                                        <!-- <span>29 Sep 2014</span> -->
                                    </div>
                                    <div class="content-hide">
                                        <!-- <p>Variados diseños para tes de canastilla.</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    <img src="images/cumple.jpg" alt="" />
                                </div>
                                <div class="blog-content">
                                    <div class="content-show">
                                        <h4><a href="products.php">Cumpleaños</a></h4>
                                        <!-- <span>23 Sep 2014</span> -->
                                    </div>
                                    <div class="content-hide">
                                        <!-- <p>Cumpleaños para hombre y mujer.</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    <img src="images/fiesta.jpg" alt="" />
                                </div>
                                <div class="blog-content">
                                    <div class="content-show">
                                        <h4><a href="products.php">Fiestas</a></h4>
                                        <!-- <span>14 Sep 2014</span> -->
                                    </div>
                                    <div class="content-hide">
                                        <!-- <p>Variados diseños y temas.</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    <img src="images/mesadulce4.jpg" alt="" />
                                </div>
                                <div class="blog-content">
                                    <div class="content-show">
                                        <h4><a href="products.php">Mesas de dulces</a></h4>
                                        <!-- <span>25 Aug 2014</span> -->
                                    </div>
                                    <div class="content-hide">
                                        <!-- <p>Deliciosos cupcakes, queques y dulces, decorados para diferentes temas o eventos.</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    <img src="images/queque2.jpg" alt="" />
                                </div>
                                <div class="blog-content">
                                    <div class="content-show">
                                        <h4><a href="products.php">Queques</a></h4>
                                        <!-- <span>17 Aug 2014</span> -->
                                    </div>
                                    <div class="content-hide">
                                        <!-- <p>Para diferentes ocaciones.</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    <img src="images/cupcake.jpg" alt="" />
                                </div>
                                <div class="blog-content">
                                    <div class="content-show">
                                        <h4><a href="products.php">Cupcakes</a></h4>
                                        <!-- <span>12 Aug 2014</span> -->
                                    </div>
                                    <div class="content-hide">
                                        <!-- <p>Variados tamaños, gustos y sabores.</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>


            
                    </div>
                </div>
            </div>
           <div id="testimonails">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-section">
                            <h2>¡Felices fiestas!</h2>
                            <img src="images/under-heading.png" alt="" ><br><br>
                             <iframe width="60%" height="380px" src="//www.youtube.com/embed/y9nSyWTXK8M" frameborder="0" allowfullscreen></iframe>
                                <h2>Noticias</h2>
                                <img src="images/under-heading.png" alt="" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="testimonails-slider">
                              <ul class="slides">
                                <li>
                                    <div class="testimonails-content">
                                        <p>Rebeca Alba vende cupcakes en apoyo a la lucha contra el cáncer.
                                         <a target="_blank" href="http://www.sdpnoticias.com/estilo-de-vida/2014/12/03/rebecca-de-alba-vende-cupcakes-en-apoyo-a-la-lucha-contra-el-cancer">Ver más</a></p>
                                        <!-- <h6>Jennifer - <a href="#">Chief Designer</a></h6> -->
                                    </div>
                                </li>
                                <li>
                                    <div class="testimonails-content">
                                        <p>Los cupcakes le dan una ventaja a los niños de Durban en Sudáfrica. 
                                        <a target="_blank" href="http://www.iol.co.za/news/south-africa/kwazulu-natal/cupcakes-give-children-a-leg-up-1.1790283#.VH-ZGDHF_2c">
                                        Ver más</a></p>
                                    </div> 
                                </li>
                                <li>
                                    <div class="testimonails-content">
                                        <p>La tienda de cupcakes SweetArt en St. Louis, USA, se ha convertido en un centro de conversación en busca de respuestas y consuelo alrededor de la muerte del joven Michael Brown.
                                        <a target="_blank" href="http://www.msnbc.com/msnbc/race-and-class-side-cupcakes-ferguson">Ver más</a>
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="testimonails-content">
                                        <p>Cómo los cupcakes de $6 de la empresa Whole Foods ayuda a los pobres del área urbana de Detroit.
                                        <a target="_blank" href="http://grist.org/food/how-do-whole-foods-6-cupcakes-help-detroits-urban-poor/">Ver más</a>
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="testimonails-content">
                                        <p>La empresa Turlock en USA, vende cupcakes para ayudar a niños necesitados en navidad.
                                            <a target="_blank" href="http://www.turlockjournal.com/archives/27937/">Ver más</a>
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="testimonails-content">
                                        <p>Los niños de cuarto grado de la escuela elemental de Towanda en Pensilvannia crean planes de negocio y cupcakes.
                                            <a href=""></a>
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="testimonails-content">
                                        <p>17 formas de cómo los cupcakes podrían integrarse en la vida diaria para hacer del mundo un mejor lugar.
                                            <a target="_blank" href="http://www.bustle.com/articles/48381-17-ways-cupcakes-should-be-integrated-into-daily-life-to-make-the-world-a-better-place">Ver más</a>
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="testimonails-content">
                                        <p>Los equipos de la conferencia South Eastern de football en USA continúa amando los cupcakes.
                                            <a target="_blank" href="http://www.orlandosentinel.com/sports/college/college-gridiron-365/os-10-things-we-learned-this-college-football-weekend-20141123-post.html">Ver más</a>
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="testimonails-content">
                                        <p>Una mujer de Chelmsford USA gana medalla de oro en la mayor competencia mundial de queques.
                                            <a target="_blank" href="http://www.chelmsfordweeklynews.co.uk/news/11609823.Golden_cupcakes/">Ver más</a>
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="testimonails-content">
                                        <p>La universidad Brigham Young en Utah recoge dinero para el banco de comida con un mural gigante de cupcakes.
                                            <a target="_blank" href="http://www.heraldextra.com/news/local/byu-raises-money-for-food-bank-with-giant-cupcake-mural/article_6d1bebd5-9554-56b8-ae2d-0dfb1ab2ea56.html">Ver más</a>
                                        </p>
                                    </div>
                                </li>                               
                              </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer>
                <div class="container">
                    <!-- <div class="top-footer">                     
                    </div>  -->                    
                    <div class="main-footer">
                        <div class="row">
                            
                            <div class="col-md-3">
                                <div class="social-bottom">
                                    <div class="more-info">                                        
                                        <ul>
                                            <li><h4 class="footer-title">Más información</h4></li>
                                        </ul>                                
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-3">
                                <div class="social-bottom">
                                    <div class="more-info">                                  
                                                                                      
                                         <ul>
                                            <li><img src="images/icon-phone.png"/>  (506)2431-46-48</li>                                                   
                                        </ul>                                                 
                                         <ul>                                                   
                                            <li><img src="images/icon-mail.png"/>  150 metros al norte de la POPS Alajuela, Costa Rica</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">            
                            </div> 
                            <div class="col-md-3">
                               <div class="social-bottom">                                   
                                    <span>Síguenos en </span>
                                    <ul>
                                        <li><a target="_blank" href="https://www.facebook.com/Hola.Cupcakes" class="fa fa-facebook"></a></li>                           
                                    </ul>                                     
                                </div>
                            </div>                                                     
                        </div>
                         <p>Copyright © 2014 Holacupcakes</a> <!-- Credit: www.templatemo.com --></p>
                    </div>
                    <!-- <div class="bottom-footer">                     
                    </div>  -->                   
                </div>
            </footer>
    
        <script src="js/vendor/jquery-1.11.0.min.js"></script>
        <script src="js/vendor/jquery.gmap3.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>