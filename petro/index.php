<?php
ob_start();
require ('./_app/Config.inc.php');

?>
<!DOCTYPE html>
<html lang="pt-br en">
  <head>
     <meta charset="UTF-8">
        <meta content="Require" name="author">
        <meta content="#262732" name="theme-color">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <?php include_once('./_app/Analytics/analyticstracking.php'); ?>
 
    <?php
        $Link = new Link;
        $Link->getTags();
        ?>
    <!-- Bootstrap core CSS -->
    <link href="<?= INCLUDE_PATH; ?>/css/bootstrap.css" rel="stylesheet">
    <!-- Add custom CSS here -->
    <link href="<?= INCLUDE_PATH; ?>/css/slidefolio.css" rel="stylesheet">
	<!-- Font Awesome -->
    <link href="<?= INCLUDE_PATH; ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">


    <!--ALEXIS -->
    <!-- ICON FONT -->
  <link rel="stylesheet" href="<?= INCLUDE_PATH; ?>/assets/icons/styles.css">

  <!-- Third Party CSS including Bootstrap -->
  <link rel="stylesheet" href="<?= INCLUDE_PATH; ?>/css/third-party.css">

  <!-- STYLESHEETS -->
  <link rel="stylesheet" href="<?= INCLUDE_PATH; ?>/css/styles.css">
  <link rel="stylesheet" href="<?= INCLUDE_PATH; ?>/css/responsive.css">



  
<!--StartBoot -->
   <!-- Plugin CSS -->
    <!-- <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet"> -->

    <!-- Theme CSS -->
    <link href="<?= INCLUDE_PATH; ?>/css/creative.css" rel="stylesheet">

   <!-- Theme CSS -->
    <!-- <link href="css/creative.css" rel="stylesheet"> -->

    <!-- Plugin CSS -->
    <link href="<?= INCLUDE_PATH; ?>/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

<link rel="stylesheet" href="<?= INCLUDE_PATH; ?>/js/github.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="<?= INCLUDE_PATH; ?>/js/jquery.modal.css" type="text/css" media="screen" />

<style type="text/css">
  .modal a.close-modal[class*="icon-"] {
    top: -10px;
    right: -10px;
    width: 20px;
    height: 20px;
    color: #fff;
    line-height: 1.25;
    text-align: center;
    text-decoration: none;
    text-indent: 0;
    background: #900;
    border: 2px solid #fff;
    -webkit-border-radius: 26px;
    -moz-border-radius: 26px;
    -o-border-radius: 26px;
    -ms-border-radius: 26px;
    -moz-box-shadow:    1px 1px 5px rgba(0,0,0,0.5);
    -webkit-box-shadow: 1px 1px 5px rgba(0,0,0,0.5);
    box-shadow:         1px 1px 5px rgba(0,0,0,0.5);
  }
</style>

  </head>
  <body>
 

     <?php
     $url = '';
     if(isset($_GET['url']))
        $url =  ($_GET['url'] ? $_GET['url'] : '');

       //echo $url;
      if ($url != ''){
      @require(REQUIRE_PATH . '/inc/header1.inc.php');
      $script = '';
     }else{
        @require(REQUIRE_PATH . '/inc/header.inc.php');
          
           $url =  INCLUDE_PATH;      
           $script = "<script>$.vegas('slideshow', {
              delay:10000,
              backgrounds:[
                { src:\"$url/img/4.jpg\", fade:2000 }
                 
              ]
            })('overlay', {
            src:\"$url/img/overlay.png\"
            }); </script>";
            
    
     }
        if (!require ($Link->getPatch())):
            WSErro('Erro ao incluir arquivo de navegação!', WS_ERROR, true);

        endif;


        require(REQUIRE_PATH . '/inc/footer.inc.php');
        ?>


  
    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
     <!-- jQuery -->
 


   
    <script src="<?= INCLUDE_PATH; ?>/js/jquery.js"></script>
	
	<script src="<?= INCLUDE_PATH; ?>/js/jquery.vegas.js"></script>
	<script src="<?= INCLUDE_PATH; ?>/js/jquery.mixitup.min.js"></script>
	<script src="<?= INCLUDE_PATH; ?>/js/jquery.validate.min.js"></script>
	<script src="<?= INCLUDE_PATH; ?>/js/script.js"></script>
	<script src="<?= INCLUDE_PATH; ?>/js/bootstrap.js"></script>


    <?= $script; ?>

    

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

  <script src="<?= INCLUDE_PATH; ?>/js/jquery.modal.js" type="text/javascript" charset="utf-8"></script>

  
  <script src="<?= INCLUDE_PATH; ?>/js/highlight.pack.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript" charset="utf-8"> hljs.initHighlightingOnLoad(); </script>
<!-- Mixitup : Grid -->
  <script src="<?= INCLUDE_PATH; ?>/js/jquery-scrolltofixed-min.js"></script>
   <!-- Custom JavaScript for Smooth Scrolling - Put in a custom JavaScript file to clean this up -->
    <script>
      $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
          if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
            || location.hostname == this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
              $('html,body').animate({
                scrollTop: target.offset().top
              }, 1000);
              return false;
            }
          }
        });
      });
    </script>

    <script>
		$(function(){
    $('#Grid').mixitup();
      });

    
    </script>



<!-- /Mixitup : Grid -->	

   
<!-- Navbar -->
<script type="text/javascript">
$(document).ready(function() {
        $('#nav').scrollToFixed();
  });
    </script>
<!-- /Navbar-->


   

 


  </body>

</html>