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
        <title>FareGas | Mecanico</title>

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
                    <a href="index.php">FareGas | Mecanico </a>
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
                        <li><a href="mecanico-index.php"><i class="md md-dashboard"></i> Panel de Control</a></li>
                        <li class="active"><a href="mecanico-cliente.php"><i class="md md-work"></i> Clientes</a></li>
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
                        <div class="card-header">
                            <h2>Lista de Clientes</h2>
                        </div>                       
                
                          <div class="card-header">
                            <div class="box-body table-responsive">
                            <div class="col-md-12">

                              <table id="cliente" class="table table-bordered table-striped" style="text-align:center;">
                                <thead>
                                  <tr>
                                    <th>COD CLIENTE</th>                                    
                                    <th>DNI</th>
                                    <th>FOTO</th>
                                    <th>NOMBRE</th>
                                    <th>PATERNO</th>
                                    <th>MATERNO</th>
                                    <th>TIPO</th>
                                    <th>MARCA</th>
                                    <th>MODELO</th>
                                    <!-- <th>Acción</th> -->
                                  </tr>
                                </thead>
                              </table>

                              </div><br>
                            </div><br>
                            <!-- /.box-body -->
                            <!-- <div class="box-footer">
                                <input  class="btn bgm-green waves-effect" type='submit' name='boton' value='Ingresar Nuevo Cliente' onclick="muestraformulario();">
                            </div>             -->
                         </div>

                   </div>
                   <div class="row">
                        <div class="col-sm-12"> 
                           <div class="card" id="formulariohide">
                                <div class="card-header">
                                    <h2>Nueva Revision</h2>
                                </div>
                                
                                <div class="card-body card-padding">
                                    <form role="form" id="formcliente"> 
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group fg-line">
                                                    <label for="exampleInputEmail1">COD-CLIENTE</label>
                                                    <input id="cli_cod" name="cod" required type="text" class="form-control" placeholder="Codigo de Cliente">
                                                </div>    
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group fg-line">
                                                    <label for="exampleInputEmail1">Motor</label>
                                                     <input id="rev_motor" name="mot" required type="text" class="form-control" placeholder="Estado del Motor">
                                                </div>    
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group fg-line">
                                                    <label for="exampleInputEmail1">Tubo de Escape</label>
                                                     <input id="rev_tub" name="tub" required type="text" class="form-control" placeholder="Estado del tubo de escape">
                                                </div>    
                                            </div>  
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group fg-line">
                                                    <label for="exampleInputEmail1">Bujias</label>
                                                     <input id="rev_buj" name="buj" required type="text" class="form-control" placeholder="Estado de las Bujias">
                                                </div>        
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group fg-line">
                                                    <label for="exampleInputEmail1">Bobinas</label>
                                                     <input id="rev_bob" name="bob" required type="text" class="form-control" placeholder="Estado de las Bobinas">
                                                </div>        
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group fg-line">
                                                    <label for="exampleInputEmail1">Radidador</label>
                                                     <input id="rev_rad" name="rad" required type="text" class="form-control" placeholder="Estado del Radiador">
                                                </div>        
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group fg-line">
                                                    <label for="exampleInputEmail1">Mangueras</label>
                                                     <input id="rev_man" name="man" required type="text" class="form-control" placeholder="Estado de las Mangueras">
                                                </div>        
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group fg-line">
                                                    <label for="exampleInputEmail1">Filtros</label>
                                                     <input id="rev_fil" name="fil" required type="text" class="form-control" placeholder="Estado de los filtros">
                                                </div>        
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group fg-line">
                                                    <label for="exampleInputEmail1">Check</label>
                                                     <input id="rev_check" name="check" required type="text" class="form-control" placeholder="Pasa las revisiones?">
                                                </div>        
                                            </div>
                                        </div>                            
                                        <button type="submit" onclick="CKupdate();" class="btn btn-primary btn-sm m-t-10 waves-effect">Agregar</button>
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
        <script src="js/vistaCliente.js"></script>
        <script src="js/functions.js"></script>
        <script src="js/demo.js"></script>  
        <script type="text/javascript">
          $(function () {
            $('#cliente').dataTable();
          });
        </script>    

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