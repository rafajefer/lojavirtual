<?php

/**
 * Description of Categoria
 *
 * @author Rafael Jeferson <rafa.jefer@gmail.com>
 * @tutorial package
 */
class Fabricante extends Crud {

   private $table = 'fabricante';

   // Lista registro pelo id
   public function find($id) {
      $result = array();
      $sql = "SELECT * FROM {$this->table} WHERE id = :id";
      $stmt = Conexao::prepare($sql);
      $stmt->bindValue(':id', $id);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
         $result = $stmt->fetch();
      }
      return $result;
   }

   // Lista todos os registros
   public function findAll() {
      $result = array();
      $sql = "SELECT * FROM {$this->table} ORDER BY nome asc";
      $stmt = Conexao::prepare($sql);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
         $result = $stmt->fetchAll();
      }
      return $result;
   }

   // Adiciona um novo registro na tabela
   public function insert($nome, $telefone, $email, $status) {
      $sql = "INSERT INTO $this->table (nome, telefone, email, status) VALUES (:nome, :telefone, :email, :status)";
      $stmt = Conexao::prepare($sql);
      $stmt->bindValue(':nome', $nome);
      $stmt->bindValue(':telefone', $telefone);
      $stmt->bindValue(':email', $email);
      $stmt->bindValue(':status', $status);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
         return true;
      }
      return false;
   }

   // Exclui registro da tabela
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

   // Atualiza registro na tabela
   public function update($id, $nome, $telefone, $email, $status) {
      $sql = "UPDATE $this->table SET nome = :nome, telefone = :telefone, email = :email, status = :status WHERE id = :id";
      $stmt = Conexao::prepare($sql);
      $stmt->bindValue(':id', $id);
      $stmt->bindValue(':nome', $nome);
      $stmt->bindValue(':telefone', $telefone);
      $stmt->bindValue(':email', $email);
      $stmt->bindValue(':status', $status);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
         return true;
      }
      return false;
   }

   // Altera status do registro para ativo ou inativo
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

   // Lista todos os registros por pagina
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

   // Pesquisa registro na tabela
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

   // Retorna total de registros cadastrados
   public function total() {
      $sql = "SELECT id FROM $this->table";
      $stmt = Conexao::prepare($sql);
      $stmt->execute();
      return $stmt->rowCount();
   }

}
