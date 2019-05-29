<?php

require_once '../autoload.php';

if(isset($_POST['nome'])) {
   $nome = addslashes($_POST['nome']);
   $cat = new Categoria();
   if($cat->insert($nome)) {
      echo "Categoria adicionada com Sucesso";
   } else {
      echo "Falha ao adiciona categoria";
   }
   
}