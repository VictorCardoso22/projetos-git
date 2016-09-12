<?php
require_once ('./_app/Config.inc.php');
if ($Link->getData()):
    
    extract($Link->getData());
else:
    header('Location: ' . HOME . DIRECTORY_SEPARATOR . '404');
endif;
?>
<div class="conteudo">    
    <div class="container">
        <div class="section-title">
            <h1>Assine agora</h1>
            <p>Deixe seu e-mail e receba em primeira mão todo o conteudo do nosso blog. Seu e-mail está SEGURO conosco.</p>
        </div>
    

<!--HOME CONTENT-->
<!-- Mailchimp Subscribe form -->

                <div class="row">
                          <div class="col-md-6 col-sm-12 col-md-offset-3 subscribe">

                          <!-- Begin MailChimp Signup Form -->
                            <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
                            <style type="text/css">
                                #mc_embed_signup{clear:left; font:14px Helvetica,Arial,sans-serif; }
                                /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
                                   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
                            </style>
                            <div id="mc_embed_signup">
                            <form action="//require.us13.list-manage.com/subscribe/post?u=03d3a0d1452eb1c0a7dfec4a8&amp;id=69a9254021" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="form-horizontal" target="_blank" novalidate>
                                <div id="mc_embed_signup_scroll">
                         <div class="form-group">       
                            <div class="col-md-9 col-sm-6 col-sm-offset-1 col-md-offset-0 mc-field-group">
                                  <input type="email" value="" name="EMAIL" class="form-control input-lg required email" placeholder="Deixe seu email" data-validate="validate(required, email)" id="mce-EMAIL">
                            </div>
                                <div id="mce-responses" class="clear">
                                    <div class="response" id="mce-error-response" style="display:none"></div>
                                    <div class="response" id="mce-success-response" style="display:none"></div>
                                </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_03d3a0d1452eb1c0a7dfec4a8_69a9254021" tabindex="-1" value=""></div>
                                <div class="clear col-md-8 col-sm-4"><input type="submit" value="Assine agora" style="float: right;" name="subscribe" id="mc-embedded-subscribe" class="btn btn-success btn-lg"></div>
                                </div>
                          </div>      
                            </form>
                            </div>
                            <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
                            <!--End mc_embed_signup-->

                          </div><!-- col-md-6 col-sm-12 col-md-offset-3 subscribe -->
                </div><!-- row conteudo -->

    </div>
</div>



<div class="container">
      
 
        <section >
            <h1><?= $category_title; ?></h1>
            <p class="tagline" style="text-align: center;"><?= $category_content; ?></p>
        </section>

   <div class="page_categorias">
    
        <?php
        $getPage = (!empty($Link->getLocal()[2]) ? $Link->getLocal()[2] : 1);
        $Pager = new Pager(HOME . '/categoria/' . $category_name . '/');
        $Pager->ExePager($getPage, 6);


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
                // $class = ($cc % 3 == 0 ? 'class="right" ' : null);
                echo "<span>";
                $cat['post_title'] = Check::Words($cat['post_title'], 9);
                $cat['datetime'] = date('Y-m-d', strtotime($cat['post_date']));
                $cat['pubdate'] = date('d/m/Y H:i', strtotime($cat['post_date']));
                $cat['post_content'] = Check::Words($cat['post_content'], 20);
                $View->Show($cat, $tpl_cat);
                echo "</span>";
            endforeach;
        endif;
        ?>
         <div class="clear"></div>
    </div>


    <?php
        echo '<nav class="paginator">';
        
        $Pager->ExePaginator("ws_posts", "WHERE post_status = 1 AND (post_category = :cat OR post_cat_parent = :cat)", "cat={$category_id}");
        echo $Pager->getPaginator();

        echo '</nav>';
        ?>
    

   

   </div>

    <div class="clear"></div>


   