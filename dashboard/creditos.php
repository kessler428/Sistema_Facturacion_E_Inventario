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
              Deudas pendientes
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
                      <th>RUC</th>
                      <th>Total</th>
                      <th>Abonado</th>
                      <th>Restante</th>
                      <th class="botones">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
      </div>
    </div>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="JS/Creditos.js"></script>


<?php
  include_once "./Views/parte_inferior.php"
?>

<!-- Modal de abonos --->

<!-- Modal -->
<div class="modal fade" id="abonos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Abono Global</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>

            <input type="text" hidden id="idfac" name = "idfac">

            <div class="form-group">
              <label for="formGroupExampleInput">Valor</label>
              <input type="number" class="form-control" id="valor" name = "valor" placeholder="Valor (Obligatorio)" required>
            </div>

            <div class="form-group">
              <label for="formGroupExampleInput">Concepto</label>
              <input type="text" class="form-control" id = "concepto" name = "concepto" placeholder="Concepto" required>
            </div>
            
            <div class="form-group">
              <label for="formGroupExampleInput">Metodo de Pago</label>
              <input type="text" class="form-control" id = "metodopago" name = "metodopago" placeholder="Metodo de pago" Value = "Efectivo" required>
            </div>

            <div class = "form-group">
              <button type="button" onclick = "enviarabono()" class="btn btn-primary">Guardar</button>
            </div>            
        </form>
      </div>
    </div>
  </div>
</div>

<!-- terminar de abonos -->

<!-- Detalle de los abonos -->

<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" id = "contenido" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Detalles de los abonos</h5>
        <button type="button" onclick = "eliminar()" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
      
      <div class="modal-body card">
          <div class="card-body">
            <h5 class="card-title">Abonos</h5>
            <table class="table table-hover" id = "abonostabla">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Valor</th>
                  <th scope="col">Concepto</th>
                  <th scope="col">Metodo de Pago</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
      </div>
      </form>
    </div>
  </div>
</div>

<style>
.card-header {
  background: #9ca2aa;
}
</style>
