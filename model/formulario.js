$(document).ready(function() {

	/* Insert do formulario Starts Here */
	$(document).on('submit', '#formulario-SaveForm', function() {
		//Envia os dados para cadastro
	   $.post("../controller/formulario.php", $(this).serialize())
        .done(function(data){
        	if (data=='sucesso') {
				swal({   
					title: 'Sucesso',
					text: "Formulário cadastrado com sucesso!",
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
	/* Insert do formulario Ends Here */

	/* Update do formulario Starts Here */

	$('.update').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		//Insere os valores no modal
		var item= $(this);
		var nome=item.data('nome');
		var token=item.data('token');
		$('#editNomeForm').val(nome);
		$('#token').val(token);
	});

	$(document).on('submit', '#formulario-EditForm', function() {
	  //Envia os dados para atualização
	   $.post("../controller/formulario.php", $(this).serialize())
        .done(function(data){
        	if (data=='sucesso') {
				swal({   
					title: 'Sucesso',
					text: "Formulário editado com sucesso!",
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
	/* Update do formulario Ends Here */

	/* Delete do formulario Starts Here */

	$('.delete').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */

		var item= $(this);
		var token=item.data('token');
		//Verifica se há categorias cadastradas
		$.post("../controller/formulario.php",{'token': token, 'op': 3}, function(data){
			//Caso não haja questiona a exclusão
			if (data=='confirm') {
				swal({   
				    title: "Tem certeza?",   
				    text: "Se você deletar esse formulário ele não poderá ser recuperado!",   
				    type: "warning",   
				    showCancelButton: true,   
				    confirmButtonColor: "#DD6B55",   
				    confirmButtonText: "Delete o formulário!",   
				    cancelButtonText: "Cancele!",   
				    closeOnConfirm: false,   
				    closeOnCancel: false 
				}, function(isConfirm){   
				    if (isConfirm) {
				    	//Caso confirmado a exclusão solita a mesma
						$.post("../controller/formulario.php",{'token': token, 'op': 4}, function(data){
							if (data=='sucesso') {
								swal({   
									title: 'Sucesso',
									text: "Formulário excluído com sucesso!",
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
				        swal("Cancelado", "O formulário não foi deletado.", "error");   
				    } 
				});
        	}
        	//Caso haja informa ao usuário
        	else{
        		swal(
				  'Aviso',
				  'Este formulário possuí categorias e perguntas vinculados a ele e não pôde ser excluído. Por gentileza verificar.',
				  'warning'
				)
        	}
        	
		 });   
	     return false;
	}); 
	/* Delete do formulario Ends Here */
});