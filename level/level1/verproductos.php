<?php
  include_once "./Views/parte_superior.php"
?>
<!-- EL MERO INDEX -->

<?php
    include_once 'bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta = "SELECT al.IDCodigoAlmacen, al.Codigo1, al.Codigo2, al.NombreArticulo, al.Modelopresentacion, al.precioVenta, uno.Stock, al.Marca, al.Notas FROM almacen as al INNER JOIN almacenuno as uno ON uno.IDAlmacenuno = al.IDCodigoAlmacen where al.IsVisible = 1";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Lista de Productos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Inventario</a></li>
             <li class="breadcrumb-item active">Ver Producto</li>
           </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
 

    <div class="card">
        <div class="card-header">
            Almacenes
        </div>
        <div class="card-body">
            <div class="table-responsive"  style="margin-end:10px">
                            <table id="tablaproductos" class="ui celled table" style="width:100%">
                                <thead class="text-center">
                                    <tr>
                                        <th hidden>id</th>
                                        <th>Codigo 1</th>
                                        <th>Codigo 2</th>
                                        <th>Nombre</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Precio Venta</th>
                                        <th hidden>Precio Compra</th>
                                        <th>Comentarios</th>
                                        <th hidden></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($data as $dat) {
                                    ?>
                                        <tr>
                                            <td hidden><?php echo $dat['IDCodigoAlmacen'] ?></td>
                                            <td><?php echo $dat['Codigo1'] ?></td>
                                            <td><?php echo $dat['Codigo2'] ?></td>
                                            <td><?php echo $dat['NombreArticulo'] ?></td>
                                            <td><?php echo $dat['Marca'] ?></td>
                                            <td><?php echo $dat['Modelopresentacion'] ?></td>
                                            <td><?php echo number_format($dat['precioVenta'], 2, '.', ''); ?></td>
                                            <td hidden><?php echo number_format($dat['PrecioCompra'], 2, '.', ''); ?></td>                                   
                                            <td><?php echo $dat['Notas'] ?></td>
                                            <td hidden><?php echo $dat['Notas'] ?></td>
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


<script>    

    $(document).ready(function() {
      tablaproductos = $("#tablaproductos").DataTable({
        "columnDefs": [{
              "targets": -1,
              "data": null
          }],
        
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
          }
      });
    });
</script>

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