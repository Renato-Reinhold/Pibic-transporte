
function carregarBairrosChegada(){
    id = $('#cidadeChegada').val();
    $.get("PDO.php?idCidade= " + id, function(data){
        $("#bairroChegada").empty();
        $("#bairroChegada").append(data);
        $("#bairroChegada").append("<option value='0'>Outro</option>");
        $('.selectpicker').selectpicker('refresh');
    });
};

function carregarBairrosSaida(){
    id = $('#cidadeSaida').val();
    $.get("PDO.php?idCidade=" + id, function(data){
        $("#bairroSaida").empty();
        $("#bairroSaida").append(data);
        $("#bairroSaida").append("<option value='0'>Outro</option>");
        $('.selectpicker').selectpicker('refresh');
    });
};

function carregarLinhasChegada(){
    id = $('#empresaChegada').val();
    $.get("empresa.php?idEmpresa= " + id, function(data){
        $("#linhaChegada").empty();
        $("#linhaChegada").append(data);
        $('.selectpicker').selectpicker('refresh');
    });
};

function carregarLinhasSaida(){
    id = $('#empresaSaida').val();
    $.get("empresa.php?idEmpresa= " + id, function(data){
        $("#linhaSaida").empty();
        $("#linhaSaida").append(data);
        $('.selectpicker').selectpicker('refresh');
    });
};

$("#bairroChegada").change(function(){
    if($("#bairroChegada").val() == 0){
        $("#demo2").show("slow");
        $("#demo2").css("padding-top" , "10rem");
    }                                                                                           
    else{
        $("#demo2").hide("slow");
    }
});

$("#bairroSaida").change(function(){
    if($("#bairroSaida").val() == 0){
        $("#demo4").show("slow");
        $("#demo4").css("padding-top" , "30px");
    }
    else{
        $("#demo4").hide("slow");
    }
});

$("#demo").hide();
$("#demo2").hide();
$('#cidadeChegada').change(function(){
    id = $("#cidadeChegada").val();
    if (id == 9) {
        $('#demo').show("slow");
        $('#bairroChegada').hide("slow");
        $('#demo2').show("slow");
    }
    else {
        $('#demo').hide("slow");
        $('#bairroChegada').show("slow");
        $('#demo2').hide("slow");
    }
});

$('#emp').hide();
$('#lin').hide();
$('#empresaChegada').change(function(){
    id = $("#empresaChegada").val();
    if (id == 8) {
        $('#emp').show("slow");
        $('#linhaChegada').hide("slow");
        $('#lin').show("slow");
    }
    else {
        $('#emp').hide("slow");
        $('#linhaChegada').show("slow");
        $('#lin').hide("slow");
    }
});

$('#demo3').hide();
$('#demo4').hide();
$('#cidadeSaida').change(function(){
    id = $("#cidadeSaida").val();
    if (id == 9) {
        $('#demo3').show("slow");
        $('#bairroSaida').hide("slow");
        $('#demo4').show("slow");
    }
    else {
        $('#demo3').hide("slow");
        $('#bairroSaida').show("slow");
        $('#demo4').hide("slow");
    }
});

$('#emp2').hide();
$('#lin2').hide();
$('#empresaSaida').change(function(){
    id = $("#empresaSaida").val();
    if (id == 8) {
        $('#emp2').show("slow");
        $('#linhaSaida').hide("slow");
        $('#lin2').show("slow");
    }
    else {
        $('#emp2').hide("slow");
        $('#linhaSaida').show("slow");
        $('#lin2').hide("slow");
    }
});

function naoUsaOnibus(){

    num = $("input[type=hidden]").size();

    $("#naoUsaOnibusChegada").slideUp(500);
    $("#naoUsaOnibusSaida").slideUp(500);

    $("#cidadeChegada").removeAttr("required");
    $("#bairroChegada").removeAttr("required");
    $("#localChegada").removeAttr("required");
    $("#empresaChegada").removeAttr("required");
    $("#linhaChegada").removeAttr("required");
    $("#btnHoraChegada").removeAttr("required");

    $("#cidadeSaida").removeAttr("required");
    $("#bairroSaida").removeAttr("required");
    $("#localDestino").removeAttr("required");
    $("#empresaSaida").removeAttr("required");
    $("#linhaSaida").removeAttr("required");
    $("#btnHoraSaida").removeAttr("required");

    for (var i = 2; i < num; i++) {
        if($("#templateChegada" + i) != null){

            $("#cidadeExtraChegada" + i).removeAttr("required");
            $("#bairroExtraChegada" + i).removeAttr("required");
            $("#localExtraChegada" + i).removeAttr("required");
            $("#empresaExtraChegada" + i).removeAttr("required");
            $("#linhaExtraChegada" + i).removeAttr("required");
            $("#btnHoraExtraChegada" + i).removeAttr("required");

        }
        if($("#templateSaida" + i) != null){

            $("#cidadeExtraSaida" + i).removeAttr("required");
            $("#bairroExtraSaida" + i).removeAttr("required");
            $("#localExtraSaida" + i).removeAttr("required");
            $("#empresaExtraSaida" + i).removeAttr("required");
            $("#linhaExtraSaida" + i).removeAttr("required");
            $("#btnHoraExtraSaida" + i).removeAttr("required");

        }
    }

    $("#form").validator('update');

}

