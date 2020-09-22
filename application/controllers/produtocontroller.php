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
	public function adicionarAoCarrinho(){
		$id_usuario = $this -> session -> userdata("usuario_autorizado") -> id;
		$id_produto = $_POST["produto"];
		$buscarNoCarrinho  = $this -> produto -> buscarProdutoCarrinho($id_produto,$id_usuario);
		if($buscarNoCarrinho){
			$this -> produto -> atualizarCarrinho("+",$id_usuario,$id_produto);
		}else{
			$this -> produto -> adicionarAoCarrinho($id_usuario,$id_produto);
		}

	}
	public function aumentarItemNoCarrinho(){

	}
}