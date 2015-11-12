<div id="plainContent">
	<div class="breadcrumb">
	<p class="pForm"> <span class="design"> ACCEUIL </span> ::: medical software administration. Nous sommes le <?php echo strftime("%d %B %Y"); //date("d/m/Y").', '.date("H:i"); ?> </p>
	<?php //TODO: Convertir date en Français ?>
	<hr/>
	</div>
</div>

<div class="dashboard">
	<p class="board pForm"> DASHBOARD - MES RDV</p>
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
				<tr>
					<td> <?php echo $value->type; ?> </td>
					<!--td> <strong> <?php //echo $value->num_dossier; ?> </strong> </td-->
					<td> <strong> <?php echo anchor('Consultation/consulter/'.$value->num_dossier,$value->num_dossier,'class="linkTable"'); ?> </strong> </td>
					<td> <?php echo mb_strtoupper($value->nom); ?> </td>
					<td> <?php echo ucwords($value->prenom);?> </td>
					<td> <?php echo $value->date; ?> </td>
					<td> <?php echo $value->heure; ?> </td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>

	<div class="icon">
		<?php echo img('logo_acceuil','png','logo acceuil'); ?>
	</div>
</div>
<?php echo css_url('table'); 
	  echo css_url('designComponent');
?>