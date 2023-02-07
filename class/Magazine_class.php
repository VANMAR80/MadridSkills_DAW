<?php

include ('Reading_material_class.php');

class Magazine extends ReadingMaterial {
	private string $additionalResources;
    function __construct($id, $title, $pages, $price, $editor, $additionalResources){
    	parent::__construct($id, $title, $pages, $price, $editor);
    	$this->additionalResources = $additionalResources;
    }
    public function get_additionalResources(){
		return $this->additionalResources;
	}
	public function set_additionalResources($additionalResources_new){
		return $this->additionalResources=$additionalResources_new;
	}
}