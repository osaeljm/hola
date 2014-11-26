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
                                        echo '<a style="color:white;"> Bienvenido '.$_SESSION["usuario"].'</a>';
                                        echo '<a href="#"> Perfil</a>';
                                        echo '<a href="autenticacion/cerrar_sesion.php"> Cerrar Sesión</a>';
                                    } else{
                                        echo '<a href="#">Registrar</a>';
                                        echo '<a href="iniciar_sesion.php">Iniciar sesión</a>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cart-info">
                                   <a href="view_cart.php">Ver <i class="fa fa-shopping-cart"></i></a>
                                    
                                    <!-- <span class="empty-cart"><a href="cart_update.php?emptycart=1&return_url=echo $current_url ?>">Empty Cart</a></span> -->
                                     (<a href="#"><?php                                        
                                        if(!empty(filter_var($_SESSION["cart_items"],FILTER_SANITIZE_NUMBER_INT))){
                                            if($_SESSION["cart_items"] != 'Array'){                                           
                                                echo ''.$_SESSION["cart_items"].' artículos';
                                            } else {
                                                echo '0 artículos'; 
                                            }
                                        } else {
                                            echo '0 artículos'; 
                                        }
                                    ?></a>)
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
                                    <a href="index.html"><img src="images/logoCupcake.png" title="Holacupcakes" alt="holacupcakes" ></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="main-menu">
                                    <ul>
                                        <li><a href="index.php">Inicio</a></li>
                                        <li><a href="about-us.php">Nosotros</a></li>
                                        <li><a href="products.php">Productos</a></li>
                                        <li><a href="contact-us.php">Contáctenos</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="search-box">  
                                    <form name="search_form" method="get" class="search_form">
                                        <input id="search" type="text" />
                                        <input type="submit" id="search-button" />
                                    </form>
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
                            <br><br>Para diferentes eventos.</p>
                            <a href="single-post.html">Descripción</a>
                        </div>
                      <img src="images/mesadulce.jpg" alt="" />
                    </li>
                    <li>
                        <div class="slider-caption">
                            <h1>Fiestas<br>infantiles</h1>
                            <p>Diferenrentes temas  
                            <br><br>Diseños variados.</p>
                            <a href="single-post.html">Descripción</a>
                        </div>
                      <img src="images/fiestainfantil.jpg" alt="" />
                    </li>
                    <li>
                        <div class="slider-caption">
                            <h1>Queques</h1>
                            <p>Diferentes tipos y sabores
                            <br><br>Combinación de rellenos ys abores.</p>
                            <a href="single-post.html">Descripción</a>
                        </div>
                      <img src="images/queque.jpg" alt="" />
                    </li>
                  </ul>
                </div>
            </div>

<!-- 
            <div id="services">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-section">                                
                                <img src="images/under-heading.png" alt="" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6"></div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <div class="icon">
                                    <i class="fa fa-pencil"></i>
                                </div>
                                <h4>Hacer una orden</h4>
                                <p>Ene esta sección se podra realizar la compra de los productos de su preferencia.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <div class="icon">
                                    <i class="fa fa-bullhorn"></i>
                                </div>
                                <h4>Promociones</h4>
                                <p>En esta sección se podra ver las promociones de cada mes.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6"></div>
                        </div>
                    </div>
                </div> -->
            <!--/div>-->
           
            
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
                                        <h4><a href="canastilla.html">Tes de canastilla</a></h4>
                                        <span>29 Sep 2014</span>
                                    </div>
                                    <div class="content-hide">
                                        <p>Variados diseños para tes de canastilla.</p>
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
                                        <h4><a href="cumple.html">Cumpleaños</a></h4>
                                        <span>23 Sep 2014</span>
                                    </div>
                                    <div class="content-hide">
                                        <p>Cumpleaños para hombre y mujer.</p>
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
                                        <h4><a href="fiesta.html">Fiestas</a></h4>
                                        <span>14 Sep 2014</span>
                                    </div>
                                    <div class="content-hide">
                                        <p>Variados diseños y temas.</p>
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
                                        <h4><a href="mesas.html">Mesas de dulces</a></h4>
                                        <span>25 Aug 2014</span>
                                    </div>
                                    <div class="content-hide">
                                        <p>Deliciosos cupcakes, queques y dulces, decorados para diferentes temas o eventos.</p>
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
                                        <h4><a href="single-post.html">Queques</a></h4>
                                        <span>17 Aug 2014</span>
                                    </div>
                                    <div class="content-hide">
                                        <p>Para diferentes ocaciones.</p>
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
                                        <h4><a href="single-post.html">Cupcakes</a></h4>
                                        <span>12 Aug 2014</span>
                                    </div>
                                    <div class="content-hide">
                                        <p>Variados tamaños, gustos y sabores.</p>
                                    </div>
                                </div>
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
                                    <span>Siganos en :</span>
                                    <ul>
                                        <li><a href="https://www.facebook.com/Hola.Cupcakes" class="fa fa-facebook"></a></li>                           
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="social-bottom">
                                    <div class="more-info">
                                        <h4 class="footer-title">Para obtener más información:</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="social-bottom">
                                    <div class="more-info">
                                        <ul>
                                            <li><i class="fa fa-phone"></i>(506)2431-46-48</li>
                                            <li><i class="fa fa-globe"></i>150 metros al norte de la POPS Alajuela, Costa Rica</li>
                                            <li><i class="fa fa-envelope"></i><a>hola@holacupcakes.com</a></li>
                                        </ul>
                                    </div>
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