<!-- Molecule: Form -->

<?php
	if(!isset($classes)){
		$classes = array();
		$classes["label"] = "col-sm-2";
		$classes["data"] = "col-sm-6";
	}
	
	$label 	= (isset($label)) ? $label : "links";
	$footer = (isset($footer)) ? $footer : true;

	$hash_plain = "";
?>
<?php
foreach($data->builder()->toStructure() as $formfield) {
	snippet('form-builder/'.$formfield->_fieldset(), array(
		'formfield' => $formfield, 
		'classes' => $classes, 
		'label' => $label, 
	));

	$hash_plain .= $formfield->name;
}

if($footer) {
	// wird nicht mehr benötigt da Formulare über AJAX versendet werden
	//$disclaimer_ok = (isset($postdata['disclaimer-ok']) && ($postdata['disclaimer-ok'] != 0) ? false : true);

	// disclaimer-ok: determinates if the user has agreed to the agreement 
	snippet("form-builder/footer"); //, array('disclaimer_ok' => $disclaimer_ok));

	$hash_plain .= 'disclaimer-okcreation_timehoneypot'; // append these fields to the form hash
}

// Pass the form recipients to the form itself
$recipient = $data->recipient();
$recipient = (string) $recipient; // workarround

$partner_meta = c::get('partner-meta');
$meta_recipient = $partner_meta['mail'];

// Check if recipient is empty, if so use the contact adress defined in the debitors file as fallback
// Additionally to prevent bot email detection, we are reversing the mail's character order ^schi 12.2015
if(!empty($recipient) && $recipient != "") {
	$to = array_filter(explode(",", strrev($recipient)));
}
else {
	$to = array(strrev($meta_recipient));
} 

echo "<input type='hidden' name='recipients' value='".json_encode($to)."'>";
echo "<input type='hidden' name='answer' value='".$data->answer_text()."'>";
echo "<input type='hidden' name='language' value='".$site->language()."'>";

// Add the formfield hash to the hash itself 
// !important that all non-form-builder inputs are appended here in the right order!
$hash_plain .= "recipients";
$hash_plain .= "answer";
$hash_plain .= "language";
$hash_plain .= "hash";

// Add the recipients encoded (and reversed) json string to the hash as well
$hash_plain .= "_".json_encode($to);
?>

<?php 
// uncomment this to get the plain hash (attention: DEBUGGING ONLY !!!) 
// echo $hash_plain 
?>

<input type="hidden" name="hash" value="<?= md5($hash_plain) ?>">




