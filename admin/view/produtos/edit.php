<?php
require_once '../../../autoload.php';

if(!empty($_POST['id'])) {
   
   $id = intval($_POST['id']);
   $categoria_id = intval($_POST['categoria_id']);
   $subcategoria_id = intval($_POST['subcategoria_id']);
   $fabricante_id = intval($_POST['fabricante_id']);   
   $nome = addslashes($_POST['nome']);
   $preco_alto = addslashes($_POST['preco_alto']);
   $preco = addslashes($_POST['preco']);
   $descricao = addslashes($_POST['descricao']);
   $status = !empty($_POST['status']) ? 1 : 0;
   //$thumbnail = addslashes($_POST['thumbnail']);
   $destaque = !empty($_POST['destaque']) ? 1 : 0;
   $detalhes = null;
   
   $objeto = new Produto();
   if($objeto->update($id, $categoria_id, $subcategoria_id, $fabricante_id, $nome, $preco_alto, $preco, $descricao, $detalhes, $status, $destaque)) {
      header("Location: ".URL_ADMIN."index.php?p=produtos");
   } else {
      header("Location: ".URL_ADMIN."index.php?p=produtos_ERROADD");
   }
   
   if($obj->update($id, $nome, $categoria_id)) {
      echo "Produto alterado com Sucesso";
   } else {
      echo "Falha ao alterar produto";
   }
   
} 
