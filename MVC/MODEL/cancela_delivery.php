<?php
$idpedido = $_POST['idpedido'];

use "conexao.php";


	$exclude_table = "DELETE FROM pedido WHERE idpedido = '$idpedido'";	
	$pedido_excluido = mysqli_query($conn, $exclude_table);

	header("Location: http://localhost/pdv/?view=pedidos_delivery");
?>