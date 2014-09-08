<?php 

/* Contient des fonctions custom utiles pour php*/

// Text enhancing
function AppliquerStyle($texteastyler)
{
	// echo $texteastyler;
	/* Application du Style */
	$texteastyler = stripslashes(nl2br($texteastyler));
	//$texteastyler = preg_replace("#\[content\]#i", "<p>", $texteastyler); /* content */
	//$texteastyler = preg_replace("#\[/content\]#i", "</p>", $texteastyler); /* content */
	$texteastyler = preg_replace("#\[title\](.+?)\[/title\]#i", "<h2>$1</h2>", $texteastyler); /* Title */

	/* Style basique */
	$texteastyler = preg_replace("#\[b\](.+?)\[/b\]#i", "<strong>$1</strong>", $texteastyler); /* Bold */
	$texteastyler = preg_replace("#\[i\](.+?)\[/i\]#i", "<em>$1</em>", $texteastyler); /* Italic  */
	$texteastyler = preg_replace("#\[u\](.+?)\[/u\]#i", "<u>$1</u>", $texteastyler); /* Underlining */

	$texteastyler = preg_replace("#\[tpetit\](.+?)\[/tpetit\]#i", "<span class=\"tpetit\">$1</span>", $texteastyler); /* Remplacement des balises POLICE TRÈS PETIT */
	$texteastyler = preg_replace("#\[petit\](.+?)\[/petit\]#i", "<span class=\"petit\">$1</span>", $texteastyler); /* Remplacement des balises POLICE PETIT */
	$texteastyler = preg_replace("#\[grand\](.+?)\[/grand\]#i", "<span class=\"grand\">$1</span>", $texteastyler); /* Remplacement des balises POLICE GRAND */
	$texteastyler = preg_replace("#\[tgrand\](.+?)\[/tgrand\]#i", "<span class=\"tgrand\">$1</span>", $texteastyler); /* Remplacement des balises POLICE TRÈS GRAND */

	/* Balises d'inclusion d'éléments divers */		
	$texteastyler = preg_replace("#\[img\](.+?)\[/img\]#i", "<img src=\"$1\" class=\"sizedimg\" />", $texteastyler);		/* Remplacement des balises IMAGE */
	$texteastyler = preg_replace("#\[miniature\](.+?)\[/miniature\]#i","", $texteastyler);/* Remplacement des balises MINIATURE */

	$texteastyler = str_replace("[link={","<a href=\"",$texteastyler);				/* ouverture de lien */
	$texteastyler = str_replace("} text={","\">",$texteastyler);					/* intermédiaire de lien */
	$texteastyler = str_replace("} /link]","</a>",$texteastyler);					/* fermeture de lien */

	/*--------------------------------------------------------------------------------------------------------------------*/
	
	return $texteastyler; 
}

function extractMetaData($rawText)
{
//	echo $rawText, "<br />";
	foreach($rawText as $item)
	{       
	//	echo "dawa : ", $item,"<br />";
		$item = stripslashes(nl2br($item));
	//	echo "Rawtext ", $item, "<br />";
		// Extract title
		//preg_match("#\[title\](.+?)\[/title\]#i", $item, $title);
		$tmp = preg_replace("#\[title\](.+?)\[/title\]#i", "$1", $item);
		if( strcmp($item, $tmp) !== 0 )
		{
			$title = $tmp;
		//	echo $title,"<br />";//Item : ", $item,"<br />", strcmp($item, $title), "<br /><hr />";
		}
		// Extract subtitle
		//preg_match("#\[subtitle\](.+?)\[/subtitle\]#i", $item, $subtitle);
		$tmp = preg_replace("#\[subtitle\](.+?)\[/subtitle\]#i", "$1", $item);
		//echo "subtitle : ",$subtitle, "<br />";
		if( strcmp($item, $tmp) !== 0 )
		{
			$subtitle = $tmp;
		//	echo $subtitle,"<br />"; //Item : ", $item,"<br />", strcmp($item, $subtitle), "<br /><hr />";
		}

		// Extract menu : 
		//preg_match("#\[menu\](.+?)\[/menu\]#i", $item, $menu);
		//preg_match("#\[menu\](.+?)\[/menu\]#s", $item, $menu);
//		preg_match("#\[menu\](.+?)#", $item, $menu);
		$tmp = preg_replace("#\[menu\](.+?)\[/menu\]#i", "$1", $item);
		//echo "menu : ",$menu, "<br />";
		if( strcmp($item, $tmp) !== 0 )
		{
			$menu = $tmp;
		//	echo $menu,"<br />"; //Item : ", $item,"<br />", strcmp($item, $menu), "<br /><hr />";
		}

		// Extract bottom : 
		//preg_match("#\[bottom\](.+?)\[/bottom\]#i", $item, $bottom);
		$tmp = preg_replace("#\[bottom\](.+?)\[/bottom\]#i", "$1", $item);
		//echo "bottom : ",$bottom, "<br />";
		if( strcmp($item, $tmp) !== 0 )
		{
			$bottom = $tmp;
		//	echo $bottom,"<br />"; //Item : ", $item,"<br />", strcmp($item, $bottom), "<br /><hr />";
		}
	}
	return array($title, $subtitle, $menu, $bottom); 
}

function extractMenu($rawText)
{
	echo "dawa 0 : ", $rawText, "<br />";
	//$menuitems = preg_replace("#\[item\](.+?)\[/item\]#i", "/$1/", $rawText);
	preg_match_all("#\[item\](.+?)\[/item\]#i", $rawText, $menuitems);
	//echo $menuitems, count($menuitems);
	//$sepmenu = explode('/',$menuitems);
	//foreach($sepmenu as $item)
	foreach($menuitems as $item)
	{
		//if( strlen($item) > 2)
		//{
			echo "== ",$item," == (",strlen($item),")<br />";
		//}
	}
/*	foreach($rawText as $item)
	{       
		echo "dawa : ", $item,"<br />";
		$item = stripslashes(nl2br($item));
		// Extract menu item
		preg_match("#\[title\](.+?)\[/title\]#i", $item, $line);
		//$tmp = preg_replace("#\[title\](.+?)\[/title\]#i", "$1", $item);
	}*/
}

?>
