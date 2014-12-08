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


          <div id="heading4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-content">
                                 <h2>Perfil</h2>
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
                            <h2>Modificar contraseña</h2>                               
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
                                                
                                                include("autenticacion/class/config.php");

                                                $id = $_SESSION['idusuario'];
                                                $results = $mysqli->query("SELECT * FROM Usuario WHERE IdUsuario = $id");
                                                $obj = $results->fetch_object();
                                                $antclave = $obj->ContrasenaUsuario;

                                                $claveactual = $clave = $confirmaClave = "";

                                                function test_input($data){
                                                   $data = trim($data);
                                                   $data = stripslashes($data);
                                                   $data = htmlspecialchars($data);
                                                   return $data;
                                                }

                                                if($_SERVER["REQUEST_METHOD"] == "POST"){       
                                                    $claveactual = test_input($_POST["claveactual"]);
                                                    $clave = test_input($_POST["clave"]);
                                                    $confirmaClave = test_input($_POST["confirmaClave"]);  
                                                }

                                                $error = "";
                                                function validar($claveactual,$clave,$confirmaClave,&$error){
                                                if($antclave <> $claveactual){
                                                $error_clave = "Las clave actual es incorrecta.";
                                                return false;
                                                }
                                                if($claveactual == null){
                                                    $error = "Debe digitar su usuario.";
                                                    return false;
                                                }
                                                if(strlen($claveactual) > 15){
                                                    $error = "La contraseña actual debe ser menor a 15 caracteres.";
                                                    return false;
                                                }
                                                if($confirmaClave == null){
                                                    $error = "Debe volver a digitar la nueva contraseña.";
                                                    return false;
                                                }
                                                if ($clave <> $confirmaClave){
                                                $error_clave = "Las claves no coinciden";
                                                return false;
                                                }
                                                $error = "";
                                                return true;
                                                }

                                                if ($_POST){
                                                    $error_encontrado="";                                                    
                                                if(validar($claveactual,$clave,$confirmaClave,$error_encontrado)){
                                                    try {

                                                        $conn = new PDO("mysql:host=$db_host;dbname=$db_name",$db_username, $db_password);
                                                        //Iniciar transacción

                                                        $conn->beginTransaction();
                                                      
                                                        $sql = "call Modificar_ContrasenaUsuario(:proc_IdUsuario,:proc_ContrasenaUsuario)";
                                                        $stmt = $conn->prepare($sql);
                                                        $stmt->bindParam(":proc_IdUsuario", $id, PDO::PARAM_INT);
                                                        $stmt->bindParam(":proc_ContrasenaUsuario", $LoginUsuario, PDO::PARAM_STR);
                                                        $stmt->execute();   

                                                        //Finalizar transacción 
                                                        $conn->commit();                                                                                                      
                                                        // header('Location:iniciar_sesion.php?error=4'); 
                                                        $error_encontrado2 = 'Contraseña modificada.';

                                                    } catch (PDOException $pe) {
                                                        $conn->rollBack();
                                                        die("Ocurrio un error: " . $pe->getMessage());    
                                                    }
                                                }
                                                }

                                                if (isset($error_encontrado)) {
                                                echo '<p class="error-login">'.$error_encontrado.'</p>';
                                                }

                                                if (isset($error_encontrado2)) {
                                                echo '<p>'.$error_encontrado2.'</p>'; 
                                                echo '<div class="send">';
                                                      echo ' <button name="enter" type="submit"><a href="perfil.php?c=1">Volver</a></button>';
                                                echo '</div>';
                                                } else {   

                                                ?>
                                                <div class="btn-carrito">
                                                    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="send-message">
                                                        <div class="row">
                                                            <div class="name col-md-5">
                                                                <br><input type="text" name="claveactual" placeholder="Contraseña actual" value=""/><br><br>
                                                                <input type="text" name="clave" placeholder="Nueva contraseña" value=""/><br><br>
                                                                <input type="text" name="confirmaClave" placeholder="Confirmar contraseña" value=""/><br><br>
                                                            </div>                                                 
                                                        </div>                                                                                 
                                                        <div class="send2">
                                                            <button name="enter" type="submit">Modificar</button>
                                                            
                                                        </div>
                                                        <div class="send">
                                                           <a href="perfil.php"<button name="enter" type="submit">Volver</button></div></a>
                                                        </div>
                                                    </form>
                                                </div> 
                                                <?php
                                                }
                                                ?>  
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