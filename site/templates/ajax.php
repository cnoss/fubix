<?php 

// File with global functions
include 'assets/php/functions.php'; 
//include 'assets/php/functions-lumm.php'; 


$find = get('path')."/".get('id');
$find = preg_replace("=ajax/=", "", $find);

$container = $pages->find( $find );
$template = get('template');
$idx = get('idx');

/*echo $find . "<hr>";
echo $template . "<hr>";
echo $container->title(); 
*/

// if no article could be found for that id…
if(!$container) die('Invalid article ID');

// Zusaetzliche Klassen
$classes = get_additional_classes( $container, $site );
		
// Bilder holen
$bilder = get_images_from_article( $container );

// Dokumente holen
$docs = structhelper::get_documents_from_article( $container );	

// Snip holen
$template = atomicdesign::get_snip( $container->uid(), "default"); 			
$template = atomicdesign::get_snip( $container->intendedTemplate(), $template);


snippet($template, array(
	'content' 			=> $container, 
	'snippet' 			=> $template,
	'class' 			=> $container->layout(),
	'bilder' 			=> $bilder,
	'docs'				=> $docs,
	'behavior_classes' 	=> $classes["behavior_classes"],
	'heading'			=> false
)); 
