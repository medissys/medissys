<div id="sub-menu">

	<?php echo anchor('RendezVous/nouveauRDV','Planifier RDV'); ?> 

</div>

<div id="plainContent">
	<div class="breadcrumb">
	<p> <span class="design"> <?php echo 'VOS RDV PLANIFIES'; ?> </span> </p>
	<hr/>
	<br/>

	</div>

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
				<td> <strong> <?php echo $value->num_dossier; ?> </strong> </td>
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

<div class="consult">

</div>

<p class="error"> <?php echo validation_errors(); ?> </p>

<?php  echo css_url('designComponent'); 
	   echo css_url('table'); 
?> 