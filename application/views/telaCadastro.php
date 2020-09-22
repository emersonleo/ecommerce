<?php 
	if($this -> session -> flashdata("CAD001 - Não foi possível cadastrar")){
		echo "<script> Swal.fire('O Usuário informado já existe','Digite um novo nome de usuário ou acesse sua conta na página de login','error')</script>" ;
	}
?>
<div >
	<div class="row" style="margin: 0">
		<div class="col-md-12 col-md-offset-3">
			<div class="card" style="margin-top:1%">
				<div class="card-body">
					<h5 class="card-title" align="center"> Cadastre-se </h5>
					<form id="formCadastro" method="post" action="#">
							<div class="row" style="margin:1px">
							<h6> Informações Pessoais </h6>
							</div>
							<div class="row"> 
							<div class="form-group col-md-4">
								<input required type="text" name="nome" id="nome" class="form-control" placeholder="Nome Completo">
							</div>
							<div class="form-group col-md-2">
								<input required type="text" name="datanasc" id="datanasc" class="form-control" placeholder="Data Nascimento ">
							</div>
							<div class="form-group col-md-2" id="cpf">
								<input required type="text" name="cpf" id="cpf" class="form-control" placeholder="CPF (apenas número)" maxlength="11" minlength="11">
							</div>
							<div class="form-group col-md-2">
								<select class="btn btn-info" id="genero" name="genero" required>
									<option value="" selected disabled> Selecione seu gênero </option>
									<option> Feminino </option>
									<option> Masculino </option>
									<option> Não-binário </option>
									<option> Outro </option>
								</select>
							</div>
							</div>
							<div class="row" style="margin:1px">
							<h6> Informações de Acesso </h6>
							</div>
							<div class="row">
							<div class="form-group col-md-3">
								<input required type="email" name="login" id="login" class="form-control" placeholder="Email">
							</div>
							<div class="form-group col-md-2">
								<input required type="password" name="senha" id='senha' class="form-control" placeholder="Senha">
							</div>		
							<div class="form-group col-md-2">
								<input required type="password" name="confirmarSenha" id='confirmarSenha' class="form-control" placeholder="Confirme sua senha">
							</div>
							</div>
							<div class="row" style="margin:1px">
							<h6> Endereço </h6>
							</div>
							<div class="row">
							<div class="form-group col-md-3">
								<div class="input-group mb-3">
									  <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP (apenas números)" aria-label="CEP" aria-describedby="button-addon2" required>
									  <div class="input-group-append">
									    <button class="btn btn-outline-secondary" type="button" id="btnCEP" style="padding: 20%">
									    	<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											  <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
											  <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
											</svg>
									    </button>
									  </div>
									</div>
							</div>
							<div class="form-group col-md-2">
								<input required type="text" name="uf" id="uf" class="form-control" placeholder="UF">
							</div>
							<div class="form-group col-md-2">
								<input required type="text" name="cidade" id="cidade" class="form-control" placeholder="Cidade">
							</div>
							<div class="form-group col-md-2">
								<input required type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairro">
							</div>
							<div class="form-group col-md-3">
								<input required type="text" name="logradouro" id="logradouro" class="form-control" placeholder="Logradouro (Ex. Rua ABC)">
							</div>
							<div class="form-group col-md-2">
								<input required type="text" name="numero" id="numero" class="form-control" placeholder="Número">
							</div>
							<div class="form-group col-md-3">
								<input type="text" name="complemento" id="complemento" class="form-control" placeholder="Complemento(opcional)">
							</div>
							</div>
							<div class="form-group" style="margin-left: 40%">
								<a style="padding: 0" class="col-md-12" id="linkLogin" href= <?php echo "'".base_url('login')."'"; ?> > Já possui uma conta? Acesse sua conta 
								</a>
							</div>
						<button type="type" id="btnCadastro" name="btnCadastro" class="btn btn-info form-group" style="margin-left: 47%"> Cadastrar </button>
						</div>
					</form>
				</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$.validator.addMethod("dateBR", function(value, element) {
            if(value.length!=10) return false;
            var data       = value;
            var dia         = data.substr(0,2);
            var barra1   = data.substr(2,1);
            var mes        = data.substr(3,2);
            var barra2   = data.substr(5,1);
            var ano         = data.substr(6,4);
            if(data.length!=10||barra1!="/"||barra2!="/"||isNaN(dia)||isNaN(mes)||isNaN(ano)||dia>31||mes>12)return false;
            if((mes==4||mes==6||mes==9||mes==11) && dia==31)return false;
            if(mes==2  &&  (dia>29||(dia==29 && ano%4!=0)))return false;
            if(ano < 1900)return false;
            return true;
    }, "Digite uma data válida");
    $.validator.addMethod("confirmacao", function(value, element) {
            if(value != $("#senha")[0].value){
            	return false
            }else{
            	return true;
            }
    }, "Senha e Confirmação de Senha estão diferentes");
	$("#formCadastro").validate({
		debug:true,
		rules:{
			nome:{
				required:true
			}, 
			cpf:{
				required:true,
				number:true
			}, 
			datanasc:{
				required:true,
				dateBR:true
			},
			genero:{
				required:true
			},
			login:{
	       		required: true,
	            email: true
    		},
    		senha:{
    			required:true
    		},
    		confirmarSenha:{
    			required:true,
    			confirmacao:true
    		},
    		cep:{
    			required:true,
    			number:true
    		},
    		uf:{
				required:true
    		},
    		cidade:{
    			required:true
    		},
    		bairro:{
    			required:true
    		},
    		logradouro:{
    			required:true
    		},
    		numero:{
    			required:true
    		}
		},
		messages:{
			nome:{
				required:"Campo Obrigatório"
			}, 
			cpf:{
				required:"Campo Obrigatório",
				number: "Digite apenas números",
				minlength:"O CPF informado possui menos de 11 caracteres"
			}, 
			datanasc:{
				required:"Campo Obrigatório",
			},
			genero:{
				required:"Campo Obrigatório"},
			login:{
	       		required: "Campo Obrigatório",
	            email: "Insira um email válido"
    		},
    		senha:{
    			required:"Campo Obrigatório"
    		},
    		confirmarSenha:{
    			required:"Campo Obrigatório"
    		},
    		cep:{
    			required:"Campo Obrigatório",
    			number:"Digite apenas números"    			
    		},
    		uf:{
				required:"Campo Obrigatório"
    		},
    		cidade:{
    			required:"Campo Obrigatório"
    		},
    		bairro:{
    			required:"Campo Obrigatório"
    		},
    		logradouro:{
    			required:"Campo Obrigatório"
    		},
    		numero:{
    			required:"Campo Obrigatório"
    		}
		} 
	})
	$("#btnCEP").click(function(){
		var valorCEP = $("#cep")[0].value
		$.get("https://viacep.com.br/ws/" + valorCEP +"/json/", function(data){
			console.log(data)
			$("#cidade")[0].value = data.localidade
			$("#uf")[0].value = data.uf
			$("#bairro")[0].value = data.bairro
			$("#logradouro")[0].value = data.logradouro
		}).fail(function(data){
			Swal.fire(
			  'CEP inválido',
			  'Não foi possível localizar nenhum endereço com o cep informado.',
			  'error'
			)
		})
	})
</script>
<style type="text/css">
	.error{
		color:#cc0000;
	}
</style>