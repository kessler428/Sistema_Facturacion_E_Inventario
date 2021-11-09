<!DOCTYPE html>
<html lang="en">
<head>

<?php
session_start();

$validacion = "llantayrbravos@gmail.com";

if($_SESSION["s_usuario"] === null){
    header("Location: ../index.php");
}

if(strcmp($_SESSION["s_usuario"], $validacion)){
  header("Location: ../index.php");
}

?>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Innova Virtual</title>

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <link rel="stylesheet" href="Views/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="Views/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="Views/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="Views/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Views/dist/css/adminlte.css">
  <!-- Data TABLE -->

  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet"> 
  <link rel="stylesheet" type="text/css" href="  https://cdn.datatables.net/1.10.23/css/dataTables.material.min.css"/>

</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="Views/dist/img/avatar.png" alt="avatar" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="./index.php" class="nav-link">Inicio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="http://innovavirtual.es/" class="nav-link">Contactos</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">     
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-slide="true" href="../bd/logout.php">
          <i class="fas fa-sign-in-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="Views/dist/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">BRAVO´S</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="Views/dist/img/LogotipoInnova.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block">INNOVA VIRTUAL</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tablero
                <i class="right fas fa-angle-left"></i>
              </p>
              
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="reportealmacen.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reporte</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="creditos.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Creditos</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="deudaspagadas.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Creditos Cancelados</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a  href="#" class="nav-link">
              <i class="nav-icon fas fa-truck-loading"></i>
              <p>Inventario
                  <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="InsertarProductos.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Insertar de Productos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="verProductosCRUD.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver Productos</p>
                </a>
              </li>
              <!--<li class="nav-item">
                <a href="almacenes.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver Almacenes</p>
                </a>
              </li>-->
              <!--<li class="nav-item">
                <a href="cargar.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cargar Almacenes</p>-->
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-file-invoice"></i>
              <p>
                Facturas
                <i class="fas fa-angle-left right"></i>
                <!--<span class="badge badge-info right">6</span>-->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./Facturas.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Facturar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Clientes
                <i class="fas fa-angle-left right"></i>
                <!--<span class="badge badge-info right">6</span>-->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="datos.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Añadir Clientes</p>
                  </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="verclientes.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ver Clientes</p>
                  </a>
                </li>
            </ul>
          </li>

          <!-- Entramos -->

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-store"></i>
              <p>
                Tiendas
                <i class="fas fa-angle-left right"></i>
                <span class="right badge badge-danger"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="./tienda1.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tienda 1</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-toolbox"></i>
              <p>
                Configuración
                <i class="fas fa-angle-left right"></i>
                <!--<span class="badge badge-info right">6</span>-->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="passwordcon.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Contraseñas</p>
                  </a>
                </li>
            </ul>
          </li>
            </ul>
          </li>        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
