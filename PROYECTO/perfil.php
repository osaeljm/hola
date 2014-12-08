<?php
session_start();
include_once("autenticacion/class/config.php"); //include config file
$current_url = base64_encode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); 

$idp=$_SESSION["idperfil"];
if($idp==1){
    header('Location:perfil_admin.php');
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
                                <li><span><a href="perfil.php">Compras</a></span></li>
                                <li><span><a href="perfil.php?c=1">Datos personales</a></span></li>                                  
                            </ul>
                        </div>
                    </div>

                    <?php 
                    $c = isset($_GET['c']) ? $_GET['c'] : null ;
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
                                        <td><h6><?php if($obj1->IdPerfil == 1){echo 'Administrador';}else{echo 'Cliente';} ?></h6></td>
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
                                    <div class="send4">
                                        <div class="row">   
                                            <div class="col-md-12">
                                                <ul>
                                                    <a href="modificar_contrasena.php"><button>Cambiar contraseña</button></a>                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    </div> 
                                </div>                        
                            </div>                     
                                        

                       </div>


                        <?php 
                        } else { 
                        ?>

                        

                         <div class="row" id="Container">
                        <?php
                        //current URL of the Page. cart_update.php redirects back to this URL 
                        $id = $_SESSION['idusuario'];
                           $results = $mysqli->query("SELECT * FROM EncabezadoFactura WHERE Usuario_IdUsuario = $id ORDER BY FechaFactura ASC");
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
                            ?> 
                              <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $obj->FechaFactura ?></td>
                                <td>Cancelada</td>
                                <td><?php echo '₡'.$obj->TotalFactura ?></td>
                                <th><a href="detallefactura.php?v=<?php echo $obj->NumeroFactura; ?>"><button style="height:30px;" type="button" class="btn btn-warning">Detalle</button></a></th>
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