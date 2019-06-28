<?php

require_once 'Carousel_itens.class.php';
/**
 * Description of Carousel
 *
 * @author Rafael Jeferson <rafa.jefer@gmail.com>
 * @tutorial package
 */
    
 class Carousel {

    private $id;
    private $nome;
    private $posicao;
    private $active;
    private $itens;
    private $table = 'carousel';

    public function __construct($posicao = null, $active = null)
    {
        $sql = "SELECT * FROM $this->table WHERE posicao = :posicao";
        $stmt = Conexao::prepare($sql);
        $stmt->bindValue(':posicao', $posicao);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $data = $stmt->fetch();
            $this->id = $data->id;
            $this->nome = $data->nome;
            $this->posicao = $data->posicao;
            $this->active = $data->active;

            $itens = new Carousel_itens();            
            $this->itens = $itens->getItens($this, $active);
        } else {
            $this->id = null;
            $this->nome = null;
            $this->posicao = null;
            $this->active = null;
        }
    }

    
    public function getId()
    {
        return $this->id;
    }
    public function getItens()
    {
        return $this->itens;
    }
 }
