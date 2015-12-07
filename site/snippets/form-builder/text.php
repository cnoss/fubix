<?php if(isset($preview)): ?>

<div class="form-builder-wrap">

	<fieldset class="form-builder-preview">
		<p><?=$data->explanation_text();?></p>
	</fieldset>
	
	<dl class="form-builder-info">
		<dt>Name:</dt><dd><?=$data->name();?></dd>
		<dt>Label:</dt><dd><?=$data->textlabel();?></dd>
		<dt>required:</dt><dd><?=$data->required();?></dd>
	</dl>

</div>

<?php else: ?>

<div class="form-group">
	
	<p class="col-md-8"><?php echo $formfield->explanation_text(); ?></p>
	
</div>



<?php endif; ?>