<?php

class CheckboxesSingletonField extends CheckboxesField {
	public function __toString() {
		$languages = c::get('languages');
		$lang = $currentLang = strtoupper(site()->language()->code());
		foreach($languages as $l) {
			if(isset($l['default']) && $l['default']) {
				$lang = strtoupper($l['code']);
			}
		}
		if($currentLang == $lang) {
			return parent::__toString();
		}
		
		return "";
	}
}
