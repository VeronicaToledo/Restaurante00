<?php
use "../model/conexao.php";

$tab_mesas = "SELECT * FROM mesas";
$mesas = mysqli_query($conn, $tab_mesas);
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

                                        <button style="color: white;" type="submit" class="btn btn-danger
                                        btn-user btn-block">
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

    <div class="row">
        <?php
        while($rows_mesas = mysqli_fetch_assoc($mesas)){
            $nome = utf8_encode($rows_mesas['nome']);
            $id_mesa = $rows_mesas['id_mesa'];

            if ($rows_mesas['status'] == 1) {
                $cor='card bg-success';
                $status = 'Livre';
                $link_mesas = "mesasLivres";
            }elseif ($rows_mesas['status'] == 2) {
                $cor='card bg-danger';
                $status = 'Em Espera';
                $link_mesas = "mesasLivres";
            }elseif ($rows_mesas['status'] == 3) {
                $cor='card bg-warning';
                $status = 'Atendida';
                $link_mesas = "mesasLivres";
            }

            //inicia a seleção da tabela pedido
            $tab_pedido = "SELECT * FROM pedido WHERE idmesa = $id_mesa";
            $pedido = mysqli_query($conn, $tab_pedido);

            $total = 0;

            while($row = mysqli_fetch_assoc($pedido)){
                //recebe e soma todos os pedidos
                $quantidade=$row['quantidade'];
                $valor=$row['valor'];

                if ($valor!== null && $quantidade!== null) {
                    $subtotal = $valor * $quantidade;
                    $total+=$subtotal;
                    //armazena o ultimo id de pedido feito pela mesma mesa
                    $idpedido=$row['idpedido'];
                    //recebe a hora do ultimo pedido
                    $hora=$row['hora_pedido'];
                }else {
                    $total = 0;
                }
            }
        ?>
        <div class="col-lg-2 " style="height: 150px;">
            <div class=" <?php echo $cor; ?> text-white shadow">
                <div class="card-body"  style="text-align: center;">
                    <h4 class="mb-10 text-center">Mesa <?php echo $id_mesa; ?></h4>
                    <form method="POST" action="?view=adicionar_pedido">
                        <input name="id" type="hidden" id="id" value="<?php echo $rows_mesas['id_mesa']; ?>">
                        <button type="submit" class="btn  btn-outline-light" style="text-align:center;"
                                data-toggle="modal"> Abrir <?php echo htmlspecialchars($id_mesa);?></button>
                    </form>
                </div>
            </div>
        </div>
        <?php
        }
        ?>

    </div>
    <script type="text/javascript">
        var var1= document.getElementById("mensagem");
        setTimeout(function() {
            var1.style.visibility = "hidden";
        },5000)
    </script>
</body>

</html>
