$(document).ready(function() {

	/* Insert do turma Starts Here */
	$(document).on('submit', '#turma-SaveForm', function() {
		//Envia os dados para cadastro
	   $.post("../controller/turma.php", $(this).serialize())
        .done(function(data){
        	if (data=='sucesso') {
				swal({   
					title: 'Sucesso',
					text: "Turma cadastrado com sucesso!",
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
	/* Insert do turma Ends Here */

	/* Insert do turma Starts Here */
	$(document).on('submit', '#formacao-SaveForm', function() {
		//Envia os dados para cadastro
	   $.post("../controller/turma.php", $(this).serialize())
        .done(function(data){
        	if (data=='sucesso') {
				swal({   
					title: 'Sucesso',
					text: "Formação vinculada com sucesso!",
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
	/* Insert do turma Ends Here */

	/* Update do turma Starts Here */

	$('.update').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		//Insere os valores no modal
		var item= $(this);

		var idTurma=item.data('id');
		var nome=item.data('nome');
		var data=item.data('data');
		var local=item.data('local');

		$('#editNome').val(nome);
		$('#editData').val(data);
		$('#editLocal').val(local);
		$('#id').val(idTurma);
	});

	$(document).on('submit', '#turma-EditForm', function() {
	  //Envia os dados para atualização
	   $.post("../controller/turma.php", $(this).serialize())
        .done(function(data){
        	if (data=='sucesso') {
				swal({   
					title: 'Sucesso',
					text: "Turma editado com sucesso!",
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
	/* Update do turma Ends Here */

	/* Delete do turma Starts Here */

	$('.delete').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */

		var item= $(this);
		var id=item.data('idTurma');
		//Verifica se há turmas cadastradas
		$.post("../controller/turma.php",{'id': id, 'op': 3}, function(data){
			//Caso não haja questiona a exclusão
			if (data=='confirm') {
				swal({   
				    title: "Tem certeza?",   
				    text: "Se você deletar essa turma ela não poderá ser recuperada!",   
				    type: "warning",   
				    showCancelButton: true,   
				    confirmButtonColor: "#DD6B55",   
				    confirmButtonText: "Delete a turma!",   
				    cancelButtonText: "Cancele!",   
				    closeOnConfirm: false,   
				    closeOnCancel: false 
				}, function(isConfirm){   
				    if (isConfirm) {
				    	//Caso confirmado a exclusão solita a mesma
						$.post("../controller/turma.php",{'id': id, 'op': 4}, function(data){
							if (data=='sucesso') {
								swal({   
									title: 'Sucesso',
									text: "Turma excluído com sucesso!",
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
				        swal("Cancelado", "A turma não foi deletada.", "error");   
				    } 
				});
        	}
        	//Caso haja informa ao usuário
        	else{
        		swal(
				  'Aviso',
				  'Esta turma possuí perguntas vinculados a ela e não pôde ser excluída. Por gentileza verificar.',
				  'warning'
				)
        	}
        	
		 });   
	     return false;
	}); 
	/* Delete do turma Ends Here */

	/* Delete do turma Starts Here */

	$('.desvincular').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */

		var item= $(this);
		var id=item.data('id');
		//Verifica se há turmas cadastradas
				swal({   
				    title: "Tem certeza?",   
				    text: "Se você desvincular essa formacao ela não poderá ser recuperada!",   
				    type: "warning",   
				    showCancelButton: true,   
				    confirmButtonColor: "#DD6B55",   
				    confirmButtonText: "Desvincular",   
				    cancelButtonText: "Cancele!",   
				    closeOnConfirm: false,   
				    closeOnCancel: false 
				}, function(isConfirm){   
				    if (isConfirm) {
				    	//Caso confirmado a exclusão solita a mesma
						$.post("../controller/turma.php",{'id': id, 'op': 5}, function(data){
							if (data=='sucesso') {
								swal({   
									title: 'Sucesso',
									text: "Formação desvinculada com sucesso!",
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
				        swal("Cancelado", "A formação não foi desvinculada.", "error");   
				    } 
				});        	
	}); 
	/* Delete do turma Ends Here */
});