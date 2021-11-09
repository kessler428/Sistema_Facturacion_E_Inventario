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
            <h1>Tablero Tienda <?php echo $_GET["almacen"]; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Tiendas </a></li>
              <li class="breadcrumb-item active">Tienda <?php echo $_GET["almacen"]; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<?php
    include_once 'bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $numero = $_GET["almacen"];

    date_default_timezone_set("America/Costa_Rica"); // ("America/Santiago") por ejemplo
    $timestamp = time();
    $hoy = getdate($timestamp);   

    $fechaTime = $hoy['year']."/".$hoy['mon']."/".$hoy['mday'];
    $fecha = $hoy['year']."/".$hoy['mon']."/".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'].":".$hoy['seconds'];


    $consulta = "SELECT his.IDhis, al.NombreArticulo, al.Modelopresentacion, al.Marca,his.Stock, his.Numeroalmacen, his.Horainsertada FROM almacen as al INNER JOIN historialstock as his ON his.producto = al.IDCodigoAlmacen where his.Numeroalmacen = '$numero' AND his.TimeSpace = '$fechaTime'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>

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
                                        <th>Nombre</th>
                                        <th>Modelo</th>
                                        <th>Marca</th>
                                        <th>Stock</th>
                                        <th>Hora</th>
                                        <th hidden></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($data as $dat) {
                                    ?>
                                        <tr>
                                            <td hidden><?php echo $dat['IDhis'] ?></td>
                                            <td><?php echo $dat['NombreArticulo'] ?></td>
                                            <td><?php echo $dat['Modelopresentacion'] ?></td>
                                            <td><?php echo $dat['Marca'] ?></td>
                                            <td><?php echo $dat['Stock'] ?></td>
                                            <td><?php echo $dat['Horainsertada'] ?></td>
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
</style>

<script>    

    $(document).ready(function() {
      $("#tablaproductos").DataTable({
          "columnDefs": [{
              "targets": -1,
              "data": null,              
              "defaultContent": ""
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