<?php

session_start();

use 'conexao.php';

$rendimento = $_POST['rendimento'];

$data = $_POST['data'];

$cliente = $_POST['cliente'];

$valor = $_POST['valor'];



$insert_table = "INSERT INTO vendas (valor, cliente, rendimento, data) VALUES ('$valor', '$cliente', '$rendimento', '$data')";
$cadastra_despesa = mysqli_query($conn, $insert_table);

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
    <title>solorendimiento</title>
	</head>

	<body> 

	<?php

	if(mysqli_affected_rows($conn)!=-1){

		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Pdv/?view=financeiro'>";
		$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Ingresos registrados exitosamente<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	}else{

		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Pdv/?view=financeiro'>";	
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Error al registrar ingresos <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	}?>

		
	</body>
</html>
<?php $conn->close(); ?>