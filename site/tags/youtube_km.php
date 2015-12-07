<?php

kirbytext::$tags['youtubeResponsive'] = array(
	'html' => function($tag) {
		$url   = $tag->attr("youtubeResponsive");
		$class = $tag->attr("class");
	
		// get the uid from the url
		//@preg_match('!vimeo.com\/([a-z0-9_-]+)!i', $url, $array);
		//$id = a::get($array, 1);
		
		//if(empty($id)){ $id = $url; }
		
		// no id no result!    
		//if(empty($id)) return false;    
	
		// build the embed url for the iframe    
		//$url = '//player.vimeo.com/video/' . $id;
	
		// default width and height if no custom values are set
		if(empty($params['width']))  $params['width']  = c::get('kirbytext.video.width');
		if(empty($params['height'])) $params['height'] = c::get('kirbytext.video.height');
	
		// add a classname to the iframe
		if(!empty($class)) $class = ' class="' . $class . '"';
	
		return '<div class="video-container"><iframe' . $class . ' src="' . $url . '?showinfo=0" width="' . $params['width'] . '" height="' . $params['height'] . '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';

	}
);
