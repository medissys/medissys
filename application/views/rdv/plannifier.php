<div id="sub-menu">

	<?php echo anchor('RendezVous/nouveauRDV','Planifier RDV'); ?> |
	<?php echo anchor('RendezVous/modifierRDV','Modifier RDV'); ?>

</div>

<div id="plainContent">
	<div class="breadcrumb">
	<p> <span class="design"> <?php echo 'NOUVEAU RDV'; ?> </span> </p>
	<hr/>
	<br/>

	</div>
</div>
	
<div class="consult">
	<h3> - PATIENTS - </h3>
	<p class="pForm"> <?php echo $this->pagination->create_links(); ?><p>
	<table> 
		<thead>
			<tr>
				<th>N° DOSSIER</th>
				<th>NOM</th>
				<th>PRENOM</th>
			</tr>
		</thead>
		<tbody> 
		<?php foreach ($row as $key => $value) { ?>
			<tr>
				<td> <strong> <?php echo anchor('RendezVous/ouvrirDossier/'.$value->numerodossier,$value->numerodossier,'class="linkTable"'); ?> </strong></td>
				<td> <?php echo mb_strtoupper($value->nom); ?> </td>
				<td> <?php echo ucwords($value->prenom); ?> </td>
			</tr>
		<?php } ?>
		</tbody>
	</table>

</div>

<p class="error"> <?php echo validation_errors(); ?> </p>

<?php  echo css_url('designComponent'); 
	   echo css_url('table'); 
?> 