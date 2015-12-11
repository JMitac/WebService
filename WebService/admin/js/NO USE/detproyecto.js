$.urlParam = function (name) {
    var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results != null)
     return results[1] || 0;
    else
     return results;
    //return results != null ? results[1] || 0 : results;
   }

jQuery(document).ready(function() {
	var codigo=$.urlParam('id'); 
ListadetProyectos(codigo);   


          
        
       
        
 /*agregar  cliente */       
        
    $("#formnfoto").validate({		
		submitHandler: function(form) {
			
			var formData = new FormData($(form)[0]);

			$.ajax({
                        url: 'php/controller/detproyecto.controller.php?op=3',
                        type: 'POST',
                        async: false,
    			cache: false,
    			contentType: false,
    			processData: false,
				dataType: 'json',
				data: formData,
				success: function(){
 					swal("Foto Agregada!", "", "success")
				}
			}).fail(function() {
 				sweetAlert("Error", "No se pudo agregar! ","error");
			});
                        ListadetProyectos(codigo); 
                        $('#formnfoto')[0].reset();
		}

	});
         
});



function ListadetProyectos(codigo){
	var oTable = $('#example1').dataTable();
 
	var oElim = {
			op: 1,
			id: codigo
	}

		$.ajax({
		url: 'php/controller/detproyecto.controller.php',
		data: oElim,
		dataType: 'json',
		success: function(json){
			oTable.fnClearTable();
				for(var i = 0; i < json.length; i++) {
					oTable.fnAddData([
					json[i][0],
					json[i][1],
					json[i][2],
					json[i][3]
					]);
				}
		}
		}).fail(function() {
              swal("No hay fotos!", "Este proyecto no contiene fotos.", "info");
	    });
	    
};




    function btnElimina(boton){
		swal({   
		   title: "Esta seguro de elimiar esta foto?",
		   text: "",
		   type: "warning",
		   showCancelButton: true,
		   confirmButtonColor: "#DD6B55",
		   confirmButtonText: "Si, eliminarlo!",   
		   closeOnConfirm: false 
		},
		function(){  
		 swal("Eliminado!", "La foto fue eliminada.", "success");
		  	var row = $(boton).closest("tr").get(0);
			var rowE = $(boton).closest("tr");
			var cod = $(boton).attr("value");
			var oElim = {
				id: cod,
				op: 2
			}
                    
		    $.ajax({
		        type: 'POST',
		        url: 'php/controller/detproyecto.controller.php',
		        data: oElim,
		        dataType: 'json',
		        success: function() {
		   			rowE.fadeOut(750,function(){
			  		var dtable = $('#example1').dataTable();
//			  		var row = $(boton).closest("tr").get(0);
					var Pos = dtable.fnGetPosition(row);
					dtable.fnDeleteRow(Pos);
					 
					});

		        }
		    }).fail(function() {
                        
				sweetAlert("Error", "No se pudo eliminar la foto!", "error");
		    });
	})

}










$('#formulariohide').hide();

function muestraformulario(){
    $('#formulariohide').fadeIn(500);
    $('#formnproy')[0].reset();
    $("body").animate({
      scrollTop: 2000
    }, 1000);
}

function ocultaformulario(){
    $('#formulariohide').fadeOut(500);
    $('#formnproy')[0].reset();     
}



