
<?php 
	if($this -> session -> flashdata("CAD000 - Usuário cadastrado com sucesso")){
		echo "<script> Swal.fire('Cadastrado com sucesso','Agora você já pode acessar o sistemas utilizando os dados informados no cadastro','success')</script>" ;
	}elseif($this -> session -> flashdata("LOG001 - Usuário não localizado")){
		echo "<script> Swal.fire('Usuário não foi encontrado','Certifique-se de que as informações digitadas estão corretas e tente novamente','error')</script>" ;
	}elseif($this -> session -> flashdata("DEL000 - Excluído com sucesso")){
		echo "<script> Swal.fire('Exclusão realizada','Sua conta foi excluída com sucesso','success')</script>" ;
	} 
	?>
<div class="container" style="margin-left: 30%; margin-top: 10%">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="card">
				<form method="post" action=<?php echo "'".base_url("acessar")."'";?>>
				<div class="card-body">
						<h5 class="card-title" align="center"> Login </h5>
						<div class="form-group">
							<input type="text" name="login" id="login" class="form-control" placeholder="Nome de usuário" required>
						</div>
						<div class="form-group">
							<input type="password" name="senha" id='senha' class="form-control" placeholder="Senha" required>
						</div>
						<div class="form-group">
							<a  id='linkCadastro' href= <?php echo "'".base_url('cadastro')."'"; ?>> Ainda não possi conta? cadastre-se </a>
						</div>
						<button type="submit" class="btn btn-info" id="btnEntrar"> Entrar </button>
					</form>
				</div>
		</div>
	</div>
</div>

