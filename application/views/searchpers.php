<div id="sub-menu">
	<?php echo anchor('Gestionpers/acceuil','Rechercher'); ?> |
	<?php echo anchor('Gestionpers/annuaire','Afficher l\'annuaire complète'); ?>
</div>

<div id="plainContent">
	<div class="breadcrumb">
	<p> <span class="design"> <?php echo TITLE_USER_FOUND; ?> </span> </p>
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
			<tr>
				<td><?php echo mb_strtoupper($nom); ?>       </td>
				<td><?php echo ucwords($prenom); ?>    </td>
				<td><?php echo $telephone; ?>     </td>
				<td><?php echo $email; ?> </td>
				<td><?php echo $adresse; ?>   </td>
			</tr>
		</tbody>
	</table>
</div>

<?php echo css_url('login'); 
	  echo css_url('table'); ?> 

<?php // Chargement des fichiers JS

	 //echo js_url('jquery-2.min'); 
  ?>