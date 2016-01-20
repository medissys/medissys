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
<p class="pForm"> <?php echo $this->pagination->create_links(); ?> <p>
<div class="table">
	<table> 
		<thead>
			<tr>
				<th>STATUT</th>
				<th>N° DOSSIER</th>
				<th>NOM</th>
				<th>PRENOM</th>
				<th>DATE</th>
				<th>HEURE</th>	
			</tr>
		</thead>
		<tbody> 
		<?php foreach ($row as $key => $value) {

		?>
			<tr class="linkClickable" data-number='"<?php echo $value->num_dossier; ?>"'  onclick="document.location.href='<?php echo base_url(); ?>Consultation/consulter/<?php echo $value->num_dossier; ?>'">
				<td> <?php echo $value->type; ?> </td>
				<!-- <td> <strong> <?php //echo anchor('Consultation/consulter/'.$value->num_dossier,$value->num_dossier,'class="linkTable"'); ?> </strong> </td> -->
				<td> <strong> <?php echo $value->num_dossier; ?> </strong> </td>
				<td> <?php echo mb_strtoupper($value->nom); ?> </td>
				<td> <?php echo ucwords($value->prenom);?> </td>
				<td> <?php echo date_format(date_create($value->date),"d-m-Y"); ?> </td>
				<td> <?php echo $value->heure; ?> </td>				
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