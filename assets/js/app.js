/* Quando o documento estiver carregado… */
$(document).ready(function ()
{
   /* Carrega a função das abas */
   abasSimples();
   
   // Menu mobile
   $('.mobmenu').click(function () {
      $('.navmenu .conteudo').slideToggle();
      $(this).toggleClass('active');
      return false;
   });
   
   var slideAuto = setInterval(slideGo, 3000);
	
	$('.slide_nav_item.g').click(function(){
		slideGo();
		clearInterval(slideAuto);
	});
	
	$('.slide_nav_item.b').click(function(){
		slideBack();
		clearInterval(slideAuto);
	});
	
	$('.slide_item.g').dblclick(function(){
		slideAuto = setInterval(slideGo, 3000);
	});

	function slideGo(){
		if ($('.slide_item.first').next().length){
			$('.slide_item.first').fadeOut(400, function(){
				$(this).removeClass('first').next().fadeIn().addClass('first');
			});
		}else{
		$('.slide_item.first').fadeOut(400, function(){
				$('.slide_item').removeClass('first');
				$('.slide_item:eq(0)').fadeIn().addClass('first');
			});
		
		}
	}
	
	function slideBack(){
		if ($('.slide_item.first').index() > 1){
			$('.slide_item.first').fadeOut(400, function(){
				$(this).removeClass('first').prev().fadeIn().addClass('first');
			});
		}else{
		$('.slide_item.first').fadeOut(400, function(){
				$('.slide_item').removeClass('first');
				$('.slide_item:last-of-type').fadeIn().addClass('first');
			});
		
		}
	}
   
   /* Função que carrega script das abas */
   function abasSimples()
   {
      /* Guarda IDs dos elementos */
      var abas = 'p#abas';
      var conteudos = 'ul#conteudos';
      /* Oculta todas as abas */
      $(conteudos + ' li').hide();
      /* Exibe a primeira aba */
      $(conteudos + ' li:first-child').show();
      /* Quando uma aba for clicada */
      $(abas + ' a').click(function ()
      {
         /* Remove todas as classes de todas as abas */
         $(abas + ' a').removeClass('selected');
         /* Acrescenta uma classe CSS marcando visualmente a aba como selecionada */
         $(this).addClass('selected');
         /* Oculta todas as abas abertas */
         $(conteudos + ' li').hide();
         /* Exibe a aba que foi clicada */
         $(conteudos + ' ' + $(this).attr('href')).show();
         /* Fim :D */
         return false;
      });
   }
   ;
});