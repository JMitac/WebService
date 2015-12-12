
jQuery(document).ready(function() {
	

    /*
	    Contact form
	*/
    $('#contact-form').submit(function(e) {
    	e.preventDefault();
    	var form = $(this);
    	var nameLabel = form.find('label[for="contact-name"]');
    	var emailLabel = form.find('label[for="contact-email"]');
        var teleLabel = form.find('label[for="contact-telefono"]');
    	var messageLabel = form.find('label[for="contact-message"]');
    	
    	nameLabel.html('Nombres');
    	emailLabel.html('Email');
        teleLabel.html('Telefono');
    	messageLabel.html('Mensage');
        
        var postdata = form.serialize();
        console.log(postdata);
        $.ajax({
            type: 'POST',
            url: 'sendmail.php',
            data: postdata,
            dataType: 'json',
            success: function(json) {
                if(json.nameMessage != '') {
                	nameLabel.append(' - <span class="violet error-label"> ' + json.nameMessage + '</span>');
                }
                if(json.emailMessage != '') {
                	emailLabel.append(' - <span class="violet error-label"> ' + json.emailMessage + '</span>');
                }
                if(json.telefonoMessage != '') {
                    emailLabel.append(' - <span class="violet error-label"> ' + json.telefonoMessage + '</span>');
                }
                if(json.messageMessage != '') {
                	messageLabel.append(' - <span class="violet error-label"> ' + json.messageMessage + '</span>');
                }
                if(json.nameMessage == '' && json.emailMessage == '' && json.messageMessage == '') {
                	form.fadeOut('fast', function() {
                		form.parent('.contact-form').append('<p><span class="violet">Gracias por contactarnos! </span>Muy pronto nos pondremos en contacto con usted..</p>');
                    });
                }
            },error: function(){
                alert('error en el servidor y julio se la come');
            }
        });
    });
  
	
});



