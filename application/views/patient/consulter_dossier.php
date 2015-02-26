<div id="sub-menu">

	<?php echo anchor('Gestionpatient/acceuil','Rechercher'); ?> |
	<?php echo anchor('Gestionpatient/creerDossier','Creer un dossier'); ?> |
	<?php echo anchor('Gestionpatient/modifierDossierIndex/'.$header->numerodossier,'Modifier un dossier'); ?> |
	<?php echo anchor('Consultation/consulterDossier/'.$header->numerodossier,'Consultation'); ?>

</div>

<div id="plainContent">
	<div class="breadcrumb">
	 <span class="design"> <?php echo TITLE_CONSULT_DIR; ?> </span>
	<hr/>
	</div>
</div>

<div class="consult">

<br/>

<p> N° Dossier: <strong> <?php echo $header->numerodossier; ?> </strong> </p>

<p> <?php /* Match civilite, solution temporaire */ 
	if ( $header->idCivilite == 1 ) echo 'M. '; else if ( $header->idCivilite == 2 ) echo 'Mme. '; else if ( $header->idCivilite == 3 ) echo 'Mlle. ';
    echo ucwords($header->prenom).' '.mb_strtoupper($header->nom);
    ?> 
</p>

<p> Telephone: <strong> <?php echo $header->telephone; ?> </strong> </p>

<p> Date de naissance: <strong> <?php echo $header->datenaissance; ?> </strong> </p>

<br />

<h3 class="sub-title"> - HISTORIQUE DES CONSULTATIONS - </h3>

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
				<td><?php echo $value->dateconsultation; ?> </td>
				<td><?php echo $value->symptomes; ?> </td>
				<td><?php echo $value->observations; ?> </td>
				<td><?php echo $value->commentaires; ?> </td>
			</tr>
			<?php } ?>
	</tbody>
</table>

</div>

<?php echo css_url('table'); ?>


<?php  echo css_url('designComponent');?>