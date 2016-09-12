<?php
$View = (!empty($View) ? $View : $View = new View);
$post_id = (!empty($post_id) ? $post_id : null);

$Side = new Read;
$tpl_p = $View->Load('article_p');
?>
<aside class="main-sidebar">
 <article class="ads">
   
        <header>
                       
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- require-sidebar -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6784338199613378"
     data-ad-slot="4937335847"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>   
           
        </header>
    </article>
    

    <div class="widget art-list last-publish">
        <h2 class="line_title">Últimas Atualizações:</h2>
        <?php
        $Side->ExeRead("ws_posts", "WHERE post_status = 1 AND post_id != :side ORDER BY post_date DESC LIMIT 3", "side={$post_id}");
        if ($Side->getResult()):
            foreach ($Side->getResult() as $last):
                $last['datetime'] = date('Y-m-d', strtotime($last['post_date']));
                $last['pubdate'] = date('d/m/Y H:i', strtotime($last['post_date']));

                $View->Show($last, $tpl_p);
            endforeach;
        endif;
        ?>
    </div>

    <div class="widget art-list most-view">
        <h2 class="line_title">Destaques:</h2>
        <?php
        $Side->ExeRead("ws_posts", "WHERE post_status = 1 AND post_id != :side ORDER BY post_views DESC LIMIT 3", "side={$post_id}");
        if ($Side->getResult()):
            foreach ($Side->getResult() as $most):
                $most['datetime'] = date('Y-m-d', strtotime($most['post_date']));
                $most['pubdate'] = date('d/m/Y H:i', strtotime($most['post_date']));

                $View->Show($most, $tpl_p);
            endforeach;
        endif;
        ?>
    </div>
</aside>