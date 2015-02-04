<div id="sub-menu">

	<?php echo anchor('Gestionpatient/acceuil','Rechercher'); ?> |
	<?php echo anchor('Gestionpatient/creerDossier','Creer un dossier'); ?> |
	<?php echo anchor('Gestionpatient/modifierDossier','Modifier un dossier'); ?>

</div>

<div id="plainContent">
	<div class="breadcrumb">
	<p> <span class="design"> <?php echo TITLE_MODIF_DIR; ?></span> </p>
	<hr/>
	<br/>
	<br/>
	</div>
</div>

<div class="consult">

	<?php 
	 		  
	    echo form_open('Gestionpatient/modifierDossier'); 

  		$numerodossier = array('name'=>'numerodossier','value'=>'','placeholder'=>''); 
	?>
	<p> Dossier N° <?php echo form_input($numerodossier); ?> </p>
	<br/>
    <p> <?php echo form_submit('commit','OK'); ?> </p> 

    <?php echo form_close(); /* Fin du formulaire */ ?>

</div>

<p class="error"> <?php echo validation_errors(); ?> </p>


<?php //echo css_url('designComponent'); 
		echo css_url('designComponent'); ?> 