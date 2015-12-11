<?php
    session_start(); 
    if (isset($_SESSION["access"])){
      if($_SESSION["access"] != true){
        header('Location: login.php');
      }
    }else{
        header('Location: login.php');
    }
    if($_SESSION["rol"] != 'M'){
        header('Location: php/controller/login.controller.php?salir=exit');
    }
?>
<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mecanico</title>
    <!-- Vendor CSS -->
    <link href="vendors/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
    <link href="vendors/bower_components/sweetalert/dist/sweetalert-override.min.css" rel="stylesheet">
    <link href="vendors/bower_components/material-design-iconic-font/css/material-design-iconic-font.min.css" rel="stylesheet">
    <link href="vendors/socicon/socicon.min.css" rel="stylesheet">
    <!-- CSS -->
    <link href="css/app.min.1.css" rel="stylesheet">
    <link href="css/app.min.2.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
</head>
    <body>
        <header id="header">
            <ul class="header-inner">
                <li id="menu-trigger" data-trigger="#sidebar">
                    <div class="line-wrap">
                        <div class="line top"></div>
                        <div class="line center"></div>
                        <div class="line bottom"></div>
                    </div>
                </li>
            
                <li class="logo hidden-xs">
                    <a href="admin-index.php">FareGas</a>
                </li>
                
                <li class="pull-right">
                <ul class="top-menu">
                    <li id="toggle-width">
                        <div class="toggle-switch">
                            <input id="tw-switch" type="checkbox" hidden="hidden">
                            <label for="tw-switch" class="ts-helper"></label>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="tm-settings" href="#"></a>
                        <ul class="dropdown-menu dm-icon pull-right">
                            <li>
                                <a data-action="fullscreen" href="#"><i class="md md-fullscreen"></i> Ver en pantalla completa</a>
                            </li>
                            <li>
                            <a data-action="clear-localstorage" href="#"><i class="md md-delete"></i> Limpiar Local Storage</a>
                            </li>
                        </ul>
                    </li> 
                    </ul>
                </li>
            </ul>
            
            <!-- Top Search Content -->
            <div id="top-search-wrap">
                <input type="text">
                <i id="top-search-close">&times;</i>
            </div>
        </header>
        
        <section id="main">
            <aside id="sidebar">
                <div class="sidebar-inner c-overflow">
                    <div class="profile-menu">
                        <a href="#">
                            <div class="profile-pic">
                                <img src="img/profile-pics/1.jpg" alt="">
                            </div>

                            <div class="profile-info">
                                <?php $nombre =$_SESSION["nombre"];
                                echo $nombre;
                                 ?>

                                <i class="md md-arrow-drop-down"></i>
                            </div>
                        </a>

                        <ul class="main-menu">
                            <li>
                                <a href="perfil.php"><i class="md md-person"></i> Ver Perfil</a>
                            </li>                            
                            <li>
                                <a href="php/controller/login.controller.php?salir=exit"><i class="md md-history"></i> Logout</a>
                            </li>
                        </ul>
                    </div>

                    <ul class="main-menu">
                        <li class="active"><a href="mecanico-index.php"><i class="md md-dashboard"></i> Panel de Control</a></li>
                        <li><a href="mecanico-cliente.php"><i class="md md-work"></i> Clientes</a></li>
                        <li><a href="mecanico-revisiones.php"><i class="md md-work"></i> Revisiones</a></li>
                        <li><a href="mecanico-certificacion.php"><i class="md md-notifications"></i>Certificacion</a></li>
                    </ul>
                </div>
            </aside>
            
            
            
            
            <section id="content">
                <div class="container">
                    <div class="block-header">
                        <h2 style="margin-left:-22px;">Panel de Control</h2>
                        
                        <ul class="actions">
                            
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown">
                                    <i class="md md-more-vert"></i>
                                </a>
                                
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="">Refresh</a>
                                    </li>
                                    <li>
                                        <a href="../">Ir al sitio Web</a>
                                    </li>
                                    <li>
                                        <a target="blank" href="../">Ir al sitio Web en otra ventana</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        
                    </div>
                    <div class="card">                       
                        <div class="card-body">
                          <div id="wowslider-container1" style="width:100%;">
                            <div class="ws_images">
                                <ul>
                                    <li>
                                        <img src="../img/admin-slider/slider_00.jpg" alt="s1" title="s1" id="wows1_0"/>
                                    </li>
                                    <li>
                                        <img src="../img/admin-slider/slider_01.jpg" alt="s2" title="s2" id="wows1_1"/>
                                    </li>
                                    <li>
                                        <img src="../img/admin-slider/slider_02.jpg" alt="s3" title="s3" id="wows1_2"/>
                                    </li>
                                    <li>
                                        <img src="../img/admin-slider/slider_03.jpg" alt="s4" title="s4" id="wows1_3"/>
                                    </li>
                                    <li>
                                        <img src="../img/admin-slider/slider_04.jpg" alt="s4" title="s4" id="wows1_3"/>
                                    </li>
                                    <li>
                                        <img src="../img/admin-slider/slider_05.jpg" alt="s4" title="s4" id="wows1_3"/>
                                    </li>
                                    <li>
                                        <img src="../img/admin-slider/slider_06.jpg" alt="s4" title="s4" id="wows1_3"/>
                                    </li>
                                </ul>
                            </div>
                            <div class="ws_bullets">
                                <div>
                                    <a href="#" title="s1">1</a>
                                    <a href="#" title="s2">2</a>
                                    <a href="#" title="s3">3</a>
                                    <a href="#" title="s4">4</a>
                                </div>
                            </div>
                                    
                          </div>  
                        </div>
                    </div>       
                    <div class="row">     
                     <div class="col-sm-12">              
                        <!-- Social -->
                        <div class="card go-social">
                            <div class="card-header">
                                <h2>Redes Sociales</h2>
                            </div>
                            
                            <div class="card-body clearfix">
                                <a class="col-xs-3" href="#">
                                    <img src="img/social/facebook-128.png" class="img-responsive" alt="" style="margin: 0 auto;">
                                </a>                                
                                <a class="col-xs-3" href="#">
                                    <img src="img/social/googleplus-128.png" class="img-responsive" alt="" style="margin: 0 auto;">
                                </a>
                                <a class="col-xs-3" href="#">
                                    <img src="img/social/linkedin-128.png" class="img-responsive" alt="" style="margin: 0 auto;">
                                </a>                                
                                <a class="col-xs-3" href="#">
                                    <img src="img/social/youtube-128.png" class="img-responsive" alt="" style="margin: 0 auto;">
                                </a>
                            </div>
                        </div>                        
                    </div>  
                    </div>
                </div>
            </section>
        </section>
        
       <footer id="footer">
            Copyright © 2015 <a target="_blank" href="http://www.innovatechperusac.com/">InnovatechPeru</a> - Todos los derechos reservados.
                    </footer>
        
        <!-- Older IE warning message -->
        <!--[if lt IE 9]>
            <div class="ie-warning">
                <h1 class="c-white">Warning!!</h1>
                <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
                <div class="iew-container">
                    <ul class="iew-download">
                        <li>
                            <a href="http://www.google.com/chrome/">
                                <img src="img/browsers/chrome.png" alt="">
                                <div>Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.mozilla.org/en-US/firefox/new/">
                                <img src="img/browsers/firefox.png" alt="">
                                <div>Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com">
                                <img src="img/browsers/opera.png" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.apple.com/safari/">
                                <img src="img/browsers/safari.png" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                                <img src="img/browsers/ie.png" alt="">
                                <div>IE (New)</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>   
        <![endif]-->
        
        <!-- Javascript Libraries -->
        <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="vendors/bower_components/flot/jquery.flot.js"></script>
        <script src="vendors/bower_components/flot/jquery.flot.resize.js"></script>
        <script src="vendors/bower_components/flot.curvedlines/curvedLines.js"></script>
        <script src="vendors/sparklines/jquery.sparkline.min.js"></script>
        <script src="vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
        <script src="vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="vendors/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
        <script src="vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
        <script src="vendors/bower_components/jquery.nicescroll/jquery.nicescroll.min.js"></script>
        <script src="vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>
        
        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->
        
        <script src="js/flot-charts/curved-line-chart.js"></script>
        <script src="js/flot-charts/line-chart.js"></script>
        <script src="js/charts.js"></script> 
        <script src="js/functions.js"></script>
        <script src="js/demo.js"></script>
        <script type="text/javascript" src="engine1/wowslider.js"></script>
        <script type="text/javascript" src="engine1/script.js"></script>
        <?php 
         // if ($_SESSION["ingre"] == true) {
         //        ?>
                
                   <?php
         //    }
         //    $_SESSION["ingre"] = false; 
        ?>       
         <script>
//                     function lol(){
// notify('Bienvenido Administrador', 'inverse');
//                     }                                    
//                 </script> 
    </body>
 </html>