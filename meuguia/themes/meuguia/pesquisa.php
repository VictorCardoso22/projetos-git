<?php
$search = $Link->getLocal()[1];
$count = ($Link->getData()['count'] ? $Link->getData()['count'] : '0');

?>
<!--HOME CONTENT-->
 <section id="feature" >
                <div class="container">
                   <div class="center wow fadeInDown">
            <h2>Pesquisa por: <?= $search; ?></h2>

            <p class="tagline"> Sua pesquisa por <?= $search; ?> retornou <?= $count; ?> resultados.</p>
         </div>

       <div class="row">
                <div class="features">
        <?php
        $getPage = (!empty($Link->getLocal()[2]) ? $Link->getLocal()[2] : 1);
        $Pager = new Pager(HOME . '/pesquisa/' . $search . '/');
        $Pager->ExePager($getPage, 12);


        $readArt = new Read;
              $readArt->ExeRead("app_empresas", "WHERE empresa_status = 1 AND (empresa_title LIKE '%' :link '%' OR empresa_ramo LIKE '%' :link '%' OR empresa_sobre LIKE '%' :link '%') ORDER BY empresa_date DESC LIMIT :limit OFFSET :offset", "link={$search}&limit={$Pager->getLimit()}&offset={$Pager->getOffset()}");
       
        if (!$readArt->getResult()):
            $Pager->ReturnPage();
            WSErro("Desculpe, sua pesquisa não retornou resultados. Você pode tentar outros termos ou resumir sua pesqusa!.", WS_INFOR);
        else:
            $cc = 0;
            $View = new View;
            $tpl_art = $View->Load('empresa_list');
            foreach ($readArt->getResult() as $art):
                $cc++;
                $class = ($cc % 3 == 0 ? 'class="right" ' : null);
                echo "<span {$class} >";
                $art['empresa_title'] = Check::Words($art['empresa_title'], 9);
                $art['empresa_ramo'] = Check::Words($art['empresa_ramo'], 10);
                $art['empresa_sobre'] = Check::Words($art['empresa_sobre'], 15);
                $View->Show($art, $tpl_art);
                echo "</span>";
            endforeach;
        endif;
      
        ?>
        </div>
        </div>

 </section>

