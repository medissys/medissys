<div id="sub-menu">

	<?php echo anchor('RendezVous/nouveauRDV','Planifier RDV'); ?> |
	<?php echo anchor('RendezVous/modifierRDV','Modifier RDV'); ?>

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

		$today=date("Y")."-".date("m")."-".date("d",time()-86400);

		echo form_open('RendezVous/saveRDV/'.$numerodossier); 

		$date = array('name'=>'date','value'=>'','placeholder'=>'Date *', 'data-beatpicker' => 'true', 
					  'data-beatpicker-position' => "['right','bottom']", 
			          'data-beatpicker-format'=> "['DD','MM','YYYY']",
			          'data-beatpicker-module' => "icon,clear,footer",
			          'data-beatpicker-disable' => "{from:'".$today."',to:'<'}"
			          );
		$h = array('name' => 'heure', 'value' => '', 'placeholder' => 'Heure *', 'class' => 'splitField', 'maxlength' => '2');
		$m = array('name' => 'minute', 'value' => '', 'placeholder' => 'Minute *' , 'class' => 'splitField', 'maxlength' => '2');

	?>	

	<p class="label"> <?php echo form_input($date); ?> </p>
	<br/>
	<p class="label"> <?php 

						foreach ( $heure as $key ) {
							foreach ($key as $val ) {
								$data[] = $val;
							}
						}
							echo form_dropdown('heure',$data);

							echo form_label(':');

						foreach ( $minute as $key ) {
							foreach ($key as $val ) {
								$options[] = $val;
							}
						}

							echo form_dropdown('minute',$options);
					  ?> </p>

	<br/>

	<p class="label submit"> <?php echo form_submit('commit','Valider'); ?> </p>

    <?php echo form_close(); /* Fin du formulaire */ ?>

</div>
<div class="icon">
 	<?php echo img('logo_rdv','png','logo rdv'); ?>
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