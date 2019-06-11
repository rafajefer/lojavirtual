<?php

/**
 * Description of Categoria
 *
 * @author Rafael Jeferson <rafa.jefer@gmail.com>
 * @tutorial package
 */
class Subcategoria extends Crud
{

    private $table = 'subcategoria';

    // Busca registro pelo id ou slug
    public function find($value)
    {
        $result = array();
        if (is_int($value)) {
            $sql = "SELECT * FROM $this->table WHERE id = :value";
        } else {
            $sql = "SELECT * FROM $this->table WHERE slug = :value";
        }
        $stmt = Conexao::prepare($sql);
        $stmt->bindValue(':value', $value);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch();
        }
        return $result;
    }

    public function findAll()
    {
        $result = array();
        $sql = "SELECT * FROM $this->table ORDER BY nome asc";
        $stmt = Conexao::prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll();
        }
        return $result;
    }
    // Busca todas as subcategorias status true que estiver na categoria informada pelo $categoria_id e que possui produtos com status true
    public function getSubcategorias($categoria_id)
    {
        $result = array();
        $sql = "SELECT
                s.nome, s.id FROM $this->table AS s RIGHT JOIN produto AS p ON p.subcategoria_id = s.id 
                WHERE s.categoria_id = :categoria_id AND s.status = 1 AND p.status = 1  GROUP BY s.id ORDER BY nome ASC";
        $stmt = Conexao::prepare($sql);
        $stmt->bindValue(':categoria_id', $categoria_id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll();
        }
        return $result;
    }

    // Busca as subcategorias com status true e categoria_id = $categoria_id e que possuí produtos cadastrados
    public function getSubcategoriasAtivas($categoria_id)
    {
        $result = array();
        $sql = "SELECT * FROM $this->table WHERE  categoria_id = :categoria_id AND status = 1 ORDER BY nome ASC";
        $stmt = Conexao::prepare($sql);
        $stmt->bindValue(':categoria_id', $categoria_id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll();
        }
        return $result;
    }

    // Busca as subcategorias referente ao categoria_id
    public function findSubcategoria($categoria_id)
    {
        $result = array();
        $sql = "SELECT * FROM $this->table WHERE categoria_id = :categoria_id ORDER BY nome asc";
        $stmt = Conexao::prepare($sql);
        $stmt->bindValue(':categoria_id', $categoria_id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll();
        }
        return $result;
    }

    public function insert($nome, $status, $categoria_id)
    {
        $sql = "INSERT INTO $this->table (nome, status, slug, categoria_id) VALUES (:nome, :status, :slug, :categoria_id)";
        $stmt = Conexao::prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':status', $status);
        $stmt->bindValue(':categoria_id', $categoria_id);
        $stmt->bindValue(':slug', Funcao::slug($nome));
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $stmt = Conexao::prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }

    public function update($id, $nome, $categoria_id)
    {
        $sql = "UPDATE $this->table SET nome = :nome, slug = :slug, categoria_id = :categoria_id WHERE id = :id";
        $stmt = Conexao::prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':slug', Funcao::slug($nome));
        $stmt->bindValue(':categoria_id', $categoria_id);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }

    public function status($id, $valor)
    {
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

    public function paginacao($inicio, $perPage)
    {
        $result = array();
        $sql = "SELECT * FROM $this->table ORDER BY nome LIMIT $perPage, $inicio ";
        $stmt = Conexao::prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll();
        }
        return $result;
    }

    public function search($search, $inicio, $perPage)
    {
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
    public function total_search($search)
    {
        $sql = "SELECT id FROM $this->table  WHERE nome LIKE :search";
        $stmt = Conexao::prepare($sql);
        $stmt->bindValue(':search', "%$search%");
        $stmt->execute();
        return $stmt->rowCount();
    }


    // Retorna total de subcategorias de uma determinada de categoria
    public function total($categoria_id = null) {
        if(!empty($categoria_id)) {
            $sql = "SELECT id, count(id) as total FROM $this->table WHERE categoria_id = :categoria_id";
            $stmt = Conexao::prepare($sql);
            $stmt->bindValue(':categoria_id', $categoria_id);
        } else {
            $sql = "SELECT id FROM $this->table";
            $stmt = Conexao::prepare($sql);
        }
       
        $stmt->execute();
        return $stmt->fetch();
    }

}
