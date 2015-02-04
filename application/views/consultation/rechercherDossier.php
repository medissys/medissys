<div id="plainContent">
	<div class="breadcrumb">
	<p> <span class="design"> <?php echo TITLE_FIND_DIR_CONSULT; ?></span> </p>
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
	<p> Dossier N° <?php echo form_input($numerodossier); ?> </p>
	<br/>
    <p> <?php echo form_submit('commit','OK'); ?> </p> 

    <?php echo form_close(); /* Fin du formulaire */ ?>

</div>

<p class="error"> <?php echo validation_errors(); ?> </p>
<p class="error"> <?php echo $this->session->flashdata('error'); ?> </p>
<?php  echo css_url('designComponent'); ?> 