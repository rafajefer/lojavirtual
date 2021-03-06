<?php

/**
 * Description of Produto
 *
 * @author Rafael Jeferson <rafa.jefer@gmail.com>
 * @tutorial package
 */
class Produto extends Crud
{

    private $table = 'produto';

    // Lista registro pelo id
    public function find($id)
    {
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
    public function findAll()
    {
        $result = array();
        $sql = "SELECT * FROM {$this->table} ORDER BY nome asc";
        $stmt = Conexao::prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll();
        }
        return $result;
    }
    // Busca imagem do produto via $id
    public function getImagem($id)
    {
        $sql = "SELECT * FROM produto_imagens WHERE id = :id";
        $stmt = Conexao::prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            return $stmt->fetch();
        }
        return false;
    }

    // Busca o produto
    public function getProduto($value)
    {
        $result = array();

        if(is_int($value)) {
            $sql = "SELECT p.id, p.nome, p.preco_alto, p.preco, p.descricao, p.detalhes, p.thumbnail, c.nome as categoria_nome, c.slug as categoria_slug, s.nome as subcategoria_nome, s.slug as subcategoria_slug FROM produto AS p INNER JOIN categoria as c ON p.categoria_id = c.id INNER JOIN subcategoria as s ON s.id = p.subcategoria_id WHERE p.id = :value";
        } else {
            $sql = "SELECT p.id, p.nome, p.preco_alto, p.preco, p.descricao, p.detalhes, p.thumbnail, c.nome as categoria_nome, c.slug as categoria_slug, s.nome as subcategoria_nome, s.slug as subcategoria_slug FROM produto AS p INNER JOIN categoria as c ON p.categoria_id = c.id INNER JOIN subcategoria as s ON s.id = p.subcategoria_id WHERE p.slug = :value";
        }
        $stmt = Conexao::prepare($sql);
        $stmt->bindValue(':value', $value);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch();
            $result->imagens = array();

            $sql = "SELECT * FROM produto_imagens WHERE produto_id = :produto_id";
            $stmt = Conexao::prepare($sql);
            $stmt->bindValue(':produto_id', $result->id);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $result->imagens = $stmt->fetchAll();
            }
        }
        return $result;
    }

    // Busca todos os produtos que estiver na subcategoria informada pelo $categoria_id e que possui produtos ativos e que estão com status true
    public function getProdutos($subcategoria_id)
    {
        $result = array();
        $sql = "SELECT * FROM $this->table WHERE subcategoria_id = :subcategoria_id AND status = 1";       
        $stmt = Conexao::prepare($sql);
        $stmt->bindValue(':subcategoria_id', $subcategoria_id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll();
        }
        return $result;
    }

    public function getDestaque()
    {
        $result = array();
        $sql = "SELECT id, nome, preco_alto, preco, descricao, detalhes, thumbnail FROM $this->table WHERE destaque = 1 AND status = 1 ORDER BY RAND() DESC LIMIT 3";
        $stmt = Conexao::prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll();
        }
        return $result;
    }

    public function getLancamentos()
    {
        $result = array();
        $sql = "SELECT * FROM $this->table ORDER BY created_at DESC LIMIT 3";
    }

    public function getProdutosLimit($limit, $order = null) {
        $result = array();
        if(empty($order)) {
            $sql = "SELECT * FROM $this->table ORDER BY $this->table.nome LIMIT ".$limit;
        } else {
            $sql = "SELECT * FROM $this->table ORDER BY ".$this->table.'.'.$order." LIMIT ".$limit;
        }
        $stmt = Conexao::prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll();
        }
        return $result;
   }

    // Adiciona um novo registro na tabela
    public function insert($categoria_id, $subcategoria_id, $fabricante_id, $nome, $preco_alto, $preco, $descricao, $detalhes, $status, $destaque)
    {
        $sql = "INSERT INTO $this->table (categoria_id, subcategoria_id, fabricante_id, nome, preco_alto, preco, descricao, detalhes, status, destaque, slug) "
            . "VALUES (:categoria_id, :subcategoria_id, :fabricante_id, :nome, :preco_alto, :preco, :descricao, :detalhes, :status, :destaque, :slug)";
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
        $stmt->bindValue(':destaque', $destaque);
        $stmt->bindValue(':slug', Funcao::slug($nome));
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }

    // Exclui registro da tabela
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

    // Exclui imagem do produto
    public function delete_imagem($id)
    {        
        if($result = $this->getImagem($id)) {
            $file = "../../../".$result->url;
            //$path = "../../../assets/imagens/produtos/f4eb8c04fc537053a2e260acf53aab00.jpg";
            if(file_exists($file)) {
                if(unlink($file)) 
                    $sql = "DELETE FROM produto_imagens WHERE id = :id";
                    $stmt = Conexao::prepare($sql);
                    $stmt->bindValue(':id', $id);
                    $stmt->execute();
                    if ($stmt->rowCount() > 0) {                        
                        return "Excluido com sucesso!";
                    }
                else
                    return "Oops, Ocorreu algum erro ao excluir!";
            } else {
                return "Oops, arquivo não encontrado no diretório: ".$file;
            }
        } else {
            return "Oops, arquivo não foi localizado na nossa base de dados!";
        }
    }

    // Atualiza registro na tabela
    public function update($id, $categoria_id, $subcategoria_id, $fabricante_id, $nome, $preco_alto, $preco, $descricao, $detalhes, $status, $destaque, $imagens)
    {
        $sql = "UPDATE $this->table SET categoria_id = ?, subcategoria_id = ?, fabricante_id = ?, nome = ?, preco_alto = ?, preco = ?, descricao = ?, detalhes = ?, status = ?, destaque = ?, slug = ? WHERE id = ?";
        $stmt = Conexao::prepare($sql);
        $stmt->execute(array($categoria_id, $subcategoria_id, $fabricante_id, $nome, $preco_alto, $preco, $descricao, $detalhes, $status, $destaque, Funcao::slug($nome), $id));
        if(!empty($imagens)) {
            Upload::images($imagens, $id, "produtos");
        }
        return true;
    }

    // Atualiza imagem principal do produto thumbnail
    public function update_imagem($imagem, $id) {
        $imagem = "assets/imagens/produtos/".$imagem['name'][0];
        $sql = "UPDATE produto SET thumbnail = :thumbnail WHERE id = :id";
        $stmt = Conexao::prepare($sql);
        $stmt->bindValue(':thumbnail', $imagem);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }

    // Altera status do registro para ativo ou inativo
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

    // Lista todos os registros por pagina
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

    // Pesquisa registro na tabela
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
    
    // Retorna total de produtos de uma determinada de categoria
    public function total($categoria_id = null) {
        if(!empty($categoria_id)) {
            $sql = "SELECT count(id) as total FROM $this->table WHERE categoria_id = :categoria_id";
            $stmt = Conexao::prepare($sql);
            $stmt->bindValue(':categoria_id', $categoria_id);
        } else {
            $sql = "SELECT count(id) as total FROM $this->table";
            $stmt = Conexao::prepare($sql);
        }
       
        $stmt->execute();
        return $stmt->fetch();
    }

}
