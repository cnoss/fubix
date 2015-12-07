<!-- Molecule: video -->
<?php
	
	$video = $content->video();
	if(!preg_match("=http=", $video)){
		$video = "(vimeoResponsive: http://vimeo.com/".$video.")";
	}
	
?>
			
<div class="col-md-12 bild">
<?php echo kirbytext($video);?>
</div>

