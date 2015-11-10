<div id="sub-menu">

	<?php echo anchor('Consultation/consulter/'.$header->numerodossier,'Nouvelle consultation'); ?> |
	<?php echo anchor('Consultation/modifierDossier/'.$header->numerodossier,'Modifier le dossier'); ?> |
	<?php echo anchor('Ordonnance/editerOrdonnance/'.$header->numerodossier,'Editer une ordonnance'); ?>

</div>

<div id="plainContent">
	<div class="breadcrumb">
	<span class="design"> <?php echo TITLE_NEW_CONSULT.' - DOSSIER N° '.$header->numerodossier; ?></span>
	<hr/>
	<br/>

	</div>
</div>

<div class="consult">

<strong>	
	<p> <?php /* Match civilite, solution temporaire */ 
		if ( $header->idCivilite == 1 ) echo 'M. '; else if ( $header->idCivilite == 2 ) echo 'Mme. '; else if ( $header->idCivilite == 3 ) echo 'Mlle. ';
		    echo ucwords($header->prenom).' '.mb_strtoupper($header->nom);
		   ?> 
	</p>
</strong>
	<p> né(e) le <?php echo $header->datenaissance; ?> </p>
	<br/>
	<h3 class="sub-title"> - ANTECEDENTS MEDICAUX - </h3>
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
				<td><strong><?php echo $value->dateconsultation; ?> </strong></td>
				<td><?php echo $value->symptomes; ?> </td>
				<td><?php echo $value->observations; ?> </td>
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