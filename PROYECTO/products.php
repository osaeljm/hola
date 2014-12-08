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

            <div id="products-post">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="product-heading">                            
                                <img src="images/under-heading.png" alt="" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="filters col-md-12 col-xs-12">
                            <ul id="filters" class="clearfix">
                                <li><span class="filter" data-filter="all">Todos</span></li>
                                <li><span class="filter" data-filter=".tes">Tes de canastilla</span></li>
                                <li><span class="filter" data-filter=".cumple">Cumpleaños</span></li>
                                <li><span class="filter" data-filter=".fiesta">Fiestas</span></li>
                                <li><span class="filter" data-filter=".mesa">Mesas de dulce</span></li>
                                <li><span class="filter" data-filter=".queque">Queque</span></li>
                                <li><span class="filter" data-filter=".cupcake">Cupcakes</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row" id="Container">

                        <?php
                        //current URL of the Page. cart_update.php redirects back to this URL 
                           $results = $mysqli->query("SELECT * FROM Producto ORDER BY IdProducto ASC");
                            if ($results)
                            { 
                                //output results from database
                                while($obj = $results->fetch_object())
                                { 
                                    
                                    $obj->CantidadProducto = 1;
                        ?>  

                        <form method="post" action="cart_update.php">
                            <div class="col-md-3 col-sm-6 mix portfolio-item <?php echo $obj->CategoriaProducto?>" >       
                                <div class="portfolio-wrapper">                
                                    <div class="portfolio-thumb">
                                        <img src="images/<?php echo $obj->ImagenProducto?>" alt="" />
                                        <div class="hover">
                                            <div class="hover-iner">
                                                <a class="fancybox" href="images/<?php echo $obj->ImagenProducto?>"><img src="images/open-icon.png" alt="" /></a>
                                            </div>
                                        </div>                                                    
                                    </div>                             
                                    <div class="label-text">
                                        <h3><a href="detalleproducto.php?i=<?php echo $obj->IdProducto ?>"><?php echo $obj->NombreProducto ?></a></h3>
                                        <span class="text-category"><?php echo $currency.$obj->PrecioProducto ?> </span>
                                        <h7><a href="#" class="add_to_cart"> <button class="add_to_cart">Agregar <i class="fa fa-shopping-cart" ></i></button></a></h7>                                                    
                                        <input type="hidden" name="CantidadProducto" value="<?php echo $obj->CantidadProducto?>" />
                                        <input type="hidden" name="CodigoProducto" value="<?php echo $obj->CodigoProducto ?>" />
                                        <input type="hidden" name="type" value="add" />
                                        <input type="hidden" name="return_url" value="<?php echo $current_url ?>" />
                                    </div>  
                                </div>      
                            </div>
                        </form>

                        <?php
                              
                                }               
                            }
                        ?>

                                           

                       </div>
                    <div class="btn-carrito">
                        <div class="row">   
                            <div class="col-md-12">
                                <ul>
                                    <li><a href="view_cart.php">Ver carrito <i class="fa fa-shopping-cart"></i></a></li>                                    
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

        <script>
        window.onload=function(){
        var pos=window.name || 0;
        window.scrollTo(0,pos);
        }
        window.onunload=function(){
        window.name=self.pageYOffset || (document.documentElement.scrollTop+document.body.scrollTop);
        }
        </script>

    </body>
</html>