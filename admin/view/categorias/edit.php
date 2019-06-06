<?php

require_once '../../../autoload.php';

if (!empty($_POST['id'])) {

   $id = addslashes($_POST['id']);
   $nome = addslashes($_POST['nome']);
   $status = intval($_POST['status']);

   $obj = new Categoria();
   if ($obj->existencia($nome, $id)) {
      $json = array("icon" => "error", "title" => "Oops...", "text" => "Já existe uma categoria com esse nome!");
   } else {
      if ($obj->update($id, $nome, $status)) {
         $json = array("icon" => "success", "title" => "Successo!", "text" => "Categoria alterada com sucesso!");
      } else {
         $json = array("icon" => "error", "title" => "Oops...", "text" => "Não foi possível alterar categoria");
      }
   }
} 

$jsonString = json_encode($json);

echo $jsonString;
