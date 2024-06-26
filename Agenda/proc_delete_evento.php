<?php
session_start();
// Incluir conexión con el BD
require_once 'conexao.php';

// Constantes para las ubicaciones de redirección
define('REDIRECT_LOCATION_INDEX', 'Location: index.php');
define('REDIRECT_LOCATION', REDIRECT_LOCATION_INDEX);

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$color = filter_input(INPUT_POST, 'color', FILTER_SANITIZE_STRING);
$start = filter_input(INPUT_POST, 'start', FILTER_SANITIZE_STRING);
$end = filter_input(INPUT_POST, 'end', FILTER_SANITIZE_STRING);

if (!empty($id) && !empty($title) && !empty($color) && !empty($start) && !empty($end)) {
    // Convertir la fecha y hora al formato de la base de datos
    $data = explode(" ", $start);
    list($date, $hora) = $data;
    $data_sem_barra = array_reverse(explode("/", $date));
    $data_sem_barra = implode("-", $data_sem_barra);
    $start_sem_barra = $data_sem_barra . " " . $hora;

    $data = explode(" ", $end);
    list($date, $hora) = $data;
    $data_sem_barra = array_reverse(explode("/", $date));
    $data_sem_barra = implode("-", $data_sem_barra);
    $end_sem_barra = $data_sem_barra . " " . $hora;

    $result_events = "DELETE FROM atividade WHERE id='$id'";
    // Alterar los datos en la BD con las variables del formulario de edición
    $resultado_events = mysqli_query($conn, $result_events);

    // Verificar si se alteró en la base de datos usando "mysqli_affected_rows"
    if (mysqli_affected_rows($conn)) {
        $_SESSION['msg'] = "<div class='alert alert-info'
        role='alert'>Evento excluído com sucesso! <button type='button' class='close' data-dismiss='alert'
        aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
    } else {
        $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>O Evento
        Selecionado não existe! <button type='button' class='close'
        data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
    }

} else {
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro ao excluir o
    evento! - um ou mais campos não foram enviados corretamente para o banco de dados!
    <button type='button' class='close' data-dismiss='alert'
    aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
}

header(REDIRECT_LOCATION);
exit(); // Termina el script después de la redirección

