<?php
session_start();
include_once("autenticacion/class/config.php"); //include config file
$current_url = base64_encode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); 
?>
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
                                    if(isset($_SESSION["usuario"])){
                                        echo '<span class="check-out-txt"><a> Bienvenido '.$_SESSION["usuario"].'</a></span>';
                                        echo '<a href="perfil.php"> Perfil</a>';
                                        echo '<a href="autenticacion/cerrar_sesion.php"> Cerrar Sesión</a>';
                                    } else{
                                        echo '<a href="registrarse.php">Registrar</a>';
                                        echo '<a href="iniciar_sesion.php">Iniciar sesión</a>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cart-info">                                    
                                   <a href="view_cart.php">Ver carrito <i class="fa fa-shopping-cart"></i></a>
                                    
                                    <!-- <span class="empty-cart"><a href="cart_update.php?emptycart=1&return_url=<?php echo $current_url ?>"> Vaciar carrito </a></span> -->
                                  
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
                                    <a href="index.php"><img src="images/logoCupcake.png" title="Holacupcakes" alt="Holacupcakes" ></a>
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
                                 <h2>Nuestros productos</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <div id="product-post">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-section">
                                <h2></h2>
                                <img src="images/under-heading.png" alt="" />
                            </div>
                        </div>
                    </div>
                    <div id="single-blog" class="page-section first-section">
                        <div class="container">
                            <div class="row">
                                <div class="product-item col-md-12">
                                    <div class="row">
                                        <?php
                                         $i = isset($_GET['i']) ? $_GET['i'] : null ;
                                        //current URL of the Page. cart_update.php redirects back to this URL 
                                           $results = $mysqli->query("SELECT * FROM Producto WHERE IdProducto = $i");
                                            if ($results)
                                            {   //output results from database
                                                $obj = $results->fetch_object();                                     
                                                    
                                                  
                                        ?>





                                        <div class="col-md-8">  
                                            <div class="image">
                                                <div class="image-post">
                                                    <img src="images/single-post.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-title">
                                                    <h3>SWEET BREAKFAST CAKE</h3>                                                        
                                                </div>
                                                <p>Morbi consectetur velit et est placerat volutpat. Aliquam lacus libero, iaculis sit amet ornare eu, bibendum convallis. Curabitur vel erat imperdiet, ultrices dui et, mattis arcu. Donec nisi velit, dignissim mollis erat vehicula, iaculis eleifend sem. Mauris non ultrices ante, id porta odio. Pellentesque eget egestas lorem. <a href="#">Nullam vitae</a> varius lorem, ac tristique justo. Cras placerat tempus pharetra. Class aptent taciti sociosqu ad litora torquent per conubia nostra, an inceptos himenaeos. Morbi et feugiat justo. <br><br>Maecenas et ante eu sem viverra faucibus eget nec est. Aenean non felis diam. Praesent malesuada, lectus vel elementum tincidunt, sapien dolor interdum lacus, vel suscipit enim augue vel purus. Ut in augue mass. Etiam a leo at eros vehicula mattis. Aenean nec fringilla neque <a href="#">eget vulputate mi</a>. Aenean tincidunt elit sollicitudin libero hendrerit feugiat. Nunc purus leo, sollicitudin et vulputate vitae, auctor a lacus. Fusce aliquet erat quis nisi adipiscing, id eleifend quam venenatis. Integer non sem quis dui dignissim lacinia et a massa.</p>
                                            </div>                                  
                                        </div>


                                         <?php
                              
                                                          
                                            }
                                        ?>




                                        <div class="col-md-3 col-md-offset-1">
                                            <div class="side-bar">
                                                <div class="news-letters">
                                                    <h4>Archives</h4>
                                                    <div class="archives-list">
                                                        <ul>
                                                            <li><a href="#"><i class="fa fa-angle-right"></i>July (12)</a></li>
                                                            <li><a href="#"><i class="fa fa-angle-right"></i>August (18)</a></li>
                                                            <li><a href="#"><i class="fa fa-angle-right"></i>September (72)</a></li>
                                                            <li><a href="#"><i class="fa fa-angle-right"></i>October (63)</a></li>
                                                            <li><a href="#"><i class="fa fa-angle-right"></i>November (48))</a></li>
                                                            <li><a href="#"><i class="fa fa-angle-right"></i>December (24)</a></li>
                                                        </ul>
                                                    </div>        
                                                </div>
                                                <div class="recent-post">
                                                    <h4>Recent Posts</h4>
                                                    <div class="posts">
                                                        <div class="recent-post">
                                                            <div class="recent-post-thumb">
                                                                <img src="images/recent-post1.jpg" alt="">
                                                            </div>
                                                            <div class="recent-post-info">
                                                                <h6><a href="#">Vestibulum molestie odio sit amet</a></h6>
                                                                <span>24 Sep 2084</span>
                                                            </div>
                                                        </div>
                                                        <div class="recent-post">
                                                            <div class="recent-post-thumb">
                                                                <img src="images/recent-post2.jpg" alt="">
                                                            </div>
                                                            <div class="recent-post-info">
                                                                <h6><a href="#">Vivamus mattis quam eget urna tincidunt</a></h6>
                                                                <span>22 Sep 2084</span>
                                                            </div>
                                                        </div> 
                                                        <div class="recent-post">
                                                            <div class="recent-post-thumb">
                                                                <img src="images/recent-post3.jpg" alt="">
                                                            </div>
                                                            <div class="recent-post-info">
                                                                <h6><a href="#">Curabitur in nunc eget neque posuere</a></h6>
                                                                <span>21 Sep 2084</span>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div>
                                                <div class="advertisement">
                                                    <h4>Flickr news</h4>
                                                    <div class="flickr-images">
                                                        <div class="row">
                                                            <div class="col-md-4 col-sm-2 col-xs-3">
                                                                <img src="images/flickr-image1.jpg" alt="">
                                                            </div>
                                                            <div class="col-md-4 col-sm-2 col-xs-3">
                                                                <img src="images/flickr-image2.jpg" alt="">
                                                            </div>
                                                            <div class="col-md-4 col-sm-2 col-xs-3">
                                                                <img src="images/flickr-image3.jpg" alt="">
                                                            </div>
                                                            <div class="col-md-4 col-sm-2 col-xs-3">
                                                                <img src="images/flickr-image4.jpg" alt="">
                                                            </div>
                                                            <div class="col-md-4 col-sm-2 col-xs-3">
                                                                <img src="images/flickr-image1.jpg" alt="">
                                                            </div>
                                                            <div class="col-md-4 col-sm-2 col-xs-3">
                                                                <img src="images/flickr-image2.jpg" alt="">
                                                            </div>
                                                            <div class="col-md-4 col-sm-2 col-xs-3">
                                                                <img src="images/flickr-image3.jpg" alt="">
                                                            </div>
                                                            <div class="col-md-4 col-sm-2 col-xs-3">
                                                                <img src="images/flickr-image4.jpg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>    
                                            </div>
                                        </div>     
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
                                    <span>Siganos en </span>
                                    <ul>
                                        <li><a href="https://www.facebook.com/Hola.Cupcakes" class="fa fa-facebook"></a></li>                           
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