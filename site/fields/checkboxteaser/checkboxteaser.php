<?php

class CheckboxTeaserField extends CheckboxField {
	public function __toString() {

		if($this->page()->parents()->has("home")){ return ""; }
		
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
