<?php
namespace PFBC\Element;

class HTML extends \PFBC\Element {
	public function __construct($value) {
		$properties = array("value" => $value);
		parent::__construct("", "", $properties);
	}

	public function render() { 
		echo $this->_attributes["value"];
	}
}
