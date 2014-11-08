<?php
session_start();
include_once("config.php");
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
                                    <a href="#">Home</a>
                                    <a href="#">My account</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cart-info">
                                    <i class="fa fa-shopping-cart"></i>
                                    (<a href="#">5 artículos</a>) en el carrito
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
                    <div class="row">
                        <div class="col-md-12">
                            <div id="product-heading">
                                <h2>Hungry ?</h2>
                                <img src="images/under-heading.png" alt="" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="filters col-md-12 col-xs-12">
                            <ul id="filters" class="clearfix">
                                <li><span class="filter" data-filter="all">All</span></li>
                                <li><span class="filter" data-filter=".ginger">Ginger</span></li>
                                <li><span class="filter" data-filter=".pizza">Pizza</span></li>
                                <li><span class="filter" data-filter=".pasta">Pasta</span></li>
                                <li><span class="filter" data-filter=".drink">Drink</span></li>
                                <li><span class="filter" data-filter=".hamburger">Hamburger</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row" id="Container"> 

                        <?php
                        //current URL of the Page. cart_update.php redirects back to this URL
                        $current_url = base64_encode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
                            
                           $results = $mysqli->query("SELECT * FROM Producto ORDER BY IdProducto ASC");
                            if ($results) { 
                                //output results from database
                                while($obj = $results->fetch_object())
                                { 
                        ?>                      
                                    <!-- echo '<div class="product">'; 
                                    echo '<form method="post" action="cart_update.php">';
                                    echo '<div class="product-thumb"><img src="images/'.$obj->product_img_name.'"></div>';
                                    echo '<div class="product-thumb">'.$obj->product_qty.'</div>';
                                    echo '<div class="product-content"><h3>'.$obj->product_name.'</h3>';
                                    echo '<div class="product-desc">'.$obj->product_desc.'</div>';
                                    echo '<div class="product-info">Price '.$currency.$obj->price.' <button class="add_to_cart">Add To Cart</button></div>';
                                    echo '</div>';
                                    echo '<input type="hidden" name="product_code" value="'.$obj->product_code.'" />';
                                    echo '<input type="hidden" name="type" value="add" />';
                                    echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
                                    echo '</form>';
                                    echo '</div>'; -->

                               
                                    <form method="post" action="cart_update.php">
                                        <div class="col-md-3 col-sm-6 mix portfolio-item Pizza">       
                                            <div class="portfolio-wrapper">                
                                                <div class="portfolio-thumb">
                                                    <img src="images/<?php echo $obj->ImagenProducto?>" alt="" />
                                                    <div class="hover">
                                                        <div class="hover-iner">
                                                            <a class="fancybox" href="images/<?php echo $obj->ImagenProducto?>"><img src="images/open-icon.png" alt="" /></a>
                                                            <span><?php echo $obj->NombreProducto ?> </span>
                                                            <!-- <button class="add_to_cart">Add To Cart</button>                                                             -->
                                                        </div>
                                                    </div>                                                    
                                                </div>  
                                                <div class="label-text">
                                                    <h3><a href="single-post.html"><?php echo $obj->NombreProducto ?></a></h3>
                                                    <span class="text-category"><?php echo $currency.$obj->PrecioProducto ?> </span> 
                                                    <h7><a href="#">Detalle</a></h7>
                                                    <h7><a href="#">/ Agregar  <i class="fa fa-shopping-cart" ></i></a></h7>                                                    
                                                </div>
                                            </div>          
                                        </div>
                                    </form>


                        <?php   
                                }               
                            }
                        ?>






                    <!--      <div class="col-md-3 col-sm-6 mix portfolio-item ginger">       
                            <div class="portfolio-wrapper">                
                                <div class="portfolio-thumb">
                                    <img src="images/product2.jpg" alt="" />
                                    <div class="hover">
                                        <div class="hover-iner">
                                            <a class="fancybox" href="images/product2_big.jpg"><img src="images/open-icon.png" alt="" /></a>
                                            <span>Ginger</span>
                                        </div>
                                    </div>
                                </div>  
                                <div class="label-text">
                                    <h3><a href="single-post.html">Ginger Tea</a></h3>
                                    <span class="text-category">$24.00</span>
                                </div>
                            </div>          
                        </div> -->
                       

                       </div>
                    <div class="pagination">
                        <div class="row">   
                            <div class="col-md-12">
                                <ul>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">>></a></li>
                                </ul>
                            </div>
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

    </body>
</html>