<?php
  include_once "./Views/parte_superior.php"
?>

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tablero Tienda 1</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Tiendas </a></li>
              <li class="breadcrumb-item active">Tienda 1</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Inventario</h3>

                <p>Productos</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="./inv1.php" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id = "Facturashoy"></h3>

                <p>Facturas Realizadas</p>
              </div>
              <div class="icon">
                <i class="fas fa-file-invoice-dollar"></i>
              </div>
              <a href="his1.php" class="small-box-footer">Mas informacion<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 id = "Dinerocaja" name = "Dinerocaja"></h3>

                <p>Dinero en Caja HOY</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Mas Informacion <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id = "ganancias"></h3>

                <p>Inversion</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">
                Mas Informacion  <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        </div>

        <a href="./stockañadidos.php?almacen=1"><button type="button" class="btn btn-outline-primary btn-lg"><i class="fa fa-bell"></i> Stock Añadidos</button></a>
      </div>
    </section>
     
<?php
    include_once 'bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consul = "SELECT deta.IDFacturaDetalle, 
                      deta.Unidades, 
                      al.NombreArticulo, 
                      deta.Precio, 
                      (deta.Unidades * al.PrecioCompra) as preciototalcompra, 
                      (deta.precio - (deta.Unidades * al.PrecioCompra)) as Ganancias, 
                      deta.TimeSpace from detalledefactura as deta 
                      INNER JOIN almacen as al ON al.IDCodigoAlmacen = deta.producto
                      INNER JOIN factura as fac ON fac.IDFactura = deta.IDFacturaPK
                      WHERE al.IsVisible = 1 and fac.AlmacenNumero = 1";
    $consulta = $consul;
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="card">
    <div class="card-header color">
        Ventas 
    </div>
    
    <div class="card-body">
      <div class="table-responsive"  style="margin-end:10px">
        <table id="tablaproductos" class="ui celled table" style="width:100%">
          <thead class="text-center">
            <tr>
              <th hidden>id</th>
              <th>Unidades</th>
              <th>Nombre</th>
              <th>Precio</th>
              <th >Ganancias</th>
              <th >fecha</th>
              <th hidden>Comentario</th>                  
            </tr>
          </thead>
          <tbody>
          <?php foreach ($data as $dat) { ?>
              <tr>
                <td hidden><?php echo $dat['IDFacturaDetalle'] ?></td>
                <td><?php echo $dat['Unidades'] ?></td>
                <td><?php echo $dat['NombreArticulo'] ?></td>
                <td><?php echo $dat['Precio'] ?></td>
                <td><?php echo $dat['Ganancias'] ?></td>
                <td><?php echo $dat['TimeSpace'] ?></td>
                <td hidden><?php echo $dat['Notas'] ?></td>                      
              </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>  
</div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="JS/inv1.js"></script>
  
<?php
  include_once "./Views/parte_inferior.php"
?>

<style>

/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/Facturas.php */

.card-header {
  background: #9ca2aa;
}


/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/Facturas.php */

.btn-warning {
  margin-top: 32px;
}

/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/Facturas.php */

.btn-success {
  margin-right: 137px;
}


/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/almacenes.php */


/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/verProductosCRUD.php */

.card {
  margin-left: -1px;
  margin-right: 0px;
}


/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/tienda1.php */

button.btn:nth-child(2) {
  margin-bottom: 12px;
}

</style>

