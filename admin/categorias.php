
<h1>Lista de Categoria</h1>
<hr />
<div class="d-flex">
   <div>
      <div class="input-group mt-3 mb-3">
         <div class="input-group-prepend">
            <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown">
               Categoria
            </button>
            <div class="dropdown-menu">
               <a class="dropdown-item" href="#">Link 1</a>
               <a class="dropdown-item" href="#">Link 2</a>
               <a class="dropdown-item" href="#">Link 3</a>
            </div>
         </div>
         <input type="text" class="form-control" placeholder="Search">
         <div class="input-group-append">
            <button class="btn btn-success" type="submit">Go</button> 
         </div>
      </div>
   </div>
   <div class="ml-auto">
      <button type="button" class="btn btn-primary mt-3 mb-3" id="categoria-add">Adicionar</button>
   </div>
</div>
<table class="table table-striped mt-3">
   <thead>
      <tr>
         <th>ID</th>
         <th>Categoria</th>
         <th class="text-center">Ativo</th>
         <th class="text-center" width="170">Ação</th>
      </tr>
   </thead>
   <tbody>
      <?php
      $categorias = new Categoria();
      foreach ($categorias->findAll() as $cat):
         ?>
         <tr>
            <td><?php echo $cat->id; ?></td>
            <td><?php echo $cat->nome; ?></td>
            <td class="text-center"><?php echo $cat->status; ?></td>
            <td class="text-center">
               <a href="#" class="btn btn-success" data-id="<?php echo $cat->id; ?>">Editar</a>
               <a href="#" class="btn btn-danger">Excluir</a>
            </td>
         </tr>
      <?php endforeach; ?>
   </tbody>
</table>

<!-- The Modal -->
<div class="modal fade" id="myModal">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">

         <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">Modal Heading</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>

         <!-- Modal body -->
         <div class="modal-body">
            Modal body..
         </div>

         <!-- Modal footer -->
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
         </div>

      </div>
   </div>
</div>

