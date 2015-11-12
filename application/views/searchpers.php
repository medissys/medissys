<div id="sub-menu">

	<?php echo anchor('Gestionpers/acceuil',HEADER_ANNUAIRE_FIND); ?> |
	<?php echo anchor('Gestionpers/annuaire',HEADER_ANNUAIRE_LIST); ?>
	
</div>

<div id="plainContent">
	<div class="breadcrumb">
	<p class="pForm"> <span class="design"> <?php echo TITLE_USER_FOUND; ?> </span> </p>
	<hr/>
	</div>
</div>

<div class="dashboard"> 
<div class="table">
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
</div>

<?php echo css_url('designComponent'); 
	  echo css_url('table'); ?> 

<?php // Chargement des fichiers JS

	 //echo js_url('jquery-2.min'); 
  ?>