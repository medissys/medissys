<div id="sub-menu">

	<?php echo anchor('Consultation/consulter','Nouvelle Consultation'); ?> |
	<?php echo anchor('GestionPatient/modifierDossier','Modifier Dossier'); ?> 

</div>

<div id="plainContent">
	<div class="breadcrumb">
	<p> <span class="design"> <?php echo 'CONSULTATION - DOSSIER N° '.$this->session->userdata('numerodossier'); ?></span> </p>
	<hr/>
	<br/>

	</div>
</div>

<div class="consult">

<p class="success"> <?php echo img('success_icon','png','success icon'); ?> <span> NOUVELLE CONSULTATION PRISE EN COMPTE. <span></p>

<p> <?php if ( $this->session->userdata('civilite') == 1 ) echo 'M. '; else if ( $this->session->userdata('civilite') == 2 ) echo 'Mme. '; else if ( $this->session->userdata('civilite') == 3 ) echo 'Mlle. ';
	    echo ucwords($this->session->userdata('prenom')).' '.mb_strtoupper($this->session->userdata('nom'));
	    ?> 
	</p>
	<p> né(e) le <?php echo $this->session->userdata('datenaissance'); ?> </p>
	<br/>
	<p> <h3> ANTECEDENTS MEDICAUX </h3> </p>
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
		<?php $i=0; ?>
		<?php foreach ($row as $key => $value) {?>
			<tr>
				<td><?php echo ++$i; ?></td>
				<td><?php echo $value->datecreation; ?> </td>
				<td><?php echo $value->symptome; ?> </td>
				<td><?php echo $value->observation; ?> </td>
				<td><?php echo $value->commentaires; ?> </td>
			</tr>
		<?php } ?>
		</tbody>
	</table>


</div>

<?php  
	
	echo css_url('table');
	echo css_url('designComponent');
	
 ?>




