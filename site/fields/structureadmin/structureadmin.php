<?php

class StructureAdminField extends StructureField {
	public function __toString() {
		$user = site()->user();
		if($user->hasRole('admin')) {
			return parent::__toString();
		}

		return parent;
	}
}
