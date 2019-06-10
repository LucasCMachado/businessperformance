$(document).ready(function() {

	$('.delete').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */

		var item= $(this);
		var id=item.data('id');
			//Caso não haja questiona a exclusão
				swal({   
				    title: "Tem certeza?",   
				    text: "Se você deletar esse e-mail ele não poderá ser recuperado!",   
				    type: "warning",   
				    showCancelButton: true,   
				    confirmButtonColor: "#DD6B55",   
				    confirmButtonText: "Delete o e-mail!",   
				    cancelButtonText: "Cancele!",   
				    closeOnConfirm: false,   
				    closeOnCancel: false 
				}, function(isConfirm){   
				    if (isConfirm) {
				    	//Caso confirmado a exclusão solita a mesma
						$.post("../controller/email.php",{'id': id, 'op': 4}, function(data){
							if (data=='sucesso') {
								swal({   
									title: 'Sucesso',
									text: "E-mail excluído com sucesso!",
									type: 'success',   
									showCancelButton: false,   
									confirmButtonText: "Atualizar",   
									closeOnConfirm: true 
						        }, function(){   
						            window.location.reload();
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
   
				    } else {     
				        swal("Cancelado", "O e-mail não foi deletado.", "error");   
				    } 
				});
	}); 
	/* Delete do cliente Ends Here */

});