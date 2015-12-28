$(function(){

	console.log('test');

	/*var marker = $('.summaryError').attr('data-class');

	if ( marker == '' ){

		$('.summaryError').hide();

		$('.summaryError').attr('data-class','selected');

	}
  	*/

  	$('.submitForm').click(function(event){
  		
  		var data = $('.summaryError').attr('data-error');

  		//console.log('test');

  		if ( data ) {

  			$('.summaryError').fadeIn();

  			//event.preventDefault();

  		}

  	});

});