<?php if(isset($preview)): ?>
<div class="form-builder-wrap">

	<fieldset class="form-builder-preview">
		<strong class="required_<?=$data->required();?>"><?=$data->textlabel();?></strong>&nbsp;
		
		<div>
			<input type="radio" disabled="disabled" checked="checked" name="<?=$data->name();?>" value="<?=$data->option1();?>" required="<?=$data->required();?>">
			<label for="<?=$data->name();?>"><?=$data->option1();?></label>
		</div>
		
		<div>
			<input type="radio" disabled="disabled" name="<?=$data->name();?>" value="<?=$data->option2();?>" required="<?=$data->required();?>">
			<label for="<?=$data->name();?>"><?=$data->option2();?></label>
		</div>
		
		<?php if($data->option3() != ""):?>
		<div>
			<input type="radio" disabled="disabled" name="<?=$data->name();?>" value="<?=$data->option3();?>" required="<?=$data->required();?>">
			<label for="<?=$data->name();?>"><?=$data->option3();?></label>
		</div>
		
		<?php elseif($data->option4() != ""):?>
		<div>
			<input type="radio" disabled="disabled" name="<?=$data->name();?>" value="<?=$data->option4();?>" required="<?=$data->required();?>">
			<label for="<?=$data->name();?>"><?=$data->option4();?></label>
		</div>
		
		<?php elseif($data->option5() != ""):?>
		<div>
			<input type="radio" disabled="disabled" name="<?=$data->name();?>" value="<?=$data->option5();?>" required="<?=$data->required();?>">
			<label for="<?=$data->name();?>"><?=$data->option5();?></label>
		</div>
		
		<?php elseif($data->option6() != ""):?>
		<div>
			<input type="radio" disabled="disabled" name="<?=$data->name();?>" value="<?=$data->option6();?>" required="<?=$data->required();?>">
			<label for="<?=$data->name();?>"><?=$data->option6();?></label>
		</div>
		
		<?php elseif($data->option7() != ""):?>
		<div>
			<input type="radio" disabled="disabled" name="<?=$data->name();?>" value="<?=$data->option7();?>" required="<?=$data->required();?>">
			<label for="<?=$data->name();?>"><?=$data->option7();?></label>
		</div>
		<?php endif; ?>
	</fieldset>
	
	<dl class="form-builder-info">
		<dt>Name:</dt><dd><?=$data->name();?></dd>
		<dt>Label:</dt><dd><?=$data->textlabel();?></dd>
		<dt>required:</dt><dd><?=$data->required();?></dd>
		<dt>Display Stacked:</dt><dd><?=$data->display_stacked();?></dd>
	</dl>
</div>

<?php else: ?>

<?php
	$isRequired = ($formfield->required() == "1") ? "required" : "";
	$layout = ($formfield->display_stacked() == "1") ? "-stacked" : "-inline";
?>

<div class="form-group">
	<label class="<?=$classes["label"];?> control-label required_<?= $isRequired ?>" for="<?=$formfield->name(); ?>"><?=$formfield->textlabel(); ?></label>

	<div class="<?=$classes["data"];?>">
		<label class="radio<?=$layout;?>"><input name="<?=$formfield->name(); ?>" value="<?php echo htmlentities($formfield->option1()); ?>" type="radio" checked="checked"><span><?=$formfield->option1(); ?></span></label><!--
 --><label class="radio<?=$layout;?>"><input name="<?=$formfield->name(); ?>" value="<?php echo htmlentities($formfield->option2()); ?>" type="radio"><span><?=$formfield->option2(); ?></span></label><!--
	--><?php if($formfield->option3() != ""): ?><label class="radio<?=$layout;?>"><input name="<?=$formfield->name(); ?>" value="<?php echo htmlentities($formfield->option3()); ?>" type="radio"><span><?=html($formfield->option3()); ?></span></label><?php endif; ?><!--
	--><?php if($formfield->option4() != ""): ?><label class="radio<?=$layout;?>"><input name="<?=$formfield->name(); ?>" value="<?php echo htmlentities($formfield->option4()); ?>" type="radio"><span><?=html($formfield->option4()); ?></span></label><?php endif; ?><!--
	--><?php if($formfield->option5() != ""): ?><label class="radio<?=$layout;?>"><input name="<?=$formfield->name(); ?>" value="<?php echo htmlentities($formfield->option5()); ?>" type="radio"><span><?=html($formfield->option5()); ?></span></label><?php endif; ?><!--
	--><?php if($formfield->option6() != ""): ?><label class="radio<?=$layout;?>"><input name="<?=$formfield->name(); ?>" value="<?php echo htmlentities($formfield->option6()); ?>" type="radio"><span><?=html($formfield->option6()); ?></span></label><?php endif; ?><!--
	--><?php if($formfield->option7() != ""): ?><label class="radio<?=$layout;?>"><input name="<?=$formfield->name(); ?>" value="<?php echo htmlentities($formfield->option7()); ?>" type="radio"><span><?=html($formfield->option7()); ?></span></label><?php endif; ?>

	</div>
</div>

<?php endif; ?>