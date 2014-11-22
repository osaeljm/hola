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
                                   <span class="check-out-txt"><a href="view_cart.php">Ver <i class="fa fa-shopping-cart"></i></a></span>
                                    
                                    <!-- <span class="empty-cart"><a href="cart_update.php?emptycart=1&return_url=echo $current_url ?>">Empty Cart</a></span> -->
                                     (<a href="#"><?php 
                                        if(isset($_SESSION["cart_items"])){                                           
                                            echo ''.$_SESSION["cart_items"].' artículos';
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
                                    <a href="index.html"><img src="images/logoCupcake.png" title="HolaCupcakes" alt="HolaCupcakes" ></a>
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


            <div id="heading">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-content">
                                <h2></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="timeline-post">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-section">
                                <h2>¿Quiénes somos?</h2>
                                <img src="images/under-heading.png" alt="" >
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                        	<p>¡Hola! Cupcakes es una pequeña empresa familiar conformada por Edalía Saborío Chavez, madre de familia y experta en el área de la preparación y distribución de alimentos; y Daniela Zúñiga Saborío, estudiante avanzada de la carrera de psicología y amante de la cocina, las manualidades, el diseño y la fotografía.</br></br>
                            Un domingo de Setiembre del 2010, tía y sobrina se reunieron a discutir una forma en la cuál pudieran fusionar sus intereses y aficiones y convertirlos en una empresa familiar que les diera no solo ganancias económicas sino también entretenimiento y satisfacción.</br></br>
                            Edalía desde hacía muchos años se había dedicado a diferentes negocios en el área de los alimentos, pero sobre todo se había enfocado en la elaboración de queques. Sin embargo, con la inspiración del boom de los cupcakes que Daniela pudo observar en un viaje a New York fue que nació la idea de los quequitos, y con esto en mente ambas quisieron retomar en Costa Rica una idea más novedosa y menos común que los queques regulares.</p></br></br>                         
                        </div>
                        <div class="col-md-6">                        	
                            <p>Fue así que en menos de un mes de estar discutiendo ideas para el negocio nació ¡Hola! Cupcakes.</br></br>
    						La idea inicial fue enfocada no sólo en la calidad del sabor de los quequitos, sino también en la calidad de la decoración y el diseño. Así se convirtió también en parte importante del mercadeo de ¡Hola! Cupcakes el tener fotografías de calidad de los quequitos, para que así la gente pudiese ver los detalles y diferentes temáticas trabajadas.</br></br>
                            El contacto con los clientes por medio de las redes sociales se convirtió asímismo en parte importante del crecimiento del negocio y ahora con menos de seis meses de existencia ¡Hola! Cupcakes ha podido disfrutar de un éxito grande e incluso inesperado para sus fundadoras.</br></br>
                            Así en el futuro ¡Hola! Cupcakes solo espera seguir en crecimiento, manteniendo siempre la originalidad, novedad y sobre todo la calidad en sus sabores y diseños.</p>
                        </div>
                    </div>              
                                       
                </div>
            </div>
            <div id="our-team">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-section">
                               <img src="images/nosotras1.jpg" alt="" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="our-team">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-section">
                               <img src="images/under-heading.png" alt="" >
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