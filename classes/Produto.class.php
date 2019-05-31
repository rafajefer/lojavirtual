<?php

/**
 * Description of Categoria
 *
 * @author Rafael Jeferson <rafa.jefer@gmail.com>
 * @tutorial package
 */
class Produto extends Crud {
   
   private $table = 'produto';  
   
   
   public function find($id) {
      $result = array();
      $sql = "SELECT * FROM {$this->table} WHERE id = :id";
      $stmt = Conexao::prepare($sql);
      $stmt->bindValue(':id', $id);
      $stmt->execute();
      if($stmt->rowCount() > 0) {
         $result = $stmt->fetch();
      }
      return $result;
   }
      

   public function findAll() {
      $result = array();
      $sql = "SELECT * FROM {$this->table} ORDER BY nome asc";
      $stmt = Conexao::prepare($sql);
      $stmt->execute();
      if($stmt->rowCount() > 0) {
         $result = $stmt->fetchAll();
      }
      return $result;
   }

   public function insert($categoria_id, $subcategoria_id, $fabricante_id, $nome, $preco_alto, $preco, $descricao, $detalhes, $status, $thumbnail, $destaque) {
      $sql = "INSERT INTO $this->table (categoria_id, subcategoria_id, fabricante_id, nome, preco_alto, preco, descricao, detalhes, status, thumbnail, destaque) "
              . "VALUES (:categoria_id, :subcategoria_id, :fabricante_id, :nome, :preco_alto, :preco, :descricao, :detalhes, :status, :thumbnail, :destaque)";
      $stmt = Conexao::prepare($sql);
      $stmt->bindValue(':categoria_id', $categoria_id);
      $stmt->bindValue(':subcategoria_id', $subcategoria_id);
      $stmt->bindValue(':fabricante_id', $fabricante_id);
      $stmt->bindValue(':nome', $nome);
      $stmt->bindValue(':preco_alto', $preco_alto);
      $stmt->bindValue(':preco', $preco);
      $stmt->bindValue(':descricao', $descricao);
      $stmt->bindValue(':detalhes', $detalhes);
      $stmt->bindValue(':status', $status);
      $stmt->bindValue(':thumbnail', $thumbnail);
      $stmt->bindValue(':destaque', $destaque);
      $stmt->execute();
      if($stmt->rowCount() > 0) {
         return true;
      }
      return false;
   }
   
   public function delete($id) {
      $sql = "DELETE FROM $this->table WHERE id = :id";
      $stmt = Conexao::prepare($sql);
      $stmt->bindValue(':id', $id);
      $stmt->execute();
      if($stmt->rowCount() > 0) {
         return true;
      }
      return false;
   }
   
   public function update($id, $nome, $categoria_id) {
      $sql = "UPDATE $this->table SET nome = :nome, categoria_id = :categoria_id WHERE id = :id";
      $stmt = Conexao::prepare($sql);
      $stmt->bindValue(':nome', $nome);
      $stmt->bindValue(':categoria_id', $categoria_id);
      $stmt->bindValue(':id', $id);
      $stmt->execute();
      if($stmt->rowCount() > 0) {
         return true;
      }
      return false;
   }


   public function status($id, $valor) {
      $sql = "UPDATE $this->table SET status = :status WHERE id = :id";
      $stmt = Conexao::prepare($sql);
      $stmt->bindValue(':status', $valor);
      $stmt->bindValue(':id', $id);
      $stmt->execute();
      if($stmt->rowCount() > 0) {
         return true;
      }
      return false;
   }
   
   public function paginacao($inicio, $perPage) {
      $result = array();
      $sql = "SELECT * FROM $this->table ORDER BY nome LIMIT $perPage, $inicio ";
      $stmt = Conexao::prepare($sql);
      $stmt->execute();
      if($stmt->rowCount() > 0) {
         $result = $stmt->fetchAll();
      }      
      return $result;
   }
   
   public static function total() {
      
      $sql = "SELECT id FROM produto";
      $stmt = Conexao::prepare($sql);
      $stmt->execute();
      return $stmt->rowCount();
   }

}
