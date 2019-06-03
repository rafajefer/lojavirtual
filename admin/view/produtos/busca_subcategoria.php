<?php

require_once '../../../autoload.php';

if (isset($_POST['categoria_id'])) {
   $categoria_id = intval($_POST['categoria_id']);

   $subcat = new Subcategoria();
   $result = $subcat->findSubcategoria($categoria_id);
}

$jsonString = json_encode($result);
echo $jsonString;