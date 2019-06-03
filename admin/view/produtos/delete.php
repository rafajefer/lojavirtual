<?php

require_once '../../../autoload.php';

if(!empty($_POST['id'])) {
   $id = addslashes($_POST['id']);
   $obj = new Produto();
   if($obj->delete($id)) {
      echo "Produto excluido com Sucesso";
   } else {
      echo "Falha ao excluir Produto";
   }
   
}