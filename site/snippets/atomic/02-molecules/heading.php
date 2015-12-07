<!-- Molecule: heading -->
<?php 

if(!isset($class)){ $class = ""; }

if(isset($heading)){
	atomicdesign::output("atom","headline", array("text" => $heading, "class" => $class));

}elseif($content->headline() == ""){
	atomicdesign::output("atom","headline", array("text" => $content->title(), "class" => $class));

}else{
	atomicdesign::output("atom","headline", array("text" => $content->headline(), "class" => $class));
}

if($content->subheadline() != ""){
	atomicdesign::output("atom","subheadline", array("text" => $content->subheadline(), "class" => $class));
}
?>
