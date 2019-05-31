<?php
require_once '../../../autoload.php';

if(!empty($_POST['id'])) {
   
   $id = intval($_POST['id']);   
   $nome = addslashes($_POST['nome']);
   $telefone = addslashes($_POST['telefone']);
   $email = addslashes($_POST['email']);
   $status = intval($_POST['status']);
   
   $objeto = new Fabricante();
   if($objeto->update($id, $nome, $telefone, $email, $status)) {
      echo "Fabricante alterado com Sucesso";
   } else {
      echo "Falha ao alterar fabricante";
   }
   
} 