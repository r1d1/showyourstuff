<?php
/* Session start, character encoding forcing */
session_start();
header('Content-type: text/html; charset=utf-8');

// getting file processing functions : 
require("fonctions.php");

// Get the requested page if it exists, else go on index
if (!isset($_GET["page"]) ){ $pagereq = "index"; }
else
{
//	echo $_GET["page"].'<br />';
	if( preg_match('#[a-zA-Z]{4,}[0-9]*#i', $_GET["page"]) ){ $pagereq = htmlentities($_GET["page"]); }
	else{ $pagereq = "index"; echo "Invalid page"; }
}

// generate menu structure :
//$configuration=file('config.txt');
$dynamicmenu=file('config.txt');
$pagecontent=file('content/'.$pagereq.'.txt');

if ($pagecontent == false){ $pagecontent=file('content/index.txt'); }

$data = extractMetaData($dynamicmenu); // return title, subtitle, menu and bottom
$title = $data[0];
$subtitle = $data[1];
$menu = extractMenu($data[2]); // process menu items
$bottom = $data[3];

$content=extractContent($pagecontent); // extract page specific content
$pagetitle = $content[0];
$pagemain = $content[1];
$pagesupp = $content[2];

//echo "MEtadata : ".$title." ".$pagereq;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >

<head>
	<!--title><?php echo $title.' - '. $pagereq; ?></title-->
	<title><?php echo $title.' - '. $pagetitle; ?></title>
	<meta name="keyworks" content="none" />
	<meta name="author" content="R1D1" />
	<meta http-equiv=Content-Type content="text/html; charset=UTF-8">
	<!--meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /-->

	<link rel="stylesheet" media="screen" type="text/css" title="SYScss" href="syscss.css" />
	<link rel="stylesheet" type="text/css" href="phpBibLib/bibtex.css" />

</head>

<body>
<!-- beginning of uberElement-->
<div class="uberElement">

<?php
	/* on rajoute les élements annexes */
	include('haut.php');
	include('menu.php');
?>
