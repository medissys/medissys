$(function(){

	/* Chargement de la page acceuil dans le template*/
	$.ajax({
		url: '_acceuil.php',
		type: 'GET',
		success: function(data){
			$(".sub-content").html(data);
		}
	});

	$("#gest_pers").click(function(){
		$.ajax({
			url: 'dossier_personnel.php',
			type: 'GET',
			success: function(data){
				$(".sub-content").html(data);
			}
		});
		return false;
	});

	$("#consult-fiche").click(function(){
		alert();
		return false;
	});
	/*Au click sur Gestion personnel, chargement de la page dossier_personnel.php*/
	/*$("#gest_pers").click(function(){		

		$(".sub-content").empty();

		$(".sub-content").load("dossier_personnel.php");

		$("#consultFiche").hide();

		return false;
	});*/
});