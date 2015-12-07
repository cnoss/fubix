<?php if(isset($preview)): ?>
<div class="form-builder-wrap">

	<fieldset class="form-builder-preview">
		<strong class="required_<?=$data->required();?>"><?=$data->textlabel();?></strong><br>
		<select type="radio" name="<?=$data->name();?>" value="<?=$data->option1();?>" required="<?=$data->required();?>">
			<option value="<?=$data->option1();?>" selected><?=$data->option1();?></option>
			<option value="<?=$data->option2();?>" selected><?=$data->option2();?></option>
		
			<?php if($data->option3() != ""):?>
			<option value="<?=$data->option3();?>" selected><?=$data->option3();?></option>
			<?php endif; ?>
			
			<?php if($data->option4() != ""):?>
			<option value="<?=$data->option4();?>" selected><?=$data->option4();?></option>
			<?php endif; ?>
			
			<?php if($data->option5() != ""):?>
			<option value="<?=$data->option5();?>" selected><?=$data->option5();?></option>
			<?php endif; ?>
			
			<?php if($data->option6() != ""):?>
			<option value="<?=$data->option6();?>" selected><?=$data->option6();?></option>
			<?php endif; ?>
			
			<?php if($data->option7() != ""):?>
			<option value="<?=$data->option7();?>" selected><?=$data->option7();?></option>
			<?php endif; ?>
		
		</select>
	</fieldset>
	
	<dl class="form-builder-info">
		<dt>Name:</dt><dd><?=$data->name();?></dd>
		<dt>Label:</dt><dd><?=$data->textlabel();?></dd>
		<dt>required:</dt><dd><?=$data->required();?></dd>
	</dl>
</div>

<?php else: 

$isRequired = ($formfield->required() == "1") ? "required" : "";
?>

<div class="form-group">
	<label class="<?=$classes["label"];?> control-label required_<?=$formfield->required(); ?>" for="<?=$formfield->name(); ?>"><?=$formfield->textlabel(); ?></label>
	
	<div class="<?=$classes["data"];?>">
		<select class="form-control" name="<?=$formfield->name(); ?>" <?= $isRequired ?>>
			<option><?php echo htmlentities($formfield->option1()); ?></option>
			<option><?php echo htmlentities($formfield->option2()); ?></option>
			
			<?php if($formfield->option3() != ""): ?>
				<option><?php echo htmlentities($formfield->option3()); ?></option>
			<?php endif; ?>
			
			<?php if($formfield->option4() != ""): ?>
				<option><?php echo htmlentities($formfield->option4()); ?></option>
			<?php endif; ?>
			
			<?php if($formfield->option5() != ""): ?>
				<option><?php echo htmlentities($formfield->option5()); ?></option>
			<?php endif; ?>
			
			<?php if($formfield->option6() != ""): ?>
				<option><?php echo htmlentities($formfield->option6()); ?></option>
			<?php endif; ?>
			
			<?php if($formfield->option7() != ""): ?>
				<option><?php echo htmlentities($formfield->option7()); ?></option>
			<?php endif; ?>

		</select>

	</div>
</div>

<?php endif; ?>