$(document).ready(function() {

	/* Insert do cliente Starts Here */
	$(document).on('submit', '#cliente-SaveForm', function() {

		//Envia os dados para cadastro
	   $.post("questionario/assets/php/cliente.php", $(this).serialize())
        .done(function(data){

        	if (data!='erro') {
        		var formulario= $('#token_formulario').val();
				swal({   
					title: 'Sucesso',
					text: "Por gentileza responder nosso questionário!",
					type: 'success',   
					showCancelButton: false,   
					confirmButtonText: "Responder questionário",   
					closeOnConfirm: true 
		        }, function(){
	        			window.location.href = "../responder-formulario-"+formulario+"-"+data;	            
		        });	
        	}else{
        		swal(
				  'Oops...',
				  ''+data+'',
				  'error'
				)
        	}
        	
		 });   
	     return false;
    }); 
	/* Insert do cliente Ends Here */
});