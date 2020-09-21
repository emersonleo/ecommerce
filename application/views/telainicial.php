
<div id="container" class="container">
	<div class="row" id="produtos" name="produtos">
	</div> 
</div>
</html>
<script type="text/javascript">
	$.get(<?php echo "'".base_url("listarprodutos")."'";?>, function(data){
		let jsonProduto = JSON.parse(data)
		construirCards(jsonProduto)
	})
	function construirCards(JSONProdutos){
		var strCards = ''
		for (var i = 0; i <= JSONProdutos.length - 1; i++) {
			let imagem = '<div class="form-group"> <img src=' + <?php echo '"'.base_url("/assets/img/").'"';?> + JSONProdutos[i].imagem + '  style="width:50%;height:100%; max-height:70px"> </div>'
			let preco = '<div class="form-group"> <div class="row" style="justify-content:center"> <h6 >' + JSONProdutos[i].nome + '</h6> </div> <h5> <b> R$' + parseFloat(JSONProdutos[i].preço).toFixed(2) +  ' </b> </h5> </div>'
			let botoes = '<div class="form-group " style="justify-content:center"> <button class="btn btn-success"> <h6> Adicionar ao carrinho </h6> </button> </div>'
			strCards +=  '<div class="card" style="width:20%;height:30%; max-height:30%; margin:10px; text-align:center; align-self:center"> <div class="card-body">' + imagem + preco + botoes +  '</div> </div>'
		}
		$("#produtos")[0].innerHTML = strCards
	}
</script>