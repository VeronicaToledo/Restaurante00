<?php


	session_start();
	
	use 'conexao.php';

	$id = $_GET['id'];
	
	$exclude_table = "DELETE FROM produtos WHERE id = '$id'";	
	$produto_excluido = mysqli_query($conn, $exclude_table);
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
    <title>exclui_products</title>
	</head>

	<body> 

	<?php

	if(mysqli_affected_rows($conn)!=-1){

		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Pdv/?view=tabela'>";
		$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>O Produto foi Excluido com Sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	}else{

		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Pdv/?view=tabela'>";	
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao excluir Produto <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	}?>

		
	</body>
</html>
<?php $conn->close(); ?>