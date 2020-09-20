
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
			let imagem = '<div class="form-group"> <img src=' + <?php echo '"'.base_url("/assets/img/").'"';?> + JSONProdutos[i].imagem + '  style="width:50%;height:50%"> </div>'
			let preco = '<div class="form-group"> <div class="row"> <h6 >' + JSONProdutos[i].nome + '</h6> </div> <h5> <b> R$' + parseFloat(JSONProdutos[i].preço).toFixed(2) +  ' </b> </h5> </div>'
			let botoes = '<div class="form-group " style="justify-content:center"> <button class="btn btn-success"> Adicionar a sacola </button> </div>'
			strCards +=  '<div class="card" style="width:30%;height:40%; margin:10px; text-align:center; align-self:center"> <div class="card-body">' + imagem + preco + botoes +  '</div> </div>'
		}
		$("#produtos")[0].innerHTML = strCards
	}
</script>