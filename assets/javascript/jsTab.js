$(function(){

	$('.hide-content').hide();

	$('.show-content').click(function(){

		var data=cnx().ajax.phpPostSyn('patient/gestionpatient','historique');

		alert(data);
	});

});