<?php
ob_start();
require ('./_app/Config.inc.php');
$sessao = new Session;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
    
        <!--[if lt IE 9]>
            <script src="../../_cdn/html5.js"></script>
         <![endif]-->    
        <meta content="Require" name="author">
        <meta content="#04b0f0" name="theme-color">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">


        <link rel="shortcut icon" href="<?= INCLUDE_PATH; ?>/imagens/fav.ico" >

         <?php include_once('./_app/Analytics/analyticstracking.php'); ?>
        <?php
        $Link = new Link;
        $Link->getTags();
        ?>


         <link href="<?= INCLUDE_PATH; ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    
        <!-- Custom CSS -->
        <link href="<?= INCLUDE_PATH; ?>/css/style.css" rel="stylesheet">
        
        <!-- Custom Fonts -->
        <link href="<?= INCLUDE_PATH; ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        
        <!-- Owl Carousel Assets -->
        <link href="<?= INCLUDE_PATH; ?>/owl-carousel/owl.carousel.css" rel="stylesheet">
        <link href="owl-carousel/owl.theme.css" rel="stylesheet">
        
        <!-- jQuery and Modernizr-->
        <script src="<?= HOME; ?>/js/jquery-2.1.1.js"></script>

         <!-- Bootstrap -->
        <link href="<?= INCLUDE_PATH; ?>/css/main.css" rel="stylesheet">
        <link href="<?= INCLUDE_PATH; ?>/css/responsive.css" rel="stylesheet">



 
   
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->


    <!--[if lt IE 9]> <script src="assets/js/html5shiv.js"></script> <![endif]-->
        


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


    <script src="<?= HOME ?>/_cdn/jquery.js"></script>
    <script src="<?= HOME ?>/_cdn/bootstrap.min.js"></script>
    <script src="<?= HOME ?>/_cdn/agency.js"></script>
    <script src="<?= HOME ?>/_cdn/jquery.easing.min.js"></script>
    <script src="<?= HOME ?>/_cdn/classie.js"></script>
    <script src="<?= HOME ?>/_cnd/cbpAnimatedHeader.js"></script>

  
    <script src="<?= HOME ?>/_cdn/jcycle.js"></script>
    <script src="<?= HOME ?>/_cdn/jmask.js"></script>
    <script src="<?= HOME ?>/_cdn/shadowbox/shadowbox.js"></script>
    <script src="<?= HOME ?>/_cdn/_plugins.conf.js"></script>
    <script src="<?= HOME ?>/_cdn/_scripts.conf.js"></script>

    <script>
        $(function() {
            $('#nav-wrapper').height($("#nav").height());
            
            $('#nav').affix({
                offset: { top: $('#nav').offset().top }
            });
        });
    </script>
    
    <!-- carousel -->
    <script src="<?= HOME; ?>/owl-carousel/owl.carousel.js"></script>
    <script>
    $(document).ready(function() {
      $("#owl-brand").owlCarousel({
        autoPlay: 3000,
        items : 1,
        itemsDesktop : [1199,1],
        itemsDesktopSmall : [979,2],
        navigation: false,
      });
    });
    </script>
    
    <!-- Google Map -->
    <script>
        $('.maps').click(function () {
        $('.maps iframe').css("pointer-events", "auto");
    });

    $( ".maps" ).mouseleave(function() {
      $('.maps iframe').css("pointer-events", "none"); 
    });
    </script>

</html><!--NzY0NA==-->
<?php
ob_end_flush();