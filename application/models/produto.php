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
	public function listarCarrinho($id_usuario){
		$this -> db -> select('produto.id, produto.nome, produto.preço, carrinho.quantidade_carrinho, quantidade, imagem');
		$this -> db -> from("produto,usuario,carrinho");
		$this -> db -> where("id_usuario", $id_usuario);
		$this -> db -> where("produto.id = carrinho.id_produto");
		return $this -> db -> get() -> result();
	}
}