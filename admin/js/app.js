$(function () {

   console.log("app.js carregada");
   var page = $('div[data-page]').attr('data-page');
   var url = "js/app-"+page+".js";
   $.getScript(url);
});