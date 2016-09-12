<?php
require_once('_app/Config.inc.php');
if ($Link->getData()):
    extract($Link->getData());
else:
    header('Location: ' . HOME . DIRECTORY_SEPARATOR . '404');
endif;
?>
<!--HOME CONTENT-->
<!-- End breadcrumb -->
 <section id="mu-course-content">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">
              <div class="col-md-9">
                <!-- start course content container -->
                <div class="mu-course-container mu-course-details">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="mu-latest-course-single">
                        <figure class="mu-latest-course-img">
                          <?= Check::Image('uploads' . DIRECTORY_SEPARATOR . $post_cover, $post_title, 578); ?>
                          <figcaption class="mu-latest-course-imgcaption">
                           
                            <span><i class="fa fa-clock-o"></i><time datetime="<?= date('Y-m-d', strtotime($post_date)); ?>" pubdate>Enviada em: <?= date('d/m/Y H:i', strtotime($post_date)); ?>Hs</time></span>
                          </figcaption>
                        </figure>
                        <div class="mu-latest-course-single-content">


                    <h2><?= $post_title; ?></h2>
                    <p><?= $post_content; ?></p>
             
        </div>
                        </div>
                      </div> 
                    </div>                                   
                  </div>
                </div>

                <div class="col-md-3">
                <!-- start sidebar -->
                <aside class="mu-sidebar">
                  <!-- start single sidebar -->
                  
                  <!-- start single sidebar -->
                  <div class="mu-single-sidebar">
                    <h3>Veja também:</h3>
                    <div class="mu-sidebar-popular-courses">
                      
                <?php
                $readMore = new Read;
                $readMore->ExeRead("ws_posts", "WHERE post_status = 1 AND post_id != :id AND post_category = :cat ORDER BY rand() LIMIT 3", "id={$post_id}&cat={$post_category}");
                if ($readMore->getResult()):
                    $View = new View;
                    $tpl_p = $View->Load('article_p');
                    ?>
                    
                       
                        <?php
                        foreach ($readMore->getResult() as $more):
                            $more['datetime'] = date('Y-m-d', strtotime($more['post_date']));
                            $more['pubdate'] = date('d/m/Y H:i', strtotime($more['post_date']));
                            $more['post_content'] = Check::Words($more['post_content'], 20);
                            $more['post_title'] = Check::Words($more['post_title'], 7);

                            $View->Show($more, $tpl_p);
                        endforeach;
                        ?>
               
                    
                <?php
            endif;
            ?>
                     
                    </div>
                  </div>

                  <div class="mu-single-sidebar">
                    <h3>Últimas Atualizações:</h3>
                    <div class="mu-sidebar-popular-courses">
                  <!-- end single sidebar -->

                 
        <?php
        $Side = new Read;
        $Side->ExeRead("ws_posts", "WHERE post_status = 1 AND post_id != :side ORDER BY post_date DESC LIMIT 3", "side={$post_id}");
        if ($Side->getResult()):
            foreach ($Side->getResult() as $last):
                $last['datetime'] = date('Y-m-d', strtotime($last['post_date']));
                $last['pubdate'] = date('d/m/Y H:i', strtotime($last['post_date']));
                $last['post_title'] = Check::Words($last['post_title'], 7);

                $View->Show($last, $tpl_p);
            endforeach;
        endif;
        ?>

        </div>
        </div>

                 
                </aside>
                <!-- / end sidebar -->
             </div>
           </div>
           </div>
           </div>
           </div>
           </div>
           </section>
           