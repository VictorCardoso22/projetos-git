<div class="content form_create">

    <article>

        <header>
            <h1>Atualizar Empresa:</h1>
        </header>

        <?php
        $empresa = filter_input(INPUT_GET, 'emp', FILTER_VALIDATE_INT);
        $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if ($data && $data['SendPostForm']):
            $data['empresa_status'] = ($data['SendPostForm'] == 'Atualizar' ? '0' : '1');
            $data['empresa_capa'] = ($_FILES['empresa_capa']['tmp_name'] ? $_FILES['empresa_capa'] : 'null');

            unset($data['SendPostForm']);
            require('_models/AdminEmpresa.class.php');
            $cadastra = new AdminEmpresa;
            $cadastra->ExeUpdate($empresa, $data);

            WSErro($cadastra->getError()[0], $cadastra->getError()[1]);
        else:
            $readEmp = new Read;
            $readEmp->ExeRead("app_empresas", "WHERE empresa_id = :emp", "emp={$empresa}");
            if (!$readEmp->getResult()):
                header('Location: painel.php?exe=empresas/index&empty=true');
            else:
                $data = $readEmp->getResult()[0];
            endif;
        endif;

        $checkCreate = filter_input(INPUT_GET, 'create', FILTER_VALIDATE_BOOLEAN);
        if ($checkCreate && empty($cadastra)):
            WSErro("A empresa <b>{$data['empresa_title']}</b> foi cadastrada com sucesso no sistema!", WS_ACCEPT);
        endif;
        ?>

        <form name="PostForm" action="" method="post" enctype="multipart/form-data">

            <label class="label">
                <span class="field">Logo da empresa: <sup>Exatamente 578x288px (JPG ou PNG)</sup></span>
                <input type="file" name="empresa_capa" />
            </label>

            <label class="label">
                <span class="field">Nome da Empresa:</span>
                <input type="text" name="empresa_title" value="<?php if (isset($data['empresa_title'])) echo $data['empresa_title']; ?>" />
            </label>

            <label class="label">
                <span class="field">Ramo de atividade:</span>
                <input type="text" name="empresa_ramo" value="<?php if (isset($data['empresa_ramo'])) echo $data['empresa_ramo']; ?>" />
            </label>

            <label class="label">
                <span class="field">Sobre a empresa:</span>
                <textarea class="js_editor" rows="10"  name="empresa_sobre" ><?php if (isset($data['empresa_sobre'])) echo $data['empresa_sobre']; ?></textarea>
            </label>

            <div class="label_line">
                <label class="label_medium">
                    <span class="field">Site da Empresa:</span>
                    <input type="url" placeholder="http://www.upinside.com.br" name="empresa_site" value="<?php if (isset($data['empresa_site'])) echo $data['empresa_site']; ?>" />
                </label>

                <label class="label_medium">
                    <span class="field">Facebook Page:</span>
                    <input type="text" placeholder="upinside" name="empresa_facebook" value="<?php if (isset($data['empresa_facebook'])) echo $data['empresa_facebook']; ?>" />
                </label>                
            </div><!-- line -->

            <label class="label">
                <span class="field">Nome da rua / Número:</span>
                <input type="text" placeholder="Rua Nome da Rua / 1287" name="empresa_endereco" value="<?php if (isset($data['empresa_endereco'])) echo $data['empresa_endereco']; ?>" />
            </label>            

            <div class="label_line">
                <label class="label_small">
                    <span class="field">Estado UF:</span>
                    <select class="j_loadstate" name="empresa_uf">
                        <option value="" selected> Selecione o estado </option>
                        <?php
                        $readState = new Read;
                        $readState->ExeRead("app_estados", "ORDER BY estado_nome ASC");
                        foreach ($readState->getResult() as $estado):
                            extract($estado);
                            echo "<option value=\"{$estado_id}\" ";
                            if (isset($data['empresa_uf']) && $data['empresa_uf'] == $estado_id): echo 'selected';
                            endif;
                            echo "> {$estado_uf} / {$estado_nome} </option>";
                        endforeach;
                        ?>                        
                    </select>
                </label>

                <label class="label_small">
                    <span class="field">Cidade:</span>
                    <select class="j_loadcity" name="empresa_cidade">
                        <?php if (!isset($data['empresa_cidade'])): ?>
                            <option value="" selected disabled> Selecione antes um estado </option>
                            <?php
                        else:
                            $City = new Read;
                            $City->ExeRead("app_cidades", "WHERE estado_id = :uf ORDER BY cidade_nome ASC", "uf={$data['empresa_uf']}");
                            if ($City->getRowCount()):
                                foreach ($City->getResult() as $cidade):
                                    extract($cidade);
                                    echo "<option value=\"{$cidade_id}\" ";
                                    if (isset($data['empresa_cidade']) && $data['empresa_cidade'] == $cidade_id):
                                        echo "selected";
                                    endif;
                                    echo "> {$cidade_nome} </option>";
                                endforeach;
                            endif;
                        endif;
                        ?>
                    </select>
                </label>

                <label class="label_small">
                    <span class="field">Indicação:</span>
                    <select name="empresa_categoria">
                           <option value="" selected> Indique a empresa como </option>
                          <option value="refrigeração-e-assistencia-técnica" <?php if (isset($data['empresa_categoria']) && $data['empresa_categoria'] == 'refrigeração-e-assistencia-técnica') echo 'selected'; ?>> Refrigeração e assistência técnica</option>

                        <option value="internet,-informática-e-insumos" <?php if (isset($data['empresa_categoria']) && $data['empresa_categoria'] == 'internet,-informática-e-insumos') echo 'selected'; ?>> Internet, Informática e insumos </option>

                        <option value="educação,-consultoria-e-curso" <?php if (isset($data['empresa_categoria']) && $data['empresa_categoria'] == 'educação,-consultoria-e-curso') echo 'selected'; ?>> Educação, Consultoria e Curso</option>

                        <option value="construção-civil-e-reforma" <?php if (isset($data['empresa_categoria']) && $data['empresa_categoria'] == 'construção-civil-e-reforma') echo 'selected'; ?>> Construção Civil e Reforma</option>

                        <option value="segurança" <?php if (isset($data['empresa_categoria']) && $data['empresa_categoria'] == 'segurança') echo 'selected'; ?>> Segurança</option>

                        <option value="banco-e-seguradora" <?php if (isset($data['empresa_categoria']) && $data['empresa_categoria'] == ' banco-e-seguradora') echo 'selected'; ?>>  Banco e Seguradora</option>

                          <option value="posto-de-combustivel,-concessionaria-e-transporte-alternativo" <?php if (isset($data['empresa_categoria']) && $data['empresa_categoria'] == 'posto-de-combustivel,-concessionaria-e-transporte-alternativo') echo 'selected'; ?>> Posto de Combustivel, Concessionaria e Transporte Alternativo </option>

                          <option value="lava-jato,-mecânica-automotiva-e-acessórios" <?php if (isset($data['empresa_categoria']) && $data['empresa_categoria'] == 'lava-jato,-mecânica-automotiva-e-acessórios') echo 'selected'; ?>> Lava Jato, Mecanica Automotiva e acessórios</option>

                          <option value="comercio-alimentício" <?php if (isset($data['empresa_categoria']) && $data['empresa_categoria'] == 'comercio-alimentício') echo 'selected'; ?>> Comercio Alimentício </option>

                          <option value="turismo,-hotelaria-e-gastronomia" <?php if (isset($data['empresa_categoria']) && $data['empresa_categoria'] == 'turismo,-hotelaria-e-gastronomia') echo 'selected'; ?>>  Turismo, hotelaria e Gastronomia</option>

                          <option value="casa-noturna,-lazer-e-recreação" <?php if (isset($data['empresa_categoria']) && $data['empresa_categoria'] == 'casa-noturna,-lazer-e-recreação') echo 'selected'; ?>>Casa Noturna, Lazer e Recreação</option>

                          <option value="publicidade,-propaganda-e-comunicação-visual" <?php if (isset($data['empresa_categoria']) && $data['empresa_categoria'] == 'publicidade,-propaganda-e-comunicação-visual') echo 'selected'; ?>> Publicidade, Propaganda e comunicação visual </option>

                          <option value="associação-e-artesanato" <?php if (isset($data['empresa_categoria']) && $data['empresa_categoria'] == 'associação-e-artesanato') echo 'selected'; ?>> Associação e Artesanato </option>

                          <option value="odontologia,-saúde-e-bem-estar" <?php if (isset($data['empresa_categoria']) && $data['empresa_categoria'] == 'odontologia,-saúde-e-bem-estar') echo 'selected'; ?>>Odontologia, Saúde e Bem estar  </option>

                          <option value="higiene,-limpeza-e-agronegócio" <?php if (isset($data['empresa_categoria']) && $data['empresa_categoria'] == 'higiene,-limpeza-e-agronegócio') echo 'selected'; ?>> Higiene, Limpeza e Agronegócio </option>

                          <option value="moda-e-artigos-diversos" <?php if (isset($data['empresa_categoria']) && $data['empresa_categoria'] == 'moda-e-artigos-diversos') echo 'selected'; ?>>  Moda e Artigos diversos </option>

                          <option value="farmácia" <?php if (isset($data['empresa_categoria']) && $data['empresa_categoria'] == 'farmácia') echo 'selected'; ?>>Farmácia  </option>

                          <option value="fotografia-e-filmagem" <?php if (isset($data['empresa_categoria']) && $data['empresa_categoria'] == 'fotografia-e-filmagem') echo 'selected'; ?>>  Fotografia e Filmagem </option>

                          <option value="advocacia,-jurídico-e-contábil" <?php if (isset($data['empresa_categoria']) && $data['empresa_categoria'] == 'advocacia,-jurídico-e-contábil') echo 'selected'; ?>> Advocacia, Jurídico e Contábil </option>

                          <option value="funerária" <?php if (isset($data['empresa_categoria']) && $data['empresa_categoria'] == 'funerária') echo 'selected'; ?>>  Funerária</option>

                          <option value="cantor,-banda-e-estrutura" <?php if (isset($data['empresa_categoria']) && $data['empresa_categoria'] == 'cantor,-banda-e-estrutura') echo 'selected'; ?>> Cantor, Banda e Estrutura  </option>

                          <option value="codominio-e-imóvel" <?php if (isset($data['empresa_categoria']) && $data['empresa_categoria'] == 'codominio-e-imóvell') echo 'selected'; ?>> Condomínio e Imóvel </option>

                          <option value="móvel,-eletro-doméstico-e-eletrônico" <?php if (isset($data['empresa_categoria']) && $data['empresa_categoria'] == 'móvel,-eletro-doméstico-e-eletrônico') echo 'selected'; ?>> Móvel, Eletro Doméstico e Eletrônico</option>

                          <option value="ótica-e-relojoaria" <?php if (isset($data['empresa_categoria']) && $data['empresa_categoria'] == 'ótica-e-relojoaria') echo 'selected'; ?>>Ótica e Relojoaria</option>

                           <option value="caldeiraria,-serralharia-e-similar" <?php if (isset($data['empresa_categoria']) && $data['empresa_categoria'] == 'caldeiraria,-serralharia-e-similar') echo 'selected'; ?>> Caldeiraria, Serralharia e Similar</option>
              
                        </label>
            </div><!--/line-->

            <div class="gbform"></div>

            <input type="submit" class="btn blue" value="Atualizar" name="SendPostForm" />
            <input type="submit" class="btn green" value="Atualizar & Publicar" name="SendPostForm" />
        </form>

    </article>

    <div class="clear"></div>
</div> <!-- content form- -->
