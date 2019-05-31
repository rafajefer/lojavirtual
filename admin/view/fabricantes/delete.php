<?php

require_once '../../../autoload.php';

if(!empty($_POST['id'])) {
   $id = intval(($_POST['id']));
   $obj = new Fabricante();
   if($obj->delete($id)) {
      echo "Fabricante excluida com Sucesso";
   } else {
      echo "Falha ao excluir fabricante";
   }
   
}