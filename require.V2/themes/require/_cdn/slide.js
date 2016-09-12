$(function(){
	var liwidth = $("#galeria ul li").outerWidth(),
		speed	= 5000,
		rotate	= setInterval(auto, speed);


	/* MOSTRA OS BOTÕES */
	$("section#galeria").hover(function(){
		$("section#buttons").fadeIn();
		clearInterval(rotate);
	},function(){
		$("section#buttons").fadeOut();
		rotate = setInterval(auto, speed);
	});

	

	//PROXIMO
	$(".next").click(function(e){
			e.preventDefault();

			$("section#galeria ul").css({'Width':'99999%'}).animate({left:-liwidth}, function(){
				$("#galeria ul li").last().after($("#galeria ul li").first());
				$(this).css({'left':'0', 'width':'auto'});
			});
	});

	//VOLTAR
	$(".prev").click(function(e){
		e.preventDefault();

		
		$("#galeria ul li").first().before($("#galeria ul li").last().css({'margin-left':-liwidth}));
		$("section#galeria ul").css({'Width':'99999%'}).animate({left:liwidth}, function(){
			$("#galeria ul li").first().css({'margin-left':'0'});
			$(this).css({'left':'0', 'width':'auto'});
		});

	});

	function auto(){
		$('.next').click();
	}
});