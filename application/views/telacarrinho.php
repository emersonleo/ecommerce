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
		<div class="card col-md-12" style="margin-top: 10px; margin-bottom: 10px">
			<div class="card-body">
				<table class="table-responsive">
					<thead>
						<tr>
							<td class="col-md-3">
								<h5>
									Calcular Frete
								</h5>
							</td>
							<td class="col-md-3">
								<h5>
									Frete
								</h5>
							</td>
							<td class="col-md-3">
								<h5>
									Total
								</h5>
							</td>	
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="col-md-3">
																<div class="form-group"> 
									<input type="number" id="frete" name="frete">
									<button class="btn btn-info" id="btnCalcular" name="btnCalcular"> Calcular </button>
								</div>
							</td>
							<td class="col-md-3">
							</td>
							<td class="col-md-3">
								<h5 id="valorTotal">
									
								</h5>
							</td>	
						</tr>
					</tbody>
				</table>
				<div class="col-md-2 form-group">
					<button id="btnComprar" class="btn btn-success">
							Comprar
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$("#tabelaCarrinho").hide();
	$("#btnComprar").hide();
	$.get(<?php echo "'".base_url('listarcarrinho')."'";?>, function(data){ 
		if((data == null) || (data == "")){
			var strCarrinhoVazio = ''
			strCarrinhoVazio = "<div style='text-align:center'> <h4> Você ainda não adicionou produtos ao seu carrinho. </h4> </div>"
			$("#produtosCarrinho")[0].innerHTML = strCarrinhoVazio
		}else{
			$("#tabelaCarrinho").show();
			$("#btnComprar").show();
			carrinho = JSON.parse(data)
			construirTabelaCarrinho(carrinho)
			valorTotal(carrinho)
		}
	})
	function construirTabelaCarrinho(Produtos){
		var tbodyNovo = ''
		for (var i = 0; i <= Produtos.length - 1; i++) {
			var tdProduto = "<td class='col-md-3' id='td1'> <div class='row'> <img style='width:20%; height:20%; ' src=" + <?php echo '"'.base_url('assets/img/').'"';?> +Produtos[i].imagem + "> <h6 style='align-self:center; margin-left:2%'> " + Produtos[i].nome + " </h6> </div></td>" 
			tbodyNovo += "<tr>" + tdProduto + "<td class='col-md-3'> <input id = "+ i + " min='0' max=" + parseInt(Produtos[i].quantidade) + " data-preco= " + parseFloat(Produtos[i].preço).toFixed(2) + " style='width:50%'type='number' onchange='mudarValor(this)'  value='" + Produtos[i].quantidade_carrinho + "'> </td> <td class='col-md-3'> <h6" +  Produtos[i].id + "valor" + "> R$ " + (parseFloat(Produtos[i].preço)*parseInt(Produtos[i].quantidade_carrinho)).toFixed(2) + " </h6></td> </tr>"

		}
		$("#tbodyCarrinho")[0].innerHTML = tbodyNovo
	}
	function preco(preço, quantidade){
		if((preço * quantidade) == "NaN"){
			return (preço * 1).toFixed(2)
		}else{
			return (preço*quantidade).toFixed(2)
		}
	}
	function mudarValor(campo){
		let index = campo.getAttribute("id")
		carrinho[index].quantidade_carrinho = $("#" + index)[0].value
		construirTabelaCarrinho(carrinho)
		valorTotal(carrinho)
		console.log(carrinho)
	}
	function valorTotal(produtos){
		let valorTotal = 0;
		for (var i = 0; i < produtos.length; i++) {
			valorTotal += (parseFloat(produtos[i].preço)*parseInt(produtos[i].quantidade_carrinho))
		}
		$("#valorTotal").text("R$ " + valorTotal.toFixed(2))
	}
	$("#btnComprar").click(function(){
		let compra = []
		for(var i = 0; i < carrinho.length; i++){
			compra.push([carrinho[i].id, carrinho[i].quantidade_carrinho])
		}
		$.post(<?php echo "'".base_url('comprar')."'";?>, {"compra":compra}, function(data){
			window.location.href = data
		})
	})
</script>