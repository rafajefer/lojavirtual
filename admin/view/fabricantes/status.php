<?php

require_once '../../../autoload.php';


if(!empty($_POST['id'])) {
   
   $id = addslashes($_POST['id']);
   $valor = addslashes($_POST['valor']) == 0 ? 1 : 0;
   
   $obj = new Fabricante();
   
   if($obj->status($id, $valor)) {
      echo "Status do fabricante alterado com Sucesso";
   } else {
      echo "Falha ao alterar status do fabricante";
   }
   
} 