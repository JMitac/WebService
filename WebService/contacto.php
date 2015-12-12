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
    <h4>Contacto</h4>                
    <div class="row">
      <div class="col s12 m7 l12"><!-- .s MOBILE .m TABLET .l DESKTOP-->
        <div class="row">
          <form id="contact-form" role="form" class="col s12 m12 l6" method="post">
            <div class="row">
              <div class="input-field col s12 m12 l12">
                <i class="mdi-action-account-circle prefix"></i>
                <input id="contact-name" name="name" type="text" class="validate" placeholer="Escribe tu nombre.."><!--required-->
                <label for="first_name contact-name">Nombre</label>
              </div>                                    
            </div>
            <div class="row">
              <div class="input-field col s12 m12 l12">
                <i class="mdi-communication-email prefix"></i>
                <input id="contact-email" type="email" name="email" class="validate" required>
                <label for="email contact-email">E-Mail</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m12 l12">
                <i class="mdi-communication-phone prefix"></i>
                <input id="tel telefono contact-telefono" name="telefono" type="tel" class="validate" required>
                <label for="telephone contact-telefono">Telefono</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m12 l12">
                <i class="mdi-communication-comment prefix"></i>
                <textarea id="mensaje contact-message" name="message" class="materialize-textarea" required></textarea>
                <label for="mensaje contact-message">Mensaje</label>
              </div>
            </div>
            <input  type="submit"  value="Enviar" class="btn btn-default" />
          </form>
          <div class="col s12  m12 l6">
            <br>
            <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d12511.39830197604!2d-76.99209999731154!3d-11.968470615737028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x9105c56829b64db3%3A0x8ae40ea9849c2f7e!2sSan+Mart%C3%ADn!3m2!1d-11.9746191!2d-76.99986129999999!4m5!1s0x9105c54803283327%3A0x51cbde03e4d3cc74!2sBay%C3%B3var%2C+Av.+Pr%C3%B3ceres+de+la+independencia%2C+San+Juan+de+Lurigancho!3m2!1d-11.9597841!2d-76.98751539999999!5e0!3m2!1ses!2spe!4v1443715459540" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <?php include('layout/footer.php'); ?>
  <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script type="text/javascript" src="js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="js/jquery.themepunch.revolution.min.js"></script>
    <script src="js/email.js"></script>
    <script src="js/materialize.js"></script>
    <script>
      $(".button-collapse").sideNav();
    </script>
</head>
<body>
  
</body>
</html>