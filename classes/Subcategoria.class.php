<?php

/**
 * Description of Categoria
 *
 * @author Rafael Jeferson <rafa.jefer@gmail.com>
 * @tutorial package
 */
class Subcategoria extends Crud {
   
   private $table = 'subcategoria';  
   
   
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
   
   // Busca as subcategorias referente ao categoria_id
   public function findSubcategoria($categoria_id) {
      $result = array();
      $sql = "SELECT * FROM $this->table WHERE categoria_id = :categoria_id ORDER BY nome asc";
      $stmt = Conexao::prepare($sql);
      $stmt->bindValue(':categoria_id', $categoria_id);
      $stmt->execute();
      if($stmt->rowCount() > 0) {
         $result = $stmt->fetchAll();
      }
      return $result;
   }

   public function insert($subcategoria, $categoria_id) {
      $sql = "INSERT INTO $this->table (nome, categoria_id) VALUES (:nome, :categoria_id)";
      $stmt = Conexao::prepare($sql);
      $stmt->bindValue(':nome', $subcategoria);
      $stmt->bindValue(':categoria_id', $categoria_id);
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
   
   public function search($search, $inicio, $perPage) {
      $result = array();
      $sql = "SELECT * FROM $this->table  WHERE nome LIKE :search ORDER BY nome LIMIT $perPage, $inicio";
      $stmt = Conexao::prepare($sql);
      $stmt->bindValue(':search', "%$search%");
      $stmt->execute();
      if($stmt->rowCount() > 0) {
         $result = $stmt->fetchAll();
      }
      return $result;      
   }
   
   // Retorna total de registro na busca
   public function total_search($search) {
      $sql = "SELECT id FROM $this->table  WHERE nome LIKE :search";
      $stmt = Conexao::prepare($sql);
      $stmt->bindValue(':search', "%$search%");
      $stmt->execute();
      return $stmt->rowCount();
   }

   // Retorna total de registro
   public function total() {      
      $sql = "SELECT id FROM $this->table";
      $stmt = Conexao::prepare($sql);
      $stmt->execute();
      return $stmt->rowCount();
   }
   
   

}
