<!-- Molecule: video-yt -->
<?php
	
	$video = $content->video();
	if(!preg_match("=http=", $video)){
		$video = "(youtubeResponsive:https://www.youtube.com/embed/".$video.")";
	}
	
?>
			
<div class="col-md-12 bild">
<?php echo kirbytext($video);?>
</div>

