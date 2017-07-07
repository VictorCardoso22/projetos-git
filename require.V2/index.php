<?php
ob_start();
require('./_app/Config.inc.php');
$sessao = new Session;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta content="Require" name="author">
        <meta content="#fdbd53" name="theme-color">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
       
    
        <?php include_once('./_app/Analytics/analyticstracking.php'); ?>
        <!--[if lt IE 9]>
            <script src="../../_cdn/html5.js"></script>
        <![endif]-->    

        <?php
        $Link = new Link;
        $Link->getTags();
        ?>
            

       
       <link rel="stylesheet" href="<?= INCLUDE_PATH; ?>/css/reset.css"> 
        <link rel="stylesheet" href="<?= INCLUDE_PATH; ?>/css/estilo.css">
        <link rel="stylesheet" href="<?= INCLUDE_PATH; ?>/css/bootstrap.css"> 
        <link href="<?= INCLUDE_PATH; ?>/css/main.css" rel="stylesheet">


            <!-- Startup CSS -->
        <link href="<?= INCLUDE_PATH; ?>/css/startup.css" rel="stylesheet">
        <script src="<?= INCLUDE_PATH; ?>/_cdn/pace.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Baumans' rel='stylesheet' type='text/css'>
        
        <link rel="shortcut icon" href="<?= INCLUDE_PATH; ?>/images/fav.ico" >

    </head>
    <body title="Require - Desenvolvimento Web">
        
        <!-- Google Tag Manager -->
        <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-MT4G57"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MT4G57');</script>
        <!-- End Google Tag Manager -->

        <?php
        require(REQUIRE_PATH . '/inc/header.inc.php');


        if (!require ($Link->getPatch())):
            WSErro('Erro ao incluir arquivo de navegação!', WS_ERROR, true);

        endif;

        require(REQUIRE_PATH . '/inc/footer.inc.php');
        ?>


       <script type="text/javascript" src="<?= INCLUDE_PATH; ?>/_cdn/jquery.js"></script> 
       <!-- <script type="text/javascript" src="<?= INCLUDE_PATH; ?>/_cdn/bootstrap/bootstrap.min.js"></script>  -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="<?= INCLUDE_PATH; ?>/_cdn/js/jquery.prettyPhoto.js"></script>
    <script src="<?= INCLUDE_PATH; ?>/_cdn/js/jquery.isotope.min.js"></script>   
    <script src="<?= INCLUDE_PATH; ?>/_cdn/js/wow.min.js"></script>
    <script src="<?= INCLUDE_PATH; ?>/_cdn/js/main.js"></script>
   
     
                <!-- JS and analytics only. --> 
<!-- Bootstrap core JavaScript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
        <script src="<?= INCLUDE_PATH; ?>/_cdn/easing.js"></script> 
        <script src="<?= INCLUDE_PATH; ?>/_cdn/typer.js"></script> 
        <script src="<?= INCLUDE_PATH; ?>/_cd/nicescroll.js"></script> 
        <script src="<?= INCLUDE_PATH; ?>/_cdn/ketchup.all.js"></script> 


<!-- Typer --> 

<script>
    $(function () {
      $('[data-typer-targets]').typer();
    });
  </script> 

<!-- Scroll to Explore --> 

<script>


 $(function() {
    $('.scrollto, .gototop').bind('click',function(event){
         var $anchor = $(this);
         $('html, body').stop().animate({
         scrollTop: $($anchor.attr('href')).offset().top
          }, 1500,'easeInOutExpo');
     event.preventDefault();
      });
  });
        

</script>


<!--============== SUBSCRIBE FORM =================--> 

<script>
$(document).ready(function() {
    $('#subscribeForm').ketchup().submit(function() {
        if ($(this).ketchup('isValid')) {
            var action = $(this).attr('action');
            $.ajax({
                url: action,
                type: 'POST',
                data: {
                    email: $('#address').val()
                },
                success: function(data){
                    $('#result').html(data);
                },
                error: function() {
                    $('#result').html('Sorry, an error occurred.');
                }
            });
        }
        return false;
    });
});
</script> 

      
   
    </body>
</html><!--NzY0NA==-->
<?php
ob_end_flush();