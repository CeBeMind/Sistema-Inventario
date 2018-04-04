/*****Animaciones*****/
$(document).ready(function(){

   $("#MenuIcon").click(function(){
        $("#MainMenu").css("left","0px");
        function showMenu(){
            $("#Menu").css("right","30px");
            $("#MenuIcon").animate({right:'-100'},300);
            $("#tabla").attr("class","col-xl-11");

        }
        setTimeout(showMenu,100);
   });
    
    $("#close").click(function(){
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
		url: 'sources/php/busqueda.php',
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
       
        console.log("se realizo!!")

    })
    .fail(function() {
        console.log("error");
    });
}
