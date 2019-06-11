
<div class="lado-esq">
   
   <h1>Categorias</h1>
   <?php 
      $cat = new Categoria();    
      $sub = new Subcategoria();
      
      foreach ($cat->getCategorias() as $categoria) :         
         ?>
               <ul>
         <h2><a href="<?php echo URL_BASE."categoria/".$categoria->slug; ?>"><?php echo $categoria->nome; ?></a></h2>    
         <?php foreach ($sub->getSubcategorias($categoria->id) as $subcategoria) : ?>
            <li><a href="<?php echo URL_BASE."subcategoria/".$subcategoria->slug; ?>"><?php echo $subcategoria->nome; ?></a></li>
         <?php endforeach;           
         ?>
      </ul>
   <?php
      endforeach;
   ?>

   

</div>