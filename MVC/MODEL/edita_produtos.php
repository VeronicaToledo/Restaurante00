<?php
 
	session_start();
	
	use 'conexao.php';

	//recebe o valor que vem da tag [<input name="nome" type="text" class="form-control" id="recipient-name">]
	//recebe o valor que vem da tag [<textarea name="detalhes" class="form-control" id="detalhes-text"></textarea>]
	//recebe o valor que vem da tag invisivel [<input name="id" type="hidden" id="id_Produto">]
	
	//$nome = $POST['nome'];
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$codigo = mysqli_real_escape_string($conn, $_POST['codigo']);
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);// proteção contra sql injection
	$detalhes = mysqli_real_escape_string($conn, $_POST['detalhes']);
	$categoria = mysqli_real_escape_string($conn, $_POST['categoria']);
	$preco_custo = mysqli_real_escape_string($conn, $_POST['preco_custo']);
	$preco_custo = str_replace(',', '.', $preco_custo);
	$preco_venda = mysqli_real_escape_string($conn, $_POST['preco_venda']);
	$preco_venda = str_replace(',', '.', $preco_venda);
	$estoque_atual = mysqli_real_escape_string($conn, $_POST['estoque_atual']);
	$estoque_minimo = mysqli_real_escape_string($conn, $_POST['estoque_minimo']);
	$data_compra = mysqli_real_escape_string($conn, $_POST['data_compra']);
	$data_compra = str_replace('-', '/', $data_compra);
	$data_validade = mysqli_real_escape_string($conn, $_POST['data_validade']);
	$data_validade = str_replace('-', '/', $data_validade);
	$unidade = mysqli_real_escape_string($conn, $_POST['unidade']);
	$marca = mysqli_real_escape_string($conn, $_POST['marca']);
	$fornecedor = mysqli_real_escape_string($conn, $_POST['fornecedor']);
	$observacoes = mysqli_real_escape_string($conn, $_POST['observacoes']);
	$categoria = strtoupper($categoria);

	//echo "$id - $nome - $detalhes";

	$insert_table = "UPDATE produtos SET  
	nome = '$nome', 
	categoria = '$categoria', 
	detalhes = '$detalhes', 
	codigo = '$codigo', 
	preco_custo = '$preco_custo', 
	preco_venda = '$preco_venda', 
	estoque_atual = '$estoque_atual', 
	estoque_minimo = '$estoque_minimo', 
	data_compra = '$data_compra', 
	data_validade = '$data_validade', 
	unidade = '$unidade', 
	marca = '$marca', 
	fornecedor = '$fornecedor', 
	observacoes = '$observacoes'
	 WHERE id = $id";	
	$produtos_editados = mysqli_query($conn, $insert_table);

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title></title>
</head>
<body>
	<?php

	if(mysqli_affected_rows($conn)!=-1){

		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Pdv/?view=tabela'>";
		$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>O Produto foi Editado com Sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	}else{

		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Pdv/?view=tabela'>";	
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao Editar Produto <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	}?>


</body>
</html>

<?php $conn->close(); ?>