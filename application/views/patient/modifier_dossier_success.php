<div id="sub-menu">

  <?php echo anchor('Gestionpatient/acceuil','Rechercher'); ?> |
  <?php echo anchor('Gestionpatient/creerDossier','Creer un dossier'); ?> |
  <?php echo anchor('Gestionpatient/ModifierDossier','Modifier un dossier'); ?>

</div>

<div id="plainContent">
	<div class="breadcrumb">
	<p> <span class="design"> DOSSIER PATIENT </span> </p>
	<hr/>
	</div>
</div>

<div class="consult">

<br />

<p class="success"> <?php echo img('success_icon','png','success icon'); ?> <span>DOSSIER N° <?php echo $numdossier; ?> MODIFIE AVEC SUCCESS <span></p>

<p> </p>

<p> <?php echo anchor('Gestionpatient/consulterDossierModifier/'.$numdossier,'consulter le dossier'); ?> </p>

</div>

<?php  echo css_url('designComponent'); ?>




