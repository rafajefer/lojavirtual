<?php

/**
 * Description of Categoria
 *
 * @author Rafael Jeferson <rafa.jefer@gmail.com>
 * @tutorial package
 */
class Produto extends Crud {

   private $table = 'produto';

   // Lista 1 produto pelo id
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
   
   // Lista todos os produtos
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

   // Insere novo produto na tabela
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
      if ($stmt->rowCount() > 0) {
         return true;
      }
      return false;
   }
   
   // Exclui produto da tabela
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

   // Atualiza dados do produto na tabela
   public function update($id, $categoria_id, $subcategoria_id, $fabricante_id, $nome, $preco_alto, $preco, $descricao, $detalhes, $status, $thumbnail, $destaque) {
      $sql = "UPDATE $this->table SET categoria_id = ?, subcategoria_id = ?, fabricante_id = ?, nome = ?, preco_alto = ?, preco = ?, descricao = ?, detalhes = ?, status = ?, thumbnail = ?, destaque = ? WHERE id = ?";
      $stmt = Conexao::prepare($sql);
      $stmt->execute(array($categoria_id, $subcategoria_id, $fabricante_id, $nome, $preco_alto, $preco, $descricao, $detalhes, $status, $thumbnail, $destaque, $id));
      if ($stmt->rowCount() > 0) {
         return true;
      }
      return false;
   }
   
   // Altera status do produto para ativo ou inativo
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
   
   // Lista produtos por paginas
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
   
   // Pesquisa produto na tabela
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

   public static function total() {

      $sql = "SELECT id FROM produto";
      $stmt = Conexao::prepare($sql);
      $stmt->execute();
      return $stmt->rowCount();
   }

}
