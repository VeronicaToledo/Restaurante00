<link href="../common/css/bootstrap.min.css" rel="stylesheet"/>
<?php
session_start();

require_once "../model/conexao.php";

$id = $_GET['id'];
$total = $_GET['total'];
$hora = $_GET['hora'];

$tab_pedido = "SELECT * FROM pedido WHERE idmesa = $id";
$pedidos = mysqli_query($conn, $tab_pedido);

$tab_mesas = "SELECT * FROM mesas WHERE id_mesa = $id";
$mesas = mysqli_query($conn, $tab_mesas);
$rows_mesas = mysqli_fetch_assoc($mesas);

$i = $_SESSION['loginapp'];
if ($i == 1) {
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Título de la página</title>
    <link href="../common/css/bootstrap.min.css" rel="stylesheet"/>
</head>

<body>

<div class="row" style="background: #2d3339; height: 13%;">
    <h3 class="mb-12 " style="background: #2d3339; width: 5%; " ></h3>
    <a style="background: #2d3339; height: 100%; width: 23%; color: white; " type="button"
    href="app_mesas.php" class="btn btn-outline-light"><h4>voltar</h4></a>
    <h3 class="mb-12 " style="background: #2d3339; width: 16%; " ></h3>
    <h4  class="mb-12 text-center" style="color: white; width: 20%; ">Mesa <?php echo $id; ?></h4>
    <h3 class="mb-12 " style="background: #2d3339; width: 36%; " ></h3>
</div>
<div class="mb-12 " style=" height: 5%;" ></div>

<?php if (mysqli_num_rows($pedidos) != 0 && $rows_mesas['status'] == 2){?>

<h2 class="col-lg-12 text-center" style="color: black;">Horário do Último Pedido</h2>
<h2 class="col-lg-12 text-center" style="color: #da7016;"><?php echo $hora; ?></h2>
<div class="mb-12 " style=" height: 5%;" ></div>


    <div class="col-12 ">

        <form method="GET" action="app_categoria.php">
            <input name="id" type="hidden" id="id" value="<?php echo $id; ?>">
            <input class="btn btn-success" type="submit" style="width:100%; height:10%;
      color: white; font-size: 20px;" value="Adicionar Pedido">
        </form>

    </div>

    <div class="col-12 ">

        <form method="GET" action="app_pedidoatendido.php">
            <input name="id" type="hidden" id="id" value="<?php echo $id; ?>">
            <input class="btn btn-warning" type="submit"
      style="width:100%; height:10%;color: white; font-size: 20px;" value="Pedido Atendido">
        </form>

    </div>


    <table class="table">
    <caption>Lista de Pedidos</caption>
      <thead>
        <tr>
          <th scope="col" class="col-lg-1 "><b>Pedido</b> </th>
          <th scope="col" class="col-lg-1 "><b>Qtd</b> </th>
          <th scope="col" class="col-lg-1 "><b>Preço Unitário</b> </th>
          <th scope="col" class="col-lg-1 "><b>Obs</b> </th>
        </tr>
      </thead>
<?php
    while($rows_pedidos = mysqli_fetch_assoc($pedidos)){?>
      <tbody>
        <tr>
          <td style="color: #ac4549;"><b><?php echo $rows_pedidos['produto'];?></b></td>
          <td><?php echo $rows_pedidos['quantidade'];?></td>
          <td>R$ <?php echo $rows_pedidos['valor'];?></td>
          <td><?php echo $rows_pedidos['observacao'];?></td>
        </tr>
  <?php } ?>
            <tr>
              <th scope="row" id="totalAmount"><b>TOTAL:</b></th>
              <th scope="row" style="font-size: 18px; color: red;">R$ </th>
              <th scope="row" style="font-size: 18px; color: red;"><?php echo number_format($total, 2); ?></th>
            </tr>

        </tbody>
    </table>

<div class="mb-12 " style=" height: 10%;" ></div>


<?php }elseif (mysqli_num_rows($pedidos) != 0 && $rows_mesas['status'] == 3){?>

<h2 class="col-lg-12 text-center" style="color: black;">Horário do Último Pedido</h2>
<h2 class="col-lg-12 text-center" style="color: #da7016;"><?php echo $hora; ?></h2>
<div class="mb-12 " style=" height: 5%;" ></div>


    <div class="col-12 ">

        <form method="GET" action="app_categoria.php">
            <input name="id" type="hidden" id="id" value="<?php echo $id; ?>">
            <input class="btn btn-success" type="submit" style="width:100%;
            height:10%; color:white; font-size: 20px;" value="Adicionar Pedido">
        </form>

    </div>


    <table class="table">
      <caption>Lista de pedidos</caption>
      <thead>
        <tr>
          <th scope="col" class="col-lg-1 "><b>Pedido</b> </th>
          <th scope="col" class="col-lg-1 "><b>Qtd</b> </th>
          <th scope="col" class="col-lg-1 "><b>Preço Unitário</b> </th>
          <th scope="col" class="col-lg-1 "><b>Obs</b> </th>
        </tr>
      </thead>


<?php
    while($rows_pedidos = mysqli_fetch_assoc($pedidos)){?>
      <tbody>
        <tr>
          <td style="color: #ac4549;"><b><?php echo $rows_pedidos['produto'];?></b></td>
          <td><?php echo $rows_pedidos['quantidade'];?></td>
          <td>R$ <?php echo $rows_pedidos['valor'];?></td>
          <td><?php echo $rows_pedidos['observacao'];?></td>
        </tr>
  <?php } ?>
            <tr>
              <th scope="row"><b>TOTAL:</b></th>
              <th scope="col" style="font-size: 18px; color: red;">R$ </th>
              <th scope="col" style="font-size: 18px; color: red;"><?php echo number_format($total, 2);?></th>
            </tr>
        </tbody>
    </table>

<div class="mb-12 " style=" height: 10%;" ></div>


<?php }else{?>

<div class="mb-12 " style=" height: 5%;" ></div>
<div class="mb-12 text-center" style=" height: 15%; color: #45863f;" ><h1><b>Mesa Vazia</b></h1></div>


    <div class="col-12 " >

        <form method="GET" action="app_categoria.php">
            <input name="id" type="hidden" id="id" value="<?php echo $id; ?>">
            <input class="btn btn-success" type="submit" style="width:100%;
      height:10%; color: white; font-size: 20px;" value="Adicionar Pedido">
        </form>

    </div>

<?php }?>

<script src="../common/js/jquery-3.3.1.slim.min.js"></script>
<script src="../common/js/popper.min.js"></script>
<script src="../common/js/bootstrap.min.js"></script>

</body>
</html>

<?php
} else {
    header('Location: app_login.php');
}
?>
