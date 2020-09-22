<?php 

class usuariocontroller extends CI_Controller{
	public function index(){
		redirect("inicio");
	}
	public function __construct(){
		parent::__construct();
		$this -> load -> model('usuario');
	}
	public function acessar(){
		echo var_dump($_POST);
		$login = $_POST["login"];
		$senha = $_POST['senha'];
		$result = $this -> usuario -> buscarUsuario($login,$senha);
		if($result){
			$this -> session -> set_userdata("usuario_autorizado",$result -> row());
			redirect("inicio");
		}else{
			$this -> session -> set_flashdata("LOG001 - Usuário não localizado", true);
			redirect('login');
		}
	}
	public function cadastrar(){
		$login = $_POST["login"];
		$senha = $_POST["senha"];
		$nome = $_POST["nome"];
		$genero = $_POST["genero"];
		$cep = $_POST["cep"]; 
		$uf = $_POST["uf"]; 
		$cpf =  $_POST["cpf"];
		$datanasc =  $_POST["datanasc"]; 
		$cidade =  $_POST["cidade"]; 
		$bairro =  $_POST["bairro"];
		$logradouro =  $_POST["logradouro"];
		$numero =   $_POST['numero'];
		$complemento =  $_POST['complemento'];
		if($this -> usuario -> buscarUsuarioPeloCpf($cpf) -> num_rows() > 0){
			$this -> session -> set_flashdata("CAD002 - Cpf cadastrado", true);
			redirect('cadastro');
		}else if($this -> usuario -> buscarUsuarioPeloLogin($login)  -> num_rows() > 0){
			$this -> session -> set_flashdata("CAD003 - Login cadastrado", true);
			redirect('cadastro');
		}
		else{
			$result = $this -> usuario -> cadastrarUsuario($login,$senha, $nome, $genero, $cep, $uf, $cpf, $datanasc, $cidade, $bairro, $logradouro, $numero, $complemento);
			if($result == null){
				$this -> session -> set_flashdata("CAD001 - Não foi possível cadastrar", true);
				redirect('cadastro');
			}else{
				$this -> session -> set_flashdata("CAD000 - Usuário cadastrado com sucesso", true);
				redirect('login');
			}
		}
	}
	public function sair(){
		$this -> session -> set_userdata("usuario_autorizado",null);
		$this -> session -> set_flashdata("LOG001 - Usuário não localizado", null);
		$this -> session -> set_flashdata("CAD001 - Não foi possível cadastrar", null);
		$this -> session -> set_flashdata("CAD000 - Usuário cadastrado com sucesso", null);
		redirect('inicio');
	}
	public function excluirConta(){
		$id = $this -> session -> userdata('usuario_autorizado') -> id_usuario;
		$senha = $_POST['senha'];
		$result = $this -> usuario -> apagarConta($id, $senha);
		if($result){
			$this -> session -> set_flashdata("DEL000 - Excluído com sucesso",true);
			$this -> output -> set_output(base_url("sair"));
		}else{
			$this -> output -> set_output(false);
		}
	}
	public function alterarLogin(){
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		$id = $this -> session -> userdata('usuario_autorizado') -> id_usuario;
		$result = $this -> usuario -> alterarLogin($login,$senha, $id);
		if($result){
			$this -> session -> set_flashdata("ALT001 - Login alterado", true);
			$this -> output -> set_output(base_url('alterar'));
		}
		else{
			$this -> output -> set_output(false);
		}
	}
	public function alterarSenha(){
		$senhaAntiga = $_POST['senha'];
		$senhaNova = $_POST['novasenha'];
		$id = $this -> session -> userdata('usuario_autorizado') -> id_usuario;
		$result = $this -> usuario -> alterarSenha($senhaAntiga,$senhaNova,$id);
		if($result){
			$this -> session -> set_flashdata("ALT000 - Senha alterada", true);
			$this -> output -> set_output(base_url('alterar'));
		}
		else{
			$this -> output -> set_output(false);
		}
	}
}