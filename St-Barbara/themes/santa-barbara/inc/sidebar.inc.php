<?php
$View = (!empty($View) ? $View : $View = new View);
$post_id = (!empty($post_id) ? $post_id : null);

$Side = new Read;
$tpl_p = $View->Load('sidebar');
?>


<div class="col-xs-12 col-md-4 col-lg-4 col-sm-4">
                        <div class="sidebar">
                                                        
                            <div class="widget widget_categories">
                                <div class="widget_title">
                                    <h4><span>Cursos</span></h4>
                                    </div>
                                <ul class="arrows_list">
                                   <?php
                                    $cat = Check::CatByName('Cursos');
                                    $post = new Read;
                                     $post->ExeRead("ws_posts", "WHERE post_status = 1 AND (post_cat_parent = :cat OR post_category = :cat) ORDER BY post_title ASC LIMIT :limit OFFSET :offset", "cat={$cat}&limit=20&offset=0");
                                    $post->setPlaces("cat={$cat}&limit=20&offset=0");
                                    if (!$post->getResult()):
                                        WSErro("Desculpe, não existe uma noticia destaque para ser exibida agora. Favor, volte mais tarde!", WS_INFOR);
                                    else:
                                        foreach ($post->getResult() as $new):
                                            $new['post_title'] = Check::Words($new['post_title'], 7);
                                            $View->Show($new, $cursos);
                                        endforeach;
                                    endif;
                                ?>
                                </ul>
                            </div>
                            
                            <div class="widget widget_about">
                                <div class="widget_title">
                                    <h4><span>Destaques:</span></h4>
                                    </div>
                              
                            </div>

                            <div class="eve-tab sidebar-tab">
                                <ul id="myTab" class="nav nav-tabs">
                                    <li class="active"><a href="#Popular" data-toggle="tab">Popular</a></li>
                                    <li class=""><a href="#Recente" data-toggle="tab">Recente</a></li>
                                </ul>
                              

                                <div id="myTabContent" class="tab-content clearfix">
                                    <div class="tab-pane fade active in" id="Popular">
                                        <ul class="recent_tab_list">
                                           <?php
                                            $Side->ExeRead("ws_posts", "WHERE post_status = 1 AND post_id != :side ORDER BY post_views DESC LIMIT 3", "side={$post_id}");
                                            if ($Side->getResult()):
                                                foreach ($Side->getResult() as $last):
                                                    $last['datetime'] = date('Y-m-d', strtotime($last['post_date']));
                                                    $last['pubdate'] = date('d/m/Y H:i', strtotime($last['post_date']));

                                                    $View->Show($last, $tpl_p);
                                                endforeach;
                                            endif;
                                        ?>
                                           
                                        </ul>
                                    </div>

                                    <div class="tab-pane fade" id="Recente">
                                        <ul class="recent_tab_list">
                                         <?php
                                        $Side->ExeRead("ws_posts", "WHERE post_status = 1 AND post_id != :side ORDER BY post_date DESC LIMIT 3", "side={$post_id}");
                                        if ($Side->getResult()):
                                            foreach ($Side->getResult() as $most):
                                                $most['datetime'] = date('Y-m-d', strtotime($most['post_date']));
                                                $most['pubdate'] = date('d/m/Y H:i', strtotime($most['post_date']));

                                                $View->Show($most, $tpl_p);
                                            endforeach;
                                        endif;
                                        ?>
                                            
                                        </ul>
                                    </div>
                                   
                                </div>
                            </div>

                          
                        </div>
                    </div>
