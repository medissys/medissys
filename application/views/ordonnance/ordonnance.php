<div id="sub-menu">

	<?php echo anchor('','Imprimer'); ?>

</div>

<div id="plainContent">
	<div class="breadcrumb">
	<p class="pForm"> <span class="design"> <?php echo TITLE_EDIT_PRESCRIPTION; ?> </span> </p>
	<hr/>
	</div>
</div>

<div class="consult">

	<br/>

	<?php 
 		  
 		  echo form_open(''); 

		  $prescription = array('name'=>'prescription','value'=>'','placeholder'=>'prescription ...','id'=>'liste'); 

		  echo form_textarea($prescription);
	?> 

    <p class="pForm"> <?php echo form_submit('commit','OK'); ?> </p> 

    <?php echo form_close(); /* Fin du formulaire */ ?>

</div>

<p class="error"> <?php  ?> </p>
<p class="error"> <?php //echo validation_errors(); ?> </p>


<?php echo css_url('designComponent'); 

?> 