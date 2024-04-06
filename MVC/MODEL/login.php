<?php
session_start();

require_once 'conexao.php';
$login = $_POST['login'];
$senha = $_POST['senha'];

define('REDIRECT_URL', 'http://localhost/pdv/?view=Dashboard1');

if ($login != null && $senha != null) {
    $select_table = "SELECT * FROM usuarios WHERE login LIKE '$login'";
    $verifica_tabela = mysqli_query($conn, $select_table);

    $verifica_tabela = mysqli_fetch_assoc($verifica_tabela);

    if($verifica_tabela['senha'] == $senha && $verifica_tabela['login'] == $login){

        if($verifica_tabela['nivel'] == 1 || $verifica_tabela['nivel'] == 2){

            $_SESSION['login'] = 1;
            $_SESSION['user'] = $login;
        }else{

            $_SESSION['login'] = 0;
            $_SESSION['msg'] = "<div class='alert alert-info' role='alert'>¡Su contraseña e
            inicio de sesión son correctos! <br> Sin embargo, usted no tiene acceso al sistema
            POS, ¡solo a la aplicación!</div>";
        }

    }else{
        $_SESSION['login'] = 0;
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>No puedo iniciar sesión
        <br> ¡Comprueba tu contraseña e inicia sesión! </div>";
    }
}else{
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>¡No fue posible iniciar
    sesión porque la contraseña o el inicio de sesión están en blanco! </div>";
}

header("Location: " . REDIRECT_URL);