function usaOnibus(){

    $("#naoUsaOnibusChegada").slideDown(500);
    $("#naoUsaOnibusSaida").slideDown(500);

    $("#cidadeChegada").attr("required" , "");
    $("#bairroChegada").attr("required", "");
    $("#localChegada").attr("required", "");
    $("#empresaChegada").attr("required", "");
    $("#linhaChegada").attr("required", "");
    $("#btnHoraChegada").attr("required" , "");

    $("#cidadeSaida").attr("required", "");
    $("#bairroSaida").attr("required", "");
    $("#localDestino").attr("required", "");
    $("#empresaSaida").attr("required", "");
    $("#linhaSaida").attr("required", "");
    $("#btnHoraSaida").attr("required", "");

    for (var i = 2; i < num; i++) {
        if($("#templateChegada"+i) != null){

            $("#cidadeExtraChegada" + i).attr("required", "");
            $("#bairroExtraChegada" + i).attr("required", "");
            $("#localExtraChegada" + i).attr("required", "");
            $("#empresaExtraChegada" + i).attr("required", "");
            $("#linhaExtraChegada" + i).attr("required", "");
            $("#btnHoraExtraChegada" + i).attr("required", "");

            $("#cidadeExtraSaida" + i).attr("required", "");
            $("#bairroExtraSaida" + i).attr("required", "");
            $("#localExtraSaida" + i).attr("required", "");
            $("#empresaExtraSaida" + i).attr("required", "");
            $("#linhaExtraSaida" + i).attr("required", "");
            $("#btnHoraExtraSaida" + i).attr("required", "");

        }
    }

    $("#form").validator('update');

}
$(function () {
    $('#horaChegada').datetimepicker({
        format: 'HH:mm'
    });
});


$(function () {
    $('#horaSaida').datetimepicker({
        format: 'HH:mm'
    });
});


function toggleCidadeChegada(num){
        id = $("#cidadeExtraChegada" + num).val();
        if (id == 9) {
            $('#outraCidadeChegada' + num).show("slow");
            $('#bairroExtraChegada' + num).hide("slow");
            $('#outroBairroChegada' + num).show("slow");
        }
        else {
            $('#outraCidadeChegada' + num).hide("slow");
            $('#bairroExtraChegada' + num).show("slow");
            $('#outroBairroChegada' + num).hide("slow");
        }
}
function toggleBairroChegada(num){
    id = $("#bairroExtraChegada" + num).val();
    if (id == 0){
        $("#outroBairroChegada" + num).show("slow");
        $("#outroBairroChegada" + num).css("padding-top" , "30px");
    }
    else{
        $("#outroBairroChegada" + num).hide("slow");
        $("#outroBairroChegada" + num).css("padding-top" , "-30px");
    }
}

function toggleEmpresaChegada(num){
   
        id = $("#empresaExtraChegada" + num).val();
        if (id == 8) {
            $('#outraEmpresaChegada' + num).show("slow");
            $('#linhaExtraChegada' + num).hide("slow");
            $('#outraLinhaChegada' + num).show("slow");
        }
        else {
            $('#outraEmpresaChegada' + num).hide("slow");
            $('#linhaExtraChegada' + num).show("slow");
            $('#outraLinhaChegada' + num).hide("slow");
        }
}

function templateChegada(){

    num = $("input[type=hidden]").size();

    document.getElementById("qtdextrachegada").setAttribute("value", num);
    $.get("TemplateChegada.php?num="+num,function(data){
                                                
        $("#template").append(data);
                                               
        $("#templateChegada" + num).hide();
        $("#templateChegada" + num).show("slow");
        $('.selectpicker').selectpicker('refresh');
        $("#form").validator('update');


        $('[data-toggle = "btnExcluir"]').tooltip();
        $("#horaExtraChegada" + num).datetimepicker({
            format: 'HH:mm'
        });

        $("#outraCidadeChegada" + num).hide();
        $("#outroBairroChegada" + num).hide();

        $('#outraEmpresaChegada' + num).hide();
        $('#outraLinhaChegada' + num).hide();

    });
};

