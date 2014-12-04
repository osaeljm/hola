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
                            <?php
                            $v = isset($_GET['v']) ? $_GET['v'] : null ;
                            if($v==1){
                                echo '<h2>Insertar producto</h2>'; 
                            } else if ($v==2){
                                echo '<h2>Modificar producto</h2>';
                            } else if ($v==3){
                                echo '<h2>Eliminar producto</h2>';
                            }
                            ?>                             
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
                                                $v = isset($_GET['v']) ? $_GET['v'] : null ;
                                                if($v==1){                                            
                                                
                                                include("autenticacion/class/config.php");

                                                $CodigoProducto = $NombreProducto = $CantidadProducto = $PrecioProducto = $DescripcionProducto = $ImagenProducto = "";

                                                function test_input($data){
                                                   $data = trim($data);
                                                   $data = stripslashes($data);
                                                   $data = htmlspecialchars($data);
                                                   return $data;
                                                }

                                                function subirDocumento(array $_files,&$newname = ""){
                                                    $fecha = date("Y-m-d");
                                                    $rd2 = mt_rand(1000,9999)."_".$fecha; 
                                                    //$rd2 =  basename($_files['name'])."_".date("Y-m-d").date("H:i:s"); 
                                                    if((!empty($_files)) && ($_files['error'] == 0)) {
                                                  
                                                        $filename = basename($_files['name']);

                                                        $ext = substr($filename, strrpos($filename, '.') + 1);
                                                  
                                                        if (($ext != "exe") && ($_files["type"] != "application/x-msdownload"))  {
                                                    
                                                         
                                                            $newname="images/".$rd2.".".$ext;      
                                                          //Check if the file with the same name is already exists on the server
                                                     
                                                            //Attempt to move the uploaded file to it's new place
                                                            if ((move_uploaded_file($_files['tmp_name'],$newname))) {
                                                                
                                                                return $rd2.".".$ext;
                                                            
                                                            }
                                                            
                                                        } 
                                                              
                                                    } 
                                                    
                                                }

                                                if($_SERVER["REQUEST_METHOD"] == "POST"){       
                                                    $CodigoProducto = test_input($_POST["codigo"]);
                                                    $NombreProducto = test_input($_POST["nombre"]);
                                                    $CantidadProducto = test_input($_POST["cantidad"]);
                                                    $PrecioProducto = test_input($_POST["precio"]); 
                                                    $DescripcionProducto = test_input($_POST["descripcion"]);
                                                    // $ImagenProducto = test_input($_POST["imagen"]); 
                                                     $ImagenProducto = subirDocumento($_FILES["imagen"]);     
                                                }

                                                function validar($CodigoProducto,$NombreProducto,$CantidadProducto,$PrecioProducto,$DescripcionProducto, $ImagenProducto,&$error){
                                                if($CodigoProducto == null){
                                                    $error = "Debe digitar el código del producto.";
                                                    // header('Location:registrarse.php?error=3');
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
                                                if($NombreProducto == null){
                                                    $error = "Debe digitar su nombre completo.";
                                                    // header('Location:registrarse.php?error=3');
                                                    return false;
                                                }
                                                if($NombreProducto > 45){
                                                    $error = "El nombre del producto es muy extenso.";
                                                    // header('Location:registrarse.php?error=4');
                                                    return false;
                                                }
                                                if($CantidadProducto == null){
                                                    $error = "Debe digitar la cantidad del producto.";
                                                    // header('Location:registrarse.php?error=5');
                                                    return false;
                                                }
                                                if($PrecioProducto == null){
                                                    $error = "Debe digitar el precio del producto.";
                                                    // header('Location:registrarse.php?error=7');
                                                    return false;
                                                }
                                                if($DescripcionProducto == null){
                                                    $error = "Debe digitar la descripción del producto.";
                                                    // header('Location:registrarse.php?error=7');
                                                    return false;
                                                }
                                                $error = "";
                                                return true;
                                                } 

                                                
                                                // function seguridad_x($texto){
                                                //     $texto = stripslashes($texto);
                                                //     $texto = addslashes($texto);
                                                //     $texto = ereg_replace(";","",$texto);
                                                //     $texto = ereg_replace("<","",$texto);
                                                //     $texto = ereg_replace(">","",$texto);
                                                //     $texto = ereg_replace("/","",$texto);
                                                //     $texto = ereg_replace(':',"",$texto);
                                                //     return $texto;
                                                // }


                                                if ($_POST){
                                                    $error_encontrado="";
                                                    // seguridad_x($NombreUsuario);
                                                    // seguridad_x($CorreoUsuario);
                                                    // seguridad_x($LoginUsuario);
                                                    // seguridad_x($ContrasenaUsuario);
                                                if(validar($CodigoProducto,$NombreProducto,$CantidadProducto,$PrecioProducto,
                                                            $DescripcionProducto,$ImagenProducto,$error_encontrado)){
                                                    try {

                                                        $conn = new PDO("mysql:host=$db_host;dbname=$db_name",$db_username, $db_password);
                                                        //Iniciar transacción


                                                        $conn->beginTransaction();
                                                      
                                                        $sql = "call  Insertar_Producto(:proc_CodigoProducto,:proc_NombreProducto,:proc_CantidadProducto,:proc_PrecioProducto,:proc_DescripcionProducto,:proc_ImagenProducto)";
                                                        $stmt = $conn->prepare($sql);
                                                        $stmt->bindParam(":proc_CodigoProducto", $CodigoProducto, PDO::PARAM_STR);
                                                        $stmt->bindParam(":proc_NombreProducto", $NombreProducto, PDO::PARAM_STR);
                                                        $stmt->bindParam(":proc_CantidadProducto", $CantidadProducto, PDO::PARAM_INT);
                                                        $stmt->bindParam(":proc_PrecioProducto", $PrecioProducto, PDO::PARAM_INT);
                                                        $stmt->bindParam(":proc_DescripcionProducto", $DescripcionProducto, PDO::PARAM_STR);
                                                        $stmt->bindParam(":proc_ImagenProducto", $ImagenProducto, PDO::PARAM_STR);
                                                        $stmt->execute(); 

                                                        //Finalizar transacción 
                                                        $conn->commit();                                                                                                      
                                                        // header('Location:iniciar_sesion.php?error=4'); 
                                                        $error_encontrado2 = 'Producto agregado.';

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
                                                      echo ' <button name="enter" type="submit"><a href="perfil_admin.php?c=2">Volver</a></button>';
                                                echo '</div>';
                                                } else {   

                                                ?>

                                                <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"].'?v='.$_GET["v"].'');?> " 
                                                    method="post" class="send-message"  enctype="multipart/form-data">
                                                    <div class="row">

                                                        <div class="name col-md-5">

                                                            <br>
                                                            <input type="text" name="codigo" placeholder="Código" value="<?php if (isset($_POST['codigo'])) {echo $_POST['codigo'];} ?>"/><br><br>
                                                            <input type="text" name="nombre" placeholder="Nombre" value="<?php if (isset($_POST['nombre'])) {echo $_POST['nombre'];} ?>"/><br><br>
                                                            <input type="text" name="cantidad" placeholder="Cantidad" value="<?php if (isset($_POST['cantidad'])) {echo $_POST['cantidad'];} ?>"/><br><br> 
                                                            <input type="text" name="precio" placeholder="Precio" value="<?php if (isset($_POST['precio'])) {echo $_POST['precio'];} ?>"/><br>
                                                            <textarea name="descripcion" placeholder="Descripción"><?php if (isset($_POST['descripcion'])) {echo $_POST['descripcion'];} ?></textarea><br><br> 
                                                            <!-- <input type="text" name="imagen" placeholder="Imagen" value="<?php //if (isset($_POST['imagen'])) {echo $_POST['imagen'];} ?>"/><br> -->
                                                           <label class="leftContrasena">Adjuntar imagen:</label><label class="rightContrasena">
                                                            <input name="imagen" type="file" class="rightContrasena" value=""/></label><br>
                                                        </div>                                                 
                                                    </div>                                                                                 
                                                    <div class="send2">
                                                        <button name="enter" type="submit">Agregar</button>
                                                        <button name="enter" type="submit"><a href="perfil_admin.php?c=2">Volver</a></button>
                                                    </div>
                                                </form> 

                                                <?php
                                                }                                               
                                                
                                            } else if($v==2){
                                                
                                                include("autenticacion/class/config.php");

                                                $i = isset($_GET['i']) ? $_GET['i'] : null ;

                                                $results = $mysqli->query("SELECT * FROM Producto WHERE IdProducto = $i");
                                                $obj = $results->fetch_object();

                                                $CodigoProducto = $NombreProducto = $CantidadProducto = $PrecioProducto = $DescripcionProducto = $ImagenProducto = "";

                                                function test_input($data){
                                                   $data = trim($data);
                                                   $data = stripslashes($data);
                                                   $data = htmlspecialchars($data);
                                                   return $data;
                                                }

                                                 function subirDocumento(array $_files,&$newname = ""){
                                                    $fecha = date("Y-m-d");
                                                    $rd2 = mt_rand(1000,9999)."_".$fecha; 
                                                    //$rd2 =  basename($_files['name'])."_".date("Y-m-d").date("H:i:s"); 
                                                    if((!empty($_files)) && ($_files['error'] == 0)) {
                                                  
                                                        $filename = basename($_files['name']);

                                                        $ext = substr($filename, strrpos($filename, '.') + 1);
                                                  
                                                        if (($ext != "exe") && ($_files["type"] != "application/x-msdownload"))  {
                                                    
                                                         
                                                            $newname="images/".$rd2.".".$ext;      
                                                          //Check if the file with the same name is already exists on the server
                                                     
                                                            //Attempt to move the uploaded file to it's new place
                                                            if ((move_uploaded_file($_files['tmp_name'],$newname))) {
                                                                
                                                                return $rd2.".".$ext;
                                                            
                                                            }
                                                            
                                                        } 
                                                              
                                                    } 
                                                    
                                                }

                                                if($_SERVER["REQUEST_METHOD"] == "POST"){       
                                                    $CodigoProducto = test_input($_POST["codigo"]);
                                                    $NombreProducto = test_input($_POST["nombre"]);
                                                    $CantidadProducto = test_input($_POST["cantidad"]);
                                                    $PrecioProducto = test_input($_POST["precio"]); 
                                                    $DescripcionProducto = test_input($_POST["descripcion"]);   
                                                    $ImagenProducto = test_input($_POST["imagen"]); 
                                                     // $ImagenProducto = subirDocumento($_FILES["imagen"]);   
                                                }

                                                function validar($CodigoProducto,$NombreProducto,$CantidadProducto,$PrecioProducto,$DescripcionProducto,$ImagenProducto,&$error){
                                                if($CodigoProducto == null){
                                                    $error = "Debe digitar el código del producto.";
                                                    // header('Location:registrarse.php?error=3');
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
                                                if($NombreProducto == null){
                                                    $error = "Debe digitar su nombre completo.";
                                                    // header('Location:registrarse.php?error=3');
                                                    return false;
                                                }
                                                if($NombreProducto > 45){
                                                    $error = "El nombre del producto es muy extenso.";
                                                    // header('Location:registrarse.php?error=4');
                                                    return false;
                                                }
                                                if($CantidadProducto == null){
                                                    $error = "Debe digitar la cantidad del producto.";
                                                    // header('Location:registrarse.php?error=5');
                                                    return false;
                                                }
                                                if($PrecioProducto == null){
                                                    $error = "Debe digitar el precio del producto.";
                                                    // header('Location:registrarse.php?error=7');
                                                    return false;
                                                }
                                                if($DescripcionProducto == null){
                                                    $error = "Debe digitar la descripción del producto.";
                                                    // header('Location:registrarse.php?error=7');
                                                    return false;
                                                }
                                                $error = "";
                                                return true;
                                                }                                                 

                                                // function seguridad_x($texto){
                                                //     $texto = stripslashes($texto);
                                                //     $texto = addslashes($texto);
                                                //     $texto = ereg_replace(";","",$texto);
                                                //     $texto = ereg_replace("<","",$texto);
                                                //     $texto = ereg_replace(">","",$texto);
                                                //     $texto = ereg_replace("/","",$texto);
                                                //     $texto = ereg_replace(':',"",$texto);
                                                //     return $texto;
                                                // }
                                                if(empty($ImagenProducto)){
                                                    $ImagenProducto = $obj->ImagenProducto;
                                                }

                                                if ($_POST){
                                                    $error_encontrado="";
                                                    // seguridad_x($NombreUsuario);
                                                    // seguridad_x($CorreoUsuario);
                                                    // seguridad_x($LoginUsuario);
                                                    // seguridad_x($ContrasenaUsuario);
                                                if(validar($CodigoProducto,$NombreProducto,$CantidadProducto,$PrecioProducto,$DescripcionProducto,$ImagenProducto,$error_encontrado)){
                                                    try {

                                                        $conn = new PDO("mysql:host=$db_host;dbname=$db_name",$db_username, $db_password);
                                                        //Iniciar transacción

                                                        $conn->beginTransaction();
                                                      
                                                        $sql = "call Modificar_Producto(:proc_IdProducto,:proc_CodigoProducto,:proc_NombreProducto,
                                                            :proc_CantidadProducto,:proc_PrecioProducto,:proc_DescripcionProducto,:proc_ImagenProducto)";
                                                        $stmt = $conn->prepare($sql);
                                                        $stmt->bindParam(":proc_IdProducto", $i, PDO::PARAM_INT);
                                                        $stmt->bindParam(":proc_CodigoProducto", $CodigoProducto, PDO::PARAM_STR);
                                                        $stmt->bindParam(":proc_NombreProducto", $NombreProducto, PDO::PARAM_STR);
                                                        $stmt->bindParam(":proc_CantidadProducto", $CantidadProducto, PDO::PARAM_INT);
                                                        $stmt->bindParam(":proc_PrecioProducto", $PrecioProducto, PDO::PARAM_INT);
                                                        $stmt->bindParam(":proc_DescripcionProducto", $DescripcionProducto, PDO::PARAM_STR);
                                                        $stmt->bindParam(":proc_ImagenProducto", $ImagenProducto, PDO::PARAM_STR);
                                                        $stmt->execute(); 

                                                        //Finalizar transacción 
                                                        $conn->commit();                                                                                                      
                                                        // header('Location:iniciar_sesion.php?error=4'); 
                                                        $error_encontrado2 = 'Producto modificado.';

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
                                                      echo ' <button name="enter" type="submit"><a href="perfil_admin.php?c=2">Volver</a></button>';
                                                echo '</div>';
                                                } else {   

                                                ?>

                                                <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"].'?v='.$_GET["v"].'&i='.$_GET["i"].'');?>" method="post" class="send-message">
                                                    <div class="row">

                                                        <div class="name col-md-5">

                                                            <br>
                                                            <label>Código:</label> <input type="text" name="codigo" placeholder="Código" value="<?php if (isset($_POST['codigo'])) {echo $_POST['codigo'];}else{echo $obj->CodigoProducto;} ?>"/><br><br>
                                                            <label>Nombre:</label> <input type="text" name="nombre" placeholder="Nombre" value="<?php if (isset($_POST['nombre'])) {echo $_POST['nombre'];}else{echo $obj->NombreProducto;} ?>"/><br><br>
                                                            <label>Cantidad:</label> <input type="text" name="cantidad" placeholder="Cantidad" value="<?php if (isset($_POST['cantidad'])) {echo $_POST['cantidad'];}else{echo $obj->CantidadProducto;} ?>"/><br><br> 
                                                            <label>Precio:</label> <input type="text" name="precio" placeholder="Precio" value="<?php if (isset($_POST['precio'])) {echo $_POST['precio'];}else{echo $obj->PrecioProducto;} ?>"/><br>
                                                            <label>Descripción:</label> <textarea name="descripcion" placeholder="Descripción"><?php if (isset($_POST['descripcion'])) {echo $_POST['descripcion'];}else{echo $obj->DescripcionProducto;} ?></textarea><br><br> 
                                                             <label class="leftContrasena">Adjuntar imagen:</label><label class="rightContrasena">
                                                            <input name="imagen" type="file" class="rightContrasena" value=""/></label><br>
                                                           
                                                        </div>                                                 
                                                    </div>                                                                                 
                                                    <div class="send2">
                                                        <button name="enter" type="submit">Modificar</button>
                                                        <button name="enter" type="submit"><a href="perfil_admin.php?c=2">Volver</a></button>
                                                    </div>
                                                </form> 

                                                <?php
                                                }

                                        } else if($v==3){
                                            include("autenticacion/class/config.php");
                                                $i = isset($_GET['i']) ? $_GET['i'] : null ;                                               

                                                                                     
                                                    try {
                                                        $conn = new PDO("mysql:host=$db_host;dbname=$db_name",$db_username, $db_password);
                                                        //Iniciar transacción

                                                        $conn->beginTransaction();
                                                      
                                                        $sql = "call Eliminar_Producto(:proc_IdProducto)";
                                                        $stmt = $conn->prepare($sql);
                                                        $stmt->bindParam(":proc_IdProducto", $i, PDO::PARAM_INT);
                                                        $stmt->execute(); 

                                                        //Finalizar transacción 
                                                        $conn->commit(); 
                                                         header('Location:perfil_admin.php?c=2');                                                                                                     
                                                        // header('Location:iniciar_sesion.php?error=4'); 
                                                        $error_encontrado2 = 'Producto eliminado.';

                                                    } catch (PDOException $pe) {
                                                        $conn->rollBack();
                                                        die("Ocurrio un error: " . $pe->getMessage());    
                                                    }
                                                    ?>

                                                     <div class="btn-carrito">
                                                    <div class="row">   
                                                        <div class="col-md-12">
                                                            <ul>
                                                                <li><a href="perfil_admin.php?c=2">Volver</a></li>                                    
                                                            </ul>
                                                        </div>
                                                    </div>
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