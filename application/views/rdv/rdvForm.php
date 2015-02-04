<div id="sub-menu">

	<?php echo anchor('RendezVous/nouveauRDV','Planifier RDV'); ?> 

</div>

<div id="plainContent">
	<div class="breadcrumb">
	<span class="design"> <?php echo 'NOUVEAU RDV - DOSSIER N° '.$numerodossier; ?> </span>
	<hr/>
	<br/>

	</div>
</div>
	
<div class="consult">

	<p class="name"> <h3> <?php echo strtoupper($nom).' '.ucfirst($prenom); ?> </h3> </p>

	<?php  

		echo form_open('RendezVous/saveRDV/'.$numerodossier); 

		$date = array('name'=>'date','value'=>'','placeholder'=>'Date *', 'data-beatpicker' => 'true', 'data-beatpicker-position' => "['right','bottom']"); 
	
		$heure = array('name' => 'heure', 'value' => '', 'placeholder' => 'Heure *', 'class' => 'splitField', 'maxlength' => '2');
		$minute = array('name' => 'minute', 'value' => '', 'placeholder' => 'Minute *' , 'class' => 'splitField', 'maxlength' => '2');

	?>	

	<p class="label"> <?php echo form_input($date); ?> </p>
	<p class="label"> <?php echo form_input($heure);
							echo form_label(':');
							echo form_input($minute);
					  ?> </p>

	<br/>

	<p class="label submit"> <?php echo form_submit('commit','Valider'); ?> </p>

    <?php echo form_close(); /* Fin du formulaire */ ?>

</div>

<p class="error"> 

<?php //echo validation_errors(); 
		echo $error;//$this->session->userdata('field_required');

?> 
</p>

<?php  echo css_url('designComponent'); 
	   echo css_url('table'); 
	   echo css_url('BeatPicker.min');

	   echo js_url('jquery-1.11.0.min');
	   echo js_url('BeatPicker.min');

?> 