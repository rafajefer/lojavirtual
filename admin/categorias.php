
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
      <button type="button" class="btn btn-primary  mt-3 mb-3">Adicionar</button>
   </div>
</div>
<?php $cat = new Categoria();
 print_r($cat->findAll());
?>
<table class="table table-striped mt-3">
   <thead>
      <tr>
         <th>ID</th>
         <th>Categoria</th>
         <th>Ativo</th>
         <th>Ação</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>John</td>
         <td>Doe</td>
         <td>john@example.com</td>
         <td>
            <a href="#" class="btn btn-success">Editar</a>
            <a href="#" class="btn btn-danger">Excluir</a>
         </td>
      </tr>
   </tbody>
</table>