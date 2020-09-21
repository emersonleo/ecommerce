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
	public function listarCarrinho(){
		$id_usuario = $this -> session -> userdata("usuario_autorizado") -> id;
		$result = $this -> produto -> listarCarrinho($id_usuario);
		if($result){
			$this -> output -> set_output(json_encode($result));
		}else{
			$this -> output -> set_output(null);
		}
	}
}