<header>
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-4 ">
                   <a href="<?= HOME ?>"><img src="<?= INCLUDE_PATH; ?>/imagens/logo.png" alt="" width="256px"> </a> 
                </div>
                <div class="col-md-4 col-md-offset-4">
                    <div class="top-search" >
                        <div id="search" class="input-group-lg">
                        <!--    <li class="search"> -->
                                <?php
                                $search = filter_input(INPUT_POST, 's', FILTER_DEFAULT);
                                if (!empty($search)):
                                    $search = strip_tags(trim(urlencode($search)));
                                    header('Location: ' . HOME . '/pesquisa/' . $search);
                                endif;
                                ?>
                                <form name="search" value="search"  action="" method="post">
                                    <input class="fls" type="text" name="s" value="" placeholder="Olá, o que você procura?" class="form-control" />
                                    <span class="input-group-btn">
                                    <button class="btn btn-default btn-lg" style="color:#fff;" type="submit" name="sendsearch" value="" /><i class="fa fa-search" ></i></button>
                                    </span>
                                </form>
                           <!--  </li> -->
                          <!-- <input class="fls" type="text" name="s" value="" placeholder="O que você procura?" class="form-control" />
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-default btn-lg"><i class="fa fa-search"></i></button>
                          </span> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- /////////////////////////////////////////Navigation -->
    <div id="nav-wrapper">
        <div id="nav" class="navbar navbar-default navbar-inner">
            <div class="container">
        
                <!-- BAR CONTENTS -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                   <span class="sr-only">Toggle navigation</span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                  </button>
                  <!-- <a href="#page-top" class="navbar-brand navbar-brand-centered"><img src="images/logo.png" alt="First slide"></a> -->
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            
                    <ul class="nav navbar-nav">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li>
                            <a  class="page-scroll first" href="<?= HOME ?>/">HOME </a>
                        </li>
                        <li>
                            <a class="page-scroll" href="<?= HOME; ?>/por-que-anunciar">POR QUE ANUNCIAR</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="<?= HOME; ?>/quem-somos">QUEM SOMOS</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="<?= HOME; ?>/informacoes-uteis">INFORMAÇÕES ÚTEIS</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="<?= HOME; ?>/contato">CONTATO</a>
                        </li>
                        
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="page-scroll" target="_blank" href="https://www.facebook.com/www.buscatudoservicos.com.br/"><img src="<?= INCLUDE_PATH; ?>/imagens/facebook-logo.png" alt=""></a>
                        </li>
                        
                    </ul>
                </div><!-- /.navbar-collapse -->
            

            </div> <!-- row -->
        </div> <!-- nav -->
    </div> <!-- wrapper -->
</header> <!-- main header -->