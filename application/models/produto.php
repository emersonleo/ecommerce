<?php 
class produto extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this -> load -> database();
		date_default_timezone_set("America/Recife");
	}
	public function buscarProdutos(){
		$this -> db -> select('*');
		$this -> db -> from("produto");
		$this -> db -> where("quantidade >",0);
		return $this -> db -> get() -> result();
	}
}