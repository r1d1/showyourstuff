<div class="menu">
	<p>
		<ul>
		<?php 
			foreach($menu as $line)
			{
				$menuline = explode(',', $line);
				echo '<li><a href="index.php?page=',$menuline[0],'">',$menuline[1],'</a></li>';
			}
		?>
		</ul>
	</p>
</div>



















