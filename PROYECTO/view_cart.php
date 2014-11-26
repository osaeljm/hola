<?php
session_start();
include_once("autenticacion/class/config.php");
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
                           
                        </div>
                    </div>
                </div>
            </div>


            <div id="products-post">
                <div class="container">            
                    <div class="row" id="Container"> 

                        <?php

                             if(isset($_SESSION["products"]))
                            {
                                $total = 0;
                                echo '<form method="post" action="PAYMENT-GATEWAY">';
                                echo '<table >'; //class="table" id="table"
                                
                                $cart_items = 0;
                               
                                foreach ($_SESSION["products"] as $cart_itm)
                                {
                                   $product_code = $cart_itm["code"];
                                   $results = $mysqli->query("SELECT IdProducto,NombreProducto,CantidadProducto,DescripcionProducto,PrecioProducto FROM Producto WHERE CodigoProducto='$product_code' LIMIT 1");
                                   $obj = $results->fetch_object();
                                    echo '<tr >';
                                    echo '<td class="cart-itm">';
                                    echo '<h3>'.$obj->NombreProducto.' (Code: '.$product_code.')</h3> ';
                                    echo '<div class="p-price">Precio: '.$currency.$obj->PrecioProducto.'</div>';                                   
                                    echo '<div class="product-info">';                                 
                                    echo 'Cantidad: <select>
                                          <option value="1"selected>1</option>
                                          <option value="2">2</option>
                                          <option value="3">3</option>
                                          <option value="4">4</option>
                                          <option value="5">5</option>
                                          <option value="6">6</option>
                                          <option value="7">7</option>
                                          <option value="8">8</option>
                                          <option value="9">9</option>
                                          <option value="10">10</option>
                                        </select>';
                                    echo '<div>'.$obj->DescripcionProducto.'</div>';
                                    echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">Eliminar del carrito</a></span>';
                                    echo '</div>';
                                    echo '</td>';
                                    echo '</tr >';
                                    $subtotal = ($cart_itm["price"]*1); //$cart_itm["qty"]
                                    $total = ($total + $subtotal);

                                    echo '<input type="hidden" name="item_name['.$cart_items.']" value="'.$obj->NombreProducto.'" />';
                                    echo '<input type="hidden" name="item_code['.$cart_items.']" value="'.$product_code.'" />';
                                    echo '<input type="hidden" name="item_desc['.$cart_items.']" value="'.$obj->DescripcionProducto.'" />';
                                    echo '<input type="hidden" name="item_qty['.$cart_items.']" value="'.$cart_itm["qty"].'" />';
                                    echo '<input type="hidden" name="item_id['.$cart_items.']" value="'.$obj->IdProducto.'" />';
                                    $cart_items ++;
                                     
                                }
                                echo $cart_items ;
                                $_SESSION["cart_items"] = $cart_items;                                

                                echo '</table>';
                                echo '<span class="check-out-txt">';
                                echo '<strong>Total : '.$currency.$total.'</strong>  ';
                                echo '</span>';
                                echo '</form>';
                                
                            }else{
                                echo 'Your Cart is empty';
                            }
                            echo '<span class="check-out-txt"><a href="products.php">Productos - Inicio</a></span>';
                            echo '<span class="check-out-txt"><a href="comprar_productos.php">Comprar</a></span>';


                        ?>


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