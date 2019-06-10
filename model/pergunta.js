$(document).ready(function() {

	/* Insert do pergunta Starts Here */
	$(document).on('submit', '#pergunta-SaveForm', function() {
		//Envia os dados para cadastro
	   $.post("../controller/pergunta.php", $(this).serialize())
        .done(function(data){
        	if (data=='sucesso') {
				swal({   
					title: 'Sucesso',
					text: "Pergunta cadastrada com sucesso!",
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
	/* Insert do pergunta Ends Here */

	/* Update do pergunta Starts Here */

	$('.update').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		//Insere os valores no modal
		var item= $(this);

		var idPerg=item.data('idperg');
		var nomePerg=item.data('nomeperg');

		var idCat=item.data('idcat');
		var nomeCat=item.data('nomecat');

		var idTipo=item.data('idtipo');
		var nomeTipo=item.data('nometipo');


		$('#editPergunta').val(nomePerg);
		$('#idPergunta').val(idPerg);

		$('#tipoSelected').val(idTipo).html(nomeTipo);
		$('#catSelected').val(idCat).html(nomeCat);
		$('#s2id_editTipo > a > .select2-chosen').html(nomeTipo);
		$('#s2id_editCat > a > .select2-chosen').html(nomeCat);
	});

	$(document).on('submit', '#pergunta-EditForm', function() {
	  //Envia os dados para atualização
	   $.post("../controller/pergunta.php", $(this).serialize())
        .done(function(data){
        	if (data=='sucesso') {
				swal({   
					title: 'Sucesso',
					text: "Pergunta editada com sucesso!",
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
	/* Update do pergunta Ends Here */

	/* Delete do pergunta Starts Here */

	$('.delete').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */

		var item= $(this);
		var id=item.data('idperg');
		//Caso não haja questiona a exclusão
		swal({   
		    title: "Tem certeza?",   
		    text: "Se você deletar essa pergunta ela não poderá ser recuperada!",   
		    type: "warning",   
		    showCancelButton: true,   
		    confirmButtonColor: "#DD6B55",   
		    confirmButtonText: "Delete a pergunta!",   
		    cancelButtonText: "Cancele!",   
		    closeOnConfirm: false,   
		    closeOnCancel: false 
		}, function(isConfirm){   
		    if (isConfirm) {
		    	//Caso confirmado a exclusão solita a mesma
				$.post("../controller/pergunta.php",{'id': id, 'op': 4}, function(data){
					if (data=='sucesso') {
						swal({   
							title: 'Sucesso',
							text: "Pergunta excluída com sucesso!",
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
		        swal("Cancelado", "A pergunta não foi deletada.", "error");   
		    } 
		});
	}); 
	/* Delete do pergunta Ends Here */
});