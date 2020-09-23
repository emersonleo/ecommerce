<?php 
class produto extends CI_Model{

	public function index(){
		redirect("inicio");
	}
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
	public function atualizarCarrinho($sinal,$id_usuario,$id_produto){
		$this -> db -> where("id_usuario", $id_usuario);
		$this -> db -> where("id_produto", $id_produto);
		$this -> db -> update("carrinho",array("quantidade" => "quantidade".$sinal." 1"));
	}
	public function atualizarEstoque($id_produto,$quantidade){
		$this -> db -> where("id", $id_produto);
		$this -> db -> set("quantidade","quantidade-".$quantidade);
		$this -> db -> update("produto");
	}
	public function buscarProdutoCarrinho($id_produto,$id_usuario){
		$this -> db -> select('*');
		$this -> db -> from("carrinho");
		$this -> db -> where(array('id_produto' => $id_produto, "id_usuario" => $id_usuario));
		return $this -> db -> get() -> result();
	}
	public function adicionarAoCarrinho($id_usuario,$id_produto){
		$data = array('id_produto' => $id_produto, 
						"id_usuario" => $id_usuario, 
						"quantidade_carrinho" => 1);
		$this -> db -> insert("carrinho", $data);
	}
	public function validarProduto($id_produto,$quantidade){
		$this -> db -> select('*');
		$this -> db -> from("produto");
		$this -> db -> where(array('id' => $id_produto, "quantidade >=" => $quantidade));
		return $this -> db -> get();
	}
	public function comprar($id_usuario,$id_produto,$quantidade){
		$this -> atualizarEstoque($id_produto,$quantidade);
		$data  = array('id_usuario' => $id_usuario, "id_produto" => $id_produto, "quantidade" => $quantidade, "status" => 1);
		$this -> db -> insert("compras", $data);
	}
	public function listarPedidos($id_usuario){
		$this -> db -> select('produto.id, produto.nome, produto.preço, compras.quantidade, imagem');
		$this -> db -> from("produto,usuario,compras");
		$this -> db -> where("id_usuario", $id_usuario);
		$this -> db -> where("produto.id = compras.id_produto");
		return $this -> db -> get() -> result();
	}
	public function removerCarrinho($id_usuario,$id_produto){
		$this -> db -> where("id_usuario" , $id_usuario);
		$this -> db -> where("id_produto" , $id_produto);
		$this -> db -> delete("carrinho");
	}
}