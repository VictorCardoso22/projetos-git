<?php
if (!class_exists('Login')) :
    header('Location: ../../painel.php');
    die;
endif;
?>
<div class="content home">

    <aside>
        <h1 class="boxtitle">Estatísticas de Acesso:</h1>

        <article class="sitecontent boxaside">
            <h1 class="boxsubtitle">Conteúdo:</h1>

            <?php
            //OBJETO READ
            $read = new Read;

            //VISITAS DO SITE
            $read->FullRead("SELECT SUM(siteviews_views) AS views FROM ws_siteviews");
            $Views = $read->getResult()[0]['views'];

            //USUÁRIOS
            $read->FullRead("SELECT SUM(siteviews_users) AS users FROM ws_siteviews");
            $Users = $read->getResult()[0]['users'];

            //PAGEVIEWS
            $read->FullRead("SELECT SUM(siteviews_pages) AS pages FROM ws_siteviews");
            $ResPages = $read->getResult()[0]['pages'];
            $Pages = substr($ResPages / $Users, 0, 5);

            //POSTS
            $read->ExeRead("ws_posts");
            $Posts = $read->getRowCount();

            //CTEGORIAS
            $read->ExeRead("ws_categories");
            $Cate = $read->getRowCount();

          
            ?>

            <ul>
                <li class="view"><span><?= $Views; ?></span> visitas</li>
                <li class="user"><span><?= $Users; ?></span> usuários</li>
                <li class="page"><span><?= $Pages; ?></span> pageviews</li>
                <li class="line"></li>
                <li class="comm"><span><?= $Cate; ?></span> categorias</li>
                <li class="post"><span><?= $Posts; ?></span> posts</li>
                
            </ul>
            <div class="clear"></div>
        </article>

        
    </aside>

    <section class="content_statistics">

        <h1 class="boxtitle">Publicações:</h1>

        <section>
            <h1 class="boxsubtitle">Artigos Recentes:</h1>

            <?php
            $read->ExeRead("ws_posts", "ORDER BY post_date DESC LIMIT 3");
            if ($read->getResult()):
                foreach ($read->getResult() as $re):
                    extract($re);
                    ?>
                    <article>

                        <div class="img thumb_small">
                            <?= Check::Image('../uploads/' . $post_cover, $post_title, 120, 70); ?>
                        </div>

                        <h1><a target="_blank" href="../artigo/<?= $post_name; ?>" title="Ver Post"><?= Check::Words($post_title, 10) ?></a></h1>
                        <ul class="info post_actions">
                            <li><strong>Data:</strong> <?= date('d/m/Y H:i', strtotime($post_date)); ?>Hs</li>
                            <li><a class="act_view" target="_blank" href="../artigo/<?= $post_name; ?>" title="Ver no site">Ver no site</a></li>
                            <li><a class="act_edit" href="painel.php?exe=posts/update&postid=<?= $post_id; ?>" title="Editar">Editar</a></li>

                            <?php if (!$post_status): ?>
                                <li><a class="act_inative" href="painel.php?exe=posts/index&post=<?= $post_id; ?>&action=active" title="Ativar">Ativar</a></li>
                            <?php else: ?>
                                <li><a class="act_ative" href="painel.php?exe=posts/index&post=<?= $post_id; ?>&action=inative" title="Inativar">Inativar</a></li>
                            <?php endif; ?>

                            <li><a class="act_delete" href="painel.php?exe=posts/index&post=<?= $post_id; ?>&action=delete" title="Excluir">Deletar</a></li>
                        </ul>

                    </article>
                    <?php
                endforeach;
            endif;
            ?>
        </section>          


        <section>
            <h1 class="boxsubtitle">Artigos Mais Vistos:</h1>

            <?php
            $read->ExeRead("ws_posts", "ORDER BY post_views DESC LIMIT 3");
            if ($read->getResult()):
                foreach ($read->getResult() as $re):
                    extract($re);
                    ?>
                    <article>

                        <div class="img thumb_small">
                            <?= Check::Image('../uploads/' . $post_cover, $post_title, 120, 70); ?>
                        </div>

                        <h1><a target="_blank" href="../artigo/<?= $post_name; ?>" title="Ver Post"><?= Check::Words($post_title, 10) ?></a></h1>
                        <ul class="info post_actions">
                            <li><strong>Data:</strong> <?= date('d/m/Y H:i', strtotime($post_date)); ?>Hs</li>
                            <li><a class="act_view" target="_blank" href="../artigo/<?= $post_name; ?>" title="Ver no site">Ver no site</a></li>
                            <li><a class="act_edit" href="painel.php?exe=posts/update&postid=<?= $post_id; ?>" title="Editar">Editar</a></li>

                            <?php if (!$post_status): ?>
                                <li><a class="act_inative" href="painel.php?exe=posts/index&post=<?= $post_id; ?>&action=active" title="Ativar">Ativar</a></li>
                            <?php else: ?>
                                <li><a class="act_ative" href="painel.php?exe=posts/index&post=<?= $post_id; ?>&action=inative" title="Inativar">Inativar</a></li>
                            <?php endif; ?>

                            <li><a class="act_delete" href="painel.php?exe=posts/index&post=<?= $post_id; ?>&action=delete" title="Excluir">Deletar</a></li>
                        </ul>

                    </article>
                    <?php
                endforeach;
            endif;
            ?>
        </section>                           

    </section> <!-- Estatísticas -->

    <div class="clear"></div>
</div> <!-- content home -->