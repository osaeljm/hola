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

            <div id="heading1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-content">
                                <h2>Envianos un mensaje</h2>
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
                            $error = ''; 
                            $nombre = ''; 
                            $telefono = ''; 
                            $correo = '';
                            $descripcion = ''; 

                            if(isset($_POST['send'])){
                            
                            $nombre = $_POST['nombre'];
                            $telefono = $_POST['telefono'];
                            $correo = $_POST['correo'];
                            $descripcion  = $_POST['descripcion'];


                            if(trim($nombre) == '') {
                            $error = '<div class="errormsg">Digite su nombre</div>';
                            } else if(trim($telefono) == '') {
                            $error = '<div class="errormsg">Digite su teléfono</div>';
                            } else if(!isPhone($telefono)) {
                            $error = '<div class="errormsg">El número de teléfono debe contener 8 dìgitos</div>';
                            }  else if(trim($correo) == '') {
                            $error = '<div class="errormsg">Digite su correo electrónico</div>';
                            } else if(!isEmail($correo)) {
                            $error = '<div class="errormsg">El correo electrónico no es valido, digítelo nuevamente</div>';
                            } else if(trim($descripcion) == '') {
                            $error = '<div class="errormsg">Digite la descripción</div>';
                            }

                            
                            if($error == '') {
                            if(get_magic_quotes_gpc()) {
                            $descripcion = stripslashes($descripcion);
                            }

                            error_reporting(E_ALL);
                            ini_set('display_errors', '1');


                            $plain_text = "Nombre: $nombre Teléfono: $telefono Correo electrónico: $correo Descripción: $descripcion";

                            $html_text = "
                            HolaCupcakes -> Nuevo mensaje
                            Nombre completo: ".$nombre."             
                            Teléfono: ".$telefono."
                            Correo electrónico: ".$correo."
                            Descripción: ".$descripcion."";

                            $semi_rand = md5(time());
                            $mime_boundary = $semi_rand;

                            $to = 'cesarjretanaj@gmail.com';
                            $bcc = '';
                            $from = 'HolaCupcakes';
                            $subject = 'Contacto';

                            $body = '--' . $mime_boundary . '
                            Content-Type: text/html; charset=utf-8
                            ' . $html_text . '
                            --Fin del mensaje--';

                            if (mail ($to, $subject, $body, 
                                'From: ' . $from . "\n" . 
                                'bcc: ' . $bcc . "\n" . 
                                'MIME-Version: 1.0' . "\n" . 
                                'Content-Type: multipart/alternative; boundary=' . $mime_boundary)) {
                               }
                            ?>
                                        
                            <div>
                            <h1>Enviado</h1>
                            </div>  
                            <div>
                            <p>Gracias <b><?=$nombre;?></b>, ¡Pronto estaremos en contácto!</p>
                            </div>
                            <div id="content_4">
                            <p><a href="index.html">Inicio</a></p>
                            </div>              

                            <?php
                            }
                            }
                            if(!isset($_POST['send']) || $error != ''){
                            ?>
                            

                            <form action="" method="post" class="send-message" onsubmit="return validaform()">
                                <div class="row">
                                <div class="name col-md-4">
                                    <input type="text" name="nombre" id="nombre" placeholder="Nombre completo" value="<?=$nombre;?>"/>
                                </div>
                                <div class="email col-md-4">
                                    <input type="text" name="telefono" id="telefono" placeholder="Teléfono" value="<?=$telefono;?>"/>
                                </div>
                                <div class="subject col-md-4">
                                    <input type="text" name="correo" id="correo" placeholder="Correo electrónico" value="<?=$correo;?>"/>
                                </div>
                                </div>
                                <div class="row">        
                                    <div class="text col-md-12">
                                        <textarea name="descripcion" placeholder="Descripción" value="<?=$descripcion;?>"></textarea>
                                    </div>   
                                </div>                              
                                <div class="send">
                                    <button name="send" type="submit">Enviar</button>
                                </div>
                            </form>   

                            <?php echo $error;?>
                            
                            <?php
                            }
                            
                            function isEmail($email){
                            return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i"
                            ,$email));
                            }

                            function isPhone($telefono){
                            return(preg_match("/^[0-9]{8}$/",$telefono));
                            }
                            ?>






                                            </div>
                                        </div>
                                       

                                          <div class="col-md-3 col-md-offset-1">
                                            <div class="side-bar">
                                                <div class="news-letters">
                                                    <h4>HolaCupCakes | Mix</h4>
                                                    <div class="archives-list">
                                                        <ul>
                                                            <iframe width="100%" height="auto" src="//www.youtube.com/embed/fowfqu7l6P4" frameborder="0" allowfullscreen></iframe>
                                                        </ul>
                                                    </div>        
                                                </div>
                                                <div class="recent-post">
                                                    <h4>Noticias</h4>
                                                    <div class="testimonails-slider">
                                                        <ul class="slides">
                                                            <li>
                                                                <div class="testimonails-content">
                                                                    <p>Rebeca Alba vende cupcakes en apoyo a la lucha contra el cáncer.
                                                                     <a target="_blank" href="http://www.sdpnoticias.com/estilo-de-vida/2014/12/03/rebecca-de-alba-vende-cupcakes-en-apoyo-a-la-lucha-contra-el-cancer">Ver más</a></p>
                                                                    <!-- <h6>Jennifer - <a href="#">Chief Designer</a></h6> -->
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="testimonails-content">
                                                                    <p>Los cupcakes le dan una ventaja a los niños de Durban en Sudáfrica. 
                                                                    <a target="_blank" href="http://www.iol.co.za/news/south-africa/kwazulu-natal/cupcakes-give-children-a-leg-up-1.1790283#.VH-ZGDHF_2c">
                                                                    Ver más</a></p>
                                                                </div> 
                                                            </li>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-section">
                                <h2>Buscanos en el mapa</h2>
                                <img src="images/under-heading.png" alt="" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="googleMap" style="height:420px;"></div>
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

        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&amp;sensor=false">
        </script>
                
        <script>
		
		var map;
		
        function initialize()
        {
			var map_options = {
			  center: new google.maps.LatLng(10.018204, -84.213819),
			  
			  zoom: 15,
			  mapTypeId:google.maps.MapTypeId.ROADMAP
			  };
			var map = new google.maps.Map(document.getElementById("googleMap"), map_options);
			
			
			var place = new google.maps.LatLng(10.018204, -84.213819);
          var marker = new google.maps.Marker({
        position: place
        , title: 'Holacupcakes'
        , map: map
        , });
			
					
			var popup = new google.maps.InfoWindow({
        content: 'Holacupcakes'});
        popup.open(map, marker); 

			
        }

        google.maps.event.addDomListener(window, 'load', initialize);
		google.maps.event.addDomListener(window, "resize", function() 
		{
		 	var center = map.getCenter();
		 	google.maps.event.trigger(map, "resize");
		 	map.setCenter(center); 
		});
        </script>

    </body>
</html>