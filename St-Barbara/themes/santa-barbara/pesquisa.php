<?php
$search = $Link->getLocal()[1];
$count = ($Link->getData()['count'] ? $Link->getData()['count'] : '0');
?>
<!--HOME CONTENT-->
  <section class="wrapper">
        <section class="page_head">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
            <h2>Pesquisa por: <?= $search; ?></h2>

           
          </div>
           <p> Sua pesquisa por <?= $search; ?> retornou <?= $count; ?> resultados.</p>
                </div>
            </div>
        </section>
    </section>
<section class="content blog">
            <div class="container">
                <div class="row">

        <?php
        $getPage = (!empty($Link->getLocal()[2]) ? $Link->getLocal()[2] : 1);
        $Pager = new Pager(HOME . '/pesquisa/' . $search . '/');
        $Pager->ExePager($getPage, 12);


        $readArt = new Read;
        $readArt->ExeRead("ws_posts", "WHERE post_status = 1 AND (post_title LIKE '%' :link '%' OR post_content LIKE '%' :link '%') ORDER BY post_date DESC LIMIT :limit OFFSET :offset", "link={$search}&limit={$Pager->getLimit()}&offset={$Pager->getOffset()}");
        if (!$readArt->getResult()):
            $Pager->ReturnPage();
            WSErro("Desculpe, sua pesquisa não retornou resultados. Você pode tentar outros termos ou resumir sua pesqusia!.", WS_INFOR);
        else:
            $cc = 0;
            $View = new View;
            $tpl_art = $View->Load('article_m');
            foreach ($readArt->getResult() as $art):
                $cc++;
                // $class = ($cc % 3 == 0 ? 'class="right" ' : null);
                // echo "<span {$class} >";
                $art['post_title'] = Check::Words($art['post_title'], 9);
                $art['datetime'] = date('Y-m-d', strtotime($art['post_date']));
                $art['pubdate'] = date('d/m/Y H:i', strtotime($art['post_date']));
                $art['post_content'] = Check::Words($art['post_content'], 20);
                $View->Show($art, $tpl_art);
                // echo "</span>";
            endforeach;
        endif;
        echo '<div" class="col-lg-12 col-md-12 col-sm-12" >';

        $Pager->ExePaginator("ws_posts", "WHERE post_status = 1 AND (post_title LIKE '%' :link '%' OR post_content LIKE '%' :link '%')", "link={$search}");
        echo $Pager->getPaginator();

        echo '</div>';
        ?>

</div>

</div>
        
</section>
