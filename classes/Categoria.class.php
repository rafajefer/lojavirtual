<?php

/**
 * Description of Categoria
 *
 * @author Rafael Jeferson <rafa.jefer@gmail.com>
 * @tutorial package
 */
class Categoria extends Crud {

   private $table = 'categoria';

   public function find($value) {
      $result = array();
      if (is_int($value)) {
         $sql = "SELECT id, nome, status FROM $this->table WHERE id = :value";
      } else {
         $sql = "SELECT id, nome FROM $this->table WHERE nome = :value";
      }
      $stmt = Conexao::prepare($sql);
      $stmt->bindValue(':value', $value);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
         $result = $stmt->fetch();
      }
      return $result;
   }

   public function findAll() {
      $result = array();
      $sql = "SELECT * FROM $this->table ORDER BY nome asc";
      $stmt = Conexao::prepare($sql);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
         $result = $stmt->fetchAll();
      }
      return $result;
   }

   public function getCategoriasAtivas() {
      $result = array();
      $sql = "SELECT * FROM $this->table WHERE status = 1 ORDER BY nome ASC";
      $stmt = Conexao::prepare($sql);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
         $result = $stmt->fetchAll();
      }
      return $result;
   }

   public function getSubcategorias() {
      $result = array();
      //$sql = "SELECT * FROM categoria INNER JOIN subcategoria ON categoria.id = subcategoria.categoria_id WHERE categoria.status = 1 AND subcategoria.status = 1 ORDER BY categoria.nome, subcategoria.nome";
      $sql = "SELECT c.id as c_id, c.nome as c_nome, s.id as s_id, s.nome as s_nome FROM categoria as c INNER JOIN subcategoria as s ON c.id = s.categoria_id WHERE c.status = 1 AND s.status = 1 ORDER BY c.nome, s.nome";
      $stmt = Conexao::prepare($sql);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
         $result = $stmt->fetchAll();
      }
      return $result;
   }

   public function insert($nome, $status) {
      $sql = "INSERT INTO $this->table (nome, status, slug) VALUES (:nome, :status, :slug)";
      $stmt = Conexao::prepare($sql);
      $stmt->bindValue(':nome', $nome);
      $stmt->bindValue(':status', $status);
      $stmt->bindValue(':slug', Funcao::slug($nome));
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
         return true;
      }
      return false;
   }

   public function delete($id) {
      $sql = "DELETE FROM $this->table WHERE id = :id";
      $stmt = Conexao::prepare($sql);
      $stmt->bindValue(':id', $id);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
         return true;
      }
      return false;
   }

   public function update($id, $nome, $status) {
      $sql = "UPDATE $this->table SET nome = :nome, status = :status, slug = :slug WHERE id = :id";
      $stmt = Conexao::prepare($sql);
      $stmt->bindValue(':nome', $nome);
      $stmt->bindValue(':status', $status);
      $stmt->bindValue(':slug', Funcao::slug($nome));
      $stmt->bindValue(':id', $id);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
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
      if ($stmt->rowCount() > 0) {
         return true;
      }
      return false;
   }

   public function paginacao($inicio, $perPage) {
      $result = array();
      $sql = "SELECT * FROM $this->table ORDER BY nome LIMIT $perPage, $inicio ";
      $stmt = Conexao::prepare($sql);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
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
      if ($stmt->rowCount() > 0) {
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
