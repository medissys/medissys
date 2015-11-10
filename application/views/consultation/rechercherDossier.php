<div id="plainContent">
	<div class="breadcrumb">
	<p class="pForm"> <span class="design"> <?php echo TITLE_FIND_DIR_CONSULT; ?></span> </p>
	<hr/>
	<br/>
	<br/>
	</div>
</div>

<div class="consult">

	<?php 
	 		  
	    echo form_open('Consultation/rechercherDossier'); 

  		$numerodossier = array('name'=>'numerodossier','value'=>'','placeholder'=>''); 
	?>
	<p class="pForm"> Dossier N° <?php echo form_input($numerodossier); ?> </p>
	<br/>
    <p class="pForm"> <?php echo form_submit('commit','OK'); ?> </p> 

    <?php echo form_close(); /* Fin du formulaire */ ?>

</div>

<?php echo validation_errors(); ?>
<strong> <p class="error pForm"> <?php echo $err; ?> </p> </strong>
<?php  echo css_url('designComponent'); ?> 