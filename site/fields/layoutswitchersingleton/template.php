
<?php

    $items = $field->items();

    // Number of image columns: How many columns does an image span?
    if(!isset($items["noic"])){      $items["noic"]   = 4; }

    // Number of images in Layout: How many images are shown?
    if(!isset($items["noi"])){      $items["noi"]   = 1; }

    // Number of text column span: How many columns does an text block span?
    if(!isset($items["notc"])){      $items["notc"]   = 1; }

    // Orientation of text columns
    if(!isset($items["otc"])){      $items["otc"] = "left"; }

    // appearance of text
    if(!isset($items["appearance"])){      $items["appearance"] = "normal"; }

    // Start Slideshow (if exists)
    if(!isset($items["slideshow_autostart"])){      $items["slideshow_autostart"] = "0"; }


?>

<div id="layoutdemo" class="cf">

    <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
    </div>


    <div class="row">

        <div id="textblock-1" class="text" data-pos="text-oben"><?php echo kirbytext($text1); ?></div>
        <?php if($noc > 1): ?><div id="textblock-2" class="text" data-pos="text-oben"><?php echo kirbytext($text2); ?></div><?php endif; ?>
        <?php if($noc > 2): ?><div id="textblock-3" class="text" data-pos="text-oben"><?php echo kirbytext($text3); ?></div><?php endif; ?>
        <div id="clear" class="clearfix text-oben"></div>


    <?php if ($field->files()->count() > 0): ?>

        <table id="bildblock">
            <tr>
        <?php $count = 0; foreach ($field->files() as $file): ?>
        <?php if ($file->type() == 'image'): $count++;?>
        <?php if($count == 1): ?>
            <td id="td-<?=$count;?>" class="noi-<?=$items["noi"];?>" rowspan="2" style="background-image: url(<?= $file->url(); ?>); background-position: center <?= $crop ?>">
                <div class="holder"><img class="scale" src="/assets/img/transparent-16zu9.png"></div>
            </td>
        <?php elseif($count == 2): ?>
            <td id="td-<?=$count;?>" style="background-image: url(<?= $file->url(); ?>)">
                <div class="holder"><img class="scale" src="/assets/img/transparent-16zu9.png"></div>
            </td>
        <?php elseif($count == 3): ?>
            </tr>
            <tr>
            <td id="td-<?=$count;?>" style="background-image: url(<?= $file->url(); ?>)">
                <div class="holder"><img class="scale" src="/assets/img/transparent-16zu9.png"></div>
            </td>

        <?php endif; ?>
        <?php endif; ?>
        <?php endforeach; ?>
            </tr>
        </table>

    <?php endif; ?>

        <div id="textblock-1-mitte" class="text" data-pos="text-mitte"><?php echo kirbytext($text1); ?></div>
        <?php if($noc > 1): ?><div id="textblock-2" class="text" data-pos="text-mitte"><?php echo kirbytext($text2); ?></div><?php endif; ?>
        <?php if($noc > 2): ?><div id="textblock-3" class="text" data-pos="text-mitte"><?php echo kirbytext($text3); ?></div><?php endif; ?>

    </div>

    <div class="row" data-pos="text-unten">
        <?php if($noc > 1): ?><div id="textblock-2" class="text"><?php echo kirbytext($text2); ?></div><?php endif; ?>
        <?php if($noc > 2): ?><div id="textblock-3" class="text"><?php echo kirbytext($text3); ?></div><?php endif; ?>
    </div>


    <div class="row">
        <div class="col-md-12">
            <hr>
            <p class="info">Above there is just a very rough layout preview.</p>
            <hr>
        </div>
    </div>
</div>

<input class="[ js-selector-storage ]" type="hidden" name="<?= $field->name() ?>" id="<?= $field->name() ?>" value="" data-noi="<?php echo $field->files()->count(); ?>"/>


