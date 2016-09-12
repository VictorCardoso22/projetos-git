<?php
$View = (!empty($View) ? $View : $View = new View);
$post_id = (!empty($post_id) ? $post_id : null);

$Side = new Read;
$tpl_p = $View->Load('article_p');
?>
<aside class="main-sidebar">
  <div class="row"> 
  <div class="col-xs-12 col-sm-8 col-md-4"> 
    <article class="ads">
   
        <header>
                       
              
           
        </header>
    </article>

    
    <section class="col-xs-12 col-sm-8 col-md-6">
        <h2 class="line_title"><span class="vermelho">Destaques:</span></h2>
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
    </section>
    </div>
 </div>
</aside>