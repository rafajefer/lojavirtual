<?php

require_once '../../../autoload.php';

if(!empty($_POST['nome'])) {
   
   $nome = addslashes($_POST['nome']);
   $status = intval($_POST['status']);
   
   $objeto = new Categoria();
   if($objeto->insert($nome, $status)) {
      echo "Categoria adicionada com Sucesso";
   } else {
      echo "Falha ao adiciona categoria";
   }
   
}