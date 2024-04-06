<?php

$cor = $_SESSION['cor'];

$usuario = $_SESSION['user'];
?>
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


<!--INICIO DO BODY E INICIO DA CHAMADA DOS SCRIPTS JS!-->
<body id="page-top">

  <!-- INICIO DA CHAMADA DA CLASSE JQUERY-->
  <!-- Bootstrap core JavaScript-->
  <script src="mvc/common/vendor/jquery/jquery.min.js"></script>
  <script src="mvc/common/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="mvc/common/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="mvc/common/js/sb-admin-2.min.js"></script>
  <!-- FIM DA CHAMADA DA CLASSE JQUERY-->

  <script src="mvc/common/vendor/chart.js/Chart.min.js"></script>

  <script src="mvc/common/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="mvc/common/js/bootstrap-datepicker.min.js"></script>
  <script src="mvc/common/js/bootstrap-datepicker.pt-BR.min.js"></script>
<!-- FIM DA CHAMADA DOS SCRIPTS JS!-->


  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-<?php echo $cor;?> sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?view=Dashboard1">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-print"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Restaurante</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->


      <li class="nav-item active">
        <a class="nav-link"  href="?view=Dashboard1">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Mesas</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="?view=delivery">
          <i class="fa fa-motorcycle"></i>
          <span>Delivery</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Grupo 1
      </div>


      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse"
        data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>HERRAMENTAS</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Grupo de Herramentas</h6>
            <a class="collapse-item" href="#" data-toggle="modal"
            data-target="#calculadora" style=" border-radius: 8px; font-size:18px;">Calculadora</a>
            <a class="collapse-item" href="http://localhost/Pdv/Agenda"
            style=" border-radius: 8px; font-size:18px;">Agenda</a>
            
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Grupo 2
      </div>

      
      <li class="nav-item active">
        <a class="nav-link collapsed"  href="#"
        data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>GESTIÓN</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestión</h6>
            <a class="collapse-item" href="?view=estoque" style=" border-radius: 8px; font-size:18px;">Estoque</a>
            <a class="collapse-item" href="?view=financeiro" style=" border-radius: 8px; font-size:18px;">Financiero</a>
            <a class="collapse-item" href="?view=cards" style=" border-radius: 8px; font-size:18px;">Tipo</a>

          </div>
        </div>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item active">
        <a class="nav-link" href="?view=tabela">
          <i class="fas fa-fw fa-table"></i>
          <span>Produtos</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item active">
        <a class="nav-link" href="?view=clientes">
          <i class="fas fa-fw fa-user"></i>
          <span>Clientes</span></a>
      </li>



      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">


              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
              aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
 

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - user Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="mvc/common/img/user.png" alt="Usuario">
                <label style="width: 15px;"></label>
                <span class="text-center" style=" font-size: 25px; color: #888888;"><b><?php echo $usuario;?></b></span>
                
              </a>
              <!-- Dropdown - user Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                <a style=" font-size: 20px; color: #888888;" class="dropdown-item" href="#"
                data-toggle="modal" data-target="#CadastroModal">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Registrar Usuario
                </a>

                <a style=" font-size: 20px; color: #888888;" class="dropdown-item" href="#"
                data-toggle="modal" data-target="#ConfiguraçaoModal">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Ajustes
                </a>

                <div class="dropdown-divider"></div>
                <a style=" font-size: 20px; color: #888888;" class="dropdown-item" href="#"
                data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">



<!-- Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: red;"><b>Salir do Sistema</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 class="text-center"><b>¿Estás seguro de que quieres salir del sistema??</b></h5>
      </div>
      <div class="modal-footer">
        <form method="POST" action="../pdv/mvc/model/logout.php">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger">Sim!</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="ConfiguraçaoModal" tabindex="-1" role="dialog" aria-labelledby="ConfiguraçaoModal"
aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: red;"><b>Ajustes</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
        <h5 style="padding: 5%;" class="text-center"><b> Establecer el color de las pestañas.:</b></h5>
        <div class="text-center">
          <form method="POST" action="../pdv/mvc/model/cor_e_quantidade_de_mesas.php">
            <input type="radio" name="cor" value="1">&nbsp;&nbsp;VERDE &nbsp;&nbsp;
            <input type="radio" name="cor" value="2">&nbsp;&nbsp;ROJO &nbsp;&nbsp;
            <input type="radio" name="cor" value="3">&nbsp;&nbsp;AMARILLO &nbsp;&nbsp;
            <input type="radio" name="cor" value="4">&nbsp;&nbsp;CIAN &nbsp;&nbsp;
            <input type="radio" name="cor" value="5">&nbsp;&nbsp;AZUL &nbsp;&nbsp;
            <hr>

          <h5 style="padding: 5%;" class="text-center"><b> Define el número de mesas de tu establecimiento:</b></h5>
          <input class="text-center" type="number" name="quant" required="required" placeholder="Cantidad de mesas...">
          <hr>
          <input class="btn btn-success" type="submit" name="submit" value="Actualizar">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="CadastroModal" tabindex="-1" role="dialog" aria-labelledby="CadastroModal"
aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: red;"><b>Registrar Usuario</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../pdv/mvc/model/cadastrar.php">

          <label>Nome de Usuario:</label>
          <input type="text" class="form-control" name="nome" required="required" placeholder="username">

          <label>Contraseña:</label>
          <input type="password" class="form-control" name="senha" required="required" placeholder="Contraseña">

          <label>Confirmar Contraseña:</label>
          <input type="password" class="form-control" name="senha2" required="required"
          placeholder="Confirmar Contraseña">

          <input type="submit" class="btn btn-success" name="submit" value="Registrar">

        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="calculadora" tabindex="-1" role="dialog" aria-labelledby="calculadora" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: red;"><b>Calculadora</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe src="http://localhost/calculadora/" width="100%" height="400px"title="Calculadora"></iframe>
      </div>
    </div>
  </div>
</div>

<!-- /.container-fluid -->

</div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="text-center my-auto">
              <span>Restaurante © 2024</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

  </div>
  <!-- End of Wrapper -->
</body>
</html>
