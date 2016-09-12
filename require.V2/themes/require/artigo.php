<?php
require_once('_app/Config.inc.php');
if ($Link->getData()):
    extract($Link->getData());
else:
    header('Location: ' . HOME . DIRECTORY_SEPARATOR . '404');
endif;
?>
<!--HOME CONTENT-->

    <div class="container">


        <div class="art_content col-sm-12 col-md-8">

            <!--CABEÇALHO GERAL-->
           
                
                    <h1><?= $post_title; ?></h1>
                    <div class="img capa">
                        <!--w = 578px  [ CRIAR THUMB ]-->
                        <?= Check::Image('uploads' . DIRECTORY_SEPARATOR . $post_cover, $post_title, 578); ?>
                    </div>
                    <time datetime="<?= date('Y-m-d', strtotime($post_date)); ?>" pubdate>Enviada em: <?= date('d/m/Y H:i', strtotime($post_date)); ?>Hs</time>
             
            <!--CONTEUDO-->
            <div class="htmlchars">
                <?= $post_content; ?>

                <!--GALERIA-->
                <?php
                $readGb = new Read;
                $readGb->ExeRead("ws_posts_gallery", "WHERE post_id = :postid ORDER BY gallery_date DESC", "postid={$post_id}");
                if ($readGb->getResult()):
                    ?>
                    <section class="gallery">
                        <hgroup>
                            <h3>
                                GALERIA:
                                <p class="tagline">Veja fotos em <mark><?= $post_title; ?></mark></p>
                            </h3>
                        </hgroup>

                        <ul>
                            <?php
                            $gb = 0;
                            foreach ($readGb->getResult() as $gallery):
                                $gb++;
                                extract($gallery);
                                ?>
                                <li>
                                    <div class="img">
                                        <a href="../uploads/<?= $gallery_image; ?>" rel="shadowbox[<?= $post_id; ?>]" title="Imagem <?= $gb; ?> do post <?= $post_title; ?> ">
                                            <?= Check::Image('uploads' . DIRECTORY_SEPARATOR . $gallery_image, "Imagem {$gb}  do post {$post_title}", 120, 80); ?>
                                        </a>
                                    </div>
                                </li>
                                <?php
                            endforeach;
                            ?>


                        </ul>
                        <div class="clear"></div>
                    </section>
                <?php endif; ?>
            </div>

            <!--Comentários aqui-->

        </div><!--art content-->

        <!--SIDEBAR-->
        <?php require(REQUIRE_PATH . '/inc/sidebar.inc.php'); ?>

        <div class="clear"></div>
   </div>
 


    <div class="clear"></div>
</div><!--/ site container -->