<?php

require_once '../../../autoload.php';

if(!empty($_POST['id'])) {
    $id = intval($_POST['id']);
    $obj = new Produto();
    $produtos = $obj->getProdutos($id);
    echo json_encode($produtos);
}
