<?php

require_once '../autoload.php';

if(isset($_POST['id'])) {
   $id = addslashes($_POST['id']);
   $obj = new Subcategoria();
   if($obj->delete($id)) {
      echo "Subcategoria excluida com Sucesso";
   } else {
      echo "Falha ao excluir Subcategoria";
   }
   
}