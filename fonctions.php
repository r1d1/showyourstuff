<?php 

/* functions for processing file content and data extraction */

// Text enhancing
function AppliquerStyle($rawText)
{
//	echo $rawText;
	/* Application du Style */
	//$rawText = stripslashes(nl2br($rawText));
	
	// Check here for Line break issue !
	
	$rawText = preg_replace('~\s*<br ?/?>\s*~',"<br />",$rawText); 
	$rawText = nl2br($rawText);

//	echo $rawText;

	// ===== Publication handling =====
	// Full bibliography
	$rawText = preg_replace("#\[publicationList\](.+?)\[/publicationList\]#i", "", $rawText); /* Underlining */
	// In text citations
	$rawText = preg_replace("#\[startCitations file={(.+?)}]#i", "", $rawText); /* Citations */
//	$rawText = preg_replace("#\[stopCitations]#i", "tata", $rawText); /* Citations */
//	$rawText = preg_replace("#\[cite\](.+?)\[/cite\]#i", "$1", $rawText); /* Citations */


	/* Style basique */
	$rawText = preg_replace("#\[b\](.+?)\[/b\]#msi", "<strong>$1</strong>", $rawText); /* Bold */
	$rawText = preg_replace("#\[i\](.+?)\[/i\]#msi", "<em>$1</em>", $rawText); /* Italic  */
	$rawText = preg_replace("#\[u\](.+?)\[/u\]#msi", "<u>$1</u>", $rawText); /* Underlining */

	// Implement lists !

	/* Balises d'inclusion d'éléments divers */		
	$rawText = preg_replace("#\[img\](.+?)\[/img\]#i", "<img src=\"$1\" class=\"sizedimg\" />", $rawText);		/* Remplacement des balises IMAGE */
	$rawText = preg_replace("#\[miniature\](.+?)\[/miniature\]#i","", $rawText);/* Remplacement des balises MINIATURE */

	$rawText = str_replace("[link={","<a href=\"",$rawText);				/* ouverture de lien */
	$rawText = str_replace("} text={","\">",$rawText);					/* intermédiaire de lien */
	$rawText = str_replace("} /link]","</a>",$rawText);					/* fermeture de lien */
	$rawText = str_replace("[line]","<hr />",$rawText);

	/*--------------------------------------------------------------------------------------------------------------------*/
	
	return $rawText; 
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

function processPublications($rawText)
{
	// Load Lib :
	require_once('./phpBibLib/lib/lib_bibtex.inc.php');

	// Get pub file :
	if( preg_match('`\[publicationList\](.+?)\[\/publicationList\]`ms',$rawText, $publist) )
	{
		$bibfile = $publist[1];

		// Create bib object :
		$bib = new Bibtex($bibfile);

		// Set Order and Style :
		$bib->SetBibliographyStyle('natbib');
		$bib->SetBibliographyOrder('year');

		$bib->SelectAll();
		$bib->PrintBibliography();
	}

	//echo $rawText;

	return $rawText;
}

function processCitations($rawText)
{
	// Load Lib :
	require_once('./phpBibLib/lib/lib_bibtex.inc.php');

	// Get pub file :
	preg_match('`\[startCitations file={(.+?)}\]`ms',$rawText, $reffile);
	$bibfile = $reffile[1];
	//echo 'Used file = '.$bibfile.'<br />';

	// Create bib object :
	$bib = new Bibtex($bibfile);

	// Set Order and Style :
	$bib->SetBibliographyStyle('numeric');
	$bib->SetBibliographyOrder('usage');

	preg_match_all('`\[cite\](.+?)\[\/cite\]`ms',$rawText, $citations);

	$citationNb = 0;
	foreach($citations[1] as $elem)
	{
//		echo $elem.'<br />';
		ob_start();
		cite($bib, $elem);
		// Cheating with the lib : we get the output of the cite command to replace the [cite][/cite] with
		$output[$citationNb] = ob_get_clean();
		$citationNb++;
		//cite($bib, $elem);
//		$rawText = preg_replace('`\[cite\](.+?)\[\/cite\]`ms', cite($bib, $elem), $rawText);
	}

	for($cit = 0 ; $cit < count($output) ; $cit++)
	{
	//	echo $citations[0][$cit].' : '.$output[$cit].'<br />';
		$rawText = str_replace($citations[0][$cit], $output[$cit], $rawText);
	//	echo 'Count of rep : '. $count.'<br />';
	}

	ob_start();
	$bib->PrintBibliography();
	// Cheating with the lib : we get the output of the cite command to replace the [cite][/cite] with
	$biblioCited = ob_get_clean();
	$rawText = str_replace('[stopCitations]', $biblioCited, $rawText);

//	echo $rawText;

	return $rawText;
}

?>
