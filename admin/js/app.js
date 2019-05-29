$(function () {

   // Abre o formulario add categoria
   $(document).on('click', '#categoria-add', function () {
      $.ajax({
         url: 'categorias-form.php',
         type: 'GET',
         success: function (response) {
            let modal = $('#myModal');
            modal.find(".modal-header").addClass("bg-info").addClass("text-white");
            modal.find("h4").text("Adicionar nova categoria");
            modal.find('.modal-body').html(response);
            modal.find('.modal-footer').hide();
            modal.modal();
            modal.submit(function(e) {
               //e.preventDefault();
               let nome = modal.find("input").val();
               // Salva categoria no banco de dados
               $.post('categorias-add', { nome: nome }, function(data) {
                  console.log(data);
               });
            });
         }
      });
   });
   
});