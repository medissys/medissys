<?php   echo js_url('jquery-2.min');
	    echo js_url('jsTab');
	    echo js_url('cnx');
?>
<div id="sub-menu">

	<?php echo anchor('Gestionpatient/acceuil',HEADER_ANNUAIRE_FIND); ?> |
	<?php echo anchor('Gestionpatient/creerDossier',HEADER_CREER_DOSSIER); ?> |
	<?php echo anchor('Gestionpatient/modifierDossier',HEADER_MODIF_DOSSIER); ?> |
	<?php echo anchor('Gestionpatient/listeDossier',HEADER_LIST_DOSSIER); ?>

</div>

<div id="plainContent">
	<div class="breadcrumb">
	<p class="pForm"> <span class="design"> DOSSIER PATIENT </span> </p>
	<hr/>
	</div>
</div>

<div class="consult">

	<h3 class="sub-title"> - LISTE DES DOSSIERS - </h3>
	<p class="pForm"> <?php echo $this->pagination->create_links(); ?><p>
	<div class="table">
		<table> 
			<thead>
				<tr>
					<th>N° DOSSIER</th>
					<th>NOM</th>
					<th>PRENOM</th>
					<th>TELEPHONE</th>
					<th>EMAIL</th>
					<th>PROFESSION</th>
					<th>ADRESSE</th>
					<th>DATE DE NAISSANCE</th>
					<th>DATE DE CREATION</th>
				</tr>
			</thead>
			
			<tbody> 
			<?php foreach ($row as $value) {
			?>
				<tr>
					<td> <strong> <?php echo anchor('Gestionpatient/listeDossier',$value->numerodossier,array('class'=> 'linkTable show-content','attr'=>$value->numerodossier)); ?> </strong> </td>
					<td> <?php echo mb_strtoupper($value->nom); ?> </td>
					<td> <?php echo ucwords($value->prenom);?> </td>
					<td> <?php echo $value->telephone;?> </td>
					<td> <?php echo $value->email;?> </td>
					<td> <?php echo $value->profession; ?> </td>
					<td> <?php echo $value->adresse; ?> </td>
					<td> <?php echo $value->datenaissance; ?> </td>
					<td> <?php echo $value->datecreation; ?> </td>
				</tr>
			<?php } ?>

			</tbody>
		</table>
	</div>
</div>
<div class="icon icon_edit">
	<?php echo img('logo_liste','png','liste dossier'); ?>
</div>

<!--div class="hide-content">
		
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
				//$i = 0;
				//foreach ($board as $key => $value) { 
			?>

				<tr>
					<td><?php //echo ++$i; ?></td>
					<td><?php //echo $value->dateconsultation; ?> </td>
					<td><?php //echo $value->symptomes; ?> </td>
					<td><?php //echo $value->observations; ?> </td>
					<td><?php //echo $value->commentaires; ?> </td>
				</tr>
				<?php //} ?>
		</tbody>
	</table>
</div-->


<?php 
	  echo css_url('designComponent'); 
	  echo css_url('table');
?> 