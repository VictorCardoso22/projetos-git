<?php
require_once ('./_app/Config.inc.php');


if ($Link->getData()):
    
    extract($Link->getData());
else:
    header('Location: ' . HOME . DIRECTORY_SEPARATOR . '404');
endif;
?>

    <!--start wrapper-->
   <section class="subscribe-section" >
   <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h2 style="text-transform: capitalize;"><?= $category_title; ?></h2>
                       
                    </div>
                </div>
            </div>
        
    </section>

 <section class="subscribe-section" >
   <div class="container">
                
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    
     

        <?php
        $getPage = (!empty($Link->getLocal()[2]) ? $Link->getLocal()[2] : 1);
        $Pager = new Pager(HOME . '/categoria/' . $category_name . '/');
        $Pager->ExePager($getPage, 12);


        $readCat = new Read;
        $readCat->ExeRead("ws_posts", "WHERE post_status = 1 AND (post_category = :cat OR post_cat_parent = :cat) ORDER BY post_date DESC LIMIT :limit OFFSET :offset", "cat={$category_id}&limit={$Pager->getLimit()}&offset={$Pager->getOffset()}");
        if (!$readCat->getResult()):
            $Pager->ReturnPage();
            WSErro("Desculpe, a categoria <b>{$category_title}</b> ainda não tem artigos publicados.", WS_INFOR);
        else:
            $cc = 0;
            $View = new View;
            $tpl_cat = $View->Load('categorias_p');
            foreach ($readCat->getResult() as $cat):
                // $cc++;
                // $class = ($cc % 3 == 0 ? 'class="right" ' : null);
                // echo "<span {$class} >";

                if ($category_title == 'Galeria') {
                    $cat['post_content'] = Check::Words($cat['post_content'], 5);
                }else{
                    $cat['post_content'] = Check::Words($cat['post_content'], 10);
                }
                $cat['post_title'] = Check::Words($cat['post_title'], 5);
                $cat['datetime'] = date('Y-m-d', strtotime($cat['post_date']));
                $cat['pubdate'] = date('d/m/Y', strtotime($cat['post_date']));
                
                $View->Show($cat, $tpl_cat);
                // echo "</span>";
            endforeach;
        endif;
        ?>

</div>
<?php
         echo '<div class="col-lg-12 col-md-12 col-sm-12">';
            

        $Pager->ExePaginator("ws_posts", "WHERE post_status = 1 AND (post_category = :cat OR post_cat_parent = :cat)", "cat={$category_id}");
        echo $Pager->getPaginator();
       
         echo '</div>';
        ?>

</div>
</div>
       
</section>
 <section>
   <div class="container">