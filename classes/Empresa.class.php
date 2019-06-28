<?php

/**
 * Description of Empresa
 *
 * @author Rafael Jeferson <rafa.jefer@gmail.com>
 * @tutorial package
 */
class Empresa {

    private $id;
    private $empresa;
    private $telefone;
    private $celular;
    private $email;
    private $cnpj;
    private $logo;
    private $facebook;
    private $twitter;
    private $instagram;
    private $youtube;
    private $created_at;
    private $updated_at;
    private $table = 'configuracao';

    public function __construct($id = 1)
    {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = Conexao::prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $data = $stmt->fetch();
            $this->id = $data->id;
            $this->empresa = $data->empresa;
            $this->telefone = $data->telefone;
            $this->celular = $data->celular;
            $this->email = $data->email;
            $this->cnpj = $data->cnpj;
            $this->logo = $data->logo;
            $this->facebook = $data->facebook;
            $this->twitter = $data->twitter;
            $this->instagram = $data->instagram;
            $this->youtube = $data->youtube;
            $this->created_at = $data->created_at;
            $this->updated_at = $data->updated_at;
        }
    }
    public function getEmpresa()
    {
       return $this->empresa;
    }
    public function getTelefone()
    {
        return $this->telefone;
    }
    public function getCelular()
    {
        return $this->celular;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getCnpj()
    {
        return $this->cnpj;
    }
    public function getLogo()
    {
        return $this->logo;
    }
    public function getFacebook()
    {
        return !empty($this->facebook) ? $this->facebook :  '#';
    }
    public function getTwitter()
    {
        return !empty($this->twitter) ? $this->facebook :  '#';
    }
    public function getInstagram()
    {
        return !empty($this->instagram) ? $this->facebook :  '#';
    }
    public function getYoutube()
    {
        return !empty($this->youtube) ? $this->facebook :  '#';
    }

}

