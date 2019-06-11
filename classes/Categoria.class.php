<?php

/**
 * Description of Categoria
 *
 * @author Rafael Jeferson <rafa.jefer@gmail.com>
 * @tutorial package
 */
class Categoria extends Crud {

   private $table = 'categoria';

   // Busca registro pelo id ou slug
   public function find($value) {
      $result = array();
      if (is_int($value)) {
         $sql = "SELECT id, nome, status FROM $this->table WHERE id = :value";
      } else {
         $sql = "SELECT id, nome FROM $this->table WHERE slug = :value";
      }
      $stmt = Conexao::prepare($sql);
      $stmt->bindValue(':value', $value);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
         $result = $stmt->fetch();
      }
      return $result;
   }

   // Busca todos os registros na tabela
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
   // Retorna categorias que possui subcategoria e que existe produtos nela e todos tem que ser true
   public function getCategorias() {
      $result = array();
        $sql = "SELECT categoria.id, categoria.nome, categoria.slug FROM produto 
        LEFT JOIN categoria ON produto.categoria_id = categoria.id 
        LEFT JOIN subcategoria ON produto.subcategoria_id = subcategoria.id
        WHERE produto.status = 1 AND categoria.status = 1 AND subcategoria.status = 1 GROUP BY categoria.id ORDER BY categoria.nome";
        $stmt = Conexao::prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll();
        }
        return $result;
   }

   
   // Verifica se existe uma categoria com o $nome
   public function existencia($nome, $id = null) {
      $sql = "SELECT * FROM $this->table WHERE nome = :nome";
      $stmt = Conexao::prepare($sql);
      $stmt->bindValue(':nome', $nome);
      $stmt->execute();
      // caso exista
      if ($stmt->rowCount() > 0) {
         $data = $stmt->fetch();
         // verifica se id do registro localizado é diferente do que está sendo editado
         if ($data->id != $id) {
            return true;
         }
         return false;
      }
      return false;
   }

   // Busca todas as categorias com status true
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

   // Busca todas categorias e subcategorias
   public function getSubcategorias() {
      $result = array();
      $sql = "SELECT c.id as c_id, c.nome as c_nome, s.id as s_id, s.nome as s_nome FROM categoria as c INNER JOIN subcategoria as s ON c.id = s.categoria_id WHERE c.status = 1 AND s.status = 1 ORDER BY c.nome, s.nome";
      $stmt = Conexao::prepare($sql);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
         $result = $stmt->fetchAll();
      }
      return $result;
   }
   // Adicionar um novo registro na tabela
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
   
   // Exclui um registro na tabela pelo id
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
   
   // Edita um registro na tabela pelo id
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
   
   // Altera o status para ativa ou inativo do registro
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
   
   // Retorna os registro em paginacao de acordo com o LIMIT
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
   
   // Retorna os registro pesquisados em paginacao de acordo com o LIMIT
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
