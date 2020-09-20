<?php 
/**
 * 
 */
class produtocontroller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this -> load -> model('produto');
	}
	public function listarProdutos(){
		$result = $this -> produto -> buscarProdutos();
		if($result){
			$this -> output -> set_output(json_encode($result));
		}
	}
}