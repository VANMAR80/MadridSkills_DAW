<?php

include ('Reading_material_class.php');
class Book extends ReadingMaterial {
	private int $chapters;
	private string $authors;
	function __construct($id, $title, $pages, $price, $editor, $chapters, $authors){
		parent::__construct($id, $title, $pages, $price, $editor);
		$this->chapters = $chapters;
		$this->authors = $authors;
	}
	public function get_chapters(){
		return $this->chapters;
	}
	public function set_chapters($chapters_new){
		return $this->chapters=$chapters_new;
	}
	public function get_authors(){
		return $this->authors;
	}
	public function set_authors($authors_new){
		return $this->authors=$authors_new;
	}
}
