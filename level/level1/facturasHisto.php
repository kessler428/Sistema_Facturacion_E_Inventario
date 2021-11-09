<?php
  include_once "./Views/parte_superior.php"
?>

<?php
    include_once 'bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consul = "SELECT fac.IDFactura, 
                      fac.Total, 
                      fac.fechaEmision, 
                      fac.montopagado, 
                      
                      al.NombreArticulo as producto
                  FROM factura as fac 
                  INNER JOIN detalledefactura as deta ON deta.IDFacturaPK = fac.IDFactura 
                  INNER JOIN almacen as al ON al.IDCodigoAlmacen = deta.producto
                  WHERE fac.AlmacenNumero = 1
                ";

    $consulta = $consul;
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- EL MERO INDEX -->

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tablero Principal</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Tablero</a></li>
              <li class="breadcrumb-item active">Historial de Factura</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="card">
        <div class="card-header">
            Hostorial de Facturas
        </div>
        <div class="card-body">
            <div class="table-responsive"  style="margin-end:10px">
                            <table id="tablaproductos" class="ui celled table" style="width:100%">
                                <thead class="text-center">
                                    <tr>
                                        <th>id</th>
                                        <th>Fecha de Facturacion</th>
                                        <th>Total Vendido</th>
                                        <th>Monto Pagado</th>
                                        <th>Producto</th>
                                        <th hidden></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($data as $dat) {
                                    ?>
                                        <tr>
                                            <td><?php echo $dat['IDFactura'] ?></td>
                                            <td><?php echo $dat['fechaEmision'] ?></td>
                                            <td><?php echo $dat['Total'] ?></td>
                                            <td><?php echo $dat['montopagado'] ?></td>
                                            <td><?php echo $dat['producto'] ?></td>
                                            <td hidden></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
            </div>
      </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="JS/histo.js"></script>
  
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


/* adminlte.min.css | http://localhost/administracion/Virtual_Innova/dashboard/Views/dist/css/adminlte.min.css */

.layout-navbar-fixed .wrapper .content-wrapper {
  /* margin-top: calc(3.5rem + 1px); */
  /* margin-top: calc\(3.5rem +; */
  /* margin-top: calc\(3.5rem; */
  /* margin-top: calc\(3.5re; */
  /* margin-top: calc\(3.5r; */
  /* margin-top: calc\(3.5; */
  /* margin-top: calc\(3.; */
  /* margin-top: calc\(3; */
  /* margin-top: calc\(; */
  margin-top: 0px;
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
</style>