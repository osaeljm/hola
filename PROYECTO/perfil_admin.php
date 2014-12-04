<?php
session_start();
include_once("autenticacion/class/config.php"); //include config file
$current_url = base64_encode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); 

$idp=$_SESSION["idperfil"];
if($idp!=1){
    header('Location:perfil.php');
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
            
            <div id="heading4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-content">
                                 <h2>Perfil Administrador</h2>
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
                                <li><span><a href="perfil_admin.php">Clientes</a></span></li>
                                <li><span><a href="perfil_admin.php?c=1">Datos personales</a></span></li>
                                <li><span><a href="perfil_admin.php?c=2">Productos</a></span></li>
                                <li><span><a href="perfil_admin.php?c=3">Facturas</a></span></li>                                   
                            </ul>
                        </div>
                    </div>




                    <?php $c = isset($_GET['c']) ? $_GET['c'] : null ;
                    if($c==1){ ?>

                    <div class="row" id="Container">
                        <?php
                        //current URL of the Page. cart_update.php redirects back to this URL 
                            $id = $_SESSION['idusuario'];
                           $results = $mysqli->query("SELECT * FROM Usuario WHERE IdUsuario = $id");
                           $obj1 = $results->fetch_object();
                        ?>
                               
                            <div class="row">
                                <div class="col-md-12">
                                 <div class="container">
                                    <table style="">
                                    <tr>
                                        <td><h5>Nombre completo: </h5></td>
                                        <td><h6> <?php echo $obj1->NombreUsuario ?></h6></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Tipo usuario: </h5></td>
                                        <td><h6> <?php echo $obj1->IdPerfil ?></h6></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Usuario: </h5></td>
                                        <td><h6> <?php echo $obj1->LoginUsuario ?></h6></td>
                                    </tr>
                                    <tr> 
                                        <td><h5>Correo electrónico: </h5></td>
                                        <td><h6> <?php echo $obj1->CorreoUsuario ?></h6></td>
                                    </tr> 
                                    </table>                                   
                                     <div class="btn-carrito">
                                        <div class="row">   
                                            <div class="col-md-12">
                                                <ul>
                                                    <li><a href="modificar_usuario.php">Modificar</a></li>                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    </div> 
                                </div>                        
                            </div>                     
                                        

                       </div>

                        <?php 
                        } else if ($c==2) { 
                            ///////////////////////////////////////////////
                        ?>

                        
                         <div class="row" id="Container">
                        <?php
                        //current URL of the Page. cart_update.php redirects back to this URL 
                           $results = $mysqli->query("SELECT * FROM Producto LIMIT 20");
                            if ($results) 
                            { 
                                ?>
                               
                        <style>
                        @-moz-document url-prefix() {
                          fieldset { display: table-cell; }
                        }
                        </style>

                       
                        <div class="table-responsive">
                          <table class="table">
                            <tr>
                                <th>CODIGO</th>
                                <th>NOMBRE</th>
                                <th>CANTIDAD</th>
                                <th>PRECIO</th>
                                <th><a href="editar_producto.php?v=1"><button style="height:30px;" type="button" class="btn btn-success">Nuevo</button></a></th>
                            </tr>
                            <?php
                             //output results from database  
                             $i=0;                             
                                while($obj2 = $results->fetch_object())
                                { 
                                    $i++;
                                    $obj->CantidadProducto = 1;                                    
                            ?> 
                              <tr>                               
                                <td><?php echo $obj2->CodigoProducto ?></td>
                                <td><?php echo $obj2->NombreProducto ?></td>
                                <td><?php echo $obj2->CantidadProducto ?></td>
                                <td><?php echo '₡'.$obj2->PrecioProducto ?></td>
                                <th><a href="editar_producto.php?v=2&i=<?php echo $obj2->IdProducto; ?>"><button style="height:30px;" type="button" class="btn btn-warning">Modificar</button></a>
                                <a href="editar_producto.php?v=3&i=<?php echo $obj2->IdProducto; ?>"><button style="height:30px;" type="button" class="btn btn-danger">Eliminar</button></a></th>
                              </tr>
                        <?php                                    
                                }                              
                            }
                            if(empty($results)){
                                echo 'No hay compras realizadas.';
                            }
                        ?>
                        </table>
                        </div>                  

                       </div>
                       <?php 
                        } else if ($c==3){ 
                        ?>



                         <div class="row" id="Container">
                        <?php
                        //current URL of the Page. cart_update.php redirects back to this URL 
                           $results = $mysqli->query("SELECT * FROM EncabezadoFactura ORDER BY FechaFactura ASC");
                            if ($results) 
                            { 
                                ?>
                               
                        <style>
                        @-moz-document url-prefix() {
                          fieldset { display: table-cell; }
                        }
                        </style>

                       
                        <div class="table-responsive">
                          <table class="table">
                            <tr>
                                <th>#</th>
                                <th>CLIENTE</th>
                                <th>FECHA</th>
                                <th>ESTADO</th>
                                <th>TOTAL</th>
                            </tr>
                            <?php
                             //output results from database  
                             $i=0;                             
                                while($obj = $results->fetch_object())
                                { 
                                    $i++;
                                    $obj->CantidadProducto = 1;

                                    $results_cl = $mysqli->query("SELECT NombreUsuario FROM Usuario WHERE IdUsuario = $obj->Usuario_IdUsuario");
                                    $obj2 = $results_cl->fetch_object();                                 
                            ?> 
                              <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $obj2->NombreUsuario ?></td>
                                <td><?php echo $obj->FechaFactura ?></td>
                                <td>-</td>
                                <td><?php echo $obj->TotalFactura ?></td>
                                <th><a href="detallefactura_ad.php?v=<?php echo $obj->NumeroFactura; ?>"><button style="height:30px;" type="button" class="btn btn-warning">Detalle</button></a></th>
                              </tr>
                        <?php                                    
                                }

                            }
                            if(empty($results)){
                                echo 'No hay compras realizadas.';
                            }
                        ?>
                        </table>
                        </div>
                        </div>





                        <?php 
                        } else { 
                        ?>

                        

                         <div class="row" id="Container">
                        <?php
                        //current URL of the Page. cart_update.php redirects back to this URL 
                           $results = $mysqli->query("SELECT * FROM Usuario ");
                            if ($results) 
                            { 
                                ?>
                               
                        <style>
                        @-moz-document url-prefix() {
                          fieldset { display: table-cell; }
                        }
                        </style>

                       
                        <div class="table-responsive">
                          <table class="table">
                            <tr>
                                <th>NOMBRE</th>
                                <th>USUARIO</th>
                                <th>CORREO ELECTRÓNICO</th>
                            </tr>
                            <?php
                             //output results from database  
                             $i=0;                             
                                while($obj = $results->fetch_object())
                                { 
                                    $i++;
                                    $obj->CantidadProducto = 1;                                    
                            ?> 
                              <tr>                               
                                <td><?php echo $obj->NombreUsuario ?></td>
                                <td><?php echo $obj->LoginUsuario ?></td>
                                <td><?php echo $obj->CorreoUsuario ?></td>
                              </tr>
                        <?php                                    
                                }

                            }
                            if(empty($results)){
                                echo 'No hay compras realizadas.';
                            }
                        ?>
                        </table>
                        </div>                  

                       </div>

                       <?php 
                       } 
                       ?>

                   <!--  <div class="btn-carrito">
                        <div class="row">   
                            <div class="col-md-12">
                                <ul>
                                    <li><a href="view_cart.php">Ver carrito<i class="fa fa-shopping-cart"></i></a></li>                                    
                                </ul>
                            </div>
                        </div>
                    </div>  -->    
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