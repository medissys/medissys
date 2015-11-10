<div id="sub-menu">

	<?php echo anchor('Gestionpatient/acceuil',HEADER_ANNUAIRE_FIND); ?> |
	<?php echo anchor('Gestionpatient/creerDossier',HEADER_CREER_DOSSIER); ?> |
	<?php echo anchor('Gestionpatient/modifierDossier',HEADER_MODIF_DOSSIER); ?> |
	<?php echo anchor('Gestionpatient/listeDossier',HEADER_LIST_DOSSIER); ?>

</div>

<div id="plainContent">
	<div class="breadcrumb">
	<p class="pForm"> <span class="design"> <?php echo TITLE_MODIF_DIR; ?> </span> </p>
	<hr/>

	<br />
	</div>
</div>

<div id="sub-content"> 
	<?php //echo anchor('Gestionpatient/nouvelleConsultation','Nouvelle consulation'); ?>
</div>

<div class="consult">

	<?php 
		//Champ caché
		$hidden = array('numdossier'=>$numerodossier);

		// Formulaire
		echo form_open('Gestionpatient/dossierModifier','',$hidden);

		// numero dossier
		$numdoss = array('name'=>'numerodossier','value'=> 'N° Dossier: '.$numerodossier, 'disabled'=>'disabled');
		echo form_input($numdoss);
	?>
	<br/>
	<?php
		//nom
		$n = array('name'=>'nom','value'=> mb_strtoupper($nom), 'disabled'=>'disabled');
		echo form_input($n);
	?>

	<?php
		//prenom
		$p= array('name'=>'prenom','value'=> ucwords($prenom), 'disabled'=>'disabled');
		echo form_input($p);
	?>
	<br/>
	<?php
		//date de naissance
		$daten = array('name'=>'datenaissance','value'=> 'Né(e) le '.$datenaissance, 'disabled'=>'disabled', 'placeholder' => 'date de naissance ...');
		echo form_input($daten);
	?>
	<br/>
	<?php
		//telephone
		$t = array('name'=>'telephone','value'=> $telephone, 'maxlength' => '9', 'placeholder' => 'telephone ...');
		echo form_input($t);
	?>
	<br/>
	<?php
		//E-mail
		$mail = array('name'=>'email','value'=> $email, 'placeholder' => 'E-mail ...');
		echo form_input($mail);
		echo form_error('email');
	?>

	<?php
		//Adresse
		$adr = array('name'=>'adresse','value'=> $adresse, 'placeholder' => 'adresse (Ville, Code postal) ...');
		echo form_input($adr);
	?>
	<br/>
	<?php
		//Profession
		$prof = array('name'=>'profession','value'=> $profession, 'placeholder' => 'Profession ...');
		echo form_input($prof);
	?>
	<br/>
	<br/>
	<?php
		//symptomes
		$symp = array('name'=>'symptome','value'=> $symptome, 'disabled'=>'disabled', 'placeholder' => 'Symptômes ...','style' => 'resize:none');
		echo form_textarea($symp);
	?>
	<?php
		//symptomes
		$obs = array('name'=>'observation','value'=> $observation, 'disabled'=>'disabled', 'placeholder' => 'Observations ...','style' => 'resize:none');
		echo form_textarea($obs);
	?>
	<br/>

	<?php echo form_submit('commit','OK'); ?>

    <?php echo form_close(); /* Fin du formulaire */ ?>

    <p class="error"> <?php //echo validation_errors(); ?> </p>
</div>

<?php  echo css_url('designComponent'); ?>