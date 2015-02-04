<div id="plainContent">
	<div class="breadcrumb">
	<p> <span class="design"> ACCEUIL </span> ::: medical software administration. Nous sommes le <?php echo strftime("%d %B %Y"); //date("d/m/Y").', '.date("H:i"); ?> </p>
	<?php //TODO: Convertir date en Français ?>
	<hr/>
	</div>
</div>

<div class="dashboard">
	<p class="board"> DASHBOARD </p>
	<table> 
	<thead>
	<tr>
		<th>N° DOSSIER</th>
		<th>NOM</th>
		<th>PRENOM</th>
		<th>DATE RDV</th>
		<th>MEDECIN TRAITANT</th>
		<th>STATUT</th>
	</tr>
	</thead>
	<tbody>
	<?php //TODO: Récupérer les informations en base ?>
	<tr>
		<td> </td>
		<td> </td>
		<td> </td>
		<td> </td>
		<td> </td>
		<td> </td>
	</tr>
	</tbody>
	</table>
	</div>
</div>
<?php echo css_url('table'); ?>