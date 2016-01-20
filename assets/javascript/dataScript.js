$(function(){

  	$('.submitForm').click(function(event){
     // event.preventDefault();
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
          console.log(data)
          if ( data ){
            $('.summaryError').fadeIn();
          }
          else{

             document.location.href = 'Dashboard/acceuil';
          }
         
          /*if ( data == "test2" ){
            document.location.href = 'Dashboard/acceuil';
            console.log(location.href)
          }
          //$('.summaryError').fadeIn();
          //console.log(xhr);
          /*$('.summaryError').fadeIn();
          $('.login').append(xhr)
          /*if (xhr.responseText == "test1"){

            $('.summaryError').fadeIn();
          }*/

        }
      });
      return false;
  	});
});