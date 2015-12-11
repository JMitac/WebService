<?php
session_start(); 
if (isset($_SESSION["access"])){
  if($_SESSION["access"] != true){
    header('Location: login.php');
  }
}else{
    header('Location: login.php');
}
if($_SESSION["rol"] != 'S'){
    header('Location: php/controller/login.controller.php?salir=exit');
}

if(isset($_SESSION["misvis"])){/*PREGUNTA SI EXISTE LA SESSION*/
    $misvis = $_SESSION["misvis"];/*IGUAL LA SESION A LA VARIABLE misvis*/
    unset($_SESSION["misvis"]);/*Y BORRAS LA SESSION*/
}else{
    header('Location: php/controller/mision.controller.php?op=1');/*CASO CONTRARIO REDIRECCIONAS AL CONTROLLADOR PARA CREAR UNA SESION*/
}

?>



<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FareGas | Mision</title>

        <!-- Vendor CSS -->
        <link href="vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
        <link href="vendors/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
        <link href="vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="vendors/bower_components/sweetalert/dist/sweetalert-override.min.css" rel="stylesheet">
        <link href="vendors/bower_components/material-design-iconic-font/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="vendors/socicon/socicon.min.css" rel="stylesheet">            
        <!-- CSS -->
        <link href="css/app.min.1.css" rel="stylesheet">
        <link href="css/app.min.2.css" rel="stylesheet">

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
                        <li><a href="admin-index.php"><i class="md md-dashboard"></i> Panel de Control</a></li>
                        <li class="active"><a href="admin-mision.php"><i class="md md-work"></i> Mision</a></li>                        
                        <li><a href="admin-nosotros.php"><i class="md md-people"></i> Nosotros</a></li>
                        <li><a href="admin-servicios.php"><i class="md md-notifications"></i>Servicios</a></li>
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
       <!--             <div class="card">
                        <div class="card-header">
                            <h2>Mantenimiento de la Mision</h2>
                        </div>                       
                
                          <div class="card-header">
                            <div class="box-body table-responsive">
                              <table id="example1" class="table table-bordered table-striped" style="text-align:center;">
                                <thead>
                                  <tr>
                                    <th>Código</th>
                                    <th>Nombres</th>
                                    <th>Descripción</th>
                                    <th>Acción</th>
                                  </tr>
                                </thead>

                                
                              </table><br>
                            </div><br>
                             /.box-body 
                             <div class="box-footer">
                                   <input  class="btn bgm-green waves-effect" type='submit' name='boton' value='Ingresar Nuevo' onclick="muestraformulario();">
                                   </div>            
                         </div>

                   </div>   -->
                   <div class="row">
                        <div class="col-sm-12"> 
                           <div class="card" id="">
                                <div class="card-header">
                                    <h2>Modificar Mision/Vision</h2>
                                </div>
                                
                                <div class="card-body card-padding">
                                    <form role="form" id="formMisi">
                                    <!--
                                        <div class="form-group fg-line">
                                            <label for="exampleInputEmail1">Título del Producto</label>
                                             <input name="titu" required type="text" class="form-control" placeholder="Nombre">
                                        </div>
                                    -->
                                        <div class="form-group fg-line">
                                            <label for="exampleInputEmail1">Descripción Mision/Vision</label>
                                            <div class="fg-line">
                                            <textarea name="cuerpo" required id="editor1" class="ckeditor form-control" rows="10" cols="80">
                                                <?php echo $misvis[0]->cue; ?><!--VOY A PEDIR EL NOMBRE DE LA COLUMNA: cue -->
                                            </textarea>                                                   
                                            </div>                                    
                                        </div>
                                        <!--
                                        <div class="form-group fg-line">
                                            <label for="exampleInputEmail1">Imagen Producto</label>
                                             <input name="img" required type="file" class="form-control" placeholder="Nombre">
                                        </div>                                
                                        -->
                                        <button type="submit" onclick="CKupdate();" class="btn btn-primary btn-sm m-t-10 waves-effect">Modificar</button>
                                        <a onclick="ocultaformulario();"  class="btn btn-danger btn-sm m-t-10 waves-effect">Cancelar</a>
                                    </form>
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
        <script src="vendors/ckeditor/ckeditor.js"></script>
        <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> 
        <script src="vendors/bower_components/jquery.nicescroll/jquery.nicescroll.min.js"></script>
        <script src="vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>
        <script src="vendors/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="vendors/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="vendors/jqvalidation/jquery.validate.js"></script>
        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->
        <script src="js/mision.js"></script>
        <script src="js/functions.js"></script>
        <script src="js/demo.js"></script>       
        <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>
    </body>
 </html>