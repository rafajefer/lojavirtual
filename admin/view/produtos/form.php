<?php 
   require_once '../../../autoload.php';
   $cat = new Categoria();
   $categorias = $cat->findAll();   
?>
<form method="POST">
   <div class="form-group">
      <label for="subcategoria">Subcategoria:</label>
   </div>
   <div class="row">
      <div class="col-4">
         <div class="form-group">
            <select class="form-control" id="categoria_id">
              <?php 
              foreach ($categorias as $categoria) {                 
               echo "<option value='$categoria->id'>$categoria->nome</option>";
              }
              ?>
            </select>
         </div>
      </div>
      <div class="col-8">
         <div class="input-group mb-3">
            <input type="text" class="form-control" id="nome" name="nome">
            <div class="input-group-append">
               <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
         </div>
      </div>
   </div>
</form>
