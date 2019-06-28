<?php

/**
 * Description of Carousel Itens
 *
 * @author Rafael Jeferson <rafa.jefer@gmail.com>
 * @tutorial package
 */

 class Carousel_itens {

    private $id;
    private $carousel_id;
    private $ordem;
    private $active;
    private $titulo;
    private $texto;
    private $imagem;
    private $url;
    private $table = 'carousel_itens';


    // Busca os itens do carousel informado
    public function getItens(Carousel $c, $active = null)
    {
        $array = array();
        if (!empty($active)) {
            $sql = "SELECT * FROM $this->table WHERE carousel_id = :carousel_id AND active = :active";
            $stmt = Conexao::prepare($sql);
            $stmt->bindValue(':carousel_id', $c->getId());
            $stmt->bindValue(':active', $active);
        } else {
            $sql = "SELECT * FROM $this->table WHERE carousel_id = :carousel_id";
            $stmt = Conexao::prepare($sql);
            $stmt->bindValue(':carousel_id', $c->getId());
        }
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            foreach($stmt->fetchAll() as $row) {
                $item = new Carousel_itens();
                $item->setId($row->id);
                $item->setCarouselId($row->carousel_id);
                $item->setOrdem($row->ordem);
                $item->setActive($row->active);
                $item->setTitulo($row->titulo);
                $item->setTexto($row->texto);
                $item->setImagem($row->imagem);
                $item->setUrl($row->url);
                array_push($array, $item);
            }
        }
        return $array;
    }

    // Set e Get Id
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    // Set e Get Carousel_id
    public function setCarouselId($carousel_id)
    {
        $this->carousel_id = $carousel_id;
    }
    public function getCarouselId()
    {
        return $this->carousel_id;
    }

    // Set e Get Ordem
    public function setOrdem($ordem)
    {
        $this->ordem = $ordem;
    }
    public function getOrdem()
    {
        return $this->ordem;
    }
    
    // Set e Get Active
    public function setActive($active)
    {
        $this->active = $active;
    }
    public function getActive()
    {
        return $this->active;
    }

    // Set e Get Titulo
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }

    // Set e Get Texto
    public function setTexto($texto)
    {
        $this->texto = $texto;
    }
    public function getTexto()
    {
        return $this->texto;
    }

    // Set e Get Imagem
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }
    public function getImagem()
    {
        return $this->imagem;
    }

    // Set e Get Url
    public function setUrl($url)
    {
        $this->url = $url;
    }
    public function getUrl()
    {
        return $this->url;
    }
 }
