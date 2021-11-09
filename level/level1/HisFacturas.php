<?php
  include_once "./Views/parte_superior.php"
?>
<!-- EL MERO INDEX -->

<?php

    include_once 'bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consul = "SELECT factura.IDFactura, cata.Primer_Nombre_Empresa as cliente, factura.fechaEmision, cata.NumeroRUC_Cedula as codigoRUCcedula ,factura.Total, factura.montopagado, factura.cambio, factura.tipofac FROM factura INNER JOIN catalogodatos as cata ON cata.IDcatalogoDatos = factura.cliente WHERE factura.AlmacenNumero = 1 AND factura.IsVisible = 1";

    $consulta = $consul;
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

?>

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registros de ventas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Factura</a></li>
              <li class="breadcrumb-item active">Historial de Factura</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  <div class="card">
    <h5 class="card-header"></h5>
    <div class="card-body">
      <div class="table-responsive" style="margin-end:10px">
                      <table id="tablaproductos" class="ui celled table" style="width:100%">
                          <thead class="text-center">
                              <tr>
                                  <th hidden>id</th>
                                  <th>Cliente</th>
                                  <th>Ruc</th>
                                  <th>Fecha</th>
                                  <th>Total</th>
                                  <th>Monto</th>
                                  <th>Tipo</th>
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
                                      <td><?php echo $dat['codigoRUCcedula'] ?></td>
                                      <td><?php echo $dat['fechaEmision'] ?></td>
                                      <td ><?php echo $dat['Total'] ?></td>
                                      <td><?php echo $dat['montopagado'] ?></td>
                                      <td><?php 
                                      if($dat['tipofac'] == 1){
                                        echo "Contado";
                                      }else{
                                        if($dat['tipofac'] == 2){
                                          echo "Credito";
                                        }else{
                                          echo "Tarjeta";
                                        }
                                      }
                                      
                                      ?></td>
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
    </div>
  </div>

  <!-- ABrir el modal -->

  <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
              </div>
              <div class="card-footer">
                    <button type="button" class="btn btn-warning btnsalir" data-dismiss="modal">Salir</button>
                </div>
            </div>
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


/* En línea #11 | http://localhost/administracion/Virtual_Innova/level/level1/HisFacturas.php */

@media (min-width: 576px) {
  .modal-sm {
    /* max-width: 0; */
    max-width: 500px;
  }
}
.btn-warning {
  margin-left: 163px;
  margin-top: 0px;
  border-bottom-width: 0px;
  border-top-width: 0px;
}



/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/Facturas.php */

.btn-success {
  margin-right: 137px;
}


/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/Facturas.php */

.callout {
  /* border-left-width: 19px; */
  border-left-width: 0px;
  margin-left: 17px;
  margin-right: 15px;
}
</style>


<script>
        tablaproductos = $("#tablaproductos").DataTable({
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button type='button' class='btn btn-primary btnver' data-toggle='modal' data-target='.bd-example-modal-sm'>Ver Detalles</button>"
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

    $(document).on("click", ".btnver", function(){    
        fila = $(this).closest("tr");
        id = fila.find('td:eq(0)').text();
        verdate(id);
    })

    function verdate(id){    
           
        $.ajax({
            url: "../level1/bd/Consultas.php",
            type: "POST",
            dataType: "json",
            data: {
                id: id,
                valordeConsulta: 13
            },
            success: function(data){

                data.forEach(function(dato) {
                    console.log(dato.Unidades)

                    fila="<tr>" +
                            "<td class='txt'>"+dato.Unidades+"</td>"+
                            "<td class='txt' >"+dato.NombreArticulo+"</td>"+
                            "<td class='txt'>"+dato.Codigo1+"</td>"+
                            "<td class='txt total'>"+dato.Precio+"</td>"
                        "</tr>";

                    var btn = document.createElement("TR");
                    btn.innerHTML=fila;
                    document.getElementById("tablita").appendChild(btn);
                });
            }        
        });
        
    }

    $(document).on("click", ".btnsalir", function(){   
        const $elemento = document.querySelector("#tablita");
        $elemento.innerHTML = "";
        $('#modal').modal().hide();

    })
</script>