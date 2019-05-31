<?php

require_once '../../../autoload.php';

if(!empty($_POST['nome'])) {
   
   $nome = addslashes($_POST['nome']);
   $telefone = addslashes($_POST['telefone']);
   $email = addslashes($_POST['email']);
   $status = intval($_POST['status']);
   
   $objeto = new Fabricante();
   if($objeto->insert($nome, $telefone, $email, $status)) {
      echo "Fabricante adicionada com Sucesso";
   } else {
      echo "Falha ao adiciona fabricante";
   }
   
}