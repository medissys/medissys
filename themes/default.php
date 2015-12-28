<!DOCTYPE html>
<html>
	<title><?php echo SOFTWARE.' '.VERSION; ?> </title>
	<head>

	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	  <?php foreach($css as $url) { echo $url; } ?>

	</head>
	<body>
		<div class="firstBar">
			<p> <strong>MEDISSYS .</strong> <?php //echo strtoupper($id); ?>

				<span class="deconnexion"> 
					<?php echo anchor('Logout/deconnect','Deconnexion'); ?>
				</span>
			</p>
		</div>
		<div class="toolBar">
			<ul class="navtool"> 
				<li> <a href="#"> <?php //echo img('imprimante','png','imprimer'); ?> </a> </li>
				<li> <a href="#"> <?php //echo img('edit_find','png','rechercher'); ?> </a> </li>
			</ul>
		</div>
		<div id="content">
			<div clas="menu"> 
				<ul class="nav">
					<li> <?php echo anchor('Dashboard/acceuil','ACCEUIL'); ?> </li>
				    <li> <?php echo anchor('GestionPers/acceuil','ANNUAIRE'); ?>  </li>
				    <li> <?php echo anchor('GestionPatient/acceuil','DOSSIERS'); ?> </li>
				    <li> <?php echo anchor('Consultation/rechercherDossier','CONSULTATION'); ?> </li>
				    <li> <?php echo anchor('RendezVous/planning','RENDEZ-VOUS'); ?> </li>
				    <li><a href="">ORDONNANCE</a></li>
				    <li><a href="">FACTURE</a></li>
				    <li><a href=""> STOCK </a></li>
				    <li><a href="">RECHERCHER</a></li>
				    <li><a href="">CONTACT</a></li>
				    <li class="lastItem"><a href="">SUPPORT / AIDE</a></li>
				</ul>
			</div>
			<div class="sub-content">
				<?php echo $output; ?>
			</div>
		</div>

	</body>

	<!--div class="footer">

		<p>© MEDISSYS TEAM. <?php //echo anchor('','contactez-nous'); ?> </p> 
		
	</div-->

	<?php foreach($js as $script) { echo $script; } ?>
	
</html>