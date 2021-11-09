<?php
  include_once "./Views/parte_superior.php"
?>
<!-- EL MERO INDEX -->

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Facturar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Facturar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="callout callout-info">
      <h5><i class="fas fa-info"></i> Nota:</h5>
      Las Facturas se Hacen desde los Usuarios Almacenes "NO DESDE ADMINISTRADOR"
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i>  Bravo's
                    <small class="float-right" id ="date" name = "date">Fecha: 2/10/2014</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Correo:
                  <address>
                    <strong id = "Correo" name = "Correo"><?php echo $_SESSION["s_usuario"]; ?></strong>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Usuario:
                  <address>
                    <strong id = "nombreUsuario" name = "nombreUsuario"></strong><br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-2 invoice-col">
                  <b id = "invoiceable" ></b><br>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="card">
                <div class="card-header">
                  Añadir Producto
                </div>
                <div class="card-body">
              
              <div class="row invoice-info">
                <div class = "col-sm-2">
                  <div class="col">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" class="form-control" id="cantidad" placeholder="Example: 2">
                  </div>
                </div>
                
                <div class="col-sm-4 form-group">
                  <label>Productos</label>
                  <select class="form-control select2" id = "prodi" style="width: 100%;">
                    <option selected="selected">-- Seleccione --</option>
                  </select>
                </div>

                <div class = "col-sm-2">
                  <div class="col">
                    <label for="cantidad">Precio Por Unidad</label>
                    <input type="number" class="form-control" id="precioUnidad" name = "precioUnidad" readonly >
                  </div>
                </div>

                
                <div class = "col-sm-2">
                  <div class="col">
                    <label for="cantidad">SubTotal</label>
                    <input type="number" class="form-control" id="Subtotal" readonly >
                  </div>
                </div>

                <div class="col-sm-2.2 ">
                  <button type="button" onclick= "añadircarrito()" class="btn btn-warning float-right"><i class="far fa-credit-card"></i> Añadir Producto</button>
                </div>

              </div>

              </div>
            </div>
              <!-- Cierre de añadir producto-->

              <div class="card" >
              <div class="card-header">Productos</div>
              <div class="card-body ">
              
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped" id = "tabl">
                    <thead>
                    <tr>
                      <th hidden>Iddeproductos</th>
                      <th>Cantidades</th>
                      <th>Producto</th>
                      <th>Descripcion</th>
                      <th>Subtotal</th>
                      <th>Opciones</th>
                    </tr>
                    </thead>
                    <!-- Cuerpo de la Tabla -->
                    <tbody id="tablita" name = "tablita">

                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              </div>
              </div>


              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Todas las Facturas estan respaldadas y guardadas por INNOVA VIRTUAL
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Detalles del Pago</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td id = "subtotal" ></td>
                      </tr>
                      <tr id = 'total' class = "total">
                        <th>Total:</th>
                        <td></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <button type="button" onclick = "//facturar()" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Guardar Factura e Imprimir</button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

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


/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/Facturas.php */

.callout {
  /* border-left-width: 19px; */
  border-left-width: 0px;
  margin-left: 17px;
  margin-right: 15px;
}
</style>