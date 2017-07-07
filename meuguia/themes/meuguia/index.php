<?php
$View = new View;
$tpl_g = $View->Load('article_g');
$tpl_m = $View->Load('article_m');
$tpl_p = $View->Load('article_p');
$tpl_empresa = $View->Load('empresa_p');

$EmpLink = $Link->getData()['empresa_link'];
$Cat = $Link->getData()['empresa_cat'];
?>
  <!-- Start Slider -->
  <section id="mu-slider">
    
    <!-- Start single slider item -->
    <div class="mu-slider-single">
      <div class="mu-slider-img">
        <figure>
          <img src="<?= INCLUDE_PATH; ?>/imagens/mulher-pesquisando.jpg" alt="img">
        </figure>
      </div>
      <div class="mu-slider-content">
        
        <span></span>
        <h2>Olá amigo, o que está procurando?</h2>
        <p>Faça uma breve pesquisa eu encontre o que precisa ;).</p>
        <div class="mu-search-form">
                                <?php
                                $search = filter_input(INPUT_POST, 's', FILTER_DEFAULT);
                                if (!empty($search)):
                                    $search = strip_tags(trim(urlencode($search)));
                                    header('Location: ' . HOME . '/pesquisa/' . $search);
                                endif;
                                ?>
                                <form name="search" value="search"  action="" method="post">
                  
           
            <input class="mu-read-more" type="search" name="s" value="" placeholder="Olá, faça uma pesquisa rápida.">
             
            <input class="mu-read-more-btn" type="submit" name="sendsearch" value="Pesquisar" title="pesquisar" />
            </form>
      </div>
    </div>
    <!-- Start single slider item -->
    <!-- Start single slider item -->
  <!--   <div class="mu-slider-single">
      <div class="mu-slider-img">
        <figure>
          <img src="assets/img/slider/3.jpg" alt="img">
        </figure>
      </div>
      <div class="mu-slider-content">
        <h4>Exclusivly For Education</h4>
        <span></span>
        <h2>Education For Everyone</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor amet error eius reiciendis eum sint unde eveniet deserunt est debitis corporis temporibus recusandae accusamus.</p>
        <input type="text">
        <a href="#" class="mu-read-more-btn">Read More</a>
      </div>
    </div> -->
    <!-- Start single slider item -->    
  </section>
  <!-- End Slider -->


  <!-- Start features section -->
  <section id="mu-features">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-features-area">
            <!-- Start Title -->
            <div class="mu-title">
              <h2>Encontre o que você procura!</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio ipsa ea maxime mollitia, vitae voluptates, quod at, saepe reprehenderit totam aliquam architecto fugiat sunt animi!</p>
            </div>
            <!-- End Title -->
            <!-- Start features content -->
            <div class="mu-features-content">
              <div class="row">
                <div class="col-lg-4 col-md-4  col-sm-6">
                  <div  class="mu-single-feature">
                  <a href="<?= HOME ?>/empresas/onde-comer" title="Onde Comer" style="border: 0; "> <span class="fa fa-cutlery"></span></a>
                    <h4> <a href="<?= HOME ?>/empresas/onde-comer" title="Onde Comer" style="border: 0; font-size:14pt">Onde Comer</a></h4>
                  <p>Aqui você encontra onde comer bem, encontre aqui restaurantes, churrascarias, pizzarias, self-service e muito mais...</p>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                  <div class="mu-single-feature">
                     <a href="<?= HOME ?>/empresas/onde-ficar" title="Onde Ficar" style="border: 0;"><span class="fa fa-hotel"></span></a>
                    <h4> <a href="<?= HOME ?>/empresas/onde-ficar" title="Onde Ficar" style="border: 0; font-size:14pt">Onde Ficar</a></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus non dolorem excepturi libero itaque sint labore similique maxime natus eum.</p>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                  <div class="mu-single-feature">
                    <a href="<?= HOME ?>/empresas/onde-comprar" title="Onde Comprar" style="border: 0;"><span class="fa fa-gift"></span></a>
                    <h4><a href="<?= HOME ?>/empresas/onde-comprar" title="Onde Comprar" style="border: 0; font-size:14pt">Onde Comprar</a></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus non dolorem excepturi libero itaque sint labore similique maxime natus eum.</p>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                  <div class="mu-single-feature">
                   <a href="<?= HOME ?>/empresas/onde-se-divertir" title="Onde se divertir" style="border: 0; "> <span class="fa fa-music"></span></a>
                    <h4><a href="<?= HOME ?>/empresas/onde-se-divertir" title="Onde se divertir" style="border: 0; font-size:14pt">Onde se divertir</a></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus non dolorem excepturi libero itaque sint labore similique maxime natus eum.</p>
                   
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                  <div class="mu-single-feature">
                     <a href="<?= HOME ?>/empresas/onde-se-embelezar" title="Onde se embelezar" style="border: 0;"> <span class="fa fa-smile-o"></span></a>
                    <h4>  <a href="<?= HOME ?>/empresas/onde-se-embelezar" title="Onde se embelezar" style="border: 0; font-size:14pt">Saúde e Beleza</a></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus non dolorem excepturi libero itaque sint labore similique maxime natus eum.</p>
                                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                  <div class="mu-single-feature">
                      <a href="<?= HOME ?>/empresas/outros" title="Outros" style="border: 0;"><span class="fa fa-camera"></span></a>
                     <h4>  <a href="<?= HOME ?>/empresas/outros" title="Outros" style="border: 0; font-size:14pt">Turismo e Lazer</a></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus non dolorem excepturi libero itaque sint labore similique maxime natus eum.</p>
                 
                  </div>
                </div>
              </div>
            </div>
            <!-- End features content -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End features section -->
  <!-- Start our teacher -->
  <section id="mu-our-teacher" class="cor">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-our-teacher-area">
            <!-- begain title -->
            <div class="mu-title">
              <h2>Publicidde</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, repudiandae, suscipit repellat minus molestiae ea.</p>
            </div>
            

         
            <!-- end title -->
            <!-- begain our teacher content -->
            <div class="mu-our-teacher-content">
              <div class="row">
                  <?php for($i = 0; $i <= 3; $i++ ): ?>
             
            
                <div class="col-lg-3 col-md-3  col-sm-6">
                  <div class="mu-our-teacher-single">
                    <figure class="mu-our-teacher-img">
                       <img title="#empresa_title#" src="<?= INCLUDE_PATH; ?>/imagens/banner-publicidade.png" alt="#">
                      
                    </figure>                    
                  
                    </div>
                  </div>
            
              <?php endfor; ?>
                 
              </div>
            </div> 
            <!-- End our teacher content -->           
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End our teacher -->

 <?php
            //OBJETO READ
            $read = new Read;

            //VISITAS DO SITE
            $read->FullRead("SELECT SUM(siteviews_views) AS views FROM ws_siteviews");
            $Views = $read->getResult()[0]['views'];
            substr($Views, 0, 4);

            //USUÁRIOS
            $read->FullRead("SELECT SUM(siteviews_users) AS users FROM ws_siteviews");
            $Users = $read->getResult()[0]['users'];

            //PAGEVIEWS
            $read->FullRead("SELECT SUM(siteviews_pages) AS pages FROM ws_siteviews");
            $ResPages = $read->getResult()[0]['pages'];
            $Pages = substr($ResPages / $Users, 0, 4);

            //POSTS
            $read->ExeRead("ws_posts");
            $Posts = $read->getRowCount();

            //EMPRESAS
            $read->ExeRead("app_empresas");
            $Empresas = $read->getRowCount();
            ?>

         

  <!-- Start about us counter -->
  <section id="mu-abtus-counter">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-abtus-counter-area">
            <div class="row">
              <!-- Start counter item -->
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="mu-abtus-counter-single">
                  <span class="fa fa-building-o"></span>
                  <h4 class="counter"><?= $Empresas; ?></h4>
                  <p>Empresas</p>
                </div>
              </div>
              <!-- End counter item -->
              <!-- Start counter item -->
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="mu-abtus-counter-single">
                  <span class="fa fa-file-text"></span>
                  <h4 class="counter"><?= $Posts; ?></h4>
                  <p>Noticias</p>
                </div>
              </div>
              <!-- End counter item -->
              <!-- Start counter item -->
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="mu-abtus-counter-single">
                  <span class="fa fa-users"></span>
                  <h4 class="counter"><?= $Views; ?></h4>
                  <p>Visualizações</p>
                </div>
              </div>
              <!-- End counter item -->
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End about us counter -->

  <!-- Start about us -->
  <section id="mu-about-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-about-us-area"> 
            <div class="mu-title">
                <h2>Noticias</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, repudiandae, suscipit repellat minus molestiae ea.</p>
              </div>          
            <div class="row">
             
                <?php
                  $cat = Check::CatByName('noticias');
                  $post = new Read;
                  $post->ExeRead("ws_posts", "WHERE post_status = 1 AND (post_cat_parent = :cat OR post_category = :cat) ORDER BY post_date DESC LIMIT :limit OFFSET :offset", "cat={$cat}&limit=1&offset=0");
                 
                  $post->setPlaces("cat={$cat}&limit=1&offset=0");
                  if (!$post->getResult()):
                      WSErro("Desculpe, não existe uma noticia destaque para ser exibida agora. Favor, volte mais tarde!", WS_INFOR);
                  else:
                      $new = $post->getResult()[0];
                      $new['post_title'] = Check::Words($new['post_title'], 12);
                      $new['post_content'] = Check::Words($new['post_content'], 38);
                      $new['datetime'] = date('Y-m-d', strtotime($new['post_date']));
                      $new['pubdate'] = date('d/m/Y H:i', strtotime($new['post_date']));
                      $View->Show($new, $tpl_g);
                  endif;
               ?>        
       
            </div>
          </div>
        </div>

      </div>
      
     <div class="col-md-12">
          <div class="mu-our-teacher-area">
            <!-- begain title -->
            <div class="mu-title">
              <h2 style="margin:50px">Mais Noticias</h2>
              
            </div>
            <!-- end title -->
            <!-- begain our teacher content -->
            <div class="mu-our-teacher">
              <div class="row">
              <?php
                $post->setPlaces("cat={$cat}&limit=3&offset=1");
                if (!$post->getResult()):
                    WSErro("Desculpe, não temos mais noticias para serem exibidas aqui. Favor, Volte depois!", WS_INFOR);
                else:
                    foreach ($post->getResult() as $news):
                        $news['post_title'] = Check::Words($news['post_title'], 12);
                      $news['post_content'] = Check::Words($new['post_content'], 30);
                        $news['datetime'] = date('Y-m-d', strtotime($news['post_date']));
                        $news['pubdate'] = date('d/m/Y H:i', strtotime($news['post_date']));
                        $View->Show($news, $tpl_m);
                    endforeach;
                endif;
                ?>
              </div>
            </div> 
            <!-- End our teacher content -->           
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- End about us -->

 
  
