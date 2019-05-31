<?php

require_once '../../../autoload.php';

if(!empty($_POST['id'])) {
   $id = addslashes($_POST['id']);
   $obj = new Categoria();
   if($obj->delete($id)) {
      echo "Categoria excluida com Sucesso";
   } else {
      echo "Falha ao excluir categoria";
   }
   
}