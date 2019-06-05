<?php

require_once '../../../autoload.php';


if(!empty($_POST['id'])) {
   
   $id = addslashes($_POST['id']);
   $valor = addslashes($_POST['valor']) == 0 ? 1 : 0;
   
   $obj = new Categoria();
   
   if($obj->status($id, $valor)) {
      //echo "Status da categoria alterado com Sucesso";
      $json = json_encode([$id, $valor]);
      echo $json;
   } else {
      echo "Falha ao alterar status da categoria";
   }
   
} 