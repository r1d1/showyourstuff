<?php
	include('debut.php');
?>

	<div class="corpscolumn"><?php echo AppliquerStyle($pagesupp); ?></div>
	<div class="corps">	
		<h3><?php echo AppliquerStyle($pagetitle); ?></h3>
		<p>
		<?php
		echo AppliquerStyle(processPublications(processCitations($pagemain)));
		?>
		</p>
	</div>
	

<?php
	include('finpage.php');
?>
