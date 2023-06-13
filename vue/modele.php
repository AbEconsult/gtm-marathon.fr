<? echo "je ne rentre pas ici " ?>

<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />


<head>
    <meta charset="UTF-8" />
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <title>Marathon - Welcome!</title>

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
<<header>
    <?= $menu; ?>
    </header>

    <main>
        <?php //if (!empty($action)) { ?>
            <h1><? //$titre; ?></h1>
        <?php //} ?>
        <?php if (!isset($_SESSION['email'])) { ?>
            <h1><? $titre; ?></h1>
        <?php }else{ $titre="Page Introuvable";} ?>
        
        <?php if (!isset($_SESSION['email'])) { ?>
            <h1><? $contenu; ?></h1>
        <?php }else{ $contenu=" ";} ?>

        <?php //if (!empty($action)) {
        //echo $contenu;
        //} ?>

    </main>
    <?
    // if (isset($_SESSION['email'])) {
    //     if ($action === 'detailMission' || $action === 'delMission' || $action === 'MAJupdMission') { ?>
    <!-- //         <br><br> -->
    <!-- //         <a href="accueil" class="href" id="retour">Retour - liste Missions</a><br> -->
    <?php //} 
    // } ?>
      
    <footer><?php require_once "Vue/view_footer.php" ?></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>