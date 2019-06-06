<?php

require_once '../../../autoload.php';

if (!empty($_POST['nome'])) {

   $nome = addslashes($_POST['nome']);
   $status = intval($_POST['status']);

   $objeto = new Categoria();

   if ($objeto->existencia($nome)) {
      $json = array("icon" => "error", "title" => "Oops...", "text" => "Já existe uma categoria com esse nome!");
   } else {
      if ($objeto->insert($nome, $status)) {
         $json = array("icon" => "success", "title" => "Successo!", "text" => "A categoria foi adicionada com sucesso!");
      } else {
         $json = array("icon" => "error", "title" => "Oops...", "text" => "Não foi possível adicionar a categoria");
      }
   }
}

$jsonString = json_encode($json);

echo $jsonString;
