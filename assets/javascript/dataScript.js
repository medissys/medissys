$(function(){

  	$('.submitForm').click(function(event){
     // 
  		/* Récupération des valeurs des champs du formulaire */
      dataForm = {
          login : $('#login').val(),
          mdp : $("#mdp").val()
      };

      /* Transmission au serveur */
      $.ajax({
        url     : 'Identification/login',
        method  : 'POST',
        data    : dataForm,
        success : function(data,success,xhr){
        console.log(data);

        }
      });
     event.preventDefault();
  	});
});