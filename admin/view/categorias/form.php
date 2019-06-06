<form method="POST">
   <div class="row">
      <div class="col-md-10">
         <div class="form-group">
            <label for="categoria">Categoria:</label>
         </div>
         <div class="input-group mb-3">
            <input type="text" class="form-control" id="nome" name="nome">
            <div class="input-group-append">
               <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
         </div>
      </div>
      <div class="col-md-2 mt-4">
         <div class="form-group">
            <label for="status"></label> 
            <div class="custom-control custom-switch ">
               <input type="checkbox" class="custom-control-input" id="status" name="status" />
               <label class="custom-control-label" for="status">Ativo</label>
            </div>
         </div>
      </div>
   </div>
</form>
