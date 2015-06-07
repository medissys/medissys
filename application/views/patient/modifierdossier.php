<div id="sub-menu">

	<?php echo anchor('Gestionpatient/acceuil',HEADER_ANNUAIRE_FIND); ?> |
	<?php echo anchor('Gestionpatient/creerDossier',HEADER_CREER_DOSSIER); ?> |
	<?php echo anchor('Gestionpatient/modifierDossier',HEADER_MODIF_DOSSIER); ?> |
	<?php echo anchor('Gestionpatient/listeDossier',HEADER_LIST_DOSSIER); ?>

</div>

<div id="plainContent">
	<div class="breadcrumb">
	<p class="pForm"> <span class="design"> <?php echo TITLE_MODIF_DIR; ?></span> </p>
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
	<p class="pForm"> Dossier N° <?php echo form_input($numerodossier); ?> </p>
	<br/>
    <p class="pForm"> <?php echo form_submit('commit','OK'); ?> </p> 

    <?php echo form_close(); /* Fin du formulaire */ ?>

</div>

<p class="error"> <?php echo validation_errors(); ?> </p>


<?php  echo css_url('designComponent'); ?> 