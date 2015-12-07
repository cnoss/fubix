<!-- Molecule: slideshow -->
<?php 

// Falls es nur ein Bild gibt, zeigen wir es an
########################################
if(count($bilder["all"]) == 1):
	atomicdesign::output("atom","image", array("bild" => $bilder["all"][0], "portrait" => $bilder["portrait"][0]));	

else:
	if(!isset($class)){ $class = ""; } 
	if(!isset($template)){ $template = ""; } 
	if(!isset($type)){ $type = "all"; }
	if(!isset($kennung)){ $kennung = ""; } 		
	if(!isset($idx)){ $idx = "0"; } 
	if(!isset($autostart)){ $autostart = "false"; } 
	if(!isset($class)){ $class = ""; } 
	if(!isset($slidetexte)){ $slidetexte = false; } 

	if(!isset($content) || $content->ratio() == ""){ $ratio = "ratio-2zu1"; } else{ $ratio = $content->ratio(); }
?>
	<div id="blueimp-gallery-<?php echo $kennung; ?>" data-autostart="<?php echo $autostart ?>" data-uid="<?php echo $kennung; ?>" class="blueimp-gallery blueimp-gallery-carousel blueimp-gallery-controls <?php echo $class;?> <?php echo $ratio;?>">
	    <div class="slides"></div>
	    <!--h3 class="title"></h3-->
	    <a class="prev"></a>
	    <a class="next"></a>
	    <!--a class="close">×</a-->
	    <!--a class="play-pause"></a-->
	    <ol class="indicator"></ol>
	</div>
	
	<div id="blueimp-gallery-links-<?php echo $kennung; ?>" data-uid="<?php echo $kennung; ?>">
		<?php foreach ($bilder[$type] as $key => $bild): 
			$text = (isset($slidetexte[$key])) ? $slidetexte[$key] : "";
		?>	
			<a href="<?php echo $bild; ?>" data-caption-text="<?=$text;?>" data-portrait="<?php echo $bilder["portrait"][$key] ?>"></a>
		<?php endforeach; ?>
	</div>
	
	<?php if($slidetexte): ?>
	<div class="row">
		<div id="blueimp-gallery-caption-<?php echo $kennung; ?>" class="padding-top-1 col-lg-8"></div>
	</div>
	<?php endif; ?>
	
	<?php if($page->uid() == "ajax"): ?>
		<script type="text/javascript">
			init_blueimg("<?php echo $template;?><?php echo $article->uid();?>", "<?php echo $type; ?>", <?php echo intval($idx); ?>);
		</script>
	<?php endif; ?>
	
	
<?php endif; ?>
