<?php

require_once '../../../autoload.php';

if (!empty($_POST['id'])) {
   
   $id = addslashes($_POST['id']);
   $obj = new Categoria();
   // Verifica se existe um registro com esse id
   if ($obj->find($id)) {
      if ($obj->delete($id)) {
         $json = array("icon" => "success", "title" => "Sucesso!", "text" => "A categoria selecionada foi excluida com Sucesso!");
      } else {
         $json = array("icon" => "error", "title" => "Erro!", "text" => "Falha ao excluir categoria");
      }
   } else {
      $json = array("icon" => "error", "title" => "Error!", "text" => "Nenhum registro encontrado!");
   }
}

$jsonString = json_encode($json);

echo $jsonString;
