<?php
require_once ('./_app/Config.inc.php');
if ($Link->getData()):
    
    extract($Link->getData());
else:
    header('Location: ' . HOME . DIRECTORY_SEPARATOR . '404');
endif;
?>

<!--HOME CONTENT-->
<section id="mu-our-teacher" class="cor">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-our-teacher-area">
            <!-- begain title -->
            <div class="mu-title">
            <h2><?= $category_title; ?></h2>
            <p class="tagline"><?= $category_content; ?></p>
       
       <div class="mu-our-teacher-content">

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
            $tpl_cat = $View->Load('article_m');
            foreach ($readCat->getResult() as $cat):
                $cc++;
                $class = ($cc % 3 == 0 ? 'class="right" ' : null);
                echo "<span {$class} >";
                $cat['post_title'] = Check::Words($cat['post_title'], 9);
                $cat['datetime'] = date('Y-m-d', strtotime($cat['post_date']));
                $cat['pubdate'] = date('d/m/Y H:i', strtotime($cat['post_date']));
                $cat['post_content'] = Check::Words($cat['post_content'], 20);
                $View->Show($cat, $tpl_cat);
                echo "</span>";
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