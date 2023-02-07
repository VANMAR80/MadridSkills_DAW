<?php
class Publisher{
	public int $id;
	public string $name;
	public string $address;
	public int $telephone;
	public string $website;
	function __construct($id, $name, $address, $telephone, $website){
		$this-> id=$id;
		$this-> name=$name;
		$this-> address=$address;
		$this-> telephone=$telephone;
		$this-> website=$website;
	}
	public function get_id(){
		return $this->id;
	}
	public function set_id($id_new){
		return $this->id=$id_new;
	}
	public function get_name(){
		return $this->name;
	}
	public function set_name($name_new){
		return $this->name=$name_new;
	}
	public function get_address(){
		return $this->address;
	}
	public function set_address($address_new){
		return $this->address=$address_new;
	}
	public function get_telephone(){
		return $this->telephone;
	}
	public function set_telephone($telephone_new){
		return $this->telephone=$telephone_new;
	}
	public function get_website(){
		return $this->website;
	}
	public function set_website($website_new){
		return $this->website=$website_new;
	}
}
