<?php
require_once '../../../autoload.php';
$objeto = new Categoria();

foreach ($objeto->paginacao((int)$_POST['perPage'], (int)$_POST['inicio']) as $row):
   ?>
   <tr>
      <td><?php echo $row->id; ?></td>
      <td><?php echo $row->nome; ?></td>
      <td class="text-center">
         <div class="custom-control custom-switch ">
            <input type="checkbox" class="custom-control-input" id="switch<?php echo $row->id; ?>" data-id="<?php echo $row->id; ?>" data-value="<?php echo $row->status; ?>" <?php echo $row->status == true ? 'checked': ''; ?>>
            <label class="custom-control-label" for="switch<?php echo $row->id; ?>"></label>
         </div>
      </td>
      <td class="text-center">
         <a href="#" class="btn btn-success" data-edit="<?php echo $row->id; ?>">Editar</a>
         <a href="#" class="btn btn-danger" data-delete="<?php echo $row->id; ?>">Excluir</a>
      </td>
   </tr>
<?php endforeach; ?>