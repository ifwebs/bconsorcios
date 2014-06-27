/*==============================================================================*/

$(document).ready(function() {
    $('.banner').unslider({
        speed: 1000, //  The speed to animate each slide (in milliseconds)
        delay: 7000, //  The delay between slide animations (in milliseconds)
        complete: function() {}, //  A function that gets called after every slide animation
        keys: true, //  Enable keyboard (left, right) arrow shortcuts
        dots: true, //  Display dot navigation
        fluid: false //  Support responsive design. May break non-responsive designs
    });
    /*rolar*/
    $(window).scroll(function() {
        var top = $(window).scrollTop();
        if (top > 80) {

            $(".header").addClass('header2');
            $(".header2").removeClass('header');
            $(".logo").addClass('logo2');
            $(".logo2").removeClass('logo');
            $(".fone-menu").addClass('fone-menu2');
            $(".fone-menu2").removeClass('fone-menu');
            $(".menu").addClass('menu2');
            $(".menu2").removeClass('menu');
            $(".slider").css("padding-top", "120px");
        } else {
            $(".header2").addClass('header');
            $(".header").removeClass('header2');
            $(".logo2").addClass('logo');
            $(".logo").removeClass('logo2');
            $(".fone-menu2").addClass('fone-menu');
            $(".fone-menu").removeClass('fone-menu2');
            $(".menu2").addClass('menu');
            $(".menu").removeClass('menu2');
            $(".slider").css("padding-top", "0px");

        }
    });
    
    $('#ajax_form').submit(function(){
    	var dados = jQuery( this ).serialize();

    	jQuery.ajax({
    		type: "POST",
    		url: "includes/newsletter.php",
    		data: dados,
    		success: function( data ){
    			$("#msg").addClass('alert-ok').text(" Email salvo com sucesso!");
    		},
	    	error: function( data ){
				$("#msg").addClass('alert-erro').text(" Erro ao salvar email!");
			} 
    	});
    	
    	return false;
    });
    
    $(function(){
    	// abas
    	// oculta todas as abas
    	$(".contaba").hide();
    	// mostra somente  a primeira aba
    	$(".contaba:first").show();
    	// seta a primeira aba como selecionada (na lista de abas)
    	$(".links_form a:first").addClass("ativo");
    	 
    	// quando clicar no link de uma aba
    	$(".links_form a").click(function(){
    	// oculta todas as abas
    	$(".contaba").hide('slow');
    	// tira a seleção da aba atual
    	$(".links_form a").removeClass("ativo");
    	
    	
    	// adiciona a classe ativo na selecionada atualmente
    	$(this).addClass("ativo");
    	// mostra a aba clicada
    	$($(this).attr("href")).show('slow');
    	// pra nao ir para o link
    	return false;
    	});
    	
    	$(".seg").hide();
    	$(".com_seg").hide();
    	$(".s_seg").click(function(){
        	// oculta todas as abas
        	$(".seg").show('slow');
        	$(".sem_seg").hide('slow');
        	$(".com_seg").show('slow');
        	});
    	$(".n_seg").click(function(){
        	// oculta todas as abas
        	$(".seg").hide('slow');
        	$(".com_seg").hide();
        	$(".sem_seg").show('slow');
        	});
    });
    $("#accordion section h1").click(function(e) {
        $(this).parents().siblings("section").addClass("ac_hidden");
        $(this).parents("section").removeClass("ac_hidden");

        e.preventDefault();
      });

});

function resumo(){
	alert("ok");
	/*var nome = document.getElementById("nome").value;
	console.log(nome);*/
	//document.getElementById("res_nome").value = nome;
}
