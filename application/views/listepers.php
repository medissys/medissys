<div id="sub-menu">

	<?php echo anchor('Gestionpers/acceuil','Rechercher'); ?> |
	<?php echo anchor('Gestionpers/annuaire','Afficher l\'annuaire complète'); ?>
	
</div>

<div id="plainContent">
	<div class="breadcrumb">
	<p> <span class="design"> <?php echo TITLE_LIST_CONTACT; ?></span> </p>
	<hr/>
	</div>
</div>

<div class="dashboard"> 
	<table> 
		<thead>
			<tr>
				<th>NOM</th>
				<th>PRENOM</th>
				<th>TELEPHONE</th>
				<th> ADRESSE MAIL</th>
				<th>ADRESSE</th>
			</tr>
		</thead>
		<tbody>

			<?php 	foreach ($row as $line => $value) { ?>
			<tr>
				<td><?php echo mb_strtoupper($value['nom']); ?> </td>
				<td><?php echo ucwords($value['prenom']); ?> </td>
				<td><?php echo $value['telephone']; ?> </td>
				<td><?php echo $value['email']; ?> </td>
				<td><?php echo $value['adresse']; ?> </td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<div class="error"> <?php echo $this->session->flashdata('recherche_users_ko'); ?> </div>

<?php //echo css_url('login'); 
	  echo css_url('designComponent');
	  echo css_url('table'); ?> 

<?php // Chargement des fichiers JS

	 echo js_url('jquery-2.min'); 
  ?>