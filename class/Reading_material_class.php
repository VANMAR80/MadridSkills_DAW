<?php
abstract class ReadingMaterial{
	private int $id;
	private string $title;
	private int $pages;
	private int $price;
	private object $editor;
	function __construct($id, $title, $pages, $price, $editor){
		$this-> id=$id;
		$this-> title=$title;
		$this-> pages=$pages;
		$this-> price=$price;
		$this-> editor=$editor;
	}
	public function get_id(){
		return $this->id;
	}
	public function set_id($id_new){
		return $this->id=$id_new;
	}
	public function get_title(){
		return $this->title;
	}
	public function set_title($title_new){
		return $this->title=$title_new;
	}
	public function get_pages(){
		return $this->pages;
	}
	public function set_pages($pages_new){
		return $this->pages=$pages_new;
	}
	public function get_price(){
		return $this->price;
	}
	public function set_price($price_new){
		return $this->price=$price_new;
	}
	public function get_editor(){
		return $this->editor;
	}
	public function set_editor($editor_new){
		return $this->editor=$editor_new;
	}
}