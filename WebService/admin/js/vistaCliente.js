function ListaCliente(){
	var oTable = $('#cliente').dataTable();
 
	var oElim = {
			op: 'listar'
	}

	var btn_hea = '<button class="btn btn btn-primary"  id="Edita_';
	var btn_foo = '">   Editar</button>';

	var btn_hea_e = '<button class="btn btn btn-danger" name="Eliminar" value="';
	var btn_foo_e = '" onclick="btnElimina(this);">   Eliminar</button>';

		$.ajax({
		url: 'php/controller/vistaCliente.controller.php',
		data: oElim,
		dataType: 'json',
		success: function(json){
			oTable.fnClearTable();
			$.each(json, function(index,objeto){
				oTable.fnAddData([
					objeto.cli_cod,
					objeto.cli_dni,
					/*objeto.cli_titulo,*/
					'<img width="150px" src="../img/cliente/' + objeto.cli_foto + '">',					
					objeto.cli_nombre,
					objeto.cli_pater,
					objeto.cli_mater,
					objeto.cli_tipvehiculo,
					objeto.cli_marca,
					objeto.cli_model,
					objeto.cli_placa,
					btn_hea + objeto.cli_cod + btn_foo +btn_hea_e + objeto.cli_cod + btn_foo_e
				]);
				$('#Edita_'+objeto.cli_cod).data('datos',objeto);
				$('#Edita_'+objeto.cli_cod).click(function(){
					var objeto = $(this).data('datos');
					$('#cod').val(objeto.cli_cod);
					$('#cli_dni').val(objeto.cli_dni);
					$('#cli_nom').val(objeto.cli_nombre);
					$('#cli_pat').val(objeto.cli_pater);
					$('#cli_mat').val(objeto.cli_mater);
					$('#cli_tel').val(objeto.cli_telf);
					$('#cli_mail').val(objeto.cli_email);
					$('#cli_dir').val(objeto.cli_direccion);
					$('#cli_tip').val(objeto.cli_tipvehiculo);
					$('#cli_marca').val(objeto.cli_marca);
					$('#cli_model').val(objeto.cli_model);
					$('#cli_pla').val(objeto.cli_placa);
					console.log(objeto.cli_cod,objeto.cli_dni);
					muestraformulario();
				});	
			});
		}
		}).fail(function() {
			sweetAlert("Error", "No se pudo Listar!", "error");
	    });
};

jQuery(document).ready(function() {
ListaCliente();    
        
 /* modificar galeria */       
        
    $("#formcliente").validate({	 /*<<<<<<<<<*/   	 
		submitHandler: function(form) {	
			var formData = new FormData($(form)[0]);

			var fun;
			if ($('#cod').val() == ''){
				fun = 'insertar'
			}else{
				fun = 'editar'
			}

			$.ajax({
                url: 'php/controller/vistaCliente.controller.php?op='+fun,
                type: 'POST',
                async: false,
    			cache: false,
    			contentType: false,
    			processData: false,
				dataType: 'json',
				data: formData,
				success: function(){
 					swal("Registro insertado!", "", "success");
 					ListaCliente();
 					ocultaformulario();
 					$('#formcliente')[0].reset(); /*<<<<<<<<<*/  
				}
			}).fail(function() {
 				sweetAlert("Error", "No se pudo agregar!", "error");
 				
			}); 
		}
	});
         
});
 
function btnElimina(boton){
		swal({   
		   title: "Esta seguro de elimiar este producto?",
		   text: "",
		   type: "warning",
		   showCancelButton: true,
		   confirmButtonColor: "#DD6B55",
		   confirmButtonText: "Si, eliminarlo!",   
		   closeOnConfirm: false 
		},
		function(){  
		  	var row = $(boton).closest("tr").get(0);
			var rowE = $(boton).closest("tr");
			var cod = $(boton).attr("value");
			var oElim = {
				id: cod,
				op: 'eliminar'
			}
            console.log(oElim);
		    $.ajax({
		        type: 'POST',
		        url: 'php/controller/vistaCliente.controller.php',
		        data: oElim,
		        dataType: 'json',
		        success: function() {
		   			rowE.fadeOut(750,function(){
			  		var dtable = $('#cliente').dataTable();
					var Pos = dtable.fnGetPosition(row);
					dtable.fnDeleteRow(Pos);
					});
		   			swal("Eliminado!", "Registro eliminado con exito.", "success");
		        }
		    }).fail(function() {    
				sweetAlert("Error", "No se pudo eliminar!", "error");
		    });
	})
}

$('#formulariohide').hide();

function muestraformulario(){
    $('#formulariohide').fadeIn(500);
    //$('#formcliente')[0].reset(); /*<<<<<<<<<*/   
    $("body").animate({
      scrollTop: 2000
    }, 1000);
}

function ocultaformulario(){
    $('#formulariohide').fadeOut(500);
    $('#formcliente')[0].reset(); 
}

function nuevo(){
	$('#cod').val('');
}


