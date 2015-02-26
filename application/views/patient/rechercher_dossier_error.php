<div id="sub-menu">

	<?php echo anchor('Gestionpatient/acceuil','Rechercher'); ?> |
	<?php echo anchor('Gestionpatient/creerDossier','Creer un dossier'); ?> |
	<?php echo anchor('Gestionpatient/modifierDossier','Modifier un dossier'); ?>

</div>

<div id="plainContent">
	<div class="breadcrumb">
	<p> <span class="design"> DOSSIER PATIENT </span> </p>
	<hr/>
	</div>
</div>

<div class="consult">

	<br/>

	<p> <strong> Rechercher un dossier :: </strong> </p>

	<?php 
 		  
 		  echo form_open('Gestionpatient/rechercherDossier'); 

		  $nom = array('name'=>'nom','value'=>'','placeholder'=>'nom ...'); 

		  echo form_input($nom);
	?>

	</p>

    <p> <?php echo form_submit('commit','OK'); ?> </p> 

    <?php echo form_close(); /* Fin du formulaire */ ?>

</div>
	
<p class="error"> <?php echo $erreur; ?> </p>
<p class="error"> <?php echo validation_errors(); ?> </p>


<?php echo css_url('designComponent'); 
	  echo js_url('jquery-2.min');
	  echo js_url('jquery.autocomplete.min');
	  echo js_url('listeNoms');
?> 



