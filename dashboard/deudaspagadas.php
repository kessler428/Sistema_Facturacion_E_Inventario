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
            <h1 class="m-0">Creditos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Tablero</a></li>
             <li class="breadcrumb-item active">creditos</li>
           </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
 
    <div class="card">
        <div class="card-header">
          <div class = "row">
              <div class="col-sm">
              Deudas Canceladas
              </div>
          </div>        
        </div>

        <div class="card-body">
            <div class="table-responsive"  style="margin-end:10px">
                <table id="tablaproductos" class="ui celled table" style="width:100%">
                  <thead class="text-center">
                    <tr>
                      <th>id</th>
                      <th>Fecha</th>
                      <th>Contacto</th>
                      <th>Total</th>
                      <th>Abonado</th>
                      <th>Restante</th>
                      </tr>
                    </thead>
                    <tbody>
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
.card-header {
  background: #9ca2aa;
}
</style>

<script>

$(document).ready(function() {

let url = "../dashboard/bd/Consultas2.php?valordeConsulta=3";

var  table = $('#tablaproductos').DataTable( {
        "ajax": url,
        "columns": [
                { "data": "IDFactura" },
                { "data": "fechaEmision" },
                { "data": "cliente" },
                { "data": "total" },
                { "data": "SumaAbonos" },
                { "data": "resta" },
        ],
        "lengthMenu": [ 10, 25, 50, 75, 100, 200]
    });

    new $.fn.dataTable.Buttons( table, {
        buttons: [
            'pdf'
        ]   
    });

    table.buttons( 0, null ).container().prependTo(
        table.table().container()
    );

    $('#tablaproductos tbody').on( 'click', '.abono', function () {
        var data = table.row( $(this).parents('tr') ).data();
        id = data.IDFactura;
        alert(id);
        document.getElementById("idfac").value = id;   
    });

    $('#tablaproductos tbody').on( 'click', '.btneditar', function () {
        var data = table.row( $(this).parents('tr') ).data();
        id = data.IDFactura;
        
        $.ajax({
            url: "../dashboard/bd/Consultas2.php",
            type: "GET",
            dataType: "json",
            data: {
                valordeConsulta: 2, 
                id: id
            },
            success: function(data){
                data["data"].forEach(function(dato) {
                    fila="<tr>" +
                            "<td class='txt total'>"+dato.idAbonado+"</td>"+    
                            "<td class='txt'>"+dato.montoAbonado+"</td>"+
                            "<td class='txt' >"+dato.Concepto+"</td>"+
                            "<td class='txt'>"+dato.Metododepago+"</td>"+                            
                        "</tr>";

                    var btn = document.createElement("TR");
                    btn.innerHTML=fila;
                    document.getElementById("abonostabla").appendChild(btn);
                }); 
            }
            
        });

    });


});
</script>