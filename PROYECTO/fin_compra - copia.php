<?php
session_start();
include_once("autenticacion/class/config.php");
$current_url = base64_encode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); 

if(isset($_SESSION["usuario"])){
 $idusuario =  $_SESSION["idusuario"];
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
                                <h2>¡Gracias por su compra!</h2>
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
                               

                            <?php
                            

                            try {

                                $conn = new PDO("mysql:host=$db_host;dbname=$db_name",$db_username, $db_password);
                                $conn->beginTransaction();
                                $total = 0;                                 

                                $sql = "call Insertar_EncabezadoFactura(:proc_TotalFactura,:proc_Usuario_IdUsuario)";
                                $stmt = $conn->prepare($sql); 
                                $stmt->bindParam(":proc_TotalFactura", $total, PDO::PARAM_INT);
                                $stmt->bindParam(":proc_Usuario_IdUsuario", $idusuario, PDO::PARAM_INT);
                                $stmt->execute();
                                $r = $stmt->fetch();
                           
                            // echo $r["outid"];

                                if(isset($_SESSION["products"]))
                                {
                                    $total = 0;
                                    $cart_items = 0;                               
                                    foreach ($_SESSION["products"] as $cart_itm)
                                    {
                                        $product_code = $cart_itm["code"];
                                        $product_price = $cart_itm["price"];
                                        $cart_itm["id"];
                                        $product_id = $cart_itm["id"];                                     

                                        //Ingreso de detalle en la tabla FacturaDetalle
                                       
                                            $total = 0;  
                                            $cantidad = 2;
                                            $subtotal = $cantidad *  $product_price;                                           
                                            $sql = "call Insertar_FacturaDetalle(:proc_EncabezadoFactura_NumeroEncabezadoFactura,
                                            :proc_Cantidad,:proc_SubTotal,:Producto_IdProducto)";
                                            $stmt = $conn->prepare($sql); 
                                            $stmt->bindParam(":proc_EncabezadoFactura_NumeroEncabezadoFactura", $r["outid"], PDO::PARAM_INT);
                                            $stmt->bindParam(":proc_Cantidad", $cantidad, PDO::PARAM_INT);
                                            $stmt->bindParam(":proc_SubTotal", $subtotal, PDO::PARAM_INT);
                                            $stmt->bindParam(":Producto_IdProducto", $product_id, PDO::PARAM_INT);
                                            $stmt->execute();                                            

                                        //Consultar la cantidad de productos 

                                            $sql = "call Consultar_CantidadProducto(:proc_IdProducto)";
                                            $stmt = $conn->prepare($sql); 
                                            $stmt->bindParam(":proc_IdProducto", $product_id, PDO::PARAM_INT);
                                            $stmt->execute();
                                            $r1 = $stmt->fetch();

                                            $calculo = $r1["CantidadProducto"] - $cantidad;
                                            

                                            If($calculo >= 0){
                                        //Restar la cantidad de productos de producto comprado de la tabla productos

                                            $sql = "call Modificar_CantidadProducto(:proc_IdProducto,:proc_Cantidad)";
                                            $stmt = $conn->prepare($sql); 
                                            $stmt->bindParam(":proc_IdProducto", $product_id, PDO::PARAM_INT);
                                            $stmt->bindParam(":proc_Cantidad", $calculo, PDO::PARAM_INT);
                                            $stmt->execute();

                                            $cart_items ++; 
                                            
                                            } else {
                                                $conn->rollBack();
                                                echo 'Error: Cantidad de productos menor a la del inventario.';
                                            }                                      
                                    }
                                    $conn->commit();                                                                                                      
                                }  

                                 // header('Location:cart_update.php?emptycart=1&return_url='.$current_url.'');
                                unset($_SESSION['products']);
                                header('Location:view_cart.php');
                               
                            } catch (PDOException $pe) {
                                $conn->rollBack();
                                die("Ocurrio un error: " . $pe->getMessage());
                                
                            }


                            ?>
                                 
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
        <script src="js/validacard.js"></script>

    </body>
</html>