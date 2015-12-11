/*
function ListaServicios(){
	var oTable = $('#example1').dataTable();
 
	var oElim = {
			op: 1
	}

		$.ajax({
		url: 'php/controller/servicio.controller.php',
		data: oElim,
		dataType: 'json',
		success: function(json){
			oTable.fnClearTable();
				for(var i = 0; i < json.length; i++) {
					oTable.fnAddData([
					json[i][0],
					json[i][1],
					json[i][2],
					json[i][3],
					json[i][4]
					]);
				}
		}
		}).fail(function() {

	    });
};

*/

/*
    function btnElimina(boton){
		swal({   
		   title: "Esta seguro de elimiar este servicio?",
		   text: "",
		   type: "warning",
		   showCancelButton: true,
		   confirmButtonColor: "#DD6B55",
		   confirmButtonText: "Si, eliminarlo!",   
		   closeOnConfirm: false 
		},
		function(){  
		 swal("Eliminado!", "El servicio fue eliminado con exito.", "success");
		  	var row = $(boton).closest("tr").get(0);
			var rowE = $(boton).closest("tr");
			var cod = $(boton).attr("value");
			var oElim = {
				id: cod,
				op: 2
			}
                    
		    $.ajax({
		        type: 'POST',
		        url: 'php/controller/servicio.controller.php',
		        data: oElim,
		        dataType: 'json',
		        success: function() {
		   			rowE.fadeOut(750,function(){
			  		var dtable = $('#example1').dataTable();
					var Pos = dtable.fnGetPosition(row);
					dtable.fnDeleteRow(Pos);
					 
					});

		        }
		    }).fail(function() {
                        
				sweetAlert("Error", "No se pudo eliminar!", "error");
		    });
	})

}*/






jQuery(document).ready(function() {
//ListaServicios();    

       
        
       
        
 /*agregar  servicio */       
        
    $("#formserv").validate({		
		submitHandler: function(form) {
			
			var formData = new FormData($(form)[0]);

			$.ajax({
                        url: 'php/controller/servicio.controller.php?op=2',
                        type: 'POST',
                        async: false,
    			cache: false,
    			contentType: false,
    			processData: false,
				dataType: 'json',
				data: formData,
				success: function(){
 					swal("Servicio Modificado!", "", "success")
				}
			}).fail(function() {
 				sweetAlert("Error", "No se pudo agregar!", "error");
			});/*
                        ListaServicios(); 
                        $('#formserv')[0].reset(); 
                        */
		}
	});
         
});
 

function CKupdate(){
    for ( instance in CKEDITOR.instances )
        CKEDITOR.instances[instance].updateElement();
}

/*
$('#formulariohide').hide();

function muestraformulario(){
    $('#formulariohide').fadeIn(500);
    $('#formserv')[0].reset();
    $("body").animate({
      scrollTop: 2000
    }, 1000);
}

function ocultaformulario(){
    $('#formulariohide').fadeOut(500);
    $('#formserv')[0].reset();  
}
*/



