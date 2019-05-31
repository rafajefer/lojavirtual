<?php
require_once '../../../autoload.php';

if (!empty($_POST['id'])) :
   $id = (int) $_POST['id'];
   $objeto = new Subcategoria();
   $obj = $objeto->find($id);

   $cat = new Categoria();
   $categorias = $cat->findAll();
   ?>
   <form method="POST">
      <div class="form-group">
         <label for="subcategoria">Subcategoria:</label>
      </div>

      <input type="hidden" class="form-control" id="id" value="<?php echo $obj->id; ?>">
      <div class="row">
         <div class="col-4">
            <div class="form-group">
               <select class="form-control" id="categoria_id">
                  <?php
                  foreach ($categorias as $categoria):
                     ?>
                     <option value="<?php echo $categoria->id; ?>" <?php echo $obj->categoria_id == $categoria->id ? 'selected' : ''; ?>><?php echo $categoria->nome; ?></option>";
                     <?php
                  endforeach;
                  ?>
               </select>
            </div>
         </div>
         <div class="col-8">
            <div class="input-group mb-3">
               <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $obj->nome; ?>">
               <div class="input-group-append">
                  <button type="submit" class="btn btn-primary">Salvar</button>
               </div>
            </div>
         </div>
      </div>
   </form>
<?php endif; ?>