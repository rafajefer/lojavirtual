<?php 
   if(!empty($_GET['search'])) {
      $search = addslashes($_GET['search']);
      $obj = new Categoria();
      $result = $obj->search($search);
      //print_r($result);
   }
?>
<div data-page="categorias">
   <h1>Lista de Categoria: </h1>
   <hr />   
   <div class="d-flex">
      <div>
         <form method="GET" action="index.php">
            <input type="hidden" name="p" value="categorias" /> 
            <div class="input-group mt-3 mb-3">
               <input type="text" class="form-control" placeholder="Pesquisar por..." name="search" id="search" />
               <div class="input-group-append">
                  <button class="btn btn-success" type="submit" id="btn-search">Buscar</button> 
               </div>
            </div>
         </form>
      </div>
      <div class="ml-auto">
         <button type="button" class="btn btn-primary mt-3 mb-3" id="register-add">Adicionar</button>
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
      <tbody id="listagem">

      </tbody>
   </table>
   <?php
   // total de registros cadastrados
   $total = Categoria::total();

   // pega valor $_GET['pagina'] ou seja valor da pagina atual
   $paginaAtual = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;

   // quantidade de registros por pagina
   $perPage = 10;

   // total de paginas
   $paginacao = ceil($total / $perPage); // Arredonda pra cima

   /* $inicio = $paginaAtual - 1;
     $inicio = $inicio * $total;
    */
   //variavel para calcular o início da visualização com base na página atual 
   $inicio = ($perPage * $paginaAtual) - $perPage;

   // pagina anterior e proxima
   $prev = $paginaAtual - 1;
   $next = $paginaAtual + 1;
   ?>
   <!-- Start .\ Paginação -->
   <ul class="pagination justify-content-end <?php echo $total < $perPage ? 'd-none' : ''; ?>" data-inicio="<?php echo $inicio; ?>" data-perPage="<?php echo $perPage; ?>">
      <li class="page-item <?php echo $paginaAtual < 2 ? 'disabled' : ''; ?>"><a class="page-link" href="<?php echo URL_ADMIN . 'index.php?p=categorias&pagina=' . $prev; ?>">Anterior</a></li>
      <?php for ($i = 1; $i <= $paginacao; $i++): ?>
         <li class="page-item <?php echo $paginaAtual == $i ? 'active' : ''; ?>"><a class="page-link" href="<?php echo URL_ADMIN . 'index.php?p=categorias&pagina=' . $i; ?>"><?php echo $i; ?></a></li>      
      <?php endfor; ?>
      <li class="page-item <?php echo $next > $paginacao ? 'disabled' : ''; ?>"><a class="page-link" href="<?php echo URL_ADMIN . 'index.php?p=categorias&pagina=' . $next; ?>">Próxima</a></li>
   </ul>
   <!-- End .\ Paginação -->

   <!-- The Modal -->
   <div class="modal fade" id="myModal" tabindex="-1">
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
</div>