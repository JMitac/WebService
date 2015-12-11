function ListaProductos(){
	var oTable = $('#example1').dataTable();
 
	var oElim = {
			op: 1
	}

		$.ajax({
		url: 'php/controller/cliente.controller.php',
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
//	    	notificacion('No se pudo listar los registros','error');
	    });
};




    function btnElimina(boton){
		swal({   
		   title: "Esta seguro de elimiar este cliente?",
		   text: "",
		   type: "warning",
		   showCancelButton: true,
		   confirmButtonColor: "#DD6B55",
		   confirmButtonText: "Si, eliminarlo!",   
		   closeOnConfirm: false 
		},
		function(){  
		 swal("Eliminado!", "El cliente fue eliminado con exito.", "success");
		  	var row = $(boton).closest("tr").get(0);
			var rowE = $(boton).closest("tr");
			var cod = $(boton).attr("value");
			var oElim = {
				id: cod,
				op: 2
			}
                    
		    $.ajax({
		        type: 'POST',
		        url: 'php/controller/cliente.controller.php',
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

}






jQuery(document).ready(function() {
ListaProductos();    

       
        
       
        
 /*agregar  cliente */       
        
    $("#formnclie").validate({		
		submitHandler: function(form) {
			
			var formData = new FormData($(form)[0]);

			$.ajax({
                        url: 'php/controller/cliente.controller.php?op=3',
                        type: 'POST',
                        async: false,
    			cache: false,
    			contentType: false,
    			processData: false,
				dataType: 'json',
				data: formData,
				success: function(){
 					swal("Cliente Agregado!", "", "success")
				}
			}).fail(function() {
 				sweetAlert("Error", "No se pudo agregar!", "error");
			});
                        ListaProductos(); 
                        $('#formnclie')[0].reset();
		}
	});
         
});
 

// function CKupdate(){
//     for ( instance in CKEDITOR.instances )
//         CKEDITOR.instances[instance].updateElement();
// }
$('#formulariohide').hide();

function muestraformulario(){
    $('#formulariohide').fadeIn(500);
    $('#formnclie')[0].reset();
    $("body").animate({
      scrollTop: 2000
    }, 1000);
}

function ocultaformulario(){
    $('#formulariohide').fadeOut(500);
    $('#formnclie')[0].reset();     
}



