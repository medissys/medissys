<div id="sub-menu">

	<?php echo anchor('Consultation/consulter','Nouvelle Consultation'); ?> |
	<?php echo anchor('Consultation/modifierDossier','Modifier Dossier'); ?> |
	<?php echo anchor('Consultation/','Imprimer Ordonnance'); ?>

</div>

<div id="plainContent">
	<div class="breadcrumb">
	<p> <span class="design"> <?php echo TITLE_NEW_CONSULT.' - DOSSIER N° '.$header->numerodossier; ?></span> </p>
	<hr/>
	<br/>

	</div>
</div>

<div class="consult">

	<p> <?php /* Match civilite, solution temporaire */ 
	if ( $header->idCivilite == 1 ) echo 'M. '; else if ( $header->idCivilite == 2 ) echo 'Mme. '; else if ( $header->idCivilite == 3 ) echo 'Mlle. ';
	    echo ucwords($header->prenom).' '.mb_strtoupper($header->nom);
	    ?> 
	</p>
	<p> né(e) le <?php echo $header->datenaissance; ?> </p>
	<br/>
	<p> <h3> ANTECEDENTS MEDICAUX </h3> </p>
	<table> 
		<thead>
			<tr>
				<th></th>
				<th>DATE CONSULTATION</th>
				<th>SYMPTOMES</th>
				<th>OBSERVATIONS</th>
				<th>COMMENTAIRES</th>
			</tr>
		</thead>
		<tbody> 
		<?php 
			$i = 0;
			foreach ($board as $key => $value) { 
		?>

			<tr>
				<td><?php echo ++$i; ?></td>
				<td><?php echo $value->datecreation; ?> </td>
				<td><?php echo $value->symptome; ?> </td>
				<td><?php echo $value->observation; ?> </td>
				<td><?php echo $value->commentaires; ?> </td>
			</tr>
			<?php } ?>
		</tbody>
	</table>

	<br/>
	<br/>

	<?php 
	 		  
	    echo form_open('Consultation/rechercherDossier'); 

	?>

    <?php echo form_close(); /* Fin du formulaire */ ?>

</div>

<p class="error"> <?php echo validation_errors(); ?> </p>

<?php  echo css_url('designComponent'); 
	   echo css_url('table'); ?> 