<div class="menu">
	<!--h3>Menu</h3-->
	<p>
		<ul>
		<?php 
			echo $menu, "<br />";
			extractMenu($menu);
			foreach($menu as $line)
			{
				echo $line;
				//extractMenu($line);
			}
		/*foreach($dynamicmenu as $line) 
		{
			echo $line,'<br />';
			$sepline = explode(',', $line);
			//echo $sepline,'<br />';
			echo '<li><a href="index.php?page=',$sepline[0],'">',$sepline[1],'</a></li>';
		}*/
		?>
		</ul>
	</p>
</div>



















