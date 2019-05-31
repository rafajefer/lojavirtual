<?php

/**
 * Description of Categoria
 *
 * @author Rafael Jeferson <rafa.jefer@gmail.com>
 * @tutorial package
 */
class Fabricante extends Crud {
   
   private $table = 'fabricante';  
   
   
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

   public function insert($nome, $telefone, $email, $status) {
      $sql = "INSERT INTO $this->table (nome, telefone, email, status) VALUES (:nome, :telefone, :email, :status)";
      $stmt = Conexao::prepare($sql);
      $stmt->bindValue(':nome', $nome);
      $stmt->bindValue(':telefone', $telefone);
      $stmt->bindValue(':email', $email);
      $stmt->bindValue(':status', $status);
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
   
   public function update($id, $nome, $telefone, $email, $status) {
      $sql = "UPDATE $this->table SET nome = :nome, telefone = :telefone, email = :email, status = :status WHERE id = :id";
      $stmt = Conexao::prepare($sql);
      $stmt->bindValue(':id', $id);
      $stmt->bindValue(':nome', $nome);
      $stmt->bindValue(':telefone', $telefone);
      $stmt->bindValue(':email', $email);
      $stmt->bindValue(':status', $status);
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
      
      $sql = "SELECT id FROM fabricante";
      $stmt = Conexao::prepare($sql);
      $stmt->execute();
      return $stmt->rowCount();
   }

}
