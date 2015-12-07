<!-- Molecule: section-heading -->
<?php 
if(!isset($class)){ $class = ""; }
if($headline != ""){
	atomicdesign::output("atom","subheadline", array("text" => $headline, "class" => $class));
}
?>
