<?php

/**
 * Seo [ MODEL ]
 * Classe de apoio para o modelo LINK. Pode ser utilizada para gerar SSEO para as páginas do sistema!
 * 
 * @copyright (c) 2014, Robson V. Leite UPINSIDE TECNOLOGIA
 */
class Seo {

    private $File;
    private $Link;
    private $Data;
    private $Tags;

    /* DADOS POVOADOS */
    private $seoTags;
    private $seoData;

    function __construct($File, $Link) {
        $this->File = strip_tags(trim($File));
        $this->Link = strip_tags(trim($Link));
    }

    /**
     * <b>Obter MetaTags:</b> Execute este método informando os valores de navegação para que o mesmo obtenha
     * todas as metas como title, description, og, itemgroup, etc.
     * 
     * <b>Deve ser usada com um ECHO dentro da tag HEAD!</b>
     * @return HTML TAGS =  Retorna todas as tags HEAD
     */
    public function getTags() {
        $this->checkData();
        return $this->seoTags;
    }

    /**
     * <b>Obter Dados:</b> Este será automaticamente povoado com valores de uma tabela single para arquivos
     * como categoria, artigo, etc. Basta usar um extract para obter as variáveis da tabela!
     * 
     * @return ARRAY = Dados da tabela
     */
    public function getData() {
        $this->checkData();
        return $this->seoData;
    }

    /*
     * ***************************************
     * **********  PRIVATE METHODS  **********
     * ***************************************
     */

    //Verifica o resultset povoando os atributos
    private function checkData() {
        if (!$this->seoData):
            $this->getSeo();
        endif;
    }

    //Identifica o arquivo e monta o SEO de acordo
    private function getSeo() {
        $ReadSeo = new Read;

        switch ($this->File):
             //SEO:: POST
            case 'artigo':
                $Admin = (isset($_SESSION['userlogin']['user_level']) && $_SESSION['userlogin']['user_level'] == 3 ? true : false);
                $Check = ($Admin ? '' : 'post_status = 1 AND');

                $ReadSeo->ExeRead("ws_posts", "WHERE {$Check} post_name = :link", "link={$this->Link}");
                if (!$ReadSeo->getResult()):
                    $this->seoData = null;
                    $this->seoTags = null;
                else:
                    $extract = extract($ReadSeo->getResult()[0]);
                    $this->seoData = $ReadSeo->getResult()[0];
                    $this->Data = [$post_title . ' - ' . SITENAME, $post_content, HOME . "/artigo/{$post_name}", HOME . "/uploads/{$post_cover}"];

                    //post:: conta views do post
                    $ArrUpdate = ['post_views' => $post_views + 1];
                    $Update = new Update();
                    $Update->ExeUpdate("ws_posts", $ArrUpdate, "WHERE post_id = :postid", "postid={$post_id}");
                endif;
                break;

             //SEO:: CATEGORIA
            case 'categoria':
                $ReadSeo->ExeRead("ws_categories", "WHERE category_name = :link", "link={$this->Link}");
                if (!$ReadSeo->getResult()):
                    $this->seoData = null;
                    $this->seoTags = null;
                else:
                    extract($ReadSeo->getResult()[0]);
                    $this->seoData = $ReadSeo->getResult()[0];
                    $this->Data = [$category_title . ' - ' . SITENAME, $category_content, HOME . "/categoria/{$category_name}", INCLUDE_PATH . '/images/site.png'];

                    //category:: conta views da categoria
                    $ArrUpdate = ['category_views' => $category_views + 1];
                    $Update = new Update();
                    $Update->ExeUpdate("ws_categories", $ArrUpdate, "WHERE category_id = :catid", "catid={$category_id}");
                endif;
                 $this->Tags = ['Noticias de TI, Blogue de tecnologia']; 
                break;
            

            //SEO:: PESQUISA
            case 'pesquisa':
                $ReadSeo->ExeRead("ws_posts", "WHERE post_status = 1 AND (post_title LIKE '%' :link '%' OR post_content LIKE '%' :link '%')", "link={$this->Link}");
                if (!$ReadSeo->getResult()):
                    $this->seoData = null;
                    $this->seoTags = null;
                else:
                    $this->seoData['count'] = $ReadSeo->getRowCount();
                    $this->Data = ["Pesquisa por: {$this->Link}" . ' - ' . SITENAME, "Sua pesquisa por {$this->Link} retornou {$this->seoData['count']} resultados!", HOME . "/pesquisa/{$this->Link}", INCLUDE_PATH . '/images/site.png'];
                endif;
                break;


            //SEO:: contato
            case 'contato':
                $this->Data = ["Contato - " . SITENAME, "Temos varios serviços para web. Criação de sites responsivos, marketing digital, logomarcas, banners e etc. peça ja um orçamento!", HOME . '/contato/' . $this->Link, INCLUDE_PATH . '/images/site.png'];
                $this->Tags = ['preço de site, contato para criação de site']; 
                break;

                 //SEO:: PORTIFOLIO-GUIA
            case 'guiamcz':
                $this->Data = ["Portifolio - Guia MCZ","Fique por dentro de tudo que rola em Maceio/AL!", HOME . '/guia/' . $this->Link, INCLUDE_PATH . '/images/site.png'];
                $this->Tags = ['Noticias em maceio, eventos em maceio, show em maceio, esporte em maceio, politica em maceio']; 
                break;
                //SEO:: PORTIFOLIO-SIGAE
            case 'sigae':
                $this->Data = ["Portifolio - SIGAE","Sistema escolar!", HOME . '/sigae/' . $this->Link, INCLUDE_PATH . '/images/sigae.png'];
                $this->Tags = ['Sistema escolar']; 
                break;
                //SEO:: PORTIFOLIO-BUSCATUDO
            case 'buscatudo':
                $this->Data = ["Portifolio - Buscatudo Serviços","Entrou, achou, saiu. É facil!", HOME . '/buscatudo/' . $this->Link, INCLUDE_PATH . '/images/buscatudo.png'];
                $this->Tags = ['Buscador de serviços, coruripe']; 
                break;

            //SEO:: PORTIFOLIO
            case 'portifolio':
                $this->Data = ["Portifolio - " . SITENAME, "Conheça todos os nossos trabalhos!", HOME . '/portifolio/' . $this->Link, INCLUDE_PATH . '/images/site.png'];
                $this->Tags = ['serviço feitos em alagoas, sites feitos em maceio, manutenção em computador maceio']; 
                break;

            //SEO:: SERVIÇOS
            case 'servicos':
                $this->Data = ["Serviços e Produtos - " . SITENAME, "Veja nossa metodologia de Trabalho, trabalhamos com criação de sites responsivos, marketing digital, logomarcas, banners e etc, seja nosso cliente!", HOME . '/servicos/' . $this->Link, INCLUDE_PATH . '/images/site.png'];
                $this->Tags = ['Criação de logomarca em alagoas, criação de banner maceio, criar banner digital, manutenção em computador maceio']; 
                break;

            //SEO:: INDEX
            case 'index':
               $this->Data = [SITENAME . ' - Desenvolvimento Web.', SITEDESC, HOME, INCLUDE_PATH . '/images/site.png'];
               $this->Tags = ['desenvolvimento de site em alagoas, criação de site em maceio, otimização de site, campanha de marketing, ']; 

                break;

            //SEO:: 404
            default :
                $this->Data = [SITENAME . ' - 404 Ops, Nada encontrado!', SITEDESC, HOME . '/404', INCLUDE_PATH . '/images/site.png'];

        endswitch;

        if ($this->Data):
            $this->setTags();
        endif;
    }

