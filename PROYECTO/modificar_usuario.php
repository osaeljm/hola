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
                            <h2>Modificar usuario</h2>                               
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

                                                $NombreUsuario = $CorreoUsuario = $LoginUsuario = "";

                                                function test_input($data){
                                                   $data = trim($data);
                                                   $data = stripslashes($data);
                                                   $data = htmlspecialchars($data);
                                                   return $data;
                                                }

                                                if($_SERVER["REQUEST_METHOD"] == "POST"){       
                                                    $NombreUsuario = test_input($_POST["username"]);
                                                    $CorreoUsuario = test_input($_POST["email"]);
                                                    $LoginUsuario = test_input($_POST["user"]);   
                                                }

                                                function validar($NombreUsuario,$CorreoUsuario,$LoginUsuario,&$error){
                                                if($NombreUsuario == null){
                                                    $error = "Debe digitar su nombre completo.";
                                                    // header('Location:registrarse.php?error=3');
                                                    return false;
                                                }
                                                if($NombreUsuario > 100){
                                                    $error = "El nombre completo es muy extenso.";
                                                    // header('Location:registrarse.php?error=4');
                                                    return false;
                                                }
                                                if($CorreoUsuario == null){
                                                    $error = "Debe digitar el correo electrónico.";
                                                    // header('Location:registrarse.php?error=5');
                                                    return false;
                                                }
                                                if(!isEmail($CorreoUsuario)){
                                                    $error = "Correo electrónico inválido.";
                                                    // header('Location:registrarse.php?error=6');
                                                    return false;
                                                }
                                                if($LoginUsuario == null){
                                                    $error = "Debe digitar su usuario.";
                                                    // header('Location:registrarse.php?error=7');
                                                    return false;
                                                }
                                                if(strlen($LoginUsuario) > 15){
                                                    $error = "El nombre de usuario no debe ser mayor a 15 caracteres.";
                                                    // header('Location:registrarse.php?error=8');
                                                    return false;
                                                }
                                                // if($LoginUsuario != null){
                                                //     $sql = "select LoginUsuario from Usuario where LoginUsuario = '$LoginUsuario'";
                                                //     $comprobar = mysql_query($sql);
                                                //         if(mysql_num_rows($comprobar) > 0){
                                                //             // $error = "Nombre de usuario incorrecto, ya este usuario existe digite uno nuevo.";
                                                //             header('Location:registrarse.php?error=9');
                                                //         }
                                                // }
                                            
                                                $error = "";
                                                return true;
                                                } 

                                                function isEmail($correo_e){
                                                return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i"
                                                ,$correo_e));
                                                }

                                               function seguridad($texto){
                                                    $texto = stripslashes($texto);
                                                    $texto = addslashes($texto);
                                                    $texto = ereg_replace('&lt;','',$texto);
                                                    $texto = ereg_replace('&gt;','',$texto);
                                                    $texto = ereg_replace(';','',$texto);
                                                    $texto = ereg_replace('<','',$texto);
                                                    $texto = ereg_replace('>','',$texto);
                                                    $texto = ereg_replace('/','',$texto);
                                                    $texto = ereg_replace(':','',$texto);
                                                    $texto = ereg_replace('script','',$texto);
                                                    $texto = ereg_replace('alert','',$texto);
                                                    $texto = ereg_replace('php','',$texto);
                                                    return $texto;
                                                }

                                                if ($_POST){
                                                    $error_encontrado="";
                                                    $NombreUsuario = seguridad($NombreUsuario);
                                                    $LoginUsuario = seguridad($LoginUsuario);
                                                if(validar($NombreUsuario,$CorreoUsuario,$LoginUsuario, $error_encontrado)){
                                                    try {

                                                        $conn = new PDO("mysql:host=$db_host;dbname=$db_name",$db_username, $db_password);
                                                        //Iniciar transacción

                                                        $conn->beginTransaction();
                                                      
                                                        $sql = "call Modificar_Usuario(:proc_IdUsuario,:proc_LoginUsuario,:proc_CorreoUsuario,:proc_NombreUsuario)";
                                                        $stmt = $conn->prepare($sql);
                                                        $stmt->bindParam(":proc_IdUsuario", $id, PDO::PARAM_INT);
                                                        $stmt->bindParam(":proc_LoginUsuario", $LoginUsuario, PDO::PARAM_STR);
                                                        $stmt->bindParam(":proc_CorreoUsuario", $CorreoUsuario, PDO::PARAM_STR);
                                                        $stmt->bindParam(":proc_NombreUsuario", $NombreUsuario, PDO::PARAM_STR);
                                                        $stmt->execute();   

                                                        //Finalizar transacción 
                                                        $conn->commit();                                                                                                      
                                                        // header('Location:iniciar_sesion.php?error=4'); 
                                                        $error_encontrado2 = 'Usuario modificado.';

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
                                                                <br><input type="text" name="username" placeholder="Nombre completo" value="<?php if (isset($_POST['username'])) {echo $_POST['username'];}else{echo $obj->NombreUsuario;} ?>"/><br><br>
                                                                <input type="text" name="email" id="correo" placeholder="Correo electrónico" value="<?php if (isset($_POST['email'])) {echo $_POST['email'];}else{echo $obj->CorreoUsuario;} ?>"/><br><br>
                                                                <input type="text" name="user" placeholder="Usuario" value="<?php if (isset($_POST['user'])) {echo $_POST['user'];}else{echo $obj->LoginUsuario;} ?>"/><br><br> 
                                                               
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
                                    <span>Siganos en </span>
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