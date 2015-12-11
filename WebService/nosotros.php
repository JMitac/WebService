<?php 
  require_once 'php/controller/web.controller.php';
  $controller = new webController();
  $lista_nosotros = call_user_func(array($controller,'lista_nosotros'));
?>
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
    <div class="row"><br>
      <div class="col s12 m12 l6"><!--Mobile, tablet, desktop -->
        <h4>Nosotros</h4>
        <div class="divider"></div>
          <?php foreach ($lista_nosotros as $row) { ?>
            <p> <?php echo $row->cue ?> </p>  
          <?php } ?>
      </div>
      <div class="col s12 m12 l6"><!--Mobile, tablet, desktop -->
        <img class="responsive-img" src="img/ingeniera_en_petroleo.jpg" width="100%" alt="">
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