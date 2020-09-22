<?php 

class ctelas extends CI_Controller{
	
	public function index(){
		redirect('inicio');
	}
	public function telaLogin(){
		$data = array('title' => "Ecommerce", "lang" => '"pt-br"');
		$this -> load -> view("header",$data);
		$this -> load -> view("navbar");
		$this -> load -> view("telalogin");
		$this -> load -> view("footer");
	}
	public function telaCadastro(){
		$data = array('title' => "Ecommerce", "lang" => '"pt-br"');
		$this -> load -> view("header",$data);
		$this -> load -> view("navbar");
		$this -> load -> view("telaCadastro");
		$this -> load -> view("footer");
	}
	public function telaInicial(){
		$data = array('title' => "Ecommerce", "lang" => '"pt-br"');
		$this -> load -> view("header",$data);
		$this -> load -> view("navbar");
		$this -> load -> view("telainicial");
		$this -> load -> view("footer");
	}
	public function telaCarrinho(){
		$data = array('title' => "Ecommerce", "lang" => '"pt-br"');
		$this -> load -> view("header",$data);
		$this -> load -> view("navbar");
		$this -> load -> view("telacarrinho");
		$this -> load -> view("footer");
	}

}