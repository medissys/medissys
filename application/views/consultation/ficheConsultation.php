<div id="sub-menu">

	<?php echo anchor('Consultation/consulter/'.$index,'Nouvelle Consultation'); ?> |
	<?php echo anchor('Consultation/modifierDossier/'.$index,'Modifier Dossier'); ?> 

</div>

<div id="plainContent">
	<div class="breadcrumb">
	<!--p> <span class="design"> <?php //echo TITLE_NEW_CONSULT.' - '.'DOSSIER N° '.$this->session->userdata('numerodossier'); ?></span> </p-->

	<span class="design"> <?php echo TITLE_NEW_CONSULT.' - '.'DOSSIER N° '.$index; ?></span>
	<hr/>
	<br/>

	</div>
</div>

<div class="consult">

	<?php 
	 		  
	    echo form_open('Consultation/enregistrerConsultation/'.$index); 

	    $symptome = array('name'=>'symptome','value'=>'','placeholder'=>'', 'style' => 'resize:none'); 
	    $observation = array('name' => 'observation', 'value' => '', 'placeholder' => '', 'style' => 'resize:none');
	    $commentaire = array('name' => 'commentaire', 'value' => '', 'placeholder' => '','id' => 'textarea', 'style' => 'resize:none');


	?>	
	<p class="label"> <?php echo form_label('Symptomes:'); ?> </p>
	<p class="label"> <?php echo form_textarea($symptome); ?> </p>

	<p class="label"> <?php echo form_label('Observations:'); ?> </p>
	<p class="label"> <?php echo form_textarea($observation); ?> </p>

	<p class="label"> <?php echo form_label('Commentaires:'); ?> </p>
	<p class="label"> <?php echo form_textarea($commentaire); ?> </p>

	<p class="label submit"> <?php echo form_submit('commit','Valider'); ?> </p>

    <?php echo form_close(); /* Fin du formulaire */ ?>

</div>

<p class="error"> <?php echo validation_errors(); ?> </p>

<?php  echo css_url('designComponent'); 
	   echo css_url('table'); ?> 