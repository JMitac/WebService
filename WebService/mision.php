<?php 
  require_once 'php/controller/web.controller.php';
  $controller = new webController();
  $lista_mision = call_user_func(array($controller,'lista_mision'));
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
    <div class="row">
      <div class="col s12 m12  l12">
        <h4>Mision</h4>
        <div class="divider"></div>
          <?php foreach ($lista_mision as $row) { ?>
            <p> <?php echo $row->cue ?> </p>  
          <?php } ?>
        
        <!-- <p>Como empresa que brinda la seguridad de conformidad según ley deseamos convertirnos en la  entidad certificadora más grande del País
           en cuando a Conversiones de GLP y contar con diversas sedes en todas las regiones del país para poder tener una gran diversidad de clientes
            y la completa satisfacción de los mismos</p> -->
        <img class="responsive-img" src="img/mision-vision.png" alt="">     
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