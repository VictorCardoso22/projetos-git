<?php

/**
 * AdminCategory.class [MODEL ADMIN]
 * Descricao
 * @copyright (c) 2015, Victor Cardoso Curso PHP 
 */
class AdminCategory {

    private $Data;
    private $CateId;
    private $Error;
    private $Result;

    //nome da tabela no banco de dados
    const Entity = 'ws_categories';

    public function ExeCreate(array $Data) {
        $this->Data = $Data;

        if (in_array('', $this->Data)):
            $this->Result = false;
            $this->Error = ['<b>Erro ao cadastrar:</b> Para cadastrar uma categoria, preencha todos os campos!', WS_ALERT];
        else:
            $this->setData();
            $this->setName();
            $this->Create();
        endif;
    }

    public function ExeUpdate($CategoryId, array $Data) {
        $this->CateId = (int) $CategoryId;
        $this->Data = $Data;

        if (in_array('', $this->Data)):
            $this->Result = false;
            $this->Error = ["<b>Erro ao atualizar:</b> Para atualizar a categoria {$this->Data['category_title']}, preencha todos os campos!", WS_ALERT];
        else:
            $this->setData();
            $this->setName();
            $this->Update();
        endif;
    }

    public function ExeDelete($CategoryId) {
        $this->CateId = (int) $CategoryId;

        $read = new Read;
        $read->ExeRead(self::Entity, "WHERE category_id = :delid", "delid={$this->CateId}");

        if (!$read->getResult()):
            $this->Result = false;
            $this->Error = ['Ops, você tentou remover uma categoria que não existe no sistema', WS_ALERT];
        else:
            extract($read->getResult()[0]);
            if (!$category_parent && !$this->checkCats()):
                $this->Result = false;
                $this->Error = ["A <b>seção {$category_title} </b>possui categorias cadastradas. Para deletar, antes altere ou remova as categorias filhas!", WS_ALERT];
            elseif ($category_parent && !$this->checkPost()):
                $this->Result = false;
                $this->Error = ["A <b>categoria {$category_title} </b>possui artigos cadastradas. Para deletar, antes altere ou remova os posts desta categoria!", WS_ALERT];
            else:
                $delete = new Delete;
                $delete->ExeDelete(self::Entity, "WHERE category_id = :deleteid", "deleteid={$this->CateId}");

                $tipo = (empty($category_parent) ? 'seção' : 'categoria');
                $this->Result = true;
                $this->Error = ["A <b>{$tipo} {$category_title} </b>Foi removida com sucesso do sistema!", WS_ACCEPT];

            endif;
        endif;
    }

    function getResult() {
        return $this->Result;
    }

    function getError() {
        return $this->Error;
    }

    //PRIVATE

    private function setData() {
        $this->Data = array_map('strip_tags', $this->Data);
        $this->Data = array_map('trim', $this->Data);

        $this->Data['category_name'] = Check::Name($this->Data['category_title']);
        $this->Data['category_date'] = Check::Data($this->Data['category_date']);
        $this->Data['category_parent'] = ($this->Data['category_parent'] == 'null' ? null : $this->Data['category_parent'] );
    }

    private function setName() {
        $Where = (!empty($this->CateId) ? "category_id != {$this->CateId} AND" : '');

        $readName = new Read;
        $readName->ExeRead(self::Entity, "WHERE {$Where} category_title = :t", "t={$this->Data['category_title']}");
        if ($readName->getResult()):
            $this->Data['category_name'] = $this->Data['category_name'] . '-' . $readName->getRowCount();
        endif;
    }

    //Verifica Categorias da seção
    private function checkCats() {
        $readSes = new Read;
        $readSes->ExeRead(self::Entity, "WHERE category_parent = :parent", "parent={$this->CateId}");
        if ($readSes->getResult()):
            return false;
        else:
            return true;
        endif;
    }

    //Verifica arigos da categoria
    private function checkPost() {
        $readPosts = new Read;

        $readPosts->ExeRead("ws_posts", "WHERE post_category = :category", "category={$this->CateId}");
        if ($readPosts->getResult()):
            return false;
        else:
            return true;
        endif;
    }

    private function Create() {
        $create = new Create;
        $create->ExeCreate(self::Entity, $this->Data);

        if ($create->getResult()):
            $this->Result = $create->getResult();
            $this->Error = ["<b>Sucesso:</b> A categoria {$this->Data['category_title']} foi cadastrada no sistema", WS_ACCEPT];
        endif;
    }

    private function Update() {
        $Update = new Update;
        $Update->ExeUpdate(self::Entity, $this->Data, "WHERE category_id = :catid", "catid={$this->CateId}");

        if ($Update->getResult()):
            $tipo = (empty($this->Data['category_parent']) ? 'seção' : 'categoria');
            $this->Result = true;
            $this->Error = ["<b>Sucesso:</b> A {$tipo} {$this->Data['category_title']} foi atualizada no sistema", WS_ACCEPT];
        endif;
    }

}
