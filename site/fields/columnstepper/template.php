<input class="[ js-selector-storage ]" type="hidden" name="<?= $field->name() ?>" id="<?= $field->name() ?>" value="" />

<?php
    $items = $field->items();
    if(!isset($items["noc"])){      $items["noc"]   = 1; }
    if(!isset($items["text2"])){    $items["text2"] = ""; }
    if(!isset($items["text3"])){    $items["text3"] = ""; }
?>

<div>

    <ul class="input-list field-grid cf">
        <li class="input-list-item field-grid-item field-grid-item-1-4">
            <label class="input input-with-radio  [ columnstepper-checkbox js-columnstepper-checkbox-columns ]" data-focus="true">
                <input id="form-field-text_columns" class="radio" type="radio" <?php if($items["noc"]=="1") echo "checked=\"\""; ?> autocomplete="on" name="text_columns" value="1">one text column
            </label>
        </li>
        <li class="input-list-item field-grid-item field-grid-item-1-4">
            <label class="input input-with-radio  [ columnstepper-checkbox js-columnstepper-checkbox-columns ]" data-focus="true">
                <input id="form-field-text_columns" class="radio" type="radio" <?php if($items["noc"]=="2") echo "checked=\"\""; ?> autocomplete="on" name="text_columns" value="2">two text columns
            </label>
        </li>
        <li class="input-list-item field-grid-item field-grid-item-1-4">
            <label class="input input-with-radio  [ columnstepper-checkbox js-columnstepper-checkbox-columns ]" data-focus="true">
                <input id="form-field-text_columns" class="radio" type="radio" <?php if($items["noc"]=="3") echo "checked=\"\""; ?> autocomplete="on" name="text_columns" value="3">three text columns
            </label>
        </li>
    </ul>

    <div class="field-grid">
        <div class="field-grid-item" id="input-column-2">
            <label class="label" for="form-field-text_column_2"><?php echo l::get('content-zweite-spalte') ?></label>
            <div class="field-content">
                <textarea style="overflow: hidden; word-wrap: break-word; height: 160px;" class="input ui-droppable [ text-column-content ]" name="text_column_2" autocomplete="on" id="form-field-text_column_2" data-field="editor"><?php echo $items["text2"]; ?></textarea>
                <nav class="field-buttons">
                    <ul class="nav nav-bar">
                        <li class="field-button-bold"><button type="button" tabindex="-1" title="Fetter Text (meta+b)" class="btn" data-editor-shortcut="meta+b" data-tpl="**{text}**" data-text="Fetter Text"><i class="icon fa fa-bold"></i></button></li><li class="field-button-italic"><button type="button" tabindex="-1" title="Kursiver Text (meta+i)" class="btn" data-editor-shortcut="meta+i" data-tpl="*{text}*" data-text="Kursiver Text"><i class="icon fa fa-italic"></i></button></li>
                        <li class="field-button-link"><button type="button" tabindex="-1" title="Link (meta+shift+l)" class="btn" data-editor-shortcut="meta+shift+l" data-action="link"><i class="icon fa fa-chain"></i></button></li><li class="field-button-email"><button type="button" tabindex="-1" title="Email (meta+shift+e)" class="btn" data-editor-shortcut="meta+shift+e" data-action="email"><i class="icon fa fa-envelope"></i></button></li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="field-grid-item" id="input-column-3">
            <label class="label" for="form-field-text_column_3"><?php echo l::get('content-dritte-spalte') ?></label>
            <div class="field-content">
                <textarea style="overflow: hidden; word-wrap: break-word; height: 160px;" class="input ui-droppable [ text-column-content ]" name="text_column_3" autocomplete="on" id="form-field-text_column_3" data-field="editor"><?php echo $items["text3"]; ?></textarea>
                <nav class="field-buttons">
                    <ul class="nav nav-bar">
                        <li class="field-button-bold"><button type="button" tabindex="-1" title="Fetter Text (meta+b)" class="btn" data-editor-shortcut="meta+b" data-tpl="**{text}**" data-text="Fetter Text"><i class="icon fa fa-bold"></i></button></li><li class="field-button-italic"><button type="button" tabindex="-1" title="Kursiver Text (meta+i)" class="btn" data-editor-shortcut="meta+i" data-tpl="*{text}*" data-text="Kursiver Text"><i class="icon fa fa-italic"></i></button></li>
                        <li class="field-button-link"><button type="button" tabindex="-1" title="Link (meta+shift+l)" class="btn" data-editor-shortcut="meta+shift+l" data-action="link"><i class="icon fa fa-chain"></i></button></li><li class="field-button-email"><button type="button" tabindex="-1" title="Email (meta+shift+e)" class="btn" data-editor-shortcut="meta+shift+e" data-action="email"><i class="icon fa fa-envelope"></i></button></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

