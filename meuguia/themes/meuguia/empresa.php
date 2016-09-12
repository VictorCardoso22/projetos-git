<?php
if ($Link->getData()):
    extract($Link->getData());
    $empresa_views = ($empresa_views ? $empresa_views : '0');
else:
    header('Location: ' . HOME . DIRECTORY_SEPARATOR . '404');
endif;
?>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '327387867598254',
      xfbml      : true,
      version    : 'v2.7'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<!--HOME CONTENT-->    
 <section id="mu-course-content">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">
              <div class="col-md-9">
                <!-- start course content container -->
                <div class="mu-course-container mu-blog-single">
                  <div class="row">
                    <div class="col-md-12">
                      <article class="mu-blog-single-item">
                        <figure class="mu-blog-single-img">

                          <div class="col-md-12">            
           
                           <a href="#"><?= Check::Image('uploads' . DIRECTORY_SEPARATOR . $empresa_capa, $empresa_title, 578, 300); ?></a>
                           </div>
                          
                            <figcaption class="mu-latest-course-imgcaption">

                           
                            <span><?= $empresa_views; ?> Visitas</span>
                          </figcaption>                
                        </figure>
                       

                         <div class="mu-blog-description">
                          <!-- <div class="views"><span><?= $empresa_views; ?></span></div>  -->
                                <h2><?= $empresa_title; ?></h2>
                              <h4><?= $empresa_ramo; ?></h4>
                          
                                <p>
                                 <?= $empresa_sobre; ?>
                                 </p>
                          </div>
                           <div class="mu-blog-social">
                          <ul class="mu-news-social-nav">
                            <li>SOCIAL SHARE :</li>
                            <li><a href="http://www.facebook.com/<?= $empresa_facebook; ?>" target="_blank" rel="nofollow"> <span class="fa fa-facebook"></span>Encontre</a></li>
                            <li><a href="<?= $empresa_site; ?>" target="_blank" rel="nofollow"><span class="fa fa-rss">  </span> Visite</a></li>
                            <li><a onclick="return !window.open(this.href, 'Facebook', 'width=640,height=300')" href="https://www.facebook.com/sharer/sharer.php?u=<?= HOME ?>/empresa/<?= $empresa_name; ?>" target="_blank" rel="nofollow"><span class="fa fa-share">  </span> Compartilhe</a></li>
                          
                          </ul>
                        </div>
                          <div id="fb-root"></div>



                <!-- end respond form -->
                     </article>
                     <div class="fb-comments"  data-href="http://localhost/meuguia/empresa/<?= $empresa_name; ?>" data-width="100%" data-numposts="5"></div>
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
                $readMais = new Read;
                $readMais->ExeRead("app_empresas", "WHERE empresa_status = 1 ORDER BY rand() LIMIT 5");
                if ($readMais->getResult()):
                    $View = new View;

                    $tpl = $View->Load('empresa_p');
                    foreach ($readMais->getResult() as $mais):
                        $new = $readMais->getResult()[0];
                        $new['empresa_title'] = Check::Words($new['empresa_title'], 5);
                        $View->Show($mais, $tpl);
                    endforeach;
                endif;
                ?>
                     
                    </div>
                  </div>
                  <!-- end single sidebar -->
                 
                </aside>
                <!-- / end sidebar -->
             </div>
           </div>
           </div>
           </div>
           </div>
           </div>
           </section>

       

