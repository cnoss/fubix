<?php 

	$partnermeta = c::get("partner-meta");
	$partnermeta["opening-times"] = ($site->find("uebergreifende-informationen")) ? kirbytext($site->find("uebergreifende-informationen")->openingtimes()) : "";
	c::set("partner-meta", $partnermeta);
	$GLOBALS["partnermeta"] = $partnermeta;
	
	if(preg_match("=(1|true|TRUE)=",$page->hide_in_lang())){  go("/" + $site->language()->code()); }
	
	//include 'assets/php/functions-lumm.php';
	$subhead = ($page->subhead()->code($site->defaultLanguage()) == "hide") ? false : true;

	snippet('header', array("subhead"=>$subhead, "subheadline" => true, "content" => $page)); 
?>

<?php 

	snippet( c::get('customs-folder') . 'sidebar-desktop'); ?>

<!-- Content Block -->
<?php 

	atomicdesign::output("organism","container--rows"); ?>


<!-- EO-Content Block -->
<?php snippet( c::get('customs-folder') . 'sidebar') ?>
<?php snippet( c::get('customs-folder') . 'footer'); ?>
