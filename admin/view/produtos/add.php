<?php

require_once '../../../autoload.php';

if(!empty($_POST['nome']) && !empty($_POST['categoria_id'])) {
   
   $nome = addslashes($_POST['nome']);
   $categoria_id = addslashes($_POST['categoria_id']);
   
   $objeto = new Subcategoria();
   if($objeto->insert($nome, $categoria_id)) {
      echo "Subcategoria adicionada com Sucesso";
   } else {
      echo "Falha ao adiciona subcategoria";
   }
   
}
