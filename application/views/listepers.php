<div id="sub-menu">

	<?php echo anchor('Gestionpers/acceuil',HEADER_ANNUAIRE_FIND); ?> |
	<?php echo anchor('Gestionpers/annuaire',HEADER_ANNUAIRE_LIST); ?>
	
</div>

<div id="plainContent">
	<div class="breadcrumb">
	<p class="pForm"> <span class="design"> <?php echo TITLE_LIST_CONTACT; ?></span> </p>
	<hr/>
	</div>
</div>

<div class="dashboard"> 
	<table> 
		<thead>
			<tr>
				<th>NOM</th>
				<th>PRENOM</th>
				<th>LOGIN</th>
				<th>TELEPHONE</th>
				<th> ADRESSE MAIL</th>
				<th>ADRESSE</th>
			</tr>
		</thead>
		<tbody>

			<?php 	foreach ($row as $line => $value) { ?>
			<tr>
				<td><strong><?php echo mb_strtoupper($value['nom']); ?></strong> </td>
				<td><strong><?php echo ucwords($value['prenom']); ?> </strong></td>
				<td><?php echo $value['login']; ?> </td>
				<td><?php echo $value['telephone']; ?> </td>
				<td><?php echo $value['email']; ?> </td>
				<td><?php echo mb_strtoupper($value['adresse']); ?> </td>
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