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
                                    <a href="#">Home</a>
                                    <a href="#">My account</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cart-info">
                                    <i class="fa fa-shopping-cart"></i>
                                    (<a href="#">5 items</a>) Carrito (<a href="#">$45.80</a>)
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
                                        <li><a href="index.html">Inicio</a></li>
                                        <li><a href="about-us.html">Nosotros</a></li>
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


          <!--   <div id="heading">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-content">
                                <h2>Contact Us</h2>
                                <span>Home / <a href="contact-us.html">Contact Us</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->


            <div id="product-post">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-section">
                                <h2>Envianos un mensaje</h2>
                                <!-- <img src="images/under-heading.png" alt="" > -->
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

                            $html_text = "<html><body><p>
                            <span style='font-weight:bold;color:red'> HolaCupcakes ---> Nuevo Cliente</span><br/><br/>
                            <span style='font-weight:bold;color:black'>Nombre completo: </span>".$nombre."<br/>             
                            <span style='font-weight:bold;color:black'>Teléfono : </span>".$telefono."<br/>
                            <span style='font-weight:bold;color:black'>Correo electrónico: </span>".$correo."<br/>
                            <span style='font-weight:bold;color:black'>Descripción : </span>".$descripcion."</p></body></html>";

                            $semi_rand = md5(time());
                            $mime_boundary = $semi_rand;

                            $to = 'cesarjretanaj@gmail.com';
                            $bcc = '';
                            $from = 'HolaCupcakes';
                            $subject = 'Contacto';

                            $body = '--' . $mime_boundary . '
                            Content-Type: text/plain; charset=utf-8
                            ' . $plain_text . '
                            --' . $mime_boundary . '
                            Content-Type: text/html; charset=utf-8
                            ' . $html_text . '
                            --' . $mime_boundary . '--';

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
                                        <div class="col-md-4">
                                            <div class="info">
                                                <p>Esta es una prueba para GitHub.</p>
                                                <ul>
                                                    <li><i class="fa fa-phone"></i>010-020-0340</li>
                                                    <li><i class="fa fa-globe"></i>123 Dagon Studio, Yakin Street, Digital Estate</li>
                                                    <li><i class="fa fa-envelope"></i><a href="#">info@company.com</a></li>
                                                </ul>
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
                                <h2>Find Us On Map</h2>
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
                    <div class="top-footer">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="subscribe-form">
                                    <span>Get in touch with us</span>
                                    <form method="get" class="subscribeForm">
                                        <input id="subscribe" type="text" />
                                        <input type="submit" id="submitButton" />
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="social-bottom">
                                    <span>Follow us:</span>
                                    <ul>
                                        <li><a href="#" class="fa fa-facebook"></a></li>
                                        <li><a href="#" class="fa fa-twitter"></a></li>
                                        <li><a href="#" class="fa fa-rss"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-footer">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="about">
                                    <h4 class="footer-title">About Grill</h4>
                                    <p>Grill is free HTML5 website template by templatemo and it is a free responsive bootstrap layout that can be applied for any purpose.
                                    <br><br>Credit goes to <a rel="nofollow" href="http://unsplash.com">Unsplash</a> for photos used in this template. Nam commodo erat quis ligula placerat viverra.</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="shop-list">
                                    <h4 class="footer-title">Shop Categories</h4>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>New Grill Menu</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>Healthy Fresh Juices</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>Spicy Delicious Meals</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>Simple Italian Pizzas</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>Pure Good Yogurts</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>Ice-cream for kids</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="recent-posts">
                                    <h4 class="footer-title">Recent posts</h4>
                                    <div class="recent-post">
                                        <div class="recent-post-thumb">
                                            <img src="images/recent-post1.jpg" alt="">
                                        </div>
                                        <div class="recent-post-info">
                                            <h6><a href="#">Delicious and Healthy Menus</a></h6>
                                            <span>24/12/2084</span>
                                        </div>
                                    </div>
                                    <div class="recent-post">
                                        <div class="recent-post-thumb">
                                            <img src="images/recent-post2.jpg" alt="">
                                        </div>
                                        <div class="recent-post-info">
                                            <h6><a href="#">Simple and effective meals</a></h6>
                                            <span>18/12/2084</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="more-info">
                                    <h4 class="footer-title">More info</h4>
                                    <p>Sed dignissim, diam id molestie faucibus, purus nisl pretium quam, in pulvinar velit massa id elit.</p>
                                    <ul>
                                        <li><i class="fa fa-phone"></i>010-020-0340</li>
                                        <li><i class="fa fa-globe"></i>123 Dagon Studio, Yakin Street, Digital Estate</li>
                                        <li><i class="fa fa-envelope"></i><a href="#">info@company.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom-footer">
                        <p>Copyright © 2084 <a href="#">Your Company Name</a> <!-- Credit: www.templatemo.com --></p>
                    </div>
                    
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
			  center: new google.maps.LatLng(16.8496189,96.1288854),
			  zoom: 15,
			  mapTypeId:google.maps.MapTypeId.ROADMAP
			  };
			var map = new google.maps.Map(document.getElementById("googleMap"), map_options);
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