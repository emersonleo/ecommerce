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
								<td class="col-md-3">
									<h5>
										Produto
									</h5>
								</td>
								<td class="col-md-3">
									<h5>
										Quantidade
									</h5>
								</td>
								<td class="col-md-3">
									<h5>
										Valor
									</h5>
								</td>
							</tr>
						</thead>
						<tbody id="tbodyCarrinho">
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$("#tabelaCarrinho").hide();
	$.get(<?php echo "'".base_url('listarcarrinho')."'";?>, function(data){ 
		if((data == null) || (data == "")){
			var strCarrinhoVazio = ''
			strCarrinhoVazio = "<div style='text-align:center'> <h4> Você ainda não adicionou produtos ao seu carrinho. </h4> </div>"
			$("#produtosCarrinho")[0].innerHTML = strCarrinhoVazio
		}else{
			$("#tabelaCarrinho").show();
			carrinho = JSON.parse(data)
			construirTabelaCarrinho(carrinho)
		}
	})
	function construirTabelaCarrinho(Produtos){
		var tbodyNovo = ''
		for (var i = 0; i <= Produtos.length - 1; i++) {
			console.log(Produtos)
			var tdProduto = "<td class='col-md-4'> <div class='row'> <img style='width:20%; height:20%; ' src=" + <?php echo '"'.base_url('assets/img/').'"';?> +Produtos[i].imagem + "> <h6 style='align-self:center; margin-left:2%'> " + Produtos[i].nome + " </h6> </div></td>" 
			tbodyNovo += "<tr>" + tdProduto + "<td class='col-md-4'> <input class='col-md-2' type='number' value='" + Produtos[i].quantidade_carrinho + "'> </td> <td class='col-md-4'> <h6> R$ " + parseFloat(Produtos[i].preço).toFixed(2) + " </h6></td> </tr>"
		}
		$("#tbodyCarrinho")[0].innerHTML = tbodyNovo
	}
</script>