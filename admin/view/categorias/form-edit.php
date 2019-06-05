<?php
require_once '../../../autoload.php';

if (!empty($_POST['id'])) {
   $id = intval($_POST['id']);
   $obj = new Categoria();
   $objeto = $obj->find($id);
}
?>
<form method="POST">
   <div class="form-group">
      <label for="categoria">Categoria:</label>
   </div>

   <input type="text" class="form-control d-none" id="id" value="<?php echo $objeto->id; ?>">
   <div class="input-group mb-3">
      <input type="text" class="form-control" id="nome" value="<?php echo $objeto->nome; ?>">
      <div class="input-group-append">
         <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
   </div>
</form>
