<?php

require_once '../../../autoload.php';


if(!empty($_POST['search'])) {
   
   $search = addslashes($_POST['search']);
   
   $objeto = new Categoria();
   if($objeto->search($search)) {
      echo "Categoria pesquisada com Sucesso";
   } else {
      echo "Falha ao pesquisa categoria";
   }
   
}