<div class="field-content">
    <?php if ($field->files()->count() > 0 || $page_tpl == "content--slideshow"): ?>

    <ul class="input-list field-grid cf">
        <li class="input-list-item field-grid-item field-grid-item-1-4">
            <label class="input sublabel">Image block spans:</label>
        </li><!--
        --><li class="input-list-item field-grid-item field-grid-item-1-4">
            <label class="input input-with-radio  [ columnstepper-checkbox js-columnstepper-checkbox-columns ]" data-focus="true">
                <input id="form-field-noic" class="radio" type="radio" <?php if($items["noic"]=="2") echo "checked=\"\""; ?> autocomplete="on" name="noic" value="2">2 columns
            </label>
        </li><!--
        --><li class="input-list-item field-grid-item field-grid-item-1-4">
            <label class="input input-with-radio  [ columnstepper-checkbox js-columnstepper-checkbox-columns ]" data-focus="true">
                <input id="form-field-noic" class="radio" type="radio" <?php if($items["noic"]=="3") echo "checked=\"\""; ?> autocomplete="on" name="noic" value="3">3 columns
            </label>
        </li><!--
        --><li class="input-list-item field-grid-item field-grid-item-1-4">
            <label class="input input-with-radio  [ columnstepper-checkbox js-columnstepper-checkbox-columns ]" data-focus="true">
                <input id="form-field-noic" class="radio" type="radio" <?php if($items["noic"]=="4") echo "checked=\"\""; ?> autocomplete="on" name="noic" value="4">4 columns
            </label>
        </li>
    </ul>

        <?php if ($field->files()->count() > 1): ?>
        <ul class="input-list field-grid cf">
            <li class="input-list-item field-grid-item field-grid-item-1-4">
                <label class="input sublabel">Images in image block:</label>
            </li><!--
            --><li class="input-list-item field-grid-item field-grid-item-1-4">
                <label class="input input-with-radio  [ columnstepper-checkbox js-columnstepper-checkbox-columns ]" data-focus="true">
                    <input id="form-field-noi" class="radio" type="radio" <?php if($items["noi"]=="1") echo "checked=\"\""; ?> autocomplete="on" name="noi" value="1">1
                </label>
            </li><!--
            --><li class="input-list-item field-grid-item field-grid-item-1-4">
                <label class="input input-with-radio  [ columnstepper-checkbox js-columnstepper-checkbox-columns ]" data-focus="true">
                    <input id="form-field-noi" class="radio" type="radio" <?php if($items["noi"]=="2") echo "checked=\"\""; ?> autocomplete="on" name="noi" value="2">2
                </label>
            </li><!--
            --><li class="input-list-item field-grid-item field-grid-item-1-4">
                <label class="input input-with-radio  [ columnstepper-checkbox js-columnstepper-checkbox-columns ]" data-focus="true">
                    <input id="form-field-noi" class="radio" type="radio" <?php if($items["noi"]=="3") echo "checked=\"\""; ?> autocomplete="on" name="noi" value="3">3
                </label>
            </li>
        </ul>

        <ul class="input-list field-grid cf">
            <li class="input-list-item field-grid-item field-grid-item-1-4">
                <label class="input sublabel">Start Slideshow automatically:</label>
            </li><!--
            --><li class="input-list-item field-grid-item field-grid-item-1-4">
                <label class="input input-with-radio  [ columnstepper-checkbox js-columnstepper-checkbox-columns ]" data-focus="true">
                    <input id="form-field-slideshow_autostart" class="radio" type="radio" <?php if($items["slideshow_autostart"]=="0") echo "checked=\"\""; ?> autocomplete="on" name="slideshow_autostart" value="0">no
                </label>
            </li><!--
            --><li class="input-list-item field-grid-item field-grid-item-1-4">
                <label class="input input-with-radio  [ columnstepper-checkbox js-columnstepper-checkbox-columns ]" data-focus="true">
                    <input id="form-field-slideshow_autostart" class="radio" type="radio" <?php if($items["slideshow_autostart"]=="1") echo "checked=\"\""; ?> autocomplete="on" name="slideshow_autostart" value="1">yes
                </label>
            </li>
        </ul>
        <?php endif ?>

    <?php else: ?>

    <!--div class="add-image">
        <a class="file-add-button" href="#/pages/upload/home/teaser/test"><i class="icon icon-left fa fa-plus-circle"></i>Bild hochladen</a>
    </div-->

    <?php endif ?>
    <div class="text-layout">
        <ul class="input-list field-grid cf">
            <li class="input-list-item field-grid-item field-grid-item-1-4">
                <label class="input sublabel">Text block spans:</label>
            </li><!--
            --><li class="input-list-item field-grid-item field-grid-item-1-4">
                <label class="input input-with-radio  [ columnstepper-checkbox js-columnstepper-checkbox-columns ]" data-focus="true">
                    <input id="form-field-notc" class="radio" type="radio" <?php if($items["notc"]=="1") echo "checked=\"\""; ?> autocomplete="on" name="notc" value="1">1 column
                </label>
            </li><!--
            --><li class="input-list-item field-grid-item field-grid-item-1-4">
                <label class="input input-with-radio  [ columnstepper-checkbox js-columnstepper-checkbox-columns ]" data-focus="true">
                    <input id="form-field-notc" class="radio" type="radio" <?php if($items["notc"]=="2") echo "checked=\"\""; ?> autocomplete="on" name="notc" value="2">2 columns
                </label>
            </li><!--
            --><li class="input-list-item field-grid-item field-grid-item-1-4">
                <label class="input input-with-radio  [ columnstepper-checkbox js-columnstepper-checkbox-columns ]" data-focus="true">
                    <input id="form-field-notc" class="radio" type="radio" <?php if($items["notc"]=="4") echo "checked=\"\""; ?> autocomplete="on" name="notc" value="4">4 columns
                </label>
            </li>
        </ul>

        <ul class="input-list field-grid cf">
            <li class="input-list-item field-grid-item field-grid-item-1-4">
                <label class="input sublabel">Pull text columns to:</label>
            </li><!--
            --><li class="input-list-item field-grid-item field-grid-item-1-4">
                <label class="input input-with-radio  [ otc-checkbox js-otc-checkbox-columns ]" data-focus="true">
                    <input id="form-field-otc" class="radio" type="radio" <?php if($items["otc"]=="left") echo "checked=\"\""; ?> autocomplete="on" name="otc" value="left">the left
                </label>
            </li><!--
            --><li class="input-list-item field-grid-item field-grid-item-1-4">
                <label class="input input-with-radio  [ otc-checkbox js-otc-checkbox-columns ]" data-focus="true">
                    <input id="form-field-otc" class="radio" type="radio" <?php if($items["otc"]=="right") echo "checked=\"\""; ?> autocomplete="on" name="otc" value="right">the right
                </label>
            </li><!--
            --><li class="input-list-item field-grid-item field-grid-item-1-4">
                <label class="input input-with-radio  [ otc-checkbox js-otc-checkbox-columns ]" data-focus="true">
                    <input id="form-field-otc" class="radio" type="radio" <?php if($items["otc"]=="top") echo "checked=\"\""; ?> autocomplete="on" name="otc" value="top">the top
                </label>
            </li>
        </ul>

        <ul class="input-list field-grid cf">
            <li class="input-list-item field-grid-item field-grid-item-1-4">
                <label class="input sublabel">Text Appearance:</label>
            </li><!--
            --><li class="input-list-item field-grid-item field-grid-item-1-4">
                <label class="input input-with-radio  [ appearance-checkbox js-appearance-checkbox-columns ]" data-focus="true">
                    <input id="form-field-appearance" class="radio" type="radio" <?php if($items["appearance"]=="normal") echo "checked=\"\""; ?> autocomplete="on" name="appearance" value="normal">normal
                </label>
            </li><!--
            --><li class="input-list-item field-grid-item field-grid-item-1-4">
                <label class="input input-with-radio  [ appearance-checkbox js-appearance-checkbox-columns ]" data-focus="true">
                    <input id="form-field-appearance" class="radio" type="radio" <?php if($items["appearance"]=="xxl") echo "checked=\"\""; ?> autocomplete="on" name="appearance" value="xxl">XX large
                </label>
            </li><!--
            --><li class="input-list-item field-grid-item field-grid-item-1-4">
                <label class="input input-with-radio  [ appearance-checkbox js-appearance-checkbox-columns ]" data-focus="true">
                    <input id="form-field-appearance" class="radio" type="radio" <?php if($items["appearance"]=="unten") echo "checked=\"\""; ?> autocomplete="on" name="appearance" value="unten">new row for 2nd column
                </label>
            </li>
        </ul>
    </div>
</div>

