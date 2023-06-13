<?php
if (!isset($_SESSION)) {
  // echo "<br> (6) je test si la session est toujours active dans - login - et passe pour la 1ère fois ";
  // echo "<br> (6.a) je passe dans login - pour la 1ère fois ";
  session_start();
}
// echo "<br> (6.b) je suis dans - view_connexion - et passe pour la 1ère fois avoir été identifié";
ob_start();

?>
<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />


<head>
  <meta charset="UTF-8" />
  <meta name="robots" content="noindex">
  <meta name="googlebot" content="noindex">
  <title>GTM-Marathon - Welcome!</title>

  <style>

  </style>

  <!--Import Google Icon Font-->

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
  <link rel="stylesheet" href="/public/css/materialize.min.css" />
  <link rel="stylesheet" type="text/css" href="/public/css/app.css" />
  <link rel="stylesheet" type="text/css" href="/public/css/style.css" />

  <!--Import JQuery -->
  <script src="public/js/jquery.js"></script>

  <!-- Materialize -->
  <script src="public/js/materialize.min.js"></script>

  <!-- Select2 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  <!-- Signature Pad -->
  <script src="public/js/signature-pad.js"></script>
  <!-- Jquery Mask -->
  <script src="public/js/jquery.mask.min.js"></script>
  <!-- App -->
  <script type="text/javascript" src="public/js/app.js"></script>

</head>

<body>

  <style type="text/css">
    /****** LOGIN ******/
    .login-container {
      padding: 30px;
      max-width: 350px;
      width: 100% !important;
      background-color: #F7F7F7;
      margin: 100px auto;
      border-radius: 2px;
      box-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
      overflow: hidden;
      font-family: roboto;
    }

    .login-container h1 {
      text-align: center;
      font-size: 1.8em;
      font-family: roboto;
    }

    .input-field,
    .row {
      margin-bottom: 5px;
    }

    .checkbox-horizontal label {
      margin-right: 20px;

    }

    nav {
      background-color: white !important;
    }

    @media print and (min-resolution: 50dpi) {
      body {

        width: 100%;
      }

      nav {
        display: none;
      }

      col s12 {
        width: 50%;
      }
    }

    @media only screen and (min-width: 601px) {
      .container {
        width: 98%;
      }
    }
  </style>
  <nav>
    <?php
    // if (!isset($_SESSION)) {
      
    //   session_start();
 // }

  ?>
    <div class="nav-wrapper">
      <a href="#" data-target="slide-out" class="sidenav-trigger">
        <i class="material-icons">menu</i>
      </a>
      <a href="index.php" class="brand-logo">GTM-MARATHON</a>

      <ul id="nav-mobile" class="right hide-on-med-and-down">

        <span></span>

        <li>
          <a href="index.php" class="blue">Connexion</a>
        </li>

      </ul>
    </div>
  </nav>

  <ul id="slide-out" class="sidenav">

    <li>
      <a href="index.php" class="blue">Connexion</a>
    </li>
    </li>
  </ul>

  <form name="login" action="accueil" method="post" class="form-signin">
    <!-- <input type="hidden" name="_csrf_token" value="Qa9evAsiOEdd0uDl85M49H_OSDYA55nhtsvuYxJAEoI" /> -->
    <div class="login-container">
      <h1>Connectez-vous sur votre compte</h1><br>
      <form>
        <label for="email">Email</label>
        <input type="email" id="username" name="email" value="" required="required" />
        <label for="pwd">Mot de passe</label>
        <input type="password" id="password" name="pwd" required="required" />

        <p>
          <label>
            <input type="checkbox" id="remember_me" name="_remember_me" value="on" />
            <span>Se souvenir de moi</span>
          </label>
        </p>

        <div>
          <input type="submit" class="btn " id="_submit" name="login-btn" value="Connexion" />
        </div>

      </form>

    </div>
  </form>

  <?php if(!empty($loginError)){?>
  <div class="text-danger"><?= $loginError;?></div>
  <?php }?>
  
  <main class="container"></main>

</body>
</html>';
<?

$contenu = ob_get_clean();

require_once("vue/view_header.php");
require_once('vue/modele.php');


