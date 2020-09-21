<div class="container">
	<div class="row">
		<div class="card col-md-12" style="margin-top: 10px; margin-bottom: 10px "> 
			<div class="card-body" style="background-color: white; text-align: center">
				<h4>
					Meu Carrinho 
				</h4>
			</div>
		</div>
		<div class="card col-md-12">
			<div class="card-body">
				<div id="produtosCarrinho">
					<table class="table-responsive" id="tabelaCarrinho">
						<thead>
							<tr>
								<td class="col-md-4">
									<h5>
										Produto
									</h5>
								</td>
								<td class="col-md-4">
									<h5>
										Quantidade
									</h5>
								</td>
								<td class="col-md-4">
									<h5>
										Valor
									</h5>
								</td>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$("#tabelaCarrinho").hide();
	$.get(<?php echo "'".base_url('listarcarrinho')."'";?>, function(data){ 
		var strProdutos = ''
		if((data == null) || (data == "")){
			strProdutos = "<div style='text-align:center'> <h4> Você ainda não adicionou produtos ao seu carrinho. </h4> </div>"
			$("#produtosCarrinho")[0].innerHTML = strProdutos
		}else{
			$("#tabelaCarrinho").show();
			carrinho = JSON.parse(data)
		}

	})
</script>