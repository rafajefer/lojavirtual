<?php

require_once '../../../autoload.php';

if(!empty($_POST['nome'])) {
   
   $nome = addslashes($_POST['nome']);
   
   $objeto = new Categoria();
   if($objeto->insert($nome)) {
      echo "Categoria adicionada com Sucesso";
   } else {
      echo "Falha ao adiciona categoria";
   }
   
}