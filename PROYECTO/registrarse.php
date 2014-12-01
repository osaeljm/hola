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
                                        echo '<a href="registrarse.php">Registrar</a>';
                                        echo '<a href="iniciar_sesion.php">Iniciar sesión</a>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cart-info">
                                    <!-- <i class="fa fa-shopping-cart"></i>
                                    (<a href="#">5 artículos</a>) en el carrito -->
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
                                    <a href="index.html"><img src="images/logoCupcake.png" title="Holacupcakes" alt="Holacupcakes" ></a>
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
                            </div>
                        </div>
                    </div>
                </div>
            </header>


          <div id="heading4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-content">
                                 <h2>Crea tu cuenta Cupcake</h2>
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
                            <h2>Ingrese sus datos</h2>                               
                                <img src="images/under-heading.png" alt="" >
                            </div>
                        </div>
                    </div>
                    <div id="contact-us">
                        <div class="container">
                            <div class="row">
                                <div class="product-item col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">  
                                            <div class="message-form">

                                                <?php
                                                // Evitar los warnings the variables no definidas!!!
                                                $err = isset($_GET['error']) ? $_GET['error'] : null ;
                                                
                                                if($err==1){
                                                    echo "<p class='error-login'>Error al crear usuario.</p>";
                                                }
                                                if($err==2){
                                                    echo ".<p class=''>Usuario creado correctamente, inicie sesión para realizar una compra.</p>";
                                                }
                                                if($err==3){
                                                    echo "<p class='error-login'>Debe digitar su nombre completo.</p>";
                                                }
                                                if($err==4){
                                                    echo "<p class='error-login'>El nombre completo es muy extenso.</p>";
                                                }
                                                if($err==5){
                                                    echo "<p class='error-login'>Debe digitar el correo electrónico.</p>";
                                                }
                                                if($err==6){
                                                    echo "<p class='error-login'>Correo electrónico inválido.</p>";
                                                }
                                                if($err==7){
                                                    echo "<p class='error-login'>Debe digitar su nombre completo.</p>";
                                                }
                                                if($err==8){
                                                    echo "<p class='error-login'>El nombre de usuario no debe ser mayor a 15 caracteres.</p>";
                                                }
                                                if($err==9){
                                                    echo "<p class='error-login'>Nombre de usuario incorrecto, ya este usuario existe digite uno nuevo.</p>";
                                                }
                                                if($err==10){
                                                    echo "<p class='error-login'>Debe digitar su contraseña.</p>";
                                                }
                                                if($err==11){
                                                    echo "<p class='error-login'>El nombre de usuario no debe ser mayor a 10 caracteres.</p>";
                                                }
                                                ?>

                                                <form  action="crear_usuario.php" method="post" class="send-message" onsubmit="">
                                                    <div class="row">

                                                        <div class="name col-md-5">

                                                            <br><input type="text" name="username" placeholder="Nombre completo" value=""/><br><br>
                                                            <input type="text" name="email" id="correo" placeholder="Correo electrónico" value=""/><br><br>
                                                            <input type="text" name="user" placeholder="Usuario" value=""/><br><br>                                                      
                                                            <input type="password" name="password" placeholder="Contraseña" value=""/> 
                                                           
                                                        </div>                                                 
                                                    </div>                                                                                 
                                                    <div class="send">
                                                        <button name="enter" type="submit">Crear</button>
                                                    </div>
                                                </form>   
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