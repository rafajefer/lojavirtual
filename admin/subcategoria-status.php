<?php

require_once '../autoload.php';


if(isset($_POST['id'])) {
   
   $id = addslashes($_POST['id']);
   $valor = addslashes($_POST['valor']) == 0 ? 1 : 0;
   
   $obj = new Subcategoria();
   
   if($obj->status($id, $valor)) {
      echo "Status da subcategoria alterado com Sucesso";
   } else {
      echo "Falha ao alterar status da subcategoria";
   }
   
} 