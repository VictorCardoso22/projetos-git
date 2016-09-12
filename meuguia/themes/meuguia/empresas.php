<!--HOME CONTENT-->
<?php
$EmpLink = $Link->getData()['empresa_link'];
$Cat = $Link->getData()['empresa_cat'];
?>
<section id="mu-our-teacher" class="cor">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-our-teacher-area">
            <!-- begain title -->
            <div class="mu-title">
              <h2><?= $Cat; ?></h2>
                    <p>Conheça as empresas cadastradas no Meu Guia. Encontre aqui serviços de <?= $Cat; ?>!</p>
         
                
                <div class="mu-our-teacher-content">
                  
                     
                            <?php
                            $getPage = (!empty($Link->getLocal()[2]) ? $Link->getLocal()[2] : 1);
                            $Pager = new Pager(HOME . '/empresas/' . $EmpLink . '/');
                            $Pager->ExePager($getPage, 15);

                            $readEmp = new Read;
                            $readEmp->ExeRead("app_empresas", "WHERE empresa_status = 1 AND empresa_categoria = :cat ORDER BY empresa_date DESC LIMIT :limit OFFSET :offset", "cat={$EmpLink}&limit={$Pager->getLimit()}&offset={$Pager->getOffset()}");
                              
                            if (!$readEmp->getResult()):
                                $Pager->ReturnPage();
                                WSErro("Desculpe, ainda não existem empresas cadastradas {$Cat}, favor volte depois!", WS_INFOR);
                            else:
                                $View = new View;
                                $tpl = $View->Load('empresa_list');
                                foreach ($readEmp->getResult() as $emp):

                                    $Cidade = new Read;
                                    $Cidade->ExeRead("app_cidades", "WHERE cidade_id = :cidadeid", "cidadeid={$emp['empresa_cidade']}");
                                    $Cidade = $Cidade->getResult()[0]['cidade_nome'];

                                    $Estado = new Read;
                                    $Estado->ExeRead("app_estados", "WHERE estado_id = :estadoid", "estadoid={$emp['empresa_uf']}");
                                    $Estado = $Estado->getResult()[0]['estado_uf'];

                                     $emp['empresa_sobre'] = Check::Words($emp['empresa_sobre'], 14);
                                    $emp['empresa_cidade'] = $Cidade;
                                    $emp['empresa_uf'] = $Estado;

                                    $View->Show($emp, $tpl);

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