<div id="sub-menu">

	<?php echo anchor('RendezVous/nouveauRDV','Planifier RDV'); ?> |
	<?php echo anchor('RendezVous/modifierRDV','Modifier RDV'); ?>

</div>

<div id="plainContent">
	
	<div class="breadcrumb">
	<p> <span class="design"> <?php echo 'VOS RDV PLANIFIES'; ?> </span> </p>
	<hr/>
	<br/>

	</div>
</div>
<div class="table">
	<table> 
		<thead>
			<tr>
				<th>N° DOSSIER</th>
				<th>NOM</th>
				<th>PRENOM</th>
				<th>DATE</th>
				<th>HEURE</th>
				<th>STATUT</th>
			</tr>
		</thead>
		<tbody> 
		<?php foreach ($row as $key => $value) {

		?>
			<tr>
				<td> <strong> <?php echo anchor('Consultation/consulter/'.$value->num_dossier,$value->num_dossier,'class="linkTable"'); ?> </strong> </td>
				<td> <?php echo mb_strtoupper($value->nom); ?> </td>
				<td> <?php echo ucwords($value->prenom);?> </td>
				<td> <?php echo $value->date; ?> </td>
				<td> <?php echo $value->heure; ?> </td>
				<td> <?php echo $value->type; ?> </td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>
<div class="icon">
	<?php echo img('rdv_plannifie','png','agenda'); ?>
</div>
<p class="error"> <?php echo validation_errors(); ?> </p>

<?php  echo css_url('designComponent'); 
	   echo css_url('table'); 
?> 