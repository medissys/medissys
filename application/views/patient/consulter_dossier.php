<div id="sub-menu">

	<?php echo anchor('Gestionpatient/acceuil','Rechercher'); ?> |
	<?php echo anchor('Gestionpatient/creerDossier','Creer un dossier'); ?> |
	<?php echo anchor('Gestionpatient/ModifierDossier','Modifier un dossier'); ?>

</div>

<div id="plainContent">
	<div class="breadcrumb">
	<p> <span class="design"> <?php echo TITLE_CONSULT_DIR; ?> </span> </p>
	<hr/>
	</div>
</div>

<div class="consult">

<?php //TODO représenter le dossier en tableau avec historique des consultations ?>
<p> N° Dossier: <strong> <?php echo $header->numerodossier; ?> </strong> </p>

<p> <?php /* Match civilite, solution temporaire */ 
	if ( $header->idCivilite == 1 ) echo 'M. '; else if ( $header->idCivilite == 2 ) echo 'Mme. '; else if ( $header->idCivilite == 3 ) echo 'Mlle. ';
    echo ucwords($header->prenom).' '.mb_strtoupper($header->nom);
    ?> 
</p>

<p> Telephone: <strong> <?php echo $header->telephone; ?> </strong> </p>

<p> Date de naissance: <strong> <?php echo $header->datenaissance; ?> </strong> </p>

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

</div>

<?php echo css_url('table'); ?>


<?php  echo css_url('designComponent');?>