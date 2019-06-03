<?php
require_once '../../../autoload.php';

if (!empty($_POST['id'])) :
   $id = (int) $_POST['id'];
   $objeto = new Produto();
   $obj = $objeto->find($id);

   $cat = new Categoria();
   $categorias = $cat->findAll();
   
   $sub = new Subcategoria();
   $subcategorias = $sub->findSubcategoria($obj->categoria_id);
   
   $fab = new Fabricante();
   $fabricantes = $fab->findAll();
   ?>

<form method="POST" action="view/produtos/edit.php">
   <input type="hidden" name="id" value="<?php echo $id; ?>" />
   <div class="row">
      <div class="col-md-8">
         <label for="produto">Produto</label>
         <div class="form-group">
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do produto" value="<?php echo $obj->nome; ?>">
         </div>
      </div>
      <div class="col-md-2">
         <label for="produto">Preço</label>
         <div class="form-group">
            <input type="text" class="form-control" id="preco" name="preco" placeholder="00.00" value="<?php echo $obj->preco; ?>">
         </div>
      </div>
      <div class="col-md-2">
         <label for="preco_alto">Preço alto</label>
         <div class="form-group">
            <input type="text" class="form-control" id="preco_alto" name="preco_alto" placeholder="00.00" value="<?php echo $obj->preco_alto; ?>">
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-4">
         <div class="form-group">
            <label for="categoria">Categoria:</label>
            <select class="form-control" id="categoria_id" name="categoria_id">
               <option value="0">Selecione</option>
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
      <div class="col-md-4">
         <div class="form-group">
            <label for="subcategoria">Subcategoria:</label>
            <select class="form-control" id="subcategoria_id" name="subcategoria_id">           
                <?php
                  foreach ($subcategorias as $subcategoria):
                     ?>
                     <option value="<?php echo $subcategoria->id; ?>" <?php echo $obj->subcategoria_id == $subcategoria->id ? 'selected' : ''; ?>><?php echo $subcategoria->nome; ?></option>";
                     <?php
                  endforeach;
               ?>
            </select>
         </div>
      </div>
      <div class="col-md-4">
         <div class="form-group">
            <label for="fabricante">Fabricante:</label>
            <select class="form-control" id="fabricante_id" name="fabricante_id">
               <option value="0">Selecione</option>
               <?php
                  foreach ($fabricantes as $fabricante):
                     ?>
                     <option value="<?php echo $fabricante->id; ?>" <?php echo $obj->fabricante_id == $fabricante->id ? 'selected' : ''; ?>><?php echo $fabricante->nome; ?></option>";
                     <?php
                  endforeach;
               ?>
            </select>
         </div>
      </div>      
   </div>
   <div class="row">
      <div class="col-md-8">
         <div class="custom-file mt-3">
            <input type="file" class="custom-file-input" id="imagem" name="imagem" value="teste.jpg">
            <label class="custom-file-label" for="customFile">Imagem do produto</label>
         </div>
      </div>
      <div class="col-md-2">
         <div class="form-group">
            <label for="destaque"></label> 
            <div class="custom-control custom-switch ">
               <input type="checkbox" class="custom-control-input" id="destaque" name="destaque" <?php echo $obj->destaque ? 'checked' : ''; ?> />
               <label class="custom-control-label" for="destaque">Destaque</label>
            </div>
         </div>
      </div>
      <div class="col-md-2">
         <div class="form-group">
            <label for="status"></label> 
            <div class="custom-control custom-switch ">
               <input type="checkbox" class="custom-control-input" id="status" name="status" <?php echo $obj->status ? 'checked' : ''; ?> />
               <label class="custom-control-label" for="status">Ativo</label>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12">
         <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea class="form-control" rows="5" id="descricao" name="descricao"><?php echo $obj->descricao; ?></textarea>
         </div>
      </div>
   </div><hr />
   <div class="row">
      <div class="col-md-12 d-flex justify-content-end">
         <button type="submit" class="btn btn-success px-5">Salvar</button>
      </div>
   </div>
</form>

<?php endif; ?>