<?php
session_start();

use "conexao.php";

$id = $_POST['id'];

	$exclude_table = "DELETE FROM vendas WHERE id = '$id'";	
	$produto_excluido = mysqli_query($conn, $exclude_table);
?>



<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
    <title>exclui_rendimiento</title>
	</head>

	<body> 

	<?php

	if(mysqli_affected_rows($conn)!=-1){

		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Pdv/?view=financeiro'>";
		$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Rendimento Excluido com Sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	}else{

		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Pdv/?view=financeiro'>";	
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao excluir Rendimento <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	}?>

		
	</body>
</html>
<?php $conn->close(); ?>