    //Monta e limpa as tags para alimentar as tags
    private function setTags() {
        $this->Tags['Title'] = $this->Data[0];
        $this->Tags['Content'] = Check::Words(html_entity_decode($this->Data[1]), 25);
        $this->Tags['Link'] = $this->Data[2];
        $this->Tags['Image'] = $this->Data[3];
        $this->Tags['tags'] = $this->Tags[0];

        $this->Tags = array_map('strip_tags', $this->Tags);
        $this->Tags = array_map('trim', $this->Tags);

        $this->Data = null;

        //NORMAL PAGE
        $this->seoTags = '<title>' . $this->Tags['Title'] . '</title> ' . "\n";
        $this->seoTags .= '<meta name="description" content="' . $this->Tags['Content'] . '"/>' . "\n";
        $this->seoTags .= '<meta name="keywords" content="' . $this->Tags['tags'] . '" />' . "\n";
        $this->seoTags .= '<meta name="robots" content="index, follow" />' . "\n";
        $this->seoTags .= '<link rel="canonical" href="' . $this->Tags['Link'] . '">' . "\n";
        $this->seoTags .= "\n";

        //FACEBOOK
        $this->seoTags .= '<meta property="og:site_name" content="' . SITENAME . '" />' . "\n";
        $this->seoTags .= '<meta property="og:locale" content="pt_BR" />' . "\n";
        $this->seoTags .= '<meta property="og:title" content="' . $this->Tags['Title'] . '" />' . "\n";
        $this->seoTags .= '<meta property="og:description" content="' . $this->Tags['Content'] . '" />' . "\n";
        $this->seoTags .= '<meta property="og:image" content="' . $this->Tags['Image'] . '" />' . "\n";
        $this->seoTags .= '<meta property="og:url" content="' . $this->Tags['Link'] . '" />' . "\n";
        $this->seoTags .= '<meta property="og:type" content="article" />' . "\n";
        $this->seoTags .= "\n";

        //ITEM GROUP (TWITTER)
        $this->seoTags .= '<meta itemprop="name" content="' . $this->Tags['Title'] . '">' . "\n";
        $this->seoTags .= '<meta itemprop="description" content="' . $this->Tags['Content'] . '">' . "\n";
        $this->seoTags .= '<meta itemprop="url" content="' . $this->Tags['Link'] . '">' . "\n";

        $this->Tags = null;
    }

}
