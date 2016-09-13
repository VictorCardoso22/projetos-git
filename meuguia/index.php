<?php
ob_start();
require ('./_app/Config.inc.php');
$sessao = new Session;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Meu Guia| Home</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= INCLUDE_PATH; ?>/assets/img/favicon.ico" type="image/x-icon">

    <!-- Font awesome -->
    <link href="<?= INCLUDE_PATH; ?>/assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="<?= INCLUDE_PATH; ?>/assets/css/bootstrap.css" rel="stylesheet">   
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="<?= INCLUDE_PATH; ?>/assets/css/slick.css">          
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="<?= INCLUDE_PATH; ?>/assets/css/jquery.fancybox.css" type="text/css" media="screen" /> 
    <!-- Theme color -->
    <link id="switcher" href="<?= INCLUDE_PATH; ?>/assets/css/theme-color/default-theme.css" rel="stylesheet">          

    <!-- Main style sheet -->
    <link href="<?= INCLUDE_PATH; ?>/assets/css/style.css" rel="stylesheet">    

   
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php
        $Link = new Link;
        $Link->getTags();
     ?>

  </head>
  <body> 

        <?php
        require(REQUIRE_PATH . '/inc/header.inc.php');

        if (!require ($Link->getPatch())):
            WSErro('Erro ao incluir arquivo de navegação!', WS_ERROR, true);

        endif;


        require(REQUIRE_PATH . '/inc/footer.inc.php');
        ?>

    </body>

  <!-- jQuery library -->
  <script src="<?= INCLUDE_PATH ?>/assets/js/jquery.min.js"></script>  
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?= INCLUDE_PATH ?>/assets/js/bootstrap.js"></script>   
  <!-- Slick slider -->
  <script type="text/javascript" src="<?= INCLUDE_PATH ?>/assets/js/slick.js"></script>
  <!-- Counter -->
  <script type="text/javascript" src="<?= INCLUDE_PATH ?>/assets/js/waypoints.js"></script>
  <script type="text/javascript" src="<?= INCLUDE_PATH ?>/assets/js/jquery.counterup.js"></script>  
  <!-- Mixit slider -->
  <script type="text/javascript" src="<?= INCLUDE_PATH ?>/assets/js/jquery.mixitup.js"></script>
  <!-- Add fancyBox -->        
  <script type="text/javascript" src="<?= INCLUDE_PATH ?>/assets/js/jquery.fancybox.pack.js"></script>
  
  
  <!-- Custom js -->
  <script src="<?= INCLUDE_PATH ?>/assets/js/custom.js"></script> 


</html><!--NzY0NA==-->
<?php
ob_end_flush();