<?php
require_once '../../../autoload.php';
$cat = new Categoria();
$sub = new Subcategoria();
$fab = new Fabricante();

$categorias = $cat->findAll();
$subcategorias = $sub->findAll();
$fabricantes = $fab->findAll();

?>

<form method="POST">
   <div class="row">
      <div class="col-md-8">
         <label for="produto">Produto</label>
         <div class="form-group">
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do produto">
         </div>
      </div>
      <div class="col-md-2">
         <label for="produto">Preço</label>
         <div class="form-group">
            <input type="text" class="form-control" id="preco" name="preco" placeholder="00.00">
         </div>
      </div>
      <div class="col-md-2">
         <label for="preco_alto">Preço alto</label>
         <div class="form-group">
            <input type="text" class="form-control" id="preco_alto" name="preco_alto" placeholder="00.00">
         </div>
      </div>
      <div class="col-md-2">
         <div class="form-group mt-2">
            <label for="destaque"></label> 
            <div class="custom-control custom-switch ">
               <input type="checkbox" class="custom-control-input" id="destaque" />
               <label class="custom-control-label" for="destaque">Destaque</label>
            </div>
         </div>
      </div>
      <div class="col-md-2">
         <div class="form-group mt-2">
            <label for="status"></label> 
            <div class="custom-control custom-switch ">
               <input type="checkbox" class="custom-control-input" id="status" />
               <label class="custom-control-label" for="status">Ativo</label>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-4">
         <div class="form-group">
            <label for="categoria">Categoria:</label>
            <select class="form-control" id="categoria_id">
               <option value="0">Selecione</option>
               <?php
               foreach ($categorias as $categoria) {
                  echo "<option value='$categoria->id'>$categoria->nome</option>";
               }
               ?>
            </select>
         </div>
      </div>
      <div class="col-md-4">
         <div class="form-group">
            <label for="subcategoria">Subcategoria:</label>
            <select class="form-control" id="subcategoria_id">
               <option value="0">Selecione</option>
               <?php
               foreach ($categorias as $categoria) {
                  echo "<option value='$categoria->id'>$categoria->nome</option>";
               }
               ?>
            </select>
         </div>
      </div>
      <div class="col-md-4">
         <div class="form-group">
            <label for="fabricante">Fabricante:</label>
            <select class="form-control" id="fabricante_id">
               <option value="0">Selecione</option>
               <?php
               foreach ($fabricantes as $fabricante) {
                  echo "<option value='$fabricante->id'>$fabricante->nome</option>";
               }
               ?>
            </select>
         </div>
      </div>
      
   </div><hr />
   <div class="row">
      <div class="col-md-12 d-flex justify-content-end">
         <button type="submit" class="btn btn-success px-5">Salvar</button>
      </div>
   </div>
</form>
