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
        var larg = $(window).width();
        if (larg > 1100) {
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
        };
    });

$('#ajax_form').submit(function() {
    var dados = jQuery(this).serialize();

    jQuery.ajax({
        type: "POST",
        url: "includes/newsletter.php",
        data: dados,
        success: function(data) {
            $("#msg").addClass('alert-ok').text(" Email salvo com sucesso!");
        },
        error: function(data) {
            $("#msg").addClass('alert-erro').text(" Erro ao salvar email!");
        }
    });

    return false;
});

$(function() {
        // P, PR
        parcela = "P";
        // SS, CS
        seguro = "SS"
        // abas
        // oculta todas as abas
        $(".contaba").hide();
        // mostra somente  a primeira aba
        $(".contaba:first").show();
        // seta a primeira aba como selecionada (na lista de abas)
        $(".links_form a:first").addClass("ativo");

        // quando clicar no link de uma aba
        $(".links_form a").click(function() {
            // oculta todas as abas
            $(".contaba").hide('fast');
            // tira a seleção da aba atual
            $(".links_form a").removeClass("ativo");


            // adiciona a classe ativo na selecionada atualmente
            $(this).addClass("ativo");
            // mostra a aba clicada
            $($(this).attr("href")).show('fast');
            // pra nao ir para o link
            return false;
        });
        // quando clicar no botão avancar
        // $(".btn-avancar").click(function() {
        //     // oculta todas as abas
        //     $(".contaba").hide('fast');
        //     // tira a seleção da aba atual
        //     $(".links_form a").removeClass("ativo");


        //     // adiciona a classe ativo na selecionada atualmente
        //     $($(this).attr("href")).addClass("ativo");
        //     // mostra a aba clicada
        //     $($(this).attr("href")).show('10');
        //     $('html, body').animate({
        //         scrollTop: 0
        //     }, 'slow');
        //     // pra nao ir para o link
        //     return false;
        // });
$('#aba1').click(function() {
    nome = $('#nome').val();
    email = $('#email').val();
    cpf = $('#cpf').val();
    rg = $('#rg').val();
    estadoem = $('#estadoem').val();
    nascimento = $('#nascimento').val();
    estcivil = $('#estcivil').val();
    profissao = $('#profissao').val();
    renda = $('#renda').val();
    naturalidade = $('#naturalidade').val();
    if ((naturalidade == "") || (renda == "") || (profissao == "") || (nome == "") || (email == "") || (cpf == "") || (rg == "") || (estadoem == "") || (estcivil == "") || (nascimento == "")) {
        alert('Favor preencher todos os campos!');
    } else {
                // oculta todas as abas
                $(".contaba").hide('fast');
                // tira a seleção da aba atual
                $("#lEnd").addClass("ativo");

                // adiciona a classe ativo na selecionada atualmente
                $($(this).attr("href")).addClass("ativo");
                // mostra a aba clicada
                $($(this).attr("href")).show('10');
                $('html, body').animate({
                    scrollTop: 0
                }, 'slow');
                // pra nao ir para o link
                return false;
            }

        });
$('#aba2').click(function() {
    rua = $('#rua').val();
    bairro = $('#bairro').val();
    cidade = $('#cidade').val();
    cep = $('#cep').val();
    telefone = $('#telefone').val();
    celular = $('#celular').val();
    estado = $('#estado').val();
    ruaC = $('#ruaC').val();
    bairroC = $('#bairroC').val();
    cidadeC = $('#cidadeC').val();
    cepC = $('#cepC').val();
    telefoneC = $('#telefoneC').val();
            //celularC = $('#celularC').val();
            estadoC = $('#estadoC').val();
            if ((rua == "") || (bairro == "") || (cidade == "") || (cep == "") || (telefone == "") || (estado == "") || (celular == "") || (ruaC == "") || (bairroC == "") || (cidadeC == "") || (cepC == "") || (telefoneC == "") || (estadoC == "")) {
                alert('Favor preencher todos os campos!');
            } else {
                // oculta todas as abas
                $(".contaba").hide('fast');
                // tira a seleção da aba atual
                $("#lSeg").addClass("ativo");

                // adiciona a classe ativo na selecionada atualmente
                $($(this).attr("href")).addClass("ativo");
                // mostra a aba clicada
                $($(this).attr("href")).show('10');
                $('html, body').animate({
                    scrollTop: 0
                }, 'slow');
                // pra nao ir para o link
                return false;
            }

        });
$('#aba3').click(function() {
            // oculta todas as abas
            $(".contaba").hide('fast');
            // tira a seleção da aba atual
            $("#lRes").addClass("ativo");
            // mostra a aba clicada
            $($(this).attr("href")).show('10');
            $('html, body').animate({
                scrollTop: 0
            }, 'slow');
            // pra nao ir para o link
            return false;
        });


$(".seg").hide();
$(".com_seg").hide();
$(".p_redu_c_seg").hide('fast');
$(".s_seg").click(function() {
            // oculta todas as abas
            // $(".seg").show('fast');
            // $(".sem_seg").hide('fast');
            // $(".com_seg").show('fast');
            // $(".p_redu").hide('fast');
            // $('#com_seguro').val("Sim").attr('value', 'Sim');
            // $('#com_seguro1').val("Sim").attr('value', 'Sim');
            seguro = "CS";
            SegPar();
        });
$(".n_seg").click(function() {
            // oculta todas as abas
            // $(".seg").hide('fast');
            // $(".com_seg").hide('fast');
            // $(".sem_seg").show('fast');
            // $('#com_seguro').val("Nao").attr('value', 'Nao');
            // $('#com_seguro1').val("Nao").attr('value', 'Nao');
            seguro = "SS";
            SegPar();
        });
$('.p_redu').hide();
$('.s_red').click(function() {
            // $(".p_redu").show('fast');
            // $(".sem_seg").hide('fast');
            // $(".com_seg").hide('fast');
            // $("#parcela_reduzida").val("Sim").attr('value', 'Sim');
            // $("#parcela_reduzida1").val("Sim").attr('value', 'Sim');
            parcela = "PR";
            SegPar();
        });
$('.n_red').click(function() {
            // $(".p_redu").hide('fast');
            // $(".sem_seg").show('fast');
            // $(".com_seg").hide('fast');
            // $("#parcela_reduzida").val("N&atilde;o").attr('value', 'Nao');
            // $("#parcela_reduzida1").val("N&atilde;o").attr('value', 'Nao');
            parcela = "P";
            SegPar();
        });

$('.residencial').click(function() {
    $('#end_cobranca').val("Residencial").attr('value', 'Residencial');
    $('#end_cobranca1').val("Residencial").attr('value', 'Residencial');
});
$('.comercial').click(function() {
    $('#end_cobranca').val("Comercial").attr('value', 'Comercial');
    $('#end_cobranca1').val("Comercial").attr('value', 'Comercial');
});
$('.email').click(function() {
    $('#end_cobranca').val("Email").attr('value', 'Email');
    $('#end_cobranca1').val("Email").attr('value', 'Email');
});

function SegPar() {
    status = "";
    if (seguro == "SS" && parcela == "P") {
        $('#preco_final').val("PSS").attr('value', 'PSS');
        status = "PSS";
    } else if (seguro == "CS" && parcela == "P") {
        $('#preco_final').val("PCS").attr('value', 'PCS');
        status = "PCS";
    } else if (seguro == "SS" && parcela == "PR") {
        $('#preco_final').val("PRSS").attr('value', 'PRSS');
        status = "PRSS";
    } else if (seguro == "CS" && parcela == "PR") {
        $('#preco_final').val("PRCS").attr('value', 'PRCS');
        status = "PRCS";
    }

    switch (status) {
        case 'PSS':
        $(".seg").hide('fast');
        $(".com_seg").hide('fast');
        $(".sem_seg").show('fast');
        $(".p_redu").hide('fast');
        $(".p_redu_c_seg").hide('fast');
        $(".p_redu_c_seg").hide('fast');
        $('#com_seguro').val("Nao").attr('value', 'Nao');
        $('#com_seguro1').val("Nao").attr('value', 'Nao');
        break;
        case 'PCS':
        $(".seg").show('fast');
        $(".sem_seg").hide('fast');
        $(".com_seg").show('fast');
        $(".p_redu").hide('fast');
        $(".p_redu_c_seg").hide('fast');
        $(".p_redu").hide('fast');
        $('#com_seguro').val("Sim").attr('value', 'Sim');
        $('#com_seguro1').val("Sim").attr('value', 'Sim');
        break;
        case 'PRSS':
        $(".p_redu").show('fast');
        $(".sem_seg").hide('fast');
        $(".p_redu_c_seg").hide('fast');
        $(".com_seg").hide('fast');
        $("#parcela_reduzida").val("Sim").attr('value', 'Sim');
        $("#parcela_reduzida1").val("Sim").attr('value', 'Sim');
        break;
        case 'PRCS':
        $(".p_redu_c_seg").show('fast');
        $(".p_redu").hide('fast');
        $(".sem_seg").hide('fast');
        $(".com_seg").hide('fast');
        $(".seg").show();
        $("#parcela_reduzida").val("SIM").attr('value', 'Sim');
        $("#parcela_reduzida1").val("SIM").attr('value', 'Sim');
        break;
    };
}

});

