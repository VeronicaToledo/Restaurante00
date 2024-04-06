<?php
use "../model/conexao.php";

$select_table = "SELECT * FROM usuarios WHERE nivel LIKE '1'";
$select_table = mysqli_query($conn, $select_table);
$select_table = mysqli_fetch_assoc($select_table);

if($select_table['login'] != null){
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Restaurante</title>

    <link href="mvc/common/css/animate.min.css" rel="stylesheet"/><!--ESTE COMANDO CRIA A NOTIFICAÇÃO ANIMADA  -->
    <link href="mvc/common/css/bootstrap-datepicker.css" rel="stylesheet"/>
    <link rel="shortcut icon"  href="mvc/common/img/beer.png"><!--este comando muda o icone da janela-->

    <!-- Custom fonts for this template-->
    <link href="mvc/common/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="mvc/common/css/sb-admin-2.min.css" rel="stylesheet">
    
</head>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 style="color: red;">Creación de administrador no autorizado!</h1>
                                    <h1 class="h4 text-gray-900 mb-4">Ya existe un administrador del sistema</h1>
                                    <h5>¡Solo puede haber un administrador del sistema! Él es
                                        quienregistra nuevos usuarios, contacta con
                                        él para agregarlo.<br>Si usted es el administrador y ha olvidado su
                                        contraseña, haga clic en el botón a continuación y responda
                                        la pregunta clave que quedó registrada al crear su inicio de sesión.</h5>
                                </div>

                                <form method="POST" action="recuperar_senha.php">


                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">

                                        </div>
                                    </div>

                                    <button style="color:white;"type="submit" class="btn btn-danger btn-user btn-block">
                                        Recuperar Contraseña
                                    </button>
                                    <hr>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="index.php">Regresar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
<?php }else{?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>e-Comandas</title>

    <link href="mvc/common/css/animate.min.css" rel="stylesheet"/><!--ESTE COMANDO CRIA A NOTIFICAÇÃO ANIMADA  -->
    <link href="mvc/common/css/bootstrap-datepicker.css" rel="stylesheet"/>
    <link rel="shortcut icon"  href="mvc/common/img/beer.png"><!--este comando muda o icone da janela-->

    <!-- Custom fonts for this template-->
    <link href="mvc/common/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="mvc/common/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body class="bg-gradient-primary">
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 style="color: red;">Crear Administrador</h1>
                                    <h1 class="h4 text-gray-900 mb-4">Registrar un administrador para su sistema!</h1>
                                    <h5>Complete los campos a continuación con un nombre de
                                        usuario y contraseña, luego escriba una pregunta
                                        que solo usted sepa responder. Se utilizará como seguridad
                                        para que puedas recuperar tu contraseña. </h5>
                                </div>
                                <form method="POST" action="cadastrar_administrador.php">
                                    <label></label>
                                    <input name="login" type="text"class="form-control text-center" placeholder="LOGIN">
                                    <label></label>
                                    <input name="senha" type="text" class="form-control text-center"
                                    placeholder="CONTRASEÑA">
                                    <label></label>
                                    <textarea name="pergunta" type="text" class="form-control text-center"
                                              placeholder="Escribe una pregunta" ></textarea>
                                    <label></label>
                                    <input name="resposta" type="text" class="form-control text-center"
                                    placeholder="RESPUESTA">
                                    <input name="nivel" type="hidden" value="1">

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                        </div>
                                    </div>

                                    <button style="color: white;" type="submit" class="btn btn-danger btn-user
                                    btn-block">
                                        Criar Administrador
                                    </button>
                                    <hr>

                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="index.php">Regresar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
}
?>
