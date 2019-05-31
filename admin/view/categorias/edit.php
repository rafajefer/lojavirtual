<?php
require_once '../../../autoload.php';

if(!empty($_POST['id'])) {
   
   $id = addslashes($_POST['id']);
   $nome = addslashes($_POST['nome']);
   
   $obj = new Categoria();
   
   if($obj->update($id, $nome)) {
      echo "Categoria alterado com Sucesso";
   } else {
      echo "Falha ao alterar categoria";
   }
   
} 