$("#accordion section h1").click(function(e) {
    $(this).parents().siblings("section").addClass("ac_hidden");
    $(this).parents("section").removeClass("ac_hidden");

    e.preventDefault();
});

});

function aba1() {
    $('#lIdent').addClass('ativo');
    if ($('#nome') == "" || $('#email') == "" || $('#cpf') == "" || $('#rg') == "" || $('#estadoem') == "" || $('#nascimento') == "" || $('#estcivil') == "") {
        alert('Favor preencher todos os campos!');
    }

}

function verifica() {
    var aChk = document.getElementById("concordo");
    if (aChk.checked == true) {
        document.getElementById("formcompra").submit();
    } else {
        alert('Para continuar favor aceitar o acordo de contrato de compra.');
    }

}



/*carrousel*/
$(document).ready(function() {

    // Using custom configuration
    $('#carousel').carouFredSel({
        width: 980,
        height: 175,
        items: 4,
        circular: true,
        align: "left",
        prev: '#prev',
        next: '#next',
        direction: "left",
        auto: true,
        scroll: {
            items: 1,
            duration: 1000,
            pauseOnHover: true
        },
    });
});


/* tabela valores */
$(document).ready(function() {
    $('#valores-planos ul li').click(function(){
        $('#valores-planos ul li').css('height','55px');
        $(this).css('height','auto');
    });
});

/* mobile */
$(document).ready(function() {
    var showOrHide;
    if (showOrHide === true) {
        $(".menuMobile").show();
    } else if (showOrHide === false) {
        $(".menuMobile").hide();
    }
    $('.btnMenu').click(function() {
        $('.menuMobile').toggle('slow',showOrHide);
    });
});