function carregarBairrosExtrasChegada(cidadeExtraChegada, bairroExtraChegada){
    var id = $("#" + cidadeExtraChegada).val();
    $.get("PDO.php?idCidade= " + id, function(data){
        $("#" + bairroExtraChegada).empty();
        $("#" + bairroExtraChegada).append(data);
        $("#" + bairroExtraChegada).append("<option value='0'>Outro</option>");
        $('.selectpicker').selectpicker('refresh');
    });
};

function carregarLinhasExtrasChegada(empresaExtraChegada, linhaExtraChegada){
    id = $("#" + empresaExtraChegada).val();
    $.get("empresa.php?idEmpresa= " + id, function(data){
        $("#" + linhaExtraChegada).empty();
        $("#" + linhaExtraChegada).append(data);
        $('.selectpicker').selectpicker('refresh');
    });
};

function atualizarValidacao(template){
    $('#' + template).remove();
    $("#form").validator('update');
}


function toggleCidadeSaida(num){
    id = $("#cidadeExtraSaida" + num).val();
    if (id == 9) {
        $('#outraCidadeSaida' + num).show("slow");
        $('#bairroExtraSaida' + num).hide("slow");
        $('#outroBairroSaida' + num).show("slow");
    }
    else {
        $('#outraCidadeSaida' + num).hide("slow");
        $('#bairroExtraSaida' + num).show("slow");
        $('#outroBairroSaida' + num).hide("slow");
    }
}

function toggleBairroSaida(num){
    id = $("#bairroExtraSaida" + num).val();
    if (id == 0){
        $("#outroBairroSaida" + num).show("slow");
        $("#outroBairroSaida" + num).css("margin-top" , "30px");
    }
    else{
        $("#outroBairroSaida" + num).hide("slow");
        $("#outroBairroSaida" + num).css("padding-top" , "-30px");
    }
}

function toggleEmpresaSaida(num){
   
        id = $("#empresaExtraSaida" + num).val();
        if (id == 8) {
            $('#outraEmpresaSaida' + num).show("slow");
            $('#linhaExtraSaida' + num).hide("slow");
            $('#outraLinhaSaida' + num).show("slow");
        }
        else {
            $('#outraEmpresaSaida' + num).hide("slow");
            $('#linhaExtraSaida' + num).show("slow");
            $('#outraLinhaSaida' + num).hide("slow");
        }
}

function templateSaida(){

    num = $("input[type=hidden]").size();

    document.getElementById("qtdextradestino").setAttribute("value", num);
    $.get("TemplateSaida.php?num=" + num,function(data){

        $("#template2").append(data);

        $("#templateSaida" + num).hide();
        $("#templateSaida" + num).show("slow");
        $('.selectpicker').selectpicker('refresh');
        $("#form").validator('update');


        $('[data-toggle = "btnExcluir"]').tooltip();
        $("#horaExtraSaida" + num).datetimepicker({
            format: 'HH:mm'
        });

        $("#outraCidadeSaida" + num).hide();
        $("#outroBairroSaida" + num).hide();

        $('#outraEmpresaSaida' + num).hide();
        $('#outraLinhaSaida' + num).hide();

    });
};

function carregarBairrosExtrasSaida(cidadeExtraSaida, bairroExtraSaida){
    var id = $("#" + cidadeExtraSaida).val();
    $.get("PDO.php?idCidade= " + id, function(data){
        $("#" + bairroExtraSaida).empty();
        $("#" + bairroExtraSaida).append(data);
        $("#" + bairroExtraSaida).append("<option value='0'>Outro</option>");
        $('.selectpicker').selectpicker('refresh');
    });
};

function carregarLinhasExtrasSaida(empresaExtraSaida, linhaExtraSaida){
    id = $("#" + empresaExtraSaida).val();
    $.get("empresa.php?idEmpresa= " + id, function(data){
        $("#" + linhaExtraSaida).empty();
        $("#" + linhaExtraSaida).append(data);
        $('.selectpicker').selectpicker('refresh');
    });
};


$("#botao").on('click', function(){
    var $btn = $(this).button('loading')
    setTimeout(function(){
        $btn.button('reset');
    }, 1000);
});

$(document).ready(function(){
    $('[data-toggle = "addTemplate"]').tooltip();
});
$(document).ready(function(){
    $('[data-toggle = "horaSaida"]').tooltip();
});

$('.selectpicker').selectpicker({
  style: 'btn-default',
  size: 8
});

$(document).ready(function(){
    $('#form').validator();
});

$('#form').validator().on('submit', function (e) {
    if (e.isDefaultPrevented()) {
        swal("Erro ao enviar os dados...","Tente Novamente ","error");
    }
});