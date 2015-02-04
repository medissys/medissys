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

<p class="success"> <?php echo img('success_icon','png','success icon'); ?> <span>DOSSIER CREER AVEC SUCCESS <span></p>

<p> </p>

<p> <?php echo anchor('Gestionpatient/consulterDossier','consulter le dossier'); ?> </p>

</div>

<?php  echo css_url('designComponent'); ?>




