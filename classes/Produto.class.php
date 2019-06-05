<?php

/**
 * Description of Categoria
 *
 * @author Rafael Jeferson <rafa.jefer@gmail.com>
 * @tutorial package
 */
class Produto extends Crud {

   private $table = 'produto';

   // Lista registro pelo id
   public function find($id) {
      $result = array();
      $sql = "SELECT * FROM $this->table WHERE id = :id";
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
   
   // Busca o produto
   public function getProduto($id) {
      $result = array();
      $sql = "SELECT p.nome, p.preco_alto, p.preco, p.descricao, p.detalhes, p.thumbnail, c.nome as cat_nome, s.nome as subcat_nome FROM produto AS p INNER JOIN categoria as c ON p.categoria_id = c.id INNER JOIN subcategoria as s ON s.id = p.subcategoria_id WHERE p.id = :id";
      $stmt = Conexao::prepare($sql);
      $stmt->bindValue(':id', $id);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
         $result = $stmt->fetch();
      }
      return $result;
   }
   
    // Busca todos os produtos que estiver na subcategoria informada
   public function getProdutos($value) {
      $result = array();
      $sql = "SELECT p.id, p.subcategoria_id, p.nome, p.preco_alto, p.preco, p.descricao, p.detalhes, p.thumbnail, c.nome as cat_nome, s.nome as subcat_nome FROM produto AS p INNER JOIN categoria as c ON p.categoria_id = c.id INNER JOIN subcategoria as s ON s.id = p.subcategoria_id WHERE p.subcategoria_id = :value LIMIT 3";
      $stmt = Conexao::prepare($sql);
      $stmt->bindValue(':value', $value);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
         $result = $stmt->fetchAll();
      }
      return $result;
   }
   
   public function getDestaque() {
      $result = array();
      $sql = "SELECT id, nome, preco_alto, preco, descricao, detalhes, thumbnail FROM produto WHERE destaque = 1 AND status = 1 ORDER BY updated_at DESC LIMIT 3";
      $stmt = Conexao::prepare($sql);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
         $result = $stmt->fetchAll();
      }
      return $result;
   }

   // Adiciona um novo registro na tabela
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
   public function update($id, $categoria_id, $subcategoria_id, $fabricante_id, $nome, $preco_alto, $preco, $descricao, $detalhes, $status, $destaque) {
      $sql = "UPDATE $this->table SET categoria_id = ?, subcategoria_id = ?, fabricante_id = ?, nome = ?, preco_alto = ?, preco = ?, descricao = ?, detalhes = ?, status = ?, destaque = ? WHERE id = ?";
      $stmt = Conexao::prepare($sql);
      $stmt->execute(array($categoria_id, $subcategoria_id, $fabricante_id, $nome, $preco_alto, $preco, $descricao, $detalhes, $status, $destaque, $id));
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
