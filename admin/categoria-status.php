<?php

require_once '../autoload.php';


if(isset($_POST['id'])) {
   
   $id = addslashes($_POST['id']);
   $valor = addslashes($_POST['valor']) == 0 ? 1 : 0;
   
   $cat = new Categoria();
   
   if($cat->status($id, $valor)) {
      echo "Status da categoria alterado com Sucesso";
   } else {
      echo "Falha ao alterar status da categoria";
   }
   
} 