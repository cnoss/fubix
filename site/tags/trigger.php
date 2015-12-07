<?php


kirbytext::$tags['trigger'] = array(
	'attr' => array(
    	'class', 'img'
	),
	'html' => function($tag) {
		$text 	= $tag->attr('trigger');
		$class 	= $tag->attr('class', '');
		$img 	= $tag->attr('img', false);
		
		 
		$html = "<div class=\"link ".$class."\" data-toggle=\"collapse\" data-target=\"#content-innenausstattung\">";
		$html .= "<img class=\"scale\" src=\"/assets/php/timthumb/images.php?src=".kirby()->urls()->content()."/".$img."&w=600&q=80\">";
		$html .= "$text";
		$html .= "</div>";

		return $html;
	}
);


?>