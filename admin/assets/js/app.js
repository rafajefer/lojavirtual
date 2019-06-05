$(function () {

   console.log("app.js carregada");
   var page = $('div[data-page]').attr('data-page');
   var url = "assets/js/app-" + page + ".js";
   $.getScript(url);
   
});