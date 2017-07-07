<?php
require_once('_app/Config.inc.php');
if ($Link->getData()):
    extract($Link->getData());
else:
    header('Location: ' . HOME . DIRECTORY_SEPARATOR . '404');
endif;
?>	
<div class="container">
        <div class="single-project">

            <!-- START EDITING FROM HERE -->
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="project-image"><?= Check::Image('uploads' . DIRECTORY_SEPARATOR . $post_cover, $post_title, 578, 380); ?></div>
                    </div>
                                        <div class="col-lg-6 col-md-6 text-left">
                        <h4 style="text-transform: capitalize;"><?= $post_title; ?></h4>
                        <p>
                            <?= $post_content; ?>
                        </p>
                        <ul class="project-details-list">
                        <li><span class="dark-text">Data: </span>  <?= date('d/m/Y H:i', strtotime($post_date)); ?>Hs<span class="extra-small-text"></span></li>
                       
                    </ul>
                    </div>
                </div>

        </div>
    </div>
	

                              <?php
                                $readGb = new Read;
                                $readGb->ExeRead("ws_posts_gallery", "WHERE post_id = :postid ORDER BY gallery_date DESC", "postid={$post_id}");
                                if ($readGb->getResult()):
                                    ?>
                                    <section>
                                        <hgroup>
                                            <h3>
                                                GALERIA:
                                                <p class="tagline">Veja fotos de <mark><?= $post_title; ?></mark></p>
                                            </h3>
                                        </hgroup>
 <section class="container" >
        <div class="">
            <div class="row no-gutter popup-gallery">
                                            <?php
                                            $gb = 0;
                                            foreach ($readGb->getResult() as $gallery):
                                                $gb++;
                                                extract($gallery);
                                                ?>
                              
                              <div class="col-lg-3 col-sm-4">
                                  <a href="../uploads/<?= $gallery_image; ?>" class="portfolio-box">

                                <div class="portfolio-img">
                                  <img src="../uploads/<?= $gallery_image; ?>" class="img-responsiva" alt="{$gb}">
                                </div>  
                                  </a>
                                </div>
                            
                                                         
                                                       
                                                <?php
                                            endforeach;
                                            ?>


                                 </div>
        </div>
    </section>
                                <?php endif; ?>
								


                                       
								<article>

								<ul class="shares">
									<li class="shareslabel"><h3>Compartilhe</h3></li>
									
									<li><a class="facebook" onclick="return !window.open(this.href, 'Facebook', 'width=640,height=300')" href="https://www.facebook.com/sharer/sharer.php?u=<?= HOME ?>/artigo/<?= $post_name; ?>" target="_blank" rel="nofollow" >Facebook</a></li>
									
								</ul>
							 </article>
     <section>
   <div class="container">
						  

     <!--RELACIONADOS-->
 
   <script src="<?= INCLUDE_PATH; ?>/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= INCLUDE_PATH; ?>/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- =========================
     JS SCRIPTS
    ============================== -->
  
   <!-- jQuery -->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->

    <!-- Bootstrap Core JavaScript -->
    <!-- <script src="vendor/bootstrap/js/bootstrap.min.js"></script> -->

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="<?= INCLUDE_PATH; ?>/vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="<?= INCLUDE_PATH; ?>/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

 <!-- Theme JavaScript -->
    <script src="<?= INCLUDE_PATH; ?>/js/creative.min.js"></script>