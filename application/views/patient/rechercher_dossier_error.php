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

	<p> Rechercher par </p>

	<?php 
 		  
 		  echo form_open('Gestionpatient/rechercherDossier'); 

		  $numerodossier = array('name'=>'numerodossier','value'=>'','placeholder'=>'numero de dossier ...'); 

		  echo form_input($numerodossier);

	/*echo form_open('Gestionpatient/rechercherDossier'); 

		  $nom = array('name'=>'nom','value'=>'','placeholder'=>'nom ...'); 
	?>

	<p> 
		<?php echo form_input($nom); ?> 
    </p>

    <?php $prenom = array('name'=>'prenom','value'=>'','placeholder'=>'prenom ...'); ?>

	<p> 
		<?php echo form_input($prenom); ?> 
    </p>

    <?php $dateN = array('name'=>'date','value'=>'','placeholder'=>'date de naissance ...'); ?>

	<p> 
		<?php echo form_input($dateN); */ ?> 
    </p>

    <!-- <p> - OU -  </p>

    <php $num_dossier = array('name'=>'numdossier','value'=>'','placeholder'=>'numero de dossier ...'); ?>

    <p> <php echo form_input($num_dossier); ?> </p> -->

    <p> <?php echo form_submit('commit','OK'); ?> </p> 

    <?php echo form_close(); /* Fin du formulaire */ ?>

</div>
	
<p class="error"> <?php echo $erreur; ?> </p>
<p class="error"> <?php echo validation_errors(); ?> </p>


<?php echo css_url('designComponent'); ?> 



