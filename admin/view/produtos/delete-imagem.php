<?php

require_once '../../../autoload.php';

$id = intval($_POST['id']);

$p = new Produto();
$mensagem = $p->delete_imagem($id);
echo $mensagem;
