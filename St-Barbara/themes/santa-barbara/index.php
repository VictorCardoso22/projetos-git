<div class="slider_block">
            <div class="flexslider top_slider">
                 
                <ul class="slides"> 
                    
            <?php
                $cat = Check::CatByName('Publicidade');
                $post = new Read;
                $post->ExeRead("ws_posts", "WHERE post_status = 1 AND (post_cat_parent = :cat OR post_category = :cat) ORDER BY post_date DESC LIMIT :limit OFFSET :offset", "cat={$cat}&limit=3&offset=0");
                if (!$post->getResult()):
                    WSErro('Desculpe, ainda não existem noticias cadastradas. Favor voltar mais tarde!', WS_INFOR);
                else:
                    foreach ($post->getResult() as $slide):
                        $slide['post_title'] = Check::Words($slide['post_title'],9);
                        $slide['post_content'] = Check::Words($slide['post_content'], 25);
                        $slide['datetime'] = date('Y-m-d', strtotime($slide['post_date']));
                        $slide['pubdate'] = date('d/m/Y H:i', strtotime($slide['post_date']));

                        $View->Show($slide, $tpl_g);
                    endforeach;
                endif;
            ?>                

                </ul>
            </div>
        </div>
    </header>
<!--End Header--> 
<!--start wrapper-->
    <section class="wrapper">
        <section class="page_head">
            <div class="container">
                <div class="row">
                     <div class="col-md-12 col-lg-12">
                        <div class="dividerHeading">
                            <h4><span>Conheça nossos cursos</span></h4>
                 

                </div>
            </div>
        </section>

    <section class="content service">
            <div class="container">
                <div class="row">
                         <div class="col-md-12 col-lg-12">
                            <div class="dividerHeading">
                                <h2><span>Cursos Técnicos</span></h2>
                             </div>
                        </div>
                    </div>

               <div class="row sub_content">
                    <div class="col-md-12 col-lg-12">
                       
                   
                 <div class="cursoContainer">

                    <div class="col-sm-12 col-md-6 col-lg-4 campus">
                        <div class="serviceBox_2">
                            <a href="<?= HOME ?>/artigo/tecnico-em-informatica">
                                <i><img src="<?= INCLUDE_PATH; ?>/images/secretaria.png" alt=""></i>
                                <h3>Técnico em Informática</h3>
                            
                                <p>Saiba Mais.</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 campus">
                        <div class="serviceBox_2">
                            <a href="<?= HOME ?>/artigo/tecnico-em-seguranca-do-trabalho">
                                <i><img src="<?= INCLUDE_PATH; ?>/images/avatar.png" alt=""></i>
                                <h3>Técnico em Segurança do Trabalho</h3>
                            
                                <p>Saiba Mais.</p>
                            </a>
                        </div>
                    </div>


                    <div class="col-sm-12 col-md-6 col-lg-4 campus">
                        <div class="serviceBox_2">
                            <a href="<?= HOME ?>/artigo/tecnico-em-cuidados-de-idosos">
                                <i><img src="<?= INCLUDE_PATH; ?>/images/nurse-1.png" alt=""></i>
                                <h3>Técnico em Cuidados de Idoso</h3>
                            
                                <p>Saiba Mais.</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="serviceBox_2">
                        <a href="<?= HOME ?>/artigo/tecnico-em-enfermagem">
                            <i><img src="<?= INCLUDE_PATH; ?>/images/nurse.png" alt=""></i>
                            <h3>Técnico em Enfermagem</h3>
                            <p>Saiba Mais.</p>
                        </a>
                        </div>
                    </div>

                                      

                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="serviceBox_2">
                        <a href="<?= HOME ?>/artigo/tecnico-em-analises-clinicas">
                            <i><img src="<?= INCLUDE_PATH; ?>/images/doctor.png" alt=""></i>
                            <h3>Técnico em Análises Clínicas</h3>
                            <p>Saiba Mais.</p>
                         </a>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="serviceBox_2">
                        <a href="<?= HOME ?>/artigo/tecnico-em-nutricao">
                            <i><img src="<?= INCLUDE_PATH; ?>/images/nutri.png" alt=""></i>
                            <h3>Técnico em Nutrição</h3>
                            <p>Saiba Mais.</p>
                        </a>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="serviceBox_2">
                        <a href="<?= HOME ?>/artigo/tecnico-em-radiologia">
                            <i><img src="<?= INCLUDE_PATH; ?>/images/doctor-2.png" alt=""></i>
                            <h3>Técnico em Radiologia</h3>
                            <p>Saiba Mais.</p>
                        </a>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="serviceBox_2">
                        <a href="<?= HOME ?>/artigo/tecnico-em-massoterapia">
                            <i><img src="<?= INCLUDE_PATH; ?>/images/doctor-3.png" alt=""></i>
                            <h3>Técnico em Massoterapia</h3>
                           <p>Saiba Mais.</p>
                        </a>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="serviceBox_2">
                        <a href="<?= HOME ?>/artigo/tecnico-em-secretaria-escolar">
                            <i><img src="<?= INCLUDE_PATH; ?>/images/secretaria.png" alt=""></i>
                            <h3>Técnico em Secretaria Escolar</h3>
                           <p>Saiba Mais.</p>
                        </a>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="serviceBox_2">
                        <a href="<?= HOME ?>/artigo/tecnico-em-seguranca-do-trabalho">
                            <i><img src="<?= INCLUDE_PATH; ?>/images/engineer.png" alt=""></i>
                            <h3>Técnico em Segurança do Trabalho</h3>
                           <p>Saiba Mais.</p>
                        </a>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="serviceBox_2">
                        <a href="<?= HOME ?>/artigo/tecnico-em-farmacia">
                            <i><img src="<?= INCLUDE_PATH; ?>/images/doctor-4.png" alt=""></i>
                            <h3>Técnico em Farmácia</h3>
                           <p>Saiba Mais.</p>
                        </a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="serviceBox_2">
                        <a href="<?= HOME ?>/artigo/tecnico-em-agente-comunitario-de-saude">
                            <i><img src="<?= INCLUDE_PATH; ?>/images/nutri.png" alt=""></i>
                            <h3>Técnico em Agente Comunitário de Saúde</h3>
                           <p>Saiba Mais.</p>
                        </a>
                        </div>
                    </div>

                    

                     <div class="row">
                         <div class="col-md-12 col-lg-12">
                            <div class="dividerHeading">
                                <h2><span>Especializações</span></h2>
                             </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="serviceBox_2">
                        <a href="<?= HOME ?>/artigo/especializacao-tecnica-de-nivel-medio-em-saude-da-familia">
                            <i><img src="<?= INCLUDE_PATH; ?>/images/lab-technician.png" alt=""></i>
                            <h3>Especialização em Saúde da Família</h3>
                            <p>Saiba Mais.</p>
                         </a>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="serviceBox_2">
                        <a href="<?= HOME ?>/artigo/especializacao-tecnica-de-nivel-medio-em-home-care">
                            <i><img src="<?= INCLUDE_PATH; ?>/images/medical-kit.png" alt=""></i>
                            <h3>Especialização em Home Care</h3>
                           <p>Saiba Mais.</p>
                        </a>
                        </div>
                    </div>

                     <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="serviceBox_2">
                        <a href="<?= HOME ?>/artigo/especializacao-tecnica-de-nivel-medio-em-instrumentacao-cirurgica">
                            <i><img src="<?= INCLUDE_PATH; ?>/images/doctor-2.png" alt=""></i>
                            <h3>Especialização em Instrumentação Cirúrgica</h3>
                           <p>Saiba Mais.</p>
                        </a>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="serviceBox_2">
                        <a href="<?= HOME ?>/artigo/especializacao-tecnica-de-nivel-medio-em-enfermagem-do-trabalho">
                            <i><img src="<?= INCLUDE_PATH; ?>/images/nurse-2.png" alt=""></i>
                            <h3>Especialização em Enfermagem do Trabalho</h3>
                           <p>Saiba Mais.</p>
                        </a>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="serviceBox_2">
                        <a href="<?= HOME ?>/artigo/especializacao-tecnica-de-nivel-medio-em-unidade-de-terapia-intensiva-uti">
                            <i><img src="<?= INCLUDE_PATH; ?>/images/nurse-3.png" alt=""></i>
                            <h3>Especialização em Unidade de Terapia Intensiva - UTI</h3>
                           <p>Saiba Mais.</p>
                        </a>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="serviceBox_2">
                        <a href="<?= HOME ?>/artigo/especializacao-tecnica-de-nivel-medio-em-urgencia-e-emergencia">
                            <i><img src="<?= INCLUDE_PATH; ?>/images/nurse-4.png" alt=""></i>
                            <h3>Especialização em Urgência e Emergência</h3>
                           <p>Saiba Mais.</p>
                        </a>
                        </div>
                    </div>
                     <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="serviceBox_2">
                        <a href="<?= HOME ?>/artigo/especializacao-tecnica-de-nivel-medio-em-enfermagem-geriatrica">
                            <i><img src="<?= INCLUDE_PATH; ?>/images/nurse-1.png" alt=""></i>
                            <h3>Especialização em Enfermagem Geriátrica</h3>
                           <p>Saiba Mais.</p>
                        </a>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="serviceBox_2">
                        <a href="<?= HOME ?>/artigo/especializacao-tecnica-de-nivel-medio-em-nefrologia">
                            <i><img src="<?= INCLUDE_PATH; ?>/images/nurse.png" alt=""></i>
                            <h3>Especialização em Nefrologia</h3>
                           <p>Saiba Mais.</p>
                        </a>
                        </div>
                    </div>
                 </div>
                </div>
             </div>
            </div>
        </section>

