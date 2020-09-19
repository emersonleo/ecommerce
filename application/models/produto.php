<?php 
class produto extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this -> load -> database();
		date_default_timezone_set("America/Recife");
	}
}