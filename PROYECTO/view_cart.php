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
                                        echo '<span class="check-out-txt"><a> Bienvenido '.$_SESSION["usuario"].'</a></span>';
                                        echo '<a href="perfil.php"> Perfil</a>';
                                        echo '<a href="autenticacion/cerrar_sesion.php"> Cerrar Sesión</a>';
                                    } else {
                                        echo '<a href="registrarse.php">Registrar</a>';
                                        echo '<a href="iniciar_sesion.php">Iniciar sesión</a>';
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
                        </div>
                    </div>
                </div>
            </header>

        <div id="product-post">

            <div id="heading">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-content">
                                 <h2>Artículos del carrito</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading-section">
                            <h2></h2>
                            <img src="images/under-heading.png" alt="" >
                        </div>
                    </div>
                </div>
                <div id="single-blog" class="page-section first-section">
                    <div class="container">
                        <div class="row">
                            <div class="product-item col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <?php

                                            if(isset($_SESSION["products"]))
                                            {
                                                $total = 0;
                                                echo '<form method="post" action="PAYMENT-GATEWAY">';
                                                echo '<table class="tabla_cart">'; 
                                                
                                                $cart_items = 0;
                                               
                                                foreach ($_SESSION["products"] as $cart_itm)
                                                {
                                                   $product_code = $cart_itm["code"];
                                                   $results = $mysqli->query("SELECT * FROM Producto WHERE CodigoProducto='$product_code' LIMIT 1");
                                                   $obj = $results->fetch_object();
                                                    echo '<tr >';
                                                    echo '<td class="cart-itm">';
                                                    echo '<img style="float:left;margin-right: 0.4cm;" src="images/'.$obj->ImagenProducto.'" height="122" width="166">';
                                                    echo '</td>';
                                                    echo '<td>';
                                                    echo '<a title="Eliminar del carrito" href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'"><img style="float:right;margin-right: 0.4cm;" src="images/eliminar.ico" height="36" width="36"></a>';
                                                    echo '<h3>'.$obj->NombreProducto.'</h3>';
                                                    echo '<div class="p-price">Precio: '.$currency.$obj->PrecioProducto.'</div>';                                   
                                                    echo '<div class="product-info">';                                 
                                                    echo 'Cantidad: <select class="cant_view">
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
                                                    //echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">Eliminar del carrito</a></span>';
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
                                                
                                                $_SESSION["cart_items"] = $cart_items;                                

                                                echo '</table>';
                                                echo '<span class="check-out-txt">';
                                                echo '<strong><h4>Total : '.$currency.$total.'    - Artículos: ' .$cart_items. '</h4></strong>  ';
                                                echo '</span>';
                                                echo '</form>';

                                                echo '<div class="send2">';
                                                echo '<a href="comprar_productos.php"><button ><span class="check-out-txt">Comprar</span></button></a>';
                                                echo '</div> <br>';
                                                echo '<div class="send3">';
                                                echo '<a href="cart_update.php?emptycart=1&return_url='.$current_url.'?>"><button><span class="empty-cart"> Vaciar carrito</span></button></a>';
                                                echo '</div>';
                                                 
                                                
                                            }else{
                                                echo '<div class="heading-section">';
                                                $e = isset($_GET['e']) ? $_GET['e'] : null ;
                                                if($e==1){
                                                    echo "<h3 style='color:#E32852;'>¡Gracias por su compra!</h3>";
                                                } else {
                                                    echo '<h2>El carrito de compras está vacío</h2>';
                                                }                              
                                                echo '<img src="images/under-heading.png" alt="" >';
                                                echo '</div>';
                                            }
                                        ?>
                                    </div>

                                      <div class="col-md-3 col-md-offset-1">
                                            <div class="side-bar">
                                                <div class="news-letters">
                                                    <h4>HolaCupCakes | Fiestas</h4>
                                                    <div class="archives-list">                                                        
                                                        <iframe width="100%" height="auto" src="//www.youtube.com/embed/n8cYJj2xoHg" frameborder="0" allowfullscreen></iframe>
                                                    </div>        
                                                </div>
                                                <div class="recent-post">
                                                    <h4>Noticias</h4>
                                                    <div class="testimonails-slider">
                                                        <ul class="slides">
                                                            <li>
                                                                <div class="testimonails-content">
                                                                    <p>La tienda de cupcakes SweetArt en St. Louis, USA, se ha convertido en un centro de conversación en busca de respuestas y consuelo alrededor de la muerte del joven Michael Brown.
                                                                    <a target="_blank" href="http://www.msnbc.com/msnbc/race-and-class-side-cupcakes-ferguson">Ver más</a>
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="testimonails-content">
                                                                    <p>Cómo los cupcakes de $6 de la empresa Whole Foods ayuda a los pobres del área urbana de Detroit.
                                                                    <a target="_blank" href="http://grist.org/food/how-do-whole-foods-6-cupcakes-help-detroits-urban-poor/">Ver más</a>
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="testimonails-content">
                                                                    <p>La empresa Turlock en USA, vende cupcakes para ayudar a niños necesitados en navidad.
                                                                        <a target="_blank" href="http://www.turlockjournal.com/archives/27937/">Ver más</a>
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="testimonails-content">
                                                                    <p>Los niños de cuarto grado de la escuela elemental de Towanda en Pensilvannia crean planes de negocio y cupcakes.
                                                                        <a href=""></a>
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="testimonails-content">
                                                                    <p>17 formas de cómo los cupcakes podrían integrarse en la vida diaria para hacer del mundo un mejor lugar.
                                                                        <a target="_blank" href="http://www.bustle.com/articles/48381-17-ways-cupcakes-should-be-integrated-into-daily-life-to-make-the-world-a-better-place">Ver más</a>
                                                                    </p>
                                                                </div>
                                                            </li>                             
                                                        </ul>
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