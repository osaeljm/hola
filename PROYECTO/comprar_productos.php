<?php
session_start();
include_once("autenticacion/class/config.php");
$current_url = base64_encode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); 

if(isset($_SESSION["usuario"])){
  
} else{
   header('Location:iniciar_sesion.php?error=3');
}
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
                                <h2>Tipo de pago</h2>
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
                               <form style="width:300px;float:left;text-align:left;margin-left:20%;" action="fin_compra.php" method="post" class="send-message">                                         
                                    <h3>Tarjeta de crédito o débito</h3>
                                    <div id="error" class="error" style="visibility:hidden"><h3>Tarjeta inválida.</h3></div>                                                        
                                    <h4>Número de tarjeta</h4>
                                    <input type="text" id="card" name="card"/>
                                    <img id="img" class="card" style="visibility:hidden;width:50px;height:20px;"/>                                                 
                                    <h4>Nombre en la tarjeta</h4>           
                                    <input id="name" type="text"/>
                                    <h4>Fecha de expiración (MM/YYYY)</h4>  
                                    <input name="date" type="text"/><br>                                               
                                    <div id="send2" class="send2" Disable='true'>
                                        <button name="enter" type="submit">Procesar</button>
                                    </div>
                                </form>
                                <aside>
                                    <img style="width:50px;height:30px;" src="images/tarjeta/ae.jpg" alt="American Express">
                                    <img style="width:50px;height:30px;" src="images/tarjeta/dccb.jpg" alt="Diners Club Carte Blanche">
                                    <img style="width:50px;height:30px;" src="images/tarjeta/dci.jpg" alt="Diners Club International">
                                    <img style="width:50px;height:30px;" src="images/tarjeta/dcuc.jpg" alt="Diners Club USA and Canada">
                                    <img style="width:50px;height:30px;" src="images/tarjeta/d.jpg" alt="Discover">
                                    <img style="width:50px;height:30px;" src="images/tarjeta/ip.jpg" alt="InstaPayment">
                                    <img style="width:50px;height:30px;" src="images/tarjeta/jcb.jpg" alt="JCB">
                                    <img style="width:50px;height:30px;" src="images/tarjeta/laser.jpg" alt="Laser">
                                    <img style="width:50px;height:30px;" src="images/tarjeta/maestro.jpg" alt="Maestro">
                                    <img style="width:50px;height:30px;" src="images/tarjeta/mastercard.jpg" alt="MasterCard">
                                    <img style="width:50px;height:30px;" src="images/tarjeta/visa.jpg" alt="Visa">
                                    <img style="width:50px;height:30px;" src="images/tarjeta/visae.jpg" alt="Visa Electron">
                                    <h6>Tarjetas aceptadas.</h6>
                                </aside> 
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
            <script src="js/validacard.js"></script>

    </body>
</html>