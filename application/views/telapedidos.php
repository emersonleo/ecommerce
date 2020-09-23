<div class="container">
	<div class="row">
		<div class="card col-md-12" style="margin-top: 10px; margin-bottom: 10px "> 
			<div class="card-body" style="background-color: white; text-align: center">
				<h4>
					Meus Pedidos
				</h4>
			</div>
		</div>
		<div class="card col-md-12" style="margin-bottom: 10px">
			<div class="card-body">
				<div id="produtosPedidos">
					<table class="table-responsive" id="tabelaPedidos">
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
						<tbody id="tbodyPedidos">
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$.get(<?php echo "'".base_url('listarpedidos')."'";?>, function(data){ 
		if((data == null) || (data == "")){
			var strpedidosVazio = ''
			strpedidosVazio = "<div style='text-align:center'> <h4> Você ainda não possui pedidos ainda. </h4> </div>"
			$("#produtospedidos")[0].innerHTML = strpedidosVazio
		}else{
			$("#tabelapedidos").show();
			pedidos = JSON.parse(data)
			console.log(pedidos)
			construirTabelaPedidos(pedidos)
		}
	})
	function construirTabelaPedidos(Produtos){
		var tbodyNovo = ''
		for (var i = 0; i <= Produtos.length - 1; i++) {
			var tdProduto = "<td class='col-md-3' id='td1'> <div class='row'> <img style='width:20%; height:20%; ' src=" + <?php echo '"'.base_url('assets/img/').'"';?> +Produtos[i].imagem + "> <h6 style='align-self:center; margin-left:2%'> " + Produtos[i].nome + " </h6> </div></td>" 
			tbodyNovo += "<tr>" + tdProduto + "<td class='col-md-3'> <h6>" + Produtos[i].quantidade +  "</h6> </td> <td class='col-md-3'> <h6" +  Produtos[i].id + "valor" + "> R$ " + parseFloat(Produtos[i].preço).toFixed(2) + " </h6></td> </tr>"

		}
		$("#tbodyPedidos")[0].innerHTML = tbodyNovo
	}
</script>