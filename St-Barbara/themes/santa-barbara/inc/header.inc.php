   <?php
$View = new View;
$tpl_g = $View->Load('article_g');
$tpl_m = $View->Load('article_m');
$tpl_u = $View->Load('article_u');
$tpl_p = $View->Load('article_p');
$cursos = $View->Load('curso_menu');
// $tpl_cat = $View->Load('cat_m');
?>
    <header id="header" class="clearfix">
        <div id="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-7 hidden-xs top-info">
                        <span><i class="fa fa-phone"></i>Telefone: (82) 3215-4850</span>
                        <span><i class="fa fa-envelope"></i>E-mail: contato@escolasantabarbara.com.br</span>
                    </div>
                    <div class="col-sm-5 top-info">
                        <ul>
                            <li ><a href="http://webmail.escolasantabarbara.com.br/" target="_Blank" class=""> WebMail </a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- LOGO bar -->
       <div id="logo-bar" class="clearfix">
           <!-- Container -->
           <div class="container">
               <div class="row">
                   <!-- Logo / Mobile Menu -->
                   <div class="col-xs-12">
                       <div id="logo">
                          <h1> <a href="<?= HOME; ?>"><img src="<?= INCLUDE_PATH; ?>/images/st-barbara-logo.png" alt="Eve" /></a></h1>
                       </div>
                   </div>
               </div>
           </div>
           <!-- Container / End -->
       </div>
        <!--LOGO bar / End-->

        <!-- Navigation
================================================== -->
        <div class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="<?= HOME ?>">Home</a></li>
                            <li ><a href="<?= HOME ?>/sobre">Sobre</a></li>

                            <li><a href="<?= HOME ?>/categoria/cursos">Cursos</a>
                           
                            </li>

                            <li><a href="<?= HOME ?>/categoria/noticias">Noticias</a></li>

                            <li><a href="<?= HOME ?>/contato">Contato</a></li>
                        </ul>

                      
                           <div class="widget widget_search" >
                            <?php
                $search = filter_input(INPUT_POST, 's', FILTER_DEFAULT);
                if (!empty($search)):
                    $search = strip_tags(trim(urlencode($search)));
                    header('Location: ' . HOME . '/pesquisa/' . $search);
                endif;
                ?>
                                <div class="site-search-area">
                                    <form method="post" id="site-searchform" name="search" value="search">
                                        <div>
                                            <input class="input-text" name="s" id="s" placeholder="Pesquisar" type="text" />
                                            <input id="searchsubmit" type="submit" name="sendsearch" value="" />
                                        </div>
                                    </form>
                                </div><!-- end site search -->
                            </div>

                         
               
               
                        

                    </div>
                </div><!--/.row -->
            </div><!--/.container -->
        </div>
     