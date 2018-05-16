/*****Animaciones*****/
$(document).ready(function(){

   $("#MenuIcon").click(function(){
        $("#MainMenu").css("left","0px");
        function showMenu(){
            $("#Menu").css("right","18px");
            $("#MenuIcon").animate({right:'-100'},300);
            $("#tabla").attr("class","col-xl-11");

        }
        setTimeout(showMenu,100);
   });
    
    $("#close img").click(function(){
            $("#Menu").css("right","-300");
            function hideMenu(){
                    $("#Menu").css("right","-300px");
                $("#MenuIcon").animate({right:'50'},300);
            }
        setTimeout(hideMenu,300);
        function originalLayout(){
            $("#Menu").css("right","-300");
            $("#tabla").attr("class","col-xl-12");
        }
        setTimeout(originalLayout,200);
		if($('#menuTelefonos').next().is(":visible"))
		{
			$('#menuTelefonos').next().slideUp();
		}
		if($('#menuHardware').next().is(":visible"))
		{
			$('#menuHardware').next().slideUp();
		}
    });
	
	$("#Menu h3").click(function(){
		if($(this).next().is(":visible"))
		{
			$(this).next().slideUp();
		}
		if($('#menuTelefonos').next().is(":visible"))
		{
			$('#menuTelefonos').next().slideUp();
		}
		if($('#menuHardware').next().is(":visible"))
		{
			$('#menuHardware').next().slideUp();
		}
		if(!$(this).next().is(":visible"))
		{
			$(this).next().slideDown();
		}
	});

    /*****Fecha*****/
var fecha = new Date();

var dia = ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'];
var mes = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];

var fecha_imprimir = dia[fecha.getDay()]+", "+fecha.getDate()+" de "+mes[fecha.getMonth()]+" de "+fecha.getFullYear();


$("#fecha").html(fecha_imprimir);


$('#reset').on('show.bs.modal', function () {
  $('input[type="text"]').val('');
});


});/**Fin del ready**/

/*****Buscador*****/
$(buscar_datos());

function buscar_datos(consulta){
	$.ajax({
		url: 'sources/php/tablaPrincipal.php',
		type: 'POST',
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta) {
		$("#datos").html(respuesta);
		console.log("se realizo!!")

	})
	.fail(function() {
		console.log("error");
	});
	
};

$(document).on('keyup','#buscador', function(){
	var valor = $(this).val();

	if (valor != ""){
		buscar_datos(valor);
	} else{

		buscar_datos();
	}
});

$(ingresar_datos());

function ingresar_datos(){
    var datos= $("#registro").serialize();
    $.ajax({
        url: 'sources/php/registro.php',
        type: 'POST',
        data: datos,
        success: function(data){
      $("#")
    }
    })
    .done(function(respuesta) {
       
        console.log("se realizo!!");

    })
    .fail(function() {
        console.log("error");
    });

/**Animaciones**/
$("#btnIngHard").click(
  function(){
  $('#ingresoStock').show(900);
  $('#asignacionStock').hide(900);
  $('.stock a').removeClass('active');
  $(this).addClass('active');
  }
);
$("#btnAsigHard").click(
  function(){
  $('#ingresoStock').hide(900);
  $('#asignacionStock').show(900);
  $('.stock a').removeClass('active');
  $(this).addClass('active');
  }
);

$("#btnEntHard").click(
  function(){
  $('#entradaHardware').show(900);
  $('#salidaHardware').hide(900);
  $('.soporteHardware a').removeClass('active');
  $(this).addClass('active');
  }
);
$("#btnSalHard").click(
  function(){
  $('#entradaHardware').hide(900);
  $('#salidaHardware').show(900);
  $('.soporteHardware a').removeClass('active');
  $(this).addClass('active');
  }
);

$("#btnAsigCel").click(
  function(){
  $('#asignacionTelefonos').show(900);
	$('#ingresoTelefonos').hide(900);
	$('.stockTelefonos a').removeClass('active');
	$(this).addClass('active');
  }
);
$("#btnIngCel").click(
  function(){
  $('#asignacionTelefonos').hide(900);
	$('#ingresoTelefonos').show(900);
	$('.stockTelefonos a').removeClass('active');
  $(this).addClass('active');
  }
);

$("#btnSalCel").click(
  function(){
  $('#salidaTelefonos').show(900);
	$('#entradaTelefonos').hide(900);
	$('.soporteTelefonos a').removeClass('active');
	$(this).addClass('active');
  }
);
$("#btnEntCel").click(
  function(){
  $('#salidaTelefonos').hide(900);
	$('#entradaTelefonos').show(900);
	$('.soporteTelefonos a').removeClass('active');
  $(this).addClass('active');
  }
);

$("#btnGestEstatus").click(
  function(){
  if ($('#btnGuardarStatus').css("display") == "none"){
  $('#estatusInfo').hide(900);
  $('.estatus .alert').hide(900);
	$('#estatusGest').show(900);
  $('#btnGuardarStatus').css("display","inline-block");
  $('#btnGestEstatus').html('&larr; Ver');
  document.getElementsByClassName("btn-queue")[0].focus();
  }
  else
  {$('#estatusInfo').show(900);
  $('.estatus .alert').show(900);
  $('#estatusGest').hide(900);
  $('#btnGuardarStatus').css("display","none");
  $('#btnGestEstatus').html('Gestionar &rarr;');
  }
});

/***BEGIN Cambio de color de íconos***/
$('#usr').focusin(
  function(){
    $('.fa-user path').css('fill','rgb(95,178,196)');

  });
$('#usr').focusout(
  function(){
    $('.fa-user path').css('fill','rgb(0,0,0)');

  });
$('#pwd').focusin(
  function(){
    $('.fa-lock path').css('fill','rgb(95,178,196)');

  });
$('#pwd').focusout(
  function(){
    $('.fa-lock path').css('fill','rgb(0,0,0)');

  });
$('#pwd').focusin(
  function(){
    $('.fa-lock path').css('fill','rgb(95,178,196)');

  });
$('#pwd').focusout(
  function(){
    $('.fa-lock path').css('fill','rgb(0,0,0)');

  });
$('#buscador').focusin(
  function(){
    $('.fa-search path').css('fill','rgb(95,178,196)');

  });
$('#buscador').focusout(
  function(){
    $('.fa-search path').css('fill','rgb(0,0,0)');

  });
/***END***/

/*Operabilidad checkboxes*/
$('#h_operable').change(
  function(){
  if ($(this).prop('checked'))
    $("[id=hInputAsig]").prop('disabled',true);
  else
    $("[id=hInputAsig]").prop('disabled',false);
});

$('#t_operable').change(
  function(){
  if ($(this).prop('checked'))
    $('[id=tInputAsig]').prop('disabled',true);
  else
    $('[id=tInputAsig]').prop('disabled',false);
});

/* Actualizar estatus */
$('#enCola').click(function(){

$.ajax({
  type: "POST",
  url: "estatus.php",
  data: { estado:3 }
  });    

});
$('#detenido').click(function() {

$.ajax({
  type: "POST",
  url: "estatus.php",
  data: { estado:4 }
  });    

});
$('#rev').click(function() {

$.ajax({
  type: "POST",
  url: "estatus.php",
  data: { estado:5 }
  });    

});
$('#end').click(function() {

$.ajax({
  type: "POST",
  url: "estatus.php",
  data: { estado:6 }
  });    

});

}


