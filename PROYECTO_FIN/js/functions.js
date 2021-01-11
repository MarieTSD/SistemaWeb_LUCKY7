jQuery(
	function(){ 
		$(".botonAccesibilidad").click(function(){
			$(".fondo").toggle();
		});
		


		//Al clicar sobre el botón de eliminar cookies, borramos la cookie	
		jQuery("#eliminaCookie").click(function(){
			Cookies.remove('colorCookie');
			Cookies.remove('cookietexto');
			Cookies.remove('cookiefuente');
		});

		
		//Función que cambia el color de fondo y guarda el valor en la cookie
		function cambiacolor(bgcolor){ 							//Recibe el color de fondo 'bgcolor'
			jQuery('#menu').css('background-color',bgcolor);
			jQuery('#menu a').css('background',bgcolor);
			jQuery('.cambiafondo').css('background-color',bgcolor);
			
			//COOKIE FONDO			
			Cookies.set('colorCookie',bgcolor);					
		}
		
		jQuery('.thumbnail').click(function(e){
			e.preventDefault();
			colorseleccionado = jQuery(this).data('color');
			cambiacolor(colorseleccionado);		
		});
		
		

		// Texto
		$('#texto').on('change',function() {
			var texto = $('#texto option:selected').val();
			alert(texto);
			if (texto == 'normal') {
			$('.cambiatexto').css({
				'font-weight': 'normal',
				'font-style': 'normal',
				'text-decoration': 'none',
				'font-size':'15px'
			});
			}    
			if (texto == 'negrita') 
			{
				$('.cambiatexto').css('font-weight', 'bold');
				$('.nav-link').css('font-size', '200%');
			}
			if (texto == 'cursiva') 
			{
				$('.cambiatexto').css('font-style', 'italic');
				$('.nav-link').css('font-size', '200%');
			}
			if (texto == 'subrayado') 
			{
				$('.cambiatexto').css('text-decoration', 'underline');
				$('.nav-link').css('font-size', '200%');
			}
			//COOKIE TEXTO
			Cookies.set('cookietexto',texto);					


		});         
		
		// Fuente
		$('#fuente').change(function() {
			var fuente = $('#fuente option:selected').val();
			$('.cambiafuente').css('font-family', fuente);
x
			//COOKIE FUENTE
			Cookies.set('cookiefuente',fuente);					//Crea una cookie llamada 'colorCookie' con el color elegido 'bgcolor'

		}); 
	
	  
		
	  
});
