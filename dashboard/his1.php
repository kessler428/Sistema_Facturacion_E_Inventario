<?php
  include_once "./Views/parte_superior.php"
?>

<?php
    include_once 'bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();
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

<?php
    //$consul = "SELECT IDFactura, cliente, codigoRUCcedula, fechaEmision, Timespace, Total, montopagado, cambio FROM factura WHERE AlmacenNumero = 1 AND IsVisible = 1";
    $consul = "SELECT factura.IDFactura, cata.Primer_Nombre_Empresa as cliente, factura.fechaEmision, factura.Timespace, cata.NumeroRUC_Cedula as codigoRUCcedula ,factura.Total, factura.montopagado, factura.cambio, factura.tipofac FROM factura INNER JOIN catalogodatos as cata ON cata.IDcatalogoDatos = factura.cliente WHERE factura.AlmacenNumero = 1 AND factura.IsVisible = 1";

    $consulta = $consul;
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

?>    
    <div class="card">
        <h5 class="card-header">Historial de Factura</h5>
            <div class="card-body">
                <div class="table-responsive" style="margin-end:10px">
                    <table id="tablaproducts" class="ui celled table" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th hidden>id</th>
                                <th>Cliente</th>
                                <th>Codigo RUC / Cedula</th>
                                <th>Total</th>
                                <th>Fecha</th>
                                <th>Opcion</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                        foreach ($data as $dat) {
                            ?>
                            <tr>
                                <td hidden><?php echo $dat['IDFactura'] ?></td>
                                <td><?php echo $dat['cliente'] ?></td>
                                <td ><?php echo $dat['codigoRUCcedula'] ?></td>
                                <td><?php echo $dat['Total'] ?></td>
                                <td><?php echo $dat['Timespace'] ?></td>
                                <th></th>
                            </tr>
                            <?php
                        }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>

<div class="modal fade bd-example-modal-sm" tabindex="-1" id = "modal" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="card">
                <div class="card-header">
                    Detalles
                </div>
                <div class="card-body">
                <table id="detalles" class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">Cant.</th>
                      <th>Nombre Articulo</th>
                      <th>Codigo 1</th>
                      <th style="width: 40px">Precio</th>
                    </tr>
                  </thead>
                  <tbody id="tablita" name = "tablita">
                  </tbody>
                </table>
                <div class="card-footer">
                    <button type="button" class="btn btn-warning btnsalir" data-dismiss="modal">Salir</button>
                    
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<?php
  include_once "./Views/parte_inferior.php"
?>

<script src="JS/tiendas.js"></script>

<style>
.card-header {
  background: #9ca2aa;
}

.btn-warning {
  margin-top: 32px;
}

@media (min-width: 576px) {
  .modal-sm {
    /* max-width: 0; */
    max-width: 500px;
  }
}

.callout {
  border-left-width: 0px;
  margin-left: 17px;
  margin-right: 15px;
}

.btn-warning {
  margin-left: 163px;
  margin-top: 0px;
  border-bottom-width: 0px;
  border-top-width: 0px;
}

</style>