<!--start Noticias-->
  
 
    <section class="wrapper">
            <div class="container">
                <div class="row">
                     <div class="col-md-12 col-lg-12">
                        <div class="dividerHeading">
                            <h4><span>Noticias</span></h4>
                         </div>
                    </div>
                </div>

                  <div class="row">
                     <div class="col-md-12 col-lg-12">
                      
                                       <?php
                            $cat = Check::CatByName('Noticias');
                            $post->setPlaces("cat={$cat}&limit=1&offset=0");
                            if (!$post->getResult()):
                                WSErro("Desculpe, não existe uma noticia destaque para ser exibida agora. Favor, volte mais tarde!", WS_INFOR);
                            else:
                                foreach ($post->getResult() as $new):
                                    $new['post_title'] = Check::Words($new['post_title'], 10);
                                    $new['post_content'] = Check::Words($new['post_content'],30);
                                    $new['datetime'] = date('Y-m-d', strtotime($new['post_date']));
                                    $new['pubdate'] = date('d/m/Y H:i', strtotime($new['post_date']));
                                    $View->Show($new, $tpl_u);
                                endforeach;
                            endif;

                            ?>
                         
            


                <div class="col-md-12 col-lg-6">
                 <?php
                            $cat = Check::CatByName('Noticias');
                            $post->setPlaces("cat={$cat}&limit=2&offset=1");
                            if (!$post->getResult()):
                                WSErro("Desculpe, não existe uma noticia destaque para ser exibida agora. Favor, volte mais tarde!", WS_INFOR);
                            else:
                                foreach ($post->getResult() as $new):
                                    $new['post_title'] = Check::Words($new['post_title'], 4);
                                    $new['post_content'] = Check::Words($new['post_content'], 8);
                                    $new['datetime'] = date('Y-m-d', strtotime($new['post_date']));
                                    $new['pubdate'] = date('d/m/Y H:i', strtotime($new['post_date']));
                                    $View->Show($new, $tpl_m);
                                endforeach;
                            endif;
                            ?>
                </div>

                    </div>
                </div>
                  
            
          
                
                    <div class="col-md-12 col-lg-12">
                        <div class="dividerHeading">
                           <span> <a class="btn btn-small btn-default" style="text-align:center; " href="<?= HOME; ?>/categoria/noticias">Veja mais noticias</a></span>
                         </div>
                    </div>
            </div>


        </section>
       
    <!--end footer-->
    
   




