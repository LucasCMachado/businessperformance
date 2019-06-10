$(document).ready(function() {

	/* Insert do cliente Starts Here */
	$(document).on('submit', '#cliente-SaveForm', function() {
		//Envia os dados para cadastro
	   $.post("../controller/cliente.php", $(this).serialize())
        .done(function(data){
        	if (data=='sucesso') {
				swal({   
					title: 'Sucesso',
					text: "Cliente cadastrado com sucesso!",
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
    }); 
	/* Insert do cliente Ends Here */

	/* Update do cliente Starts Here */

	$('.update').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		//Insere os valores no modal
		var item= $(this);

		var nome=item.data('nome');
		var email=item.data('email');
		var token=item.data('token');

		$('#editNome').val(nome);
		$('#editEmail').val(email);
		$('#token').val(token);
	});

	$(document).on('submit', '#cliente-EditForm', function() {
	  //Envia os dados para atualização
	   $.post("../controller/cliente.php", $(this).serialize())
        .done(function(data){
        	if (data=='sucesso') {
				swal({   
					title: 'Sucesso',
					text: "Cliente editado com sucesso!",
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
    }); 
	/* Update do cliente Ends Here */

	/* Delete do cliente Starts Here */

	$('.delete').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */

		var item= $(this);
		var token=item.data('token');
		//Verifica se há clientes cadastradas
		$.post("../controller/cliente.php",{'token': token, 'op': 3}, function(data){
			//Caso não haja questiona a exclusão
			if (data=='confirm') {
				swal({   
				    title: "Tem certeza?",   
				    text: "Se você deletar esse cliente ele não poderá ser recuperado!",   
				    type: "warning",   
				    showCancelButton: true,   
				    confirmButtonColor: "#DD6B55",   
				    confirmButtonText: "Delete o cliente!",   
				    cancelButtonText: "Cancele!",   
				    closeOnConfirm: false,   
				    closeOnCancel: false 
				}, function(isConfirm){   
				    if (isConfirm) {
				    	//Caso confirmado a exclusão solita a mesma
						$.post("../controller/cliente.php",{'token': token, 'op': 4}, function(data){
							if (data=='sucesso') {
								swal({   
									title: 'Sucesso',
									text: "Cliente excluído com sucesso!",
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
				        swal("Cancelado", "O cliente não foi deletado.", "error");   
				    } 
				});
        	}
        	//Caso haja informa ao usuário
        	else{
        		swal(
				  'Aviso',
				  'Este cliente possuí formulários vinculados a ele e não pôde ser excluído. Por gentileza verificar.',
				  'warning'
				)
        	}
        	
		 });   
	     return false;
	}); 
	/* Delete do cliente Ends Here */
	
	/* Envia formulário do cliente Starts Here */

	$('.send-form').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		//Insere os valores no modal
		var item= $(this);

		var token=item.data('token');

		$('#tokenCliente').val(token);
	});

	/* Insert do cliente Starts Here */
	$(document).on('submit', '#cliente-EnviaForm', function() {
		//Envia os dados para cadastro
	   $.post("../controller/sendform.php", $(this).serialize())
        .done(function(data){
        	if (data=='sucesso') {
				swal({   
					title: 'Sucesso',
					text: "Cliente cadastrado com sucesso!",
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
    }); 
	/* Insert do cliente Ends Here */


	/* Visualizar reultado do cliente Starts Here */

	$('.resultado-form').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		//Insere os valores no modal
		var item= $(this);
		var token=item.data('token');
		$('#tokenCliente').val(token);
	});

	$(document).on('submit', '#cliente-ResultadosForm', function() {
	  //Envia os dados para atualização

		var tokenCliente = $('#tokenCliente').val();
		var tokenFormulario = $("#resultadoForm option:selected").val();
		window.open("resultado-"+tokenFormulario+"-"+tokenCliente);

    }); 
	/*Envia formulário do cliente Ends Here */
});