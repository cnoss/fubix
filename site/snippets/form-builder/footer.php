<?php
	
	$data = $site->find("_shared/datenschutz/datenschutzerklaerungen");

	/* Zusätzliche Textspalten */
	$additional_columns = yaml($data->columns());
	$additional_columns = reset($additional_columns);

?>

<div class="form-group padding-top-2">
	<div class="col-sm-8 col-sm-offset-2 text">
		<p><?php echo l::get("pflichtfelder"); ?></p>
	</div>
</div>

<div class="form-group padding-top-2">

	<div class="col-sm-8 text">
		<h3><a class="detail-button-klein" data-toggle="collapse" data-parent="#accordion" href="#disclaimer-contact"><?php echo l::get('datenschutzrechtliche_einwilligung');?><span class="caret"></span> </a></h3>
		<div id="disclaimer-contact" class="panel-collapse collapse ">
			<?php echo kirbytext($data->text()); ?>
		</div>
		<div class="radio">
			<label><input name="disclaimer-ok" value="1" checked="" type="radio"><?php echo $additional_columns["text2"]; ?></label>
		</div>
		<div class="radio">
			<label><input name="disclaimer-ok" value="0" type="radio"><?php echo $additional_columns["text3"]; ?></label>
		</div>
		<div class="hidden">
			<label for="honeypot">Humans should leave this empty.</label>
			<input name="creation_time" value="" type="hidden"> <input name="honeypot" type="text">
		</div>
	</div>
</div>



<div class="form-group padding-top-2">
	<div class="col-sm-8">
		<button type="reset" name="clear" class="btn btn-primary"><?php echo l::get('eingabe_verwerfen');?></button> <button type="submit" name="submit" class="btn btn-primary"><?php echo l::get('abschicken');?></button>
	</div>
</div>

