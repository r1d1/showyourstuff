<?php
	include('debut.php');
?>

<!--div class="uberElement"-->
	<div class="corpscolumn">toto</div>
	<div class="corps">	
		<?php
			//echo $pagereq;
			$pageContent = file($pagereq.'.txt');
			/*$data = extractMetaData($dynamicmenu); // return title, subtitle, menu and bottom
			//echo count($dynamicmenu), "<br />";
			foreach($data as $item)
			{
				echo "item : ", $item,"<br />";
			}*/
			
			//foreach($data as $item)
			//{
			//	echo "item : ", $item,"<br />";
			//}
			foreach($pageContent as $line)
			{
				echo AppliquerStyle($line);
			}
			//$texteastyler = preg_replace("#\[content\]#i", "<p>", $texteastyler); /* content */
			//$texteastyler = preg_replace("#\[/content\]#i", "</p>", $texteastyler); /* content 
		
		?>
	</div>
	

<?php
	include('finpage.php');
?>

</body>
</html>