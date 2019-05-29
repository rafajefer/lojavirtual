<?php
require_once '../autoload.php';

$categorias = new Categoria();
foreach ($categorias->findAll() as $cat):
   ?>
   <tr>
      <td><?php echo $cat->id; ?></td>
      <td><?php echo $cat->nome; ?></td>
      <td class="text-center">
         <div class="custom-control custom-switch ">
            <input type="checkbox" class="custom-control-input" id="switch<?php echo $cat->id; ?>" data-id="<?php echo $cat->id; ?>" data-value="<?php echo $cat->status; ?>" <?php echo $cat->status == true ? 'checked': ''; ?>>
            <label class="custom-control-label" for="switch<?php echo $cat->id; ?>"></label>
         </div>
      </td>
      <td class="text-center">
         <a href="#" class="btn btn-success" data-id="<?php echo $cat->id; ?>">Editar</a>
         <a href="#" class="btn btn-danger" data-delete="<?php echo $cat->id; ?>">Excluir</a>
      </td>
   </tr>
<?php endforeach; ?>