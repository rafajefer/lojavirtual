<?php
$objeto = new Subcategoria();

// total de registros cadastrados
$total = $objeto->total();

// pega valor $_GET['pagina'] ou seja valor da pagina atual
$paginaAtual = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;

// quantidade de registros por pagina
$perPage = 10;

// total de paginas
$paginacao = ceil($total / $perPage); // Arredonda pra cima
//variavel para calcular o início da visualização com base na página atual 
$inicio = ($perPage * $paginaAtual) - $perPage;

// pagina anterior e proxima
$prev = $paginaAtual - 1;
$next = $paginaAtual + 1;

// Verifica se algo foi pesquisado
if (!empty($_GET['search'])) {
   $search = addslashes($_GET['search']);
   $listagem = $objeto->search($search, $perPage, $inicio);
   $total = $objeto->total_search($search);
   // total de paginas
   $paginacao = ceil($total / $perPage); // Arredonda pra cima

   $url_paginacao = URL_ADMIN . "index.php?p=subcategorias&search=" . $search;
} else {
   $listagem = $objeto->paginacao($perPage, $inicio);
   $url_paginacao = URL_ADMIN . "index.php?p=subcategorias";
}
?>

<div data-page="subcategorias">
   <h1>Lista de Subcategoria </h1>
   <hr />   
   <div class="d-flex">
      <div>
         <form method="GET" action="index.php" id="form-search">
            <input type="hidden" name="p" value="subcategorias" /> 
            <div class="input-group mt-3 mb-3">
               <input type="text" class="form-control" placeholder="Pesquisar por..." name="search" id="search" value="<?php echo @$search ?>" />
               <div class="input-group-append">
                  <button class="btn btn-success" type="submit">Buscar</button> 
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
            <th>Subcategoria</th>
            <th class="text-center">Ativo</th>
            <th class="text-center" width="170">Ação</th>
         </tr>
      </thead>
      <tbody id="listagem">
         <?php
         foreach ($listagem as $row):
            ?>
            <tr>
               <td><?php echo $row->id; ?></td>
               <td><?php echo $row->nome; ?></td>
               <td class="text-center">
                  <div class="custom-control custom-switch ">
                     <input type="checkbox" class="custom-control-input" id="switch<?php echo $row->id; ?>" data-id="<?php echo $row->id; ?>" data-value="<?php echo $row->status; ?>" <?php echo $row->status == true ? 'checked' : ''; ?>>
                     <label class="custom-control-label" for="switch<?php echo $row->id; ?>"></label>
                  </div>
               </td>
               <td class="text-center">
                  <a href="#" class="btn btn-success" data-edit="<?php echo $row->id; ?>">Editar</a>
                  <a href="#" class="btn btn-danger" data-delete="<?php echo $row->id; ?>">Excluir</a>
               </td>
            </tr>
         <?php endforeach; ?>

      </tbody>
   </table>

   <!-- Start .\ Paginação -->
   <ul class="pagination justify-content-end <?php echo $total < $perPage ? 'd-none' : ''; ?>" data-inicio="<?php echo $inicio; ?>" data-perPage="<?php echo $perPage; ?>">
      <li class="page-item <?php echo $paginaAtual < 2 ? 'disabled' : ''; ?>"><a class="page-link" href="<?php echo $url_paginacao . '&pagina=' . $prev; ?>">Anterior</a></li>
      <?php for ($i = 1; $i <= $paginacao; $i++): ?>
         <li class="page-item <?php echo $paginaAtual == $i ? 'active' : ''; ?>"><a class="page-link" href="<?php echo $url_paginacao . '&pagina=' . $i; ?>"><?php echo $i; ?></a></li>      
      <?php endfor; ?>
      <li class="page-item <?php echo $next > $paginacao ? 'disabled' : ''; ?>"><a class="page-link" href="<?php echo $url_paginacao . '&pagina=' . $next; ?>">Próxima</a></li>
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