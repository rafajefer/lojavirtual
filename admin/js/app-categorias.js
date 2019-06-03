$(function () {

   console.log("app.categoria.js carregada");

   // Pega o nome da page
   var view = "view/" + $('div[data-page]').attr('data-page');

   // Abre o formulario e adiciona registro   
   $(document).on('click', '#register-add', function () {
      $.ajax({
         url: view + '/form.php',
         type: 'GET',
         success: function (response) {
            let modal = $('#myModal');
            modal.find(".modal-header").addClass("bg-info").addClass("text-white");
            modal.find("h4").text("Adicionar nova categoria");
            modal.find('.modal-body').html(response);
            modal.find('.modal-footer').hide();
            modal.modal();
            modal.submit(function () {
               let nome = $('#nome').val();
               // Salva registro no banco de dados
               $.post(view + '/add', {nome: nome}, function (data) {
                  console.log(data);
               });
            });
         }
      });
   });

   // Editar registro
   $(document).on('click', 'a[data-edit]', function () {

      let id = $(this).attr('data-edit');
      // Chama form e carrega os dados no form
      $.ajax({
         url: view + '/form-edit.php',
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
               let nome = $('#nome').val();
               let id = $('#id').val();

               // Altera categoria no banco de dados
               $.post(view + '/edit', {nome: nome, id: id}, function (data) {
                  fetchAll();
               });
            });

         }
      });
   });

   // Deleta categoria
   $(document).on('click', 'a[data-delete]', function () {
      let id = $(this).attr('data-delete');
      if (confirm('Tem certeza que deseja excluir esse item?')) {
         $.post(view + '/delete.php', {id}, function () {
            location.reload();
         });
      }
   });

   // Altera o status da categoria para ativo ou inativo
   $(document).on('click', 'input[type="checkbox"]', function () {
      let id = $(this).attr('data-id');
      let valor = $(this).attr('data-value');
      $.post(view + '/status.php', {id, valor}, function (response) {
         console.log(response);
      });
   });

   // Impede de enviar o formulário caso campo esteja vázio
   $('#form-search').submit(function (e) {
      if ($('#search').val().length < 1) {
         e.preventDefault();
      }
   });

});