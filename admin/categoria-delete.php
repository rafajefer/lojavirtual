<?php

require_once '../autoload.php';

if(isset($_POST['id'])) {
   $id = addslashes($_POST['id']);
   $cat = new Categoria();
   if($cat->delete($id)) {
      echo "Categoria excluida com Sucesso";
   } else {
      echo "Falha ao excluir categoria";
   }
   
}