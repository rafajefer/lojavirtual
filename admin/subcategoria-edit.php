<?php
require_once '../autoload.php';




if(!empty($_POST['id'])) {
   
   $id = addslashes($_POST['id']);
   $nome = addslashes($_POST['nome']);
   $categoria_id = addslashes($_POST['categoria_id']);
   
   $obj = new Subcategoria();
   
   if($obj->update($id, $nome, $categoria_id)) {
      echo "Subcategoria alterado com Sucesso";
   } else {
      echo "Falha ao alterar Subcategoria";
   }
   
} 