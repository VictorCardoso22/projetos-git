<?php
ob_start();
require ('./_app/Config.inc.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	

        <?php include_once('./_app/Analytics/analyticstracking.php'); ?>
        <?php
        $Link = new Link;
        $Link->getTags();
        ?>
        
	 <link rel="stylesheet" href="<?= INCLUDE_PATH; ?>/css/reset.css">
	
	<!-- CSS FILES -->
    <link rel="stylesheet" href="<?= INCLUDE_PATH; ?>/css/bootstrap.min.css"/>
    <!-- <link rel="stylesheet" href="<?= INCLUDE_PATH; ?>/css/style-1.css"> -->
    <link rel="stylesheet" href="<?= INCLUDE_PATH; ?>/css/style.css">
     <link rel="stylesheet" href="<?= INCLUDE_PATH; ?>/css/flexslider.css"/>
    <link rel="stylesheet" type="text/css" href="<?= INCLUDE_PATH; ?>/css/style.css" media="screen" data-name="skins">
    <link rel="stylesheet" href="<?= INCLUDE_PATH; ?>/css/layout/wide.css" data-name="layout">

    <link rel="stylesheet" href="<?= INCLUDE_PATH; ?>/css/style-fraction.css"/>
    <link rel="stylesheet" href="<?= INCLUDE_PATH; ?>/css/font-awesome.css"/>
    <!-- <link rel="stylesheet" type="text/css" href="css/switcher.css" media="screen" /> -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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

    
    <script type="text/javascript" src="<?= INCLUDE_PATH ?>/js/jquery-1.10.2.min.js"></script>
    <script src="<?= INCLUDE_PATH ?>/js/bootstrap.min.js"></script>
    <script src="<?= INCLUDE_PATH ?>/js/jquery.easing.1.3.js"></script>
    <script src="<?= INCLUDE_PATH ?>/js/retina-1.1.0.min.js"></script>
    <script type="text/javascript" src="<?= INCLUDE_PATH ?>/js/jquery.cookie.js"></script> <!-- jQuery cookie -->

    
    <script src="<?= INCLUDE_PATH ?>/js/jquery.fractionslider.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="<?= INCLUDE_PATH ?>/js/jquery.smartmenus.min.js"></script>
    <script type="text/javascript" src="<?= INCLUDE_PATH ?>/js/jquery.smartmenus.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= INCLUDE_PATH ?>/js/jquery.jcarousel.js"></script>
    <script type="text/javascript" src="<?= INCLUDE_PATH ?>/js/jflickrfeed.js"></script>
    <script type="text/javascript" src="<?= INCLUDE_PATH ?>/js/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="<?= INCLUDE_PATH ?>/js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="<?= INCLUDE_PATH ?>/js/swipe.js"></script>
    <script type="text/javascript" src="<?= INCLUDE_PATH ?>/js/jquery-scrolltofixed-min.js"></script>
    <script type="text/javascript" src="<?= INCLUDE_PATH ?>/js/jquery.flexslider-min.js"></script>
   


<script src="<?= INCLUDE_PATH ?>/js/main.js"></script>


    <script>
        $('.flexslider.top_slider').flexslider({
            animation: "fade",
            controlNav: false,
            directionNav: true,
            prevText: "&larr;",
            nextText: "&rarr;"
        });
    </script>

    <!-- WARNING: Wow.js doesn't work in IE 9 or less -->
    <!--[if gte IE 9 | !IE ]><!-->
        <script type="text/javascript" src="<?= INCLUDE_PATH ?>/js/wow.min.js"></script>
        <script>
            // WOW Animation
            new WOW().init();
        </script>
    <![endif]-->


</html><!--NzY0NA==-->
<?php
ob_end_flush();
