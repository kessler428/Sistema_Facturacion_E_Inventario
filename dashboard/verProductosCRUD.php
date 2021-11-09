<?php
  include_once "./Views/parte_superior.php"
?>
<!-- EL MERO INDEX -->

<?php
    include_once 'bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta = "SELECT al.IDCodigoAlmacen, 
    al.Codigo1, 
    al.Codigo2, 
    al.NombreArticulo, 
    al.Modelopresentacion, 
    al.precioVenta, 
    al.PrecioCompra, 
    uno.Stock, 
    al.Marca, 
    al.Notas,
    uno.Stock as almacenuno
FROM almacen as al 
INNER JOIN almacenuno as uno on uno.IDCodigoAlmacenPK = al.IDCodigoAlmacen 
INNER JOIN almacendos as dos on dos.IDCodigoAlmacenPK = al.IDCodigoAlmacen
INNER JOIN almacentres as tres on tres.IDCodigoAlmacenPK = al.IDCodigoAlmacen
INNER JOIN almacencuatro as cuatro on cuatro.IDCodigoAlmacenPK = al.IDCodigoAlmacen
WHERE al.IsVisible = 1
";

    //$consulta = "SELECT IDCodigoAlmacen, Codigo1, Codigo2, NombreArticulo, Modelopresentacion, precioVenta, PrecioCompra, Stock, Marca, Notas FROM almacen as al where IsVisible = 1";
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
                                        <th>Nombre</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Precio Venta</th>
                                        <th>Precio Compra</th>
                                        <th>Comentario</th>
                                        <th>Stock</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($data as $dat) {
                                    ?>
                                        <tr>
                                            <td hidden><?php echo $dat['IDCodigoAlmacen'] ?></td>
                                            <td><?php echo $dat['Codigo1'] ?></td>
                                            <td><?php echo $dat['NombreArticulo'] ?></td>
                                            <td><?php echo $dat['Marca'] ?></td>
                                            <td><?php echo $dat['Modelopresentacion'] ?></td>
                                            <td><?php echo number_format($dat['precioVenta'], 2, '.', ''); ?></td>
                                            <td><?php echo number_format($dat['PrecioCompra'], 2, '.', ''); ?></td>                                    
                                            <td><?php echo $dat['Notas'] ?></td>
                                            <td><?php echo $dat['Stock'] ?></td>
                                            <td></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
            </div>
      </div>
    </div>
    
<div class="modal fade bd-example-modal-lg" id="modaUpdate" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form id="formPersonas">    
            <div class="modal-body">
              <input type="text" hidden id="idalmacen" name="idalmacen">

              <div class="form-row">
                  <div class="form-group col-md-4">
                      <label for="inputCity">Nombre</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" required>
                  </div>
                  <div class="form-group col-md-4">
                      <label for="inputState">Codigo 1</label>
                      <input type="text" class="form-control" id="codigo1" required>
                  </div>
                  <div class="form-group col-md-4">
                      <label for="inputState">Stock</label>
                      <input type="text" class="form-control" id="Stock" required>
                  </div>

              </div>
              <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Marca</label>
                    <input type="text" class="form-control" id="marca" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Modelo / Presentacion</label>
                    <input type="text" class="form-control" id="modelopresentacion" required>
                </div>
            </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputCity">Precio  de Venta</label>
                        <input type="number" class="form-control" id="pventa" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputState">Precio de Compra</label>
                        <input type="number" class="form-control" id="pcompra" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Comentario</label>
                      <input type="text" class="form-control" id="comentario">
                    </div>
                </div>        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>
    </div>
  </div>
</div>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="JS/EditarProducto.js"></script>


<script>    

    $(document).ready(function() {
      tablaproductos = $("#tablaproductos").DataTable({
          "columnDefs": [{
              "targets": -1,
              "data": null,              
              "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar' data-toggle='modal' data-target='.bd-example-modal-lg'>Editar</button>&nbsp;&nbsp;&nbsp;<button class='btn btn-danger btnEliminar'>Eliminar</button></div>"
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