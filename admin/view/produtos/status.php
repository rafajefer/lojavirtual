<?php

require_once '../../../autoload.php';


if(isset($_POST['id'])) {
   
   $id = intval($_POST['id']);
   $valor = intval($_POST['valor']) == 0 ? 1 : 0;
   
   $obj = new Produto();
   
   if($obj->status($id, $valor)) {
      echo "Status do produto alterado com Sucesso";
   } else {
      echo "Falha ao alterar status do produto";
   }
   
} 