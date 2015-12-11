<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Faregas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="http://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/materialize.css">
  <!-- SLIDER -->
  <link rel="stylesheet" type="text/css" href="css/navstylechange.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="css/settings.css" media="screen" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>   

  <!-- NavBar-->
  <?php include('layout/navbar.php'); ?>
    
  <!-- Slider -->
  <?php include('layout/slider.php'); ?>
  <!-- Cuerpo de Pagina -->
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <div class="col s12 s6 l6">
          <h4>Ventajas y Beneficios del Gas Natural</h4>
          <div class="divider"></div>
            <h5>Economico</h5>
            <li>Por su mejor combustión mantiene limpios los aceites y bujías, extendiendo los periodos de mantenimiento, reduciendo los costos de mantenimiento.</li>
            <li>Es 80% mas económico que la gasolina y 50% mas económico que el Diesel y el GLP.</li>
            <li>Mayor recorrido con menos combustible.</li>
            <li>Mayor rendimiento.</li>

            <h5>Ecologico</h5>
            <li>No contamina el medio ambiente.</li>
            <li>No daña la capa de ozono.</li>
            <li>No contiene compuestos de plomo e hidrocarburos aromáticos poli cíclicos.</li>
          </div>
          <div class="col s12 l6 l6">
            <h4>Nuestros Servicios</h4>
            <div class="divider"></div>
            <p>FareGas cuenta con personal altamente calificado razón por la cual nuestros servicios de conversiones a Gas GNV GLP  son de calidad y garantía.</p>
            <p>Somos la Red más grande de talleres  de conversiones a Gas GNV GLP del Perú.</p>
            <p>Nos especializamos en camionetas 4x4 , taxis y flotas vehiculares de todo  tipo. Contamos con Autorización del  MTC ,Además  de  especializarnos en  Conversiones a Gas Natural Vehicular ofrecemos venta  y servicios  adicionales de :</p>
          </div> 
        </div>
    </div>
    <div class="row">
      <div class="col s12 m12 l12">
          <div class="col s6 m6 l3">
            <img class="responsive-img" src="img/servicios/servicio_00.jpg" alt="">    
          </div>
          <div class="col s6 m6 l3">
            <img class="responsive-img" src="img/servicios/servicio_01.jpg" alt="">    
          </div>
          <div class="col s6 m6 l3">
            <img class="responsive-img" src="img/servicios/servicio_02.jpg" alt="">    
          </div>
          <div class="col s6 m6 l3">
            <img class="responsive-img" src="img/servicios/servicio_03.jpg" alt="">    
          </div>
          <div class="col s6 m6 l3">
            <img class="responsive-img" src="img/servicios/servicio_04.jpg" alt="">    
          </div>
          <div class="col s6 m6 l3">
            <img class="responsive-img" src="img/servicios/servicio_05.jpg" alt="">    
          </div>
        </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Solicitar Servicio</a>
      <!-- Modal Structure -->
      <div id="modal1" class="modal">
        <div class="modal-content">
          <h4>Solicitud de Servicio</h4>
          <form>
                <div class="input-field col s12">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="icon_prefix" type="text" class="validate">
                  <label for="icon_prefix">Nombre</label>
                </div>
                <div class="input-field col s12">
                  <i class="material-icons prefix">phone</i>
                  <input id="icon_telephone" type="tel" class="validate">
                  <label for="icon_telephone">Telefono</label>
                </div>
                <div class="input-field col s12">
                  <i class="material-icons prefix">email</i>
                  <input id="email" type="email" class="validate">
                  <label for="email" data-error="wrong" data-success="right">Email</label>
                </div>
                <div class="input-field col s12">
                  <i class="material-icons prefix">work</i>
                  <input id="email" type="email" class="validate">
                  <label for="email" data-error="wrong" data-success="right">Asunto</label>
                </div>
                <div class="input-field col s12">
                  <i class="material-icons prefix">mode_edit</i>
                  <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                  <label for="icon_prefix2">First Name</label>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <a href="#!" class=" modal-action modal-close waves-effect waves-light waves-green btn-flat">Enviar</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php include('layout/footer.php'); ?>
  <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script type="text/javascript" src="js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="js/jquery.themepunch.revolution.min.js"></script>

  <script src="js/materialize.js"></script>
  <script>
    $(".button-collapse").sideNav();

    $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
  </script>
</head>
<body>
  
</body>
</html>