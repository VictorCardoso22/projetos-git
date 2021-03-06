

  <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>      
    </a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header  -->
  <header id="mu-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-header-area">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-left">
                  <div class="mu-top-email">
                    <i class="fa fa-envelope"></i>
                    <span>email@meugui.com</span>
                  </div>
                  <div class="mu-top-phone">
                    <i class="fa fa-phone"></i>
                    <span>(00) 0000-0000</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-right">
                  <nav>
                    <ul class="mu-top-social-nav">
                      <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                      <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                      <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                      <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                      <li><a href="#"><span class="fa fa-youtube"></span></a></li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End header  -->
  <!-- Start menu -->
  <section id="mu-menu">
    <nav class="navbar navbar-default" role="navigation">  
      <div class="container">
        <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->              
          <!-- TEXT BASED LOGO -->
          <!-- <a class="navbar-brand" href="index.html"><i class="fa fa-university"></i><span>Varsity</span></a> -->
          <!-- IMG BASED LOGO  -->
          <a class="navbar-brand" href="<?= HOME ?>"><img src="<?= INCLUDE_PATH; ?>/imagens/logo.png" alt="logo"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li class="active"><a href="<?= HOME ?>">Home</a></li>            
            <li class="dropdown">
              <a href="<?= HOME ?>/empresas" class="dropdown-toggle" data-toggle="dropdown">Meu guia <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?= HOME ?>/empresas/onde-comer">Onde Comer</a></li>                
                <li><a href="<?= HOME ?>/empresas/onde-ficar">Onde Ficar</a></li>  
                <li><a href="<?= HOME ?>/empresas/onde-comprar">Onde Comprar</a></li>                
                <li><a href="<?= HOME ?>/empresas/onde-se-divertir">Onde Se Divertir</a></li>  
                <li><a href="<?= HOME ?>/empresas/onde-se-embelezar">Onde Se Embelexar</a></li>                
                <li><a href="<?= HOME ?>/empresas/outros">Outros</a></li>                
              </ul>
            </li>           
            
            <li class="dropdown">
              <a href="<?= HOME ?>/categoria/noticias" title="Noticias">Noticias</a>
             
            </li>            
          
             <li class="dropdown">
              <a href="<?= HOME ?>/empresas" class="dropdown-toggle" data-toggle="dropdown">Sobre a Cidade <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?= HOME ?>/como-chegar">Como Chegar</a></li>                
                <li><a href="<?= HOME ?>/informacoes-uteis">Informações Úteis</a></li>  
                             
              </ul>
            </li>       
              <li><a href="<?= HOME ?>/contato">Contato</a></li>
                          
            <li><a href="#" id="mu-search-icon"><i class="fa fa-search"></i></a></li>
          </ul>                     
        </div><!--/.nav-collapse -->        
      </div>     
    </nav>
  </section>
  <!-- End menu -->
  <!-- Start search box -->
  <div id="mu-search">
    <div class="mu-search-area">      
      <button class="mu-search-close"><span class="fa fa-close"></span></button>
      <div class="container">
        <div class="row">
          <div class="col-md-12">            

            <?php
                                $search = filter_input(INPUT_POST, 's', FILTER_DEFAULT);
                                if (!empty($search)):
                                    $search = strip_tags(trim(urlencode($search)));
                                    header('Location: ' . HOME . '/pesquisa/' . $search);
                                endif;
                                ?>
                               
            <form name="search" value="search"  action="" method="post" class="mu-search-form">
              <input  class="mu-read-more" type="text" name="s" value="" placeholder="escreva o que procura e aperte Enter"> 
              <input class="mu-read-more-btn" type="submit" name="sendsearch" value="Pesquisar">             
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End search box -->