<?php
  include_once "./Views/parte_superior.php"
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Clientes</h1>
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
            Clientes
        </div>
        <div class="card-body">
            <div class="table-responsive"  style="margin-end:10px">
                            <table id="tablaproductos" class="ui celled table" style="width:100%">
                                <thead class="text-center">
                                    <tr>
                                        <th>id</th>
                                        <th>Nombre</th>
                                        <th>Identificacion</th>
                                        <th>Direccion</th>
                                        <th>N° Telefono</th>
                                        <th>Email</th>
                                        <th>Comentario</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

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

<script>    

$(document).ready(function() {

    let url = "../dashboard/bd/Consultas2.php?valordeConsulta=4";

    tablaproductos = $("#tablaproductos").DataTable({
        "ajax": url,
        "columns": [
                { "data": "IDcatalogoDatos" },
                { "data": "Primer_Nombre_Empresa" },
                { "data": "NumeroRUC_Cedula" },
                { "data": "Direccion" },
                { "data": "Numero_Telefonico" },
                { "data": "Email" },
                { "data": "Comentario" },
                { "data": null }
        ],
          "columnDefs": [{
              "targets": -1,
              "data": null,              
              "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-success btnhis'>Historial</button></div>"
          }],
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

      
    $('#tablaproductos tbody').on( 'click', '.btnhis', function () {
        var data = tablaproductos.row( $(this).parents('tr') ).data();
        id = data.IDcatalogoDatos;
        window.location.href = "hisfacclien.php?id="+id;
    });   

});

</script>

<?php
  include_once "./Views/parte_inferior.php"
?>


<style>

.card-header {
  background: #9ca2aa;
}
.card {
  margin-left: -1px;
  margin-right: 0px;
}

</style>