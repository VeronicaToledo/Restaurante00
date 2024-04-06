<?php
session_start();
require_once 'conexao.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepara la consulta SQL para eliminar un cliente por su ID
    $sql = "DELETE FROM clientes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
        O Cliente foi Excluido com Sucesso<button type='button'class='close' data-dismiss='alert'
        aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao excluir Cliente<button
        type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>
        &times;</span></button></div>";
    }

    // Redirige a la página de clientes después de eliminar
    header("Location: http://localhost/Pdv/?view=clientes");
    exit(); // Termina el script después de la redirección
} else {
    // Si no se proporciona un ID, redirige de vuelta a la página de clientes
    header("Location: http://localhost/Pdv/?view=clientes");
    exit(); // Termina el script después de la redirección
}

// Cierra la conexión a la base de datos
$conn->close();

