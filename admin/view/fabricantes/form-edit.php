<?php
require_once '../../../autoload.php';

if (!empty($_POST['id'])) {
   $id = addslashes($_POST['id']);
   $obj = new Fabricante();
   $objeto = $obj->find($id);
}
?>
<form method="POST">
   <input type="hidden" id="id" value="<?php echo $objeto->id; ?>" />
   <div class="row">
      <div class="col-md-3">
         <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" value="<?php echo $objeto->telefone; ?>" />
         </div>
      </div>
      <div class="col-md-7">
         <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $objeto->email; ?>" />
         </div>
      </div>
      <div class="col-md-2">
         <div class="form-group mt-2">
            <label for="status"></label> 
            <div class="custom-control custom-switch ">
               <input type="checkbox" class="custom-control-input" id="status" <?php echo $objeto->status ? 'checked' : ''; ?>/>
               <label class="custom-control-label" for="status">Ativo</label>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12">
         <div class="form-group">
            <label for="fabricante">Fabricante:</label>
            <div class="input-group mb-3">
               <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do fabricante" value="<?php echo $objeto->nome; ?>">
               <div class="input-group-append">
                  <button type="submit" class="btn btn-primary">Salvar</button>
               </div>
            </div>   
         </div>
      </div>
   </div>
</form>
