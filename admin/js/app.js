$(function () {
   fetchCategorias();
   // Abre o formulario add categoria
   $(document).on('click', '#categoria-add', function () {
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
   /*
    $(document).on('change', function () {
    
    var $input = $(this);
    $("label").text($input.is( ":checked" ));
    
    alert(elemento);
    if (elemento) {
    alert("checked");
    elemento.attr("checked", "checked");
    alert("ok");
    } else {
    alert("no checked");
    }
    $.post('categoria-status.php', {id}, function (response) {
    fetchCategorias();
    console.log(response);
    });
    
    
    });
    * */
   $(document).on('click', 'input[type="checkbox"]', function () {
      let id = $(this).attr('data-id');
      let valor = $(this).attr('data-value');
      $.post('categoria-status.php', {id, valor}, function (response) {
         fetchCategorias();
         console.log(response);
      });
   });

   function fetchCategorias() {
      $.ajax({
         url: 'categoria-list.php',
         type: 'GET',
         success: function (response) {
            $("#categoria-listagem").html(response);
         }
      });
   }



});