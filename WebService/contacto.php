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
        <h4>Contactenos</h4>
        <div class="divider"></div>
          <div class="col s6 m6  l6">
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
          <div class="col s6 m6  l6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3902.3335068637994!2d-77.06148508518771!3d-12.020545591484751!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105cedfcd2e4023%3A0xbcd96fbde1afc71f!2ssan+martin+de+porres!5e0!3m2!1ses!2spe!4v1447564487845" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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
  </script>
</head>
<body>
  
</body>
</html>