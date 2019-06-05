<?php

require_once '../autoload.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <title>Loja Virtual área administrativa</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      
      <link href="<?php echo URL_ADMIN ?>assets/css/reset.css" rel="stylesheet" type="text/css">
      <link href="<?php echo URL_ADMIN ?>assets/css/estilo.css" rel="stylesheet" type="text/css">

<!--      <script type="text/javascript" src="<?php echo URL_ADMIN ?>assets/js/jquery-1.4.2.min.js"></script>
      <script type="text/javascript" src="<?php echo URL_ADMIN ?>assets/js/abas.js"></script>-->
      <script  src = "<?php echo URL_ADMIN ?>assets/ckeditor/ckeditor.js" ></script> 
   </head>
   <body>
      <!-- Start .\ header -->
      <div class="mn-topo">
         <div class="conteudo"><h1>área administrativa</h1><a href="logoff.php" class="but-sair"><span>sair</span></a></div>
      </div>
      <div class="base-topo">
            <div class="conteudo">
            <section>
               <a href="index.php?link=1"><img src="<?php echo URL_ADMIN ?>assets/imagens/sua-logo.png"></a>
            <div class="bemvindo">
            <h2>BEM VINDO(A),</h2>
            <h1>Rafael Jeferson</h1>
            </div>
            </section>

            </div>
      </div>
      <div class="limpar"></div>
      <!-- End .\ header -->