$(function () {
   console.log("app.categoria.js carregada");
   fetchCategorias();
   
   // Abre o formulario add categoria   
   $(document).on('click', '#register-add', function () {
      $.ajax({
         url: 'categoria-form.php',
         type: 'GET',
         success: function (response) {
            let modal = $('#myModal');
            modal.find(".modal-header").addClass("bg-info").addClass("text-white");
            modal.find("h4").text("Adicionar nova categoria");
            modal.find('.modal-body').html(response);
            modal.find('.modal-footer').hide();
            modal.modal();
            modal.submit(function (e) {
               //e.preventDefault();
               let nome = modal.find("input").val();
               // Salva categoria no banco de dados
               $.post('categoria-add', {nome: nome}, function (data) {
                  console.log(data);
               });
            });
         }
      });
   });
   
   // Editar categoria
   $(document).on('click', 'a[data-edit]', function() {
      
      let id = $(this).attr('data-edit');
      // Chama form e carrega os dados no form
      $.ajax({
         url: 'categoria-form-edit.php',
         type: 'POST',
         data: {id},
         success: function (response) {            
            let modal = $('#myModal');
            modal.find(".modal-header").addClass("bg-info").addClass("text-white");
            modal.find("h4").text("Editar categoria");
            modal.find('.modal-body').html(response);
            modal.find('.modal-footer').hide();
            modal.modal();
            modal.submit(function () {
               let nome = $('#categoria_nome').val();
               let id = $('#categoria_id').val();
               
               // Altera categoria no banco de dados
               $.post('categoria-edit', {nome: nome, id: id}, function (data) {
                  fetchCategorias();
               });
            });
             
         }
      });
   });
   // Deleta categoria
   $(document).on('click', 'a[data-delete]', function () {
      let id = $(this).attr('data-delete');
      if (confirm('Tem certeza que deseja excluir a categoria?')) {
         $.post('categoria-delete.php', {id}, function (response) {
            fetchCategorias();
            console.log(response);
         });
      }
   });
   
   // Altera o status da categoria para ativo ou inativo
   $(document).on('click', 'input[type="checkbox"]', function () {
      let id = $(this).attr('data-id');
      let valor = $(this).attr('data-value');
      $.post('categoria-status.php', {id, valor}, function (response) {
         fetchCategorias();
         console.log(response);
      });
   });

   function fetchCategorias() {
      let perPage = $('ul[data-perPage]').attr('data-perPage');
      let inicio = $('ul[data-inicio]').attr('data-inicio');
      $.ajax({
         url: 'categoria-list.php',
         data: {perPage, inicio},
         type: 'POST',
         success: function (response) {
            $("#categoria-listagem").html(response);
         }
      });
   }



});