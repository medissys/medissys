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

	<strong> <p class="pForm"> 

		<?php 
    echo form_label('Civilite: ');
		echo form_dropdown('civilite',$options); 
      //TODO: Remplacer civilité par Sexe.
    ?> 
  </p> </strong>
    <?php 
          
    	    $name = array('name'=>'nom', 'value'=> $nom, 'placeholder'=>'* nom ...'); 
          $subname = array('name'=>'prenom','value'=> $prenom, 'placeholder'=>'* prenom ...');
          $telephone = array('name'=>'telephone','value'=> $tel, 'maxlength' => '9', 'placeholder'=>'* telephone ...');
          $email = array('name'=>'email','value'=> $mail,'placeholder'=>'email ...');
          $work = array('name'=>'profession','value'=> $profession,'placeholder'=>'profession ...');
          $adr = array('name'=>'adresse','value'=> $adresse, 'placeholder'=>'adresse (quartier) ...');
          $symp = array('name' => 'symptome', 'value' => $symptome, 'placeholder' => '* symptômes ... ', 'style' => 'resize:none');
          $diag = array('name' => 'diagnostic', 'value' => '', 'placeholder' => 'observations ... ', 'style' => 'resize:none');
    
    ?>

	<p class="pForm"> 
		<?php  echo form_input($name); 
			     echo form_input($subname); ?> 
    </p>

   <strong> <p class="pForm"> <?php echo form_label('Date de naissance : '); 

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
    </p> </strong>

     <p class="pForm"> <?php echo form_input($telephone); ?> 
    </p>

     <p class="pForm"> <?php echo form_input($email); /*echo form_error('email');*/ ?> </p>
     <p class="pForm"> <?php echo form_input($adr); ?> </p>
     <p class="pForm"> <?php echo form_input($work); ?> </p>
     <p class="pForm"> <?php echo form_textarea($symp); ?>
                       <?php echo form_textarea($diag); ?>
     </p>

    <p class="pForm"> <?php echo form_submit('commit','OK'); ?> </p> 

    <?php echo form_close(); /* Fin du formulaire */ ?>

</div>
<div class="icon icon_edit">
<?php echo img('edit_dossier','png','creer_dossier'); ?>
</div>

<?php echo $error; ?>

<?php 
      echo css_url('designComponent');
      echo css_url('table');
      //echo js_url('jquery-2.min');
	    //echo js_url('loader');
?>




