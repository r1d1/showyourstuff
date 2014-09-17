<?php
/* Début de session */
session_start();

// getting file processing functions : 
require("fonctions.php");

// Get the requested page if it exists, else go on index
if (!isset($_GET["page"]) ){ $pagereq = "index"; }
else { $pagereq = htmlentities($_GET["page"]); }

// generate menu structure :
//$configuration=file('config.txt');
$dynamicmenu=file('config.txt');
$pagecontent=file($pagereq.'.txt');

$data = extractMetaData($dynamicmenu); // return title, subtitle, menu and bottom
$title = $data[0];
$subtitle = $data[1];
$menu = extractMenu($data[2]); // process menu items
$bottom = $data[3];

$content=extractContent($pagecontent); // extract page specific content
$pagetitle = $content[0];
$pagemain = $content[1];
$pagesupp = $content[2];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >

<head>
	<title><?php $title.' - '. $pagereq; ?></title>
	<meta name="keyworks" content="none" />
	<meta name="author" content="R1D1" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<link rel="stylesheet" media="screen" type="text/css" title="SYScss" href="syscss.css" />

	<!-- Début du script Javascript */  -->
	<script type="text/javascript" src="scripts.js"></script>
	<!-- FIN du script Javascript -->
</head>

<body>
<!-- beginning of uberElement-->
<div class="uberElement">

<?php
	/* on rajoute les élements annexes */
	include('haut.php');
	include('menu.php');
?>
