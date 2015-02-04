<div id="sub-menu">

	<?php echo anchor('Gestionpatient/acceuil','Rechercher'); ?> |
	<?php echo anchor('Gestionpatient/creerDossier','Creer un dossier'); ?> |
	<?php echo anchor('Gestionpatient/','Modifier un dossier'); ?>

</div>

<div id="plainContent">
	<div class="breadcrumb">
	<p> <span class="design"> DOSSIER PATIENT </span> </p>
	<hr/>
	</div>
</div>

<div class="consult">

	<p> Rechercher un dossier Par : </p>

	<?php echo form_open('Gestionpatient/find_dir'); 

		  $nom = array('name'=>'nom','value'=>'','placeholder'=>'nom ...'); 
	?>

	<p> 
		<?php echo form_input($nom); ?> 
    </p>

    <?php $prenom = array('name'=>'prenom','value'=>'','placeholder'=>'prenom ...'); ?>

	<p> 
		<?php echo form_input($prenom); ?> 
    </p>

    <?php $dateN = array('name'=>'date','value'=>'','placeholder'=>'date de naissance ...'); 
    // TODO: Faire le calcul de l'age et l'afficher à l'écran.
    ?>

	<p> 
		<?php echo form_input($dateN); ?> 
    </p>

<!--     <p> Ou : </p>

    <php $num_dossier = array('name'=>'numdossier','value'=>'','placeholder'=>'numero de dossier ...'); ?>

    <p> <php echo form_input($num_dossier); ?> </p> -->

    <p> <?php echo form_submit('commit','OK'); ?> </p> 

    <?php echo form_close(); /* Fin du formulaire */ ?>

</div>

<div class="error"> <?php echo $this->session->flashdata('recherche_dossier_ko'); ?> </div>

<?php echo css_url('login'); ?> 

<?php // Chargement des fichiers JS ?>