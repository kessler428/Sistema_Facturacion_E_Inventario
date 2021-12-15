<?php
  include_once "./Views/parte_superior.php"
?>

<?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$inicio = $_GET["inicio"];
$final = $_GET["final"];
$tienda = $_GET["tienda"];

$consul = "SELECT deta.IDFacturaDetalle,
                  deta.Unidades, 
                  deta.precioCompra,
                  CONCAT(al.NombreArticulo, ' - ', al.Modelopresentacion) as NombreArticulo,
                  deta.Precio, 
                  (deta.Unidades * deta.precioCompra) as preciototalcompra, 
                  (deta.precio - (deta.Unidades * deta.precioCompra)) as Ganancias, 
                  deta.TimeSpace, fac.Total from detalledefactura as deta
                  
                  INNER JOIN almacen as al ON al.IDCodigoAlmacen = deta.producto
                  INNER JOIN factura as fac ON fac.IDFactura = deta.IDFacturaPK
                  WHERE al.IsVisible = 1 AND fac.isVisible = 1 and fac.AlmacenNumero = '$tienda' AND deta.TimeSpace BETWEEN '$inicio' AND '$final'";
$consulta = $consul;
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);

$consulta = "SELECT deta.IDFacturaDetalle, 
                    deta.Unidades,
                    SUM(deta.Unidades) as sumauni,
                    al.NombreArticulo, 
                    deta.Precio, 
                    (deta.Unidades * deta.precioCompra) as preciototalcompra, 
                    (deta.precio - (deta.Unidades * deta.precioCompra)) as Ganancias, 
                    SUM((deta.precio - (deta.Unidades * deta.precioCompra))) as sumat,
                    deta.TimeSpace from detalledefactura as deta 
                    INNER JOIN almacen as al ON al.IDCodigoAlmacen = deta.producto
                    INNER JOIN factura as fac ON fac.IDFactura = deta.IDFacturaPK
                    WHERE al.IsVisible = 1 and fac.AlmacenNumero = '$tienda' AND deta.TimeSpace BETWEEN '$inicio' AND '$final'";

$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data1=$resultado->fetchAll(PDO::FETCH_ASSOC);

?>
<!-- EL MERO INDEX -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Total de Almacenes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inventario</a></li>
              <li class="breadcrumb-item active">Almacenes</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  
<div class="card">
    <div class="card-header">
      Reportes
    </div>
    <div class="card-body">
      <table class="table table-striped" id="tablaproductos" style="width:100%">
          <thead class="thead-light">
              
              <tr>
                  <th>N°</th>
                  <th>Unidades</th>   
                  <th>Producto</th>
                  <th>Ganancias</th>
                  <th>Fecha</th>
              </tr>
          </thead>
          <tbody>
              <?php $i = 1; foreach ($data as $dat) { ?>
              <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $dat['Unidades']; ?></td>                
                  <td><?php echo $dat['NombreArticulo']; ?></td>             
                  <td><?php echo $dat['Ganancias']; ?></td>
                  <td><?php echo $dat['TimeSpace']; ?></td>                  
              </tr>                        
              <?php } ?>
          </tbody>
          <tfoot>
              <tr>
                  <th>Cantidades:</th>
                  <th><?php echo $data1[0]["sumauni"]; ?></th>
                  <th></th>
                  <th>TOTAL: <?php echo $data1[0]["sumat"]; ?> </th>
              </tr>
          </tfoot>
      </table>
    </div>
  </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  
<?php
  include_once "./Views/parte_inferior.php"
?>

<script>

$(document).ready(function() {
  table = $("#tablaproductos").DataTable({
           
      "order": [
          [1, 'asc']
      ],
      "language": {
          "lengthMenu": "Mostrar _MENU_ registros",
          "zeroRecords": "No se encontraron resultados",
          "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
          "infoFiltered": "(filtrado de un total de _MAX_ registros)",
          "sSearch": "Buscar:",
          "oPaginate": {
              "sFirst": "Primero",
              "sLast": "Último",
              "sNext": "Siguiente",
              "sPrevious": "Anterior"
          },
          "sProcessing": "Procesando...",
      },
      "lengthMenu": [ 10, 25, 50, 75, 100, 200, 500 ]
  });

  
  new $.fn.dataTable.Buttons( table, {
        buttons: [
            { extend: 'pdfHtml5', footer: true }
        ]   
    });

    table.buttons( 0, null ).container().prependTo(
      table.table().container()
    );


});

</script>


<style>
.card-header {
  background: #9ca2aa;
}

.layout-navbar-fixed .wrapper .content-wrapper {
  margin-top: 0px;
}

</style>