<?php

require_once '../../../autoload.php';
echo "Pagina add produto";

echo "<pre>";
print_r($_POST);

echo "</pre>";
if(!empty($_POST['nome']) && !empty($_POST['categoria_id'])) {
   
   $categoria_id = intval($_POST['categoria_id']);
   $subcategoria_id = intval($_POST['subcategoria_id']);
   $fabricante_id = intval($_POST['fabricante_id']);   
   $nome = addslashes($_POST['nome']);
   $preco_alto = addslashes($_POST['preco_alto']);
   $preco = addslashes($_POST['preco']);
   $descricao = addslashes($_POST['descricao']);
   $status = $_POST['status'] ? 1 : 0;
   //$thumbnail = addslashes($_POST['imagem']);
   $destaque = !empty($_POST['destaque']) ? '1' : '0';
   $destalhes = '...';
   $objeto = new Produto();
   if($objeto->insert($categoria_id, $subcategoria_id, $fabricante_id, $nome, $preco_alto, $preco, $descricao, null, $status, $destaque)) {
      header("Location: ".URL_ADMIN."index.php?p=produtos");
   } else {
      header("Location: ".URL_ADMIN."index.php?p=produtos_ERROADD");
   }
   
}