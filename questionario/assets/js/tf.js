$(document).ready(function() {

	/* Insert do cliente Starts Here */
	$(document).on('submit', '#ft-SaveForm', function() {

		//Envia os dados para cadastro
	   $.post("questionario/assets/php/cliente.php", $(this).serialize())
        .done(function(data){

        	if (data!='erro') {
        		var formacao=$('#formacao').val();
        		var turma=$('#turma').val();
        		var url=$('#url').val();
				swal({   
					title: 'Sucesso',
					text: "Por gentileza responder nosso questionário!",
					type: 'success',   
					showCancelButton: false,   
					confirmButtonText: "Responder questionário",   
					closeOnConfirm: true 
		        }, function(){
	        			window.location.href = "http://"+url+"/cliente/acesso-"+formacao+"-"+turma+"-"+data+"-0";	            
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