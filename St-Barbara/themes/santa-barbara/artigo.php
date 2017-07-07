<?php
require_once('_app/Config.inc.php');
if ($Link->getData()):
    extract($Link->getData());
else:
    header('Location: ' . HOME . DIRECTORY_SEPARATOR . '404');
endif;
?>	
		<section class="content blog">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
						<div class="blog_single">
							<article class="post">
								<figure class="post_img">
                                 
                   
                                     <?= Check::Image('uploads' . DIRECTORY_SEPARATOR . $post_cover, $post_title, 578); ?>
                    									
								</figure>
								
								<div class="post_content">
									<div class="post_meta">
										<h1><?= $post_title; ?></h1>
										<div class="metaInfo">
											<span><i class="fa fa-calendar"></i> <time datetime="<?= date('Y-m-d', strtotime($post_date)); ?>" pubdate>Enviada em: <?= date('d/m/Y H:i', strtotime($post_date)); ?>Hs</time> </span>
											
										</div>
									</div>
									<p><?= $post_content; ?></p>
									
                              <?php
                                $readGb = new Read;
                                $readGb->ExeRead("ws_posts_gallery", "WHERE post_id = :postid ORDER BY gallery_date DESC", "postid={$post_id}");
                                if ($readGb->getResult()):
                                    ?>
                                    <section>
                                        <hgroup>
                                            <h3>
                                                GALERIA:
                                                <p class="tagline">Veja fotos em <mark><?= $post_title; ?></mark></p>
                                            </h3>
                                        </hgroup>

                                          <div class="widget_content ">
                                                    <div class="flickr"> -->
                                                        <ul class="flickr-feed">
                                            <?php
                                            $gb = 0;
                                            foreach ($readGb->getResult() as $gallery):
                                                $gb++;
                                                extract($gallery);
                                                ?>
                              
                                                             <li>
                                                                <a class="mfp-gallery" href="../uploads/<?= $gallery_image; ?>" class="hover-zoom mfp-image" > <div class="hover"></div><i class="fa fa-search"></i><?= Check::Image('uploads' . DIRECTORY_SEPARATOR . $gallery_image, "Imagem {$gb}  do post {$post_title}", 120, 80); ?>

                                                                <button title="Close (Esc)" type="button" class="mfp-close"></button>
                                                                <button title="Previous (Left arrow key)" type="button" class="mfp-arrow mfp-arrow-left mfp-prevent-close"></button></a>
                                                               
                                                                <img src="../uploads/<?= $gallery_image; ?>" alt="{$gb}">
                                                            </li>
                                                       
                                                <?php
                                            endforeach;
                                            ?>


                                     </ul>
                                                    </div>
                                                </div>
                                    </section>
                                <?php endif; ?>
								


                                       
								</div>

								<ul class="shares">
									<li class="shareslabel"><h3>Compartilhe</h3></li>
									
									<li><a class="facebook" onclick="return !window.open(this.href, 'Facebook', 'width=640,height=300')" href="https://www.facebook.com/sharer/sharer.php?u=<?= HOME ?>/artigo/<?= $post_name; ?>" target="_blank" rel="nofollow" ></a></li>
									
								</ul>
							</article>
					</div>
                </div>
                <?php require(REQUIRE_PATH . '/inc/sidebar.inc.php'); ?>
            </div>
        </div>		

     <!--RELACIONADOS-->
       