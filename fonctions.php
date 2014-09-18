<?php 

/* functions for processing file content and data extraction */

// Text enhancing
function AppliquerStyle($texteastyler)
{
	// echo $texteastyler;
	/* Application du Style */
	$texteastyler = stripslashes(nl2br($texteastyler));
	//$texteastyler = preg_replace("#\[title\](.+?)\[/title\]#i", "<h2>$1</h2>", $texteastyler); /* Title */

	/* Style basique */
	$texteastyler = preg_replace("#\[b\](.+?)\[/b\]#i", "<strong>$1</strong>", $texteastyler); /* Bold */
	$texteastyler = preg_replace("#\[i\](.+?)\[/i\]#i", "<em>$1</em>", $texteastyler); /* Italic  */
	$texteastyler = preg_replace("#\[u\](.+?)\[/u\]#i", "<u>$1</u>", $texteastyler); /* Underlining */

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
	$gluedText = implode('<br />',$rawText);

	preg_match('`\[title\](.+?)\[\/title\]`ms',$gluedText,$titleresult);
	preg_match('`\[subtitle](.+?)\[\/subtitle\]`ms',$gluedText,$subtitleresult);
	preg_match('`\[menu\](.+?)\[\/menu\]`ms',$gluedText,$menuresult);
	preg_match('`\[bottom\](.+?)\[\/bottom\]`ms',$gluedText,$bottomresult);

	return array($titleresult[1], $subtitleresult[1], $menuresult[1], $bottomresult[1]); 
}

function extractMenu($rawText)
{
	preg_match_all('`\[item\](.+?)\[/item\]`msi', $rawText, $splittedmenu);

	foreach($splittedmenu[1] as $item){ $menuline = explode(',',$item); }

	return $splittedmenu[1];
}

function extractContent($rawText)
{
//	$gluedText2 = implode('<br />',$rawText);
	$gluedText = implode('',$rawText);
//	echo "--".$gluedText."<br />";
//	echo "--".$gluedText2."<br />";

	preg_match('`\[pagetitle\](.+?)\[\/pagetitle\]`ms',$gluedText,$pagetitleresult);
	preg_match('`\[content\](.+?)\[\/content\]`ms',$gluedText,$contentresult);
	preg_match('`\[supplementary\](.+?)\[\/supplementary\]`ms',$gluedText,$pagesuppresult);

//	echo "--".$pagetitleresult[1]."--".$contentresult[1]."--".$pagesuppresult[1]."--<br />";

	return array($pagetitleresult[1],$contentresult[1],$pagesuppresult[1]);
}

?>
