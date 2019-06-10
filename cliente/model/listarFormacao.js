$('.ass-formacao').on('click', function(event) {
	event.preventDefault();

	var item= $(this);
	/* Act on the event */
	var turma=item.data('turma');
	var acesso=item.data('acesso');
	var token=item.data('token');

	window.location.href = "ass-formacao-"+turma+"-"+acesso+"-"+token;
});

$('.formacao').on('click', function(event) {
	event.preventDefault();

	var item= $(this);
	/* Act on the event */
	var formacao=item.data('formacao');
	var acesso=item.data('acesso');

	window.location.href = "formacao-"+formacao+"-"+acesso;
});