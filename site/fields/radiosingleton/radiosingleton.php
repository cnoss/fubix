<?php

class RadioSingletonField extends RadioField {
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
		//return '<div class="field field-grid-item"><p>Die Einstellung kann nur in ' . $lang .' bearbeitet werden.</p></div>';
	}
}
