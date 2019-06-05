$(function () {

   console.log("app.subcategoria.js carregada");

   // Pega o nome da page
   var view = "view/" + $('div[data-page]').attr('data-page'); // Pega o nome da page

   // Abre o formulario e adiciona registro   
   $(document).on('click', '#register-add', function () {
      $.ajax({
         url: view + '/form.php',
         type: 'GET',
         success: function (response) {
            let modal = $('#myModal');
            modal.find(".modal-header").addClass("bg-info").addClass("text-white");
            modal.find("h4").text("Adicionar nova subcategoria");
            modal.find('.modal-body').html(response);
            modal.find('.modal-footer').hide();
            modal.modal();
            modal.submit(function () {
               //e.preventDefault();
               let nome = $('#nome').val();
               let categoria_id = $('#categoria_id').val();
               // Salva registro no banco de dados
               $.post(view + '/add', {nome, categoria_id}, function (data) {
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
            modal.find("h4").text("Editar subcategoria");
            modal.find('.modal-body').html(response);
            modal.find('.modal-footer').hide();
            modal.modal();
            modal.submit(function () {
               let nome = $('#nome').val();
               let id = $('#id').val();
               let categoria_id = $('#categoria_id').val();

               // Altera categoria no banco de dados
               $.post(view + '/edit', {nome, id, categoria_id}, function () {
                  location.reload();
               });
            });

         }
      });
   });

  // Deleta registro
   $(document).on('click', 'a[data-delete]', function () {
      // Alert com plugin sweetalert
      swal({
         title: "Excluir",
         text: "Tem certeza que deseja excluir esse item?",
         icon: "warning",
         buttons: true,
         dangerMode: true
      }).then((willDelete) => {
         if (willDelete) {
            let id = $(this).attr('data-delete');
            $.post(view + '/delete.php', {id}, function (data) {

               let obj = JSON.parse(data);
               swal(obj.title, obj.text, {icon: obj.icon}).then((value) => {
                  location.reload();
               });

            });
         }
      });
   });

   // Altera o status do registro para ativo ou inativo
   $(document).on('click', 'input[type="checkbox"]', function () {
      let id = $(this).attr('data-id');
      let valor = $(this).attr('data-value');
      $.post(view + '/status.php', {id, valor}, function (response) {
         console.log(response);
      });
   });



});