<div id="sub-menu">

	<?php echo anchor('Gestionpatient/acceuil',HEADER_ANNUAIRE_FIND); ?> |
	<?php echo anchor('Gestionpatient/creerDossier',HEADER_CREER_DOSSIER); ?> |
	<?php echo anchor('Gestionpatient/modifierDossier',HEADER_MODIF_DOSSIER); ?> |
	<?php echo anchor('Gestionpatient/listeDossier',HEADER_LIST_DOSSIER); ?>

</div>

<div id="plainContent">
	<div class="breadcrumb">
	<p class="pForm"> <span class="design"> DOSSIER PATIENT </span> </p>
	<hr/>
	</div>
</div>

<div class="consult">

	<br/>

	<p class="pForm"> <strong> Dossier ::: Rechercher </strong> </p>

	<p class="pForm">
	<?php 
 		  
 		  echo form_open('Gestionpatient/rechercherDossier'); 

		  /*$numerodossier = array('name'=>'numerodossier','value'=>'','placeholder'=>'numero de dossier ...'); 

		  echo form_input($numerodossier);*/

		  $nom = array('name'=>'nom','value'=>'','placeholder'=>'nom ...','id'=>'liste'); 

		  echo form_input($nom);
	?> 

     <?php echo form_submit('commit','OK'); ?> </p> 

    <?php echo form_close(); /* Fin du formulaire */ ?>

</div>

<p class="error"> <?php if (!isset($erreur)) $erreur =''; else echo $erreur; ?> </p>
<p class="error"> <?php echo validation_errors(); ?> </p>


<?php echo css_url('designComponent'); 
	  echo js_url('jquery-2.min');
	  echo js_url('jquery.autocomplete.min');
	  echo js_url('listeNoms');
?> 