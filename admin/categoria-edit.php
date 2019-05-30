<?php
require_once '../autoload.php';




if(isset($_POST['id'])) {
   
   $id = addslashes($_POST['id']);
   $nome = addslashes($_POST['nome']);
   
   $cat = new Categoria();
   
   if($cat->update($id, $nome)) {
      echo "Categoria alterado com Sucesso";
   } else {
      echo "Falha ao alterar categoria";
   }
   
} 