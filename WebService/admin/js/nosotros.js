
jQuery(document).ready(function() {
        
 /*agregar  cliente */       
        
    $("#formMisi").validate({		
		submitHandler: function(form) {
						
			var formData = new FormData($(form)[0]);
			/*agregado
			var oModif = {
				id: cod				
			}*/
			$.ajax({
                        url: 'php/controller/nosotros.controller.php?op=2',
                        type: 'POST',                                                
                        async: false,
    			cache: false,
    			contentType: false,
    			processData: false,
				dataType: 'json',
				data: formData,
				success: function(){
 					swal("Misíon/Visíon Actualizada!", "", "success")
				}
			}).fail(function() {
 				sweetAlert("Error", "No se pudo agregar la noticia!", "error");
			});                        
		}
	});
         
});
 
function CKupdate(){
    for ( instance in CKEDITOR.instances )
        CKEDITOR.instances[instance].updateElement();
}





