$(document).ready(function() {

	/* Insert do categoria Starts Here */
	$(document).on('submit', '#categoria-SaveForm', function() {
		//Envia os dados para cadastro
	   $.post("../controller/categoria.php", $(this).serialize())
        .done(function(data){
        	if (data=='sucesso') {
				swal({   
					title: 'Sucesso',
					text: "Categoria cadastrado com sucesso!",
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
	/* Insert do categoria Ends Here */

	/* Update do categoria Starts Here */

	$('.update').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		//Insere os valores no modal
		var item= $(this);

		var idCat=item.data('idcat');
		var nomecat=item.data('nomecat');
		var idform=item.data('idform');
		var nomeForm=item.data('nomeform');

		$('#editNomeCat').val(nomecat);
		$('#formSelected').val(idform).html(nomeForm);
		$('.select2-chosen').html(nomeForm);
		$('#id').val(idCat);
	});

	$(document).on('submit', '#categoria-EditForm', function() {
	  //Envia os dados para atualização
	   $.post("../controller/categoria.php", $(this).serialize())
        .done(function(data){
        	if (data=='sucesso') {
				swal({   
					title: 'Sucesso',
					text: "Categoria editado com sucesso!",
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
	/* Update do categoria Ends Here */

	/* Delete do categoria Starts Here */

	$('.delete').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */

		var item= $(this);
		var id=item.data('idcat');
		//Verifica se há categorias cadastradas
		$.post("../controller/categoria.php",{'id': id, 'op': 3}, function(data){
			//Caso não haja questiona a exclusão
			if (data=='confirm') {
				swal({   
				    title: "Tem certeza?",   
				    text: "Se você deletar essa categoria ela não poderá ser recuperada!",   
				    type: "warning",   
				    showCancelButton: true,   
				    confirmButtonColor: "#DD6B55",   
				    confirmButtonText: "Delete a categoria!",   
				    cancelButtonText: "Cancele!",   
				    closeOnConfirm: false,   
				    closeOnCancel: false 
				}, function(isConfirm){   
				    if (isConfirm) {
				    	//Caso confirmado a exclusão solita a mesma
						$.post("../controller/categoria.php",{'id': id, 'op': 4}, function(data){
							if (data=='sucesso') {
								swal({   
									title: 'Sucesso',
									text: "Categoria excluído com sucesso!",
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
				        swal("Cancelado", "A categoria não foi deletada.", "error");   
				    } 
				});
        	}
        	//Caso haja informa ao usuário
        	else{
        		swal(
				  'Aviso',
				  'Esta categoria possuí perguntas vinculados a ela e não pôde ser excluída. Por gentileza verificar.',
				  'warning'
				)
        	}
        	
		 });   
	     return false;
	}); 
	/* Delete do categoria Ends Here */
});