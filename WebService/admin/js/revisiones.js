function ListaRevision(){
	var oTable = $('#revisiones').dataTable();
 
	var oElim = {
			op: 'listar'
	}

	var btn_hea = '<button class="btn btn btn-primary"  id="Edita_';
	var btn_foo = '">   Editar</button>';

	var btn_hea_e = '<button class="btn btn btn-danger" name="Eliminar" value="';
	var btn_foo_e = '" onclick="btnElimina(this);">   Eliminar</button>';

		$.ajax({
		url: 'php/controller/revisiones.controller.php',
		data: oElim,
		dataType: 'json',
		success: function(json){
			oTable.fnClearTable();
			$.each(json, function(index,objeto){
				oTable.fnAddData([
					objeto.cli_cod,					
					/*objeto.cli_titulo,*/
					// '<img width="150px" src="../img/cliente/' + objeto.cli_foto + '">',
					objeto.rev_motor,
					objeto.rev_tubo,
					objeto.rev_bujias,
					objeto.rev_bobinas,
					objeto.rev_radidador,
					objeto.rev_mangeras,
					objeto.rev_filtros,
					objeto.rev_check,
					btn_hea + objeto.rev_id + btn_foo +btn_hea_e + objeto.rev_id + btn_foo_e
				]);
				$('#Edita_'+objeto.rev_id).data('datos',objeto);
				$('#Edita_'+objeto.rev_id).click(function(){
					var objeto = $(this).data('datos');
					$('#cod').val(objeto.rev_id);
					$('#cli_cod').val(objeto.cli_cod);
					$('#rev_mot').val(objeto.rev_motor);
					$('#rev_tub').val(objeto.rev_tubo);
					$('#rev_buj').val(objeto.rev_bujias);
					$('#rev_bob').val(objeto.rev_bobinas);
					$('#rev_rad').val(objeto.rev_radidador);
					$('#rev_man').val(objeto.rev_mangeras);
					$('#rev_fil').val(objeto.rev_filtros);
					$('#rev_chk').val(objeto.rev_check);
					console.log(objeto.rev_id,objeto.cli_cod);
					muestraformulario();
				});	
			});
		}
		}).fail(function() {
			sweetAlert("Error", "No se pudo Listar!", "error");
	    });
};

jQuery(document).ready(function() {
ListaRevision();    
        
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
                url: 'php/controller/revisiones.controller.php?op='+fun,
                type: 'POST',
                async: false,
    			cache: false,
    			contentType: false,
    			processData: false,
				dataType: 'json',
				data: formData,
				success: function(){
 					swal("Registro insertado!", "", "success");
 					ListaRevision();
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
		        url: 'php/controller/revisiones.controller.php',
		        data: oElim,
		        dataType: 'json',
		        success: function() {
		   			rowE.fadeOut(750,function(){
			  		var dtable = $('#revisiones').dataTable();
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


