<div id="sub-menu">

	<?php echo anchor('Gestionpers/acceuil',HEADER_ANNUAIRE_FIND); ?>
	<!--a href="#" id="selectFiche"> Rechercher</a--> |
	<?php echo anchor('Gestionpers/annuaire',HEADER_ANNUAIRE_LIST); ?>
	<!--a href="#" id="alterFiche"> Afficher l'annuaire complète</a-->
</div>

<div id="plainContent">
	<div class="breadcrumb">
	<p class="pForm"> <span class="design"> <?php echo TITLE_FIND_USER; ?> </span> </p>
	<hr/>
	</div>
</div>

<div class="consult">
	<br/>
	<br/>

	<p class="pForm"> <strong> Rechercher un collaborateur :: </strong> </p>

	<br/>
	<?php echo form_open('Gestionpers/consulterFiche'); 

		  $login = array('name'=>'login','value'=>'','placeholder'=>'login', 'id'=>'autocomplete'); 
	?>

	<p class="pForm"> 
		<?php echo form_input($login); ?> 
    <!--/p>

<!-- <p> Ou : </p>

    <php $matricule = array('name'=>'matricule','value'=>'','placeholder'=>'matricule ...'); ?>

    <p> <php echo form_input($matricule); ?> </p> -->

    <!--p class="pForm"--> <?php echo form_submit('commit','OK'); ?> </p> 

    <?php echo form_close(); /* Fin du formulaire */ ?>

</div>

<p class="error"> <?php if (!isset($erreur)) $erreur =''; else echo $erreur; ?> </p>
<!--div class="error"> <?php //echo $this->session->flashdata('recherche_user_ko'); ?> </div-->

<?php //echo css_url('login'); 
	  echo css_url('designComponent');	   
?> 

<?php // Chargement des fichiers JS

	 //echo js_url('jquery-2.min'); 
	 //echo js_url('jquery.autocomplete.min');
	 //echo js_url('load.autocomplete');
  ?>