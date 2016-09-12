<?php
if ($Link->getData()):
    extract($Link->getData());
    $empresa_views = ($empresa_views ? $empresa_views : '0');
else:
    header('Location: ' . HOME . DIRECTORY_SEPARATOR . '404');
endif;
?>
<!--HOME CONTENT-->
<div class="container">

    <article class="empresa_article">
    


        <div class="col-md-12">

            <!--CABEÇALHO GERAL-->
        <div class="col-md-12">
            
                <div class="img capa">
                    <!--w = 578px  [ CRIAR THUMB ]-->
                    <?= Check::Image('uploads' . DIRECTORY_SEPARATOR . $empresa_capa, $empresa_title, 578, 300); ?>
                </div>
               
           
        </div>

 <div class="col-md-12">
  <header>
                <hgroup>
                    <div class="views"><span><?= $empresa_views; ?></span></div> 
                    <h2><?= $empresa_title; ?></h2>
                    <h3><?= $empresa_ramo; ?></h3>
                </hgroup>
            </header>

            <address>
                <?= $empresa_sobre; ?>
            </address>
 <div class="col-xs-12 col-sm-4 col-md-4">
            <h3 class="uicon site"><a href="<?= $empresa_site; ?>" target="_blank" rel="nofollow">Visite nosso site</a></h3>
</div>
<div class="col-xs-12 col-sm-4 col-md-4">
            <h3 class="uicon face"><a href="http://www.facebook.com/<?= $empresa_facebook; ?>" target="_blank" rel="nofollow">Upinside Treinamentos no Facebook</a></h3>
</div>
<div class="col-xs-12 col-sm-4 col-md-4">
            <h3 class="uicon share"><a onclick="return !window.open(this.href, 'Facebook', 'width=640,height=300')" href="https://www.facebook.com/sharer/sharer.php?u=<?= HOME ?>/empresa/<?= $empresa_name; ?>" target="_blank" rel="nofollow">Compartilhe Isso</a></h3>
</div>

<!--<iframe width="578" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com.br/maps?q=ENDERECO&amp;ie=UTF8&amp;hq=&amp;hnear=ENDERECO&amp;t=m&amp;z=16&amp;ll=&amp;hl=pt-BR&amp;iwloc=A&amp;output=embed" style="text-align:left; margin-top: 20px;"></iframe>-->

            
      <!--RELACIONADOS-->
        <footer class="col-xs-12  col-md-12">
            <nav>
                <h2>Veja também:</h2>
                <?php
                $readMais = new Read;
                $readMais->ExeRead("app_empresas", "WHERE empresa_status = 1 ORDER BY rand() LIMIT 6");
                if ($readMais->getResult()):
                    $View = new View;
                    $tpl = $View->Load('empresa_p');
                    foreach ($readMais->getResult() as $mais):
                        $View->Show($mais, $tpl);
                    endforeach;
                endif;
                ?>
            </nav>
            <div class="clear"></div>
        </div>
        </footer>

        <!--Comentários aqui-->
    </article>

    
  
    </div>
   
  
</div><!--/ site container -->