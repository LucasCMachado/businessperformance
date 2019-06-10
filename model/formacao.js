$(document).ready(function() {

	/* Insert do formacao Starts Here */
	$(document).on('submit', '#formacao-SaveForm', function() {
		//Envia os dados para cadastro
	   $.post("../controller/formacao.php", $(this).serialize())
        .done(function(data){
        	if (data=='sucesso') {
				swal({   
					title: 'Sucesso',
					text: "formacao cadastrado com sucesso!",
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
	/* Insert do formacao Ends Here */

	/* Insert do formacao Starts Here */
	$(document).on('submit', '#assessment-SaveForm', function() {
		//Envia os dados para cadastro
	   $.post("../controller/formacao.php", $(this).serialize())
        .done(function(data){
        	if (data=='sucesso') {
				swal({   
					title: 'Sucesso',
					text: "Assessment vinculado com sucesso!",
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
	/* Insert do formacao Ends Here */

	/* Update do formacao Starts Here */

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

	$(document).on('submit', '#formacao-EditForm', function() {
	  //Envia os dados para atualização
	   $.post("../controller/formacao.php", $(this).serialize())
        .done(function(data){
        	if (data=='sucesso') {
				swal({   
					title: 'Sucesso',
					text: "formacao editado com sucesso!",
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
	/* Update do formacao Ends Here */

	$('.delete').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */

		var item= $(this);
		var id=item.data('id');
		//Verifica se há turmas cadastradas
		swal({   
		    title: "Tem certeza?",   
		    text: "Se você desativar essa formação ela não poderá ser recuperada!",   
		    type: "warning",   
		    showCancelButton: true,   
		    confirmButtonColor: "#DD6B55",   
		    confirmButtonText: "Desativar",   
		    cancelButtonText: "Cancele!",   
		    closeOnConfirm: false,   
		    closeOnCancel: false 
		}, function(isConfirm){   
		    if (isConfirm) {
		    	//Caso confirmado a exclusão solita a mesma
				$.post("../controller/formacao.php",{'id': id, 'op': 3}, function(data){
					if (data=='sucesso') {
						swal({   
							title: 'Sucesso',
							text: "Formação desativada com sucesso!",
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
		        swal("Cancelado", "A formação não foi desativada.", "error");   
		    } 
		});        	
	}); 
	/* Delete do turma Ends Here */

	$('.desvincular').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */

		var item= $(this);
		var id=item.data('id');
		//Verifica se há turmas cadastradas
		swal({   
		    title: "Tem certeza?",   
		    text: "Se você desativar essa formação ela não poderá ser recuperada!",   
		    type: "warning",   
		    showCancelButton: true,   
		    confirmButtonColor: "#DD6B55",   
		    confirmButtonText: "Desativar",   
		    cancelButtonText: "Cancele!",   
		    closeOnConfirm: false,   
		    closeOnCancel: false 
		}, function(isConfirm){   
		    if (isConfirm) {
		    	//Caso confirmado a exclusão solita a mesma
				$.post("../controller/formacao.php",{'id': id, 'op': 7}, function(data){
					if (data=='sucesso') {
						swal({   
							title: 'Sucesso',
							text: "Formação desativada com sucesso!",
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
		        swal("Cancelado", "A formação não foi desativada.", "error");   
		    } 
		});        	
	}); 
	/* Delete do turma Ends Here */
});