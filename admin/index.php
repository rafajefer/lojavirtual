<?php require_once './template/header.php'; ?>
<?php $page = isset($_GET['p']) ? addslashes($_GET['p']) : false; ?>
<!-- meio -->
<div class="conteudo">
   <!--------------menu esquerdo---------------------->	
   <div class="base-esq">	
      <h1>PAINEL DE CONTROLE</h1>	
      <div class="lado-esq">
         <ul>
            <li><a href="<?php echo URL_ADMIN . "index.php" ?>">Home</a></li>
            <li><a href="<?php echo URL_ADMIN . "categorias" ?>">Categorias</a> </li>				
            <li><a href="<?php echo URL_ADMIN . "subcategorias" ?>">Subcategorias</a> </li>
            <li><a href="<?php echo URL_ADMIN . "produtos" ?>">Produtos</a> </li>
            <li><a href="<?php echo URL_ADMIN . "fabricantes" ?>">Fabricantes</a> </li>
            <li><a href="<?php echo URL_ADMIN . "capitulos" ?>">Capítulo</a> </li>
            <li><a href="<?php echo URL_ADMIN . "aulas" ?>">Aulas</a> </li>
         </ul>

      </div>
   </div>

   <!--------------fecha menu esquerdo---------------------->

   <div class="base-direita">
      <?php
      if (!empty($page)) {
         $filename = "view/$page/index.php";
         if (file_exists($filename)) {
            require_once $filename;
         }
      } else {
         require_once 'home.php';
      }
      ?>

   </div>
</div>
<?php require_once './template/footer.php'; ?>