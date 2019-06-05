
<div class="lado-esq">
   
   <h1>Categorias</h1>
   <?php 
      $cat = new Categoria();    
      $sub = new Subcategoria();
      foreach ($cat->getCategoriasAtivas() as $categoria) :         
         ?>
      <ul>
         <h2><a href="#"><?php echo $categoria->nome; ?></a></h2>    
         <?php 
            foreach ($sub->getSubcategoriasAtivas($categoria->id) as $subcategoria) :
               echo "<li><a href='#'>$subcategoria->nome </a></li>";
            endforeach;
            
         ?>
      </ul>
   <?php
      endforeach;
   ?>

   

</div>