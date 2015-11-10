<div id="sub-menu">

  <?php echo anchor('Gestionpatient/acceuil',HEADER_ANNUAIRE_FIND); ?> |
  <?php echo anchor('Gestionpatient/creerDossier',HEADER_CREER_DOSSIER); ?> |
  <?php echo anchor('Gestionpatient/modifierDossier',HEADER_MODIF_DOSSIER); ?> |
  <?php echo anchor('Gestionpatient/listeDossier',HEADER_LIST_DOSSIER); ?>

</div>

<div id="plainContent">
	<div class="breadcrumb">
	<p class="pForm"> <span class="design"> CREER DOSSIER PATIENT </span> </p>
	<hr/>
  <br />
	</div>
</div>

<div class="consult">

<p class="pForm"> <strong> Nouveau dossier ::: Creer </strong> </p>
  
	<?php echo form_open('Gestionpatient/creerDossier'); 
		
		  foreach ($c as $index => $value){
		  	foreach ($value as $key => $val) {
		  		
		  		$options[] = $val['libelle'];

		  	}
		 }
	?>

	<p class="pForm"> 

		<?php 
    echo form_label('civilite: ');
		echo form_dropdown('civilite',$options); 
      //TODO: Remplacer civilité par Sexe.
    ?> 
  </p>
    <?php 
    	    $nom = array('name'=>'nom','value'=>set_value('nom'), 'placeholder'=>'* nom ...'); 
          $prenom = array('name'=>'prenom','value'=> set_value('prenom'),'placeholder'=>'* prenom ...');
          $telephone = array('name'=>'telephone','value'=>set_value('telephone'), 'maxlength' => '9', 'placeholder'=>'* telephone ...');
          $mail = array('name'=>'email','value'=> set_value('email'),'placeholder'=>'email ...');
          $profession = array('name'=>'profession','value'=> set_value('profession'),'placeholder'=>'profession ...');
          $adresse = array('name'=>'adresse','value'=> set_value('adresse'),'placeholder'=>'adresse (quartier) ...');
          $symp = array('name' => 'symptome', 'value' => set_value('symptome'), 'placeholder' => '* symptômes ... ', 'style' => 'resize:none');
          $diag = array('name' => 'diagnostic', 'value' => '', 'placeholder' => 'observations ... ', 'style' => 'resize:none');
    ?>

	<p class="pForm"> 
		<?php  echo form_input($nom); 
			     echo form_input($prenom); ?> 
    </p>

    <p class="pForm"> <?php echo form_label('Date de naissance : '); 

    		  foreach ( $d['array_jours'] as $index => $value ) { /* On boucle sur $d['array_jours'] pour ne sélectionner que les jours */

    		  		$day[] = $value['jours'];
    		  }

    		  echo form_dropdown('jours',$day); 

    		  foreach ( $d['array_mois'] as $index => $value ) { /* On boucle sur $d['array_mois'] pour ne sélectionner que les mois */
    		  		
    		  		$months[] = $value['mois'];
    		  }
    		  echo form_dropdown('mois',$months);  


    		  foreach ( $d['array_annees'] as $index => $value ) {
    		  	
    		  		$year[] = $value['annee'];
    		  }

    		  echo form_dropdown('annees',$year); ?> 
    </p>

     <p class="pForm"> <?php echo form_input($telephone); ?> 
    </p>

     <p class="pForm"> <?php echo form_input($mail); /*echo form_error('email');*/ ?> </p>
     <p class="pForm"> <?php echo form_input($adresse); ?> </p>
     <p class="pForm"> <?php echo form_input($profession); ?> </p>
     <p class="pForm"> <?php echo form_textarea($symp); ?>
                       <?php echo form_textarea($diag); ?>
     </p>

    <p class="pForm"> <?php echo form_submit('commit','OK'); ?> </p> 

    <?php echo form_close(); /* Fin du formulaire */ ?>

   <p class="error pForm"> <?php echo $this->session->flashdata('error_fields'); ?> </p>

</div>

<p class="error pForm"> <?php echo $this->session->flashdata('recherche_dossier_ko'); ?> </p>


<?php 
      echo css_url('designComponent');
      //echo css_url('designComponent');
      //echo js_url('jquery-2.min');
	    //echo js_url('loader');
?>




