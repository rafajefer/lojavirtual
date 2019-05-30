<?php
require_once '../autoload.php';

if (!empty($_POST['id'])) {
   $id = addslashes($_POST['id']);
   $cat = new Categoria();
   $categoria = $cat->find($id);
}
?>
<form method="POST">
   <div class="form-group">
      <label for="categoria">Categoria:</label>
   </div>

   <input type="text" class="form-control d-none" id="categoria_id" value="<?php echo $categoria->id; ?>">
   <div class="input-group mb-3">
      <input type="text" class="form-control" id="categoria_nome" value="<?php echo $categoria->nome; ?>">
      <div class="input-group-append">
         <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
   </div>
</form>
