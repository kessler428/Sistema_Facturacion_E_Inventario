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
            <h1>Facturacion</h1>
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
                    <i class="fas fa-globe"></i>  Bravos
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
                <!-- Inicio de la seleccion -->
                <div class="row">
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="1" checked>
                      <label class="form-check-label" for="gridRadios1">
                        Contado
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="2">
                      <label class="form-check-label" for="gridRadios2">
                        Credito
                      </label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="3">
                      <label class="form-check-label" for="gridRadios3">
                        Tarjeta
                      </label>
                    </div>
                  </div>
                </div>
                <!-- Final -->
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="card">
                <div class="card-body">
                  <div class="form-row">

                    <div class="form-group col-md-12">
                        <label>Clientes existentes</label>
                        <select class="form-control select2" id = "cliente" style="width: 100%;">
                          <option selected="selected" value = "0">-- Seleccione --</option>
                        </select>
                    </div>
                  </div>
                </div>
              </div>

              


<!-- Datos de la factura 
              <div class="card">
                <div class="card-body">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Nombre del Cliente</label>
                      <input type="text" class="form-control" id="nameuser" Value = "Foraneo">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Codigo RUC / Numero de Cedula</label>
                      <input type="text" class="form-control" id="ruc" placeholder = "4081703600001C">
                    </div>
                  </div>
                </div>
              </div>
Fin Datos de la factura -->
              <div class="card">
                <div class="card-header">
                  Añadir Producto
                </div>
                <div class="card-body">
              
              <div class="row invoice-info">
                <div class = "col-sm-2">
                  <div class="col">
                    <label >Cantidad</label>
                    <input type="number" class="form-control" id="cantidad" name = "cantidad"placeholder="2">
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
                    <label >Precio Sugerido</label>
                    <input type="number" class="form-control" id="precioUnidad" name = "precioUnidad" readonly >
                  </div>
                </div>
                
                <div class = "col-sm-2">
                  <div class="col">
                    <label >Precio establecido </label>
                    <input type="number" class="form-control" id="preciofi" >
                  </div>
                </div>

                <div class = "col-sm-2">
                  <div class="col">
                    <label >SubTotal</label>
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


            </div>

              <div class="card" >
                <div class="card-header">Productos</div>
                <div class="card-body ">
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
                          <th hidden>preciouni</th>
                          <th>Opciones</th>
                        </tr>
                        </thead>
                        <!-- Cuerpo de la Tabla -->
                        <tbody id="tablita" name = "tablita">

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <div class="col-4">
                    <label >Monto</label>
                    <input type="number" class="form-control" id="monto" name = "monto" placeholder = "C$: 100">
                  </div>

                  <?php
                      include_once 'bd/conexion.php';
                      $objeto = new Conexion();
                      $conexion = $objeto->Conectar();
                  
                      $consul = "SELECT estado, almacen FROM descuento where almacen = 1";
                  
                      $consulta = $consul;
                      $resultado = $conexion->prepare($consulta);
                      $resultado->execute();
                      $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
                      foreach ($data as $dat) {
                        if($dat['estado'] == 1){
                      ?>
                        <input hidden type="number" class="form-control" id="descuento" name = "descuento" value ="1" >
                      <?php 
                        }else{
                      ?>
                        <input hidden type="number" class="form-control" id="descuento" name = "descuento" value ="0" >
                      <?php
                        }
                      }
                      ?>               
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Detalles del Pago</p>

                  <div class="table-responsive">
                    <table class="table" id = "tblsubtotal">
                      <tr>
                        <th style="width:50%" id = 'subtotal' class = "subtotal">Subtotal:</th>
                        <td></td>
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
                  <button type="button" onclick = "facturar()" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Guardar Factura e Imprimir</button>
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
  <script src="JS/Facturar.js"></script>
  
  
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


/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/Facturas.php */

.callout {
  /* border-left-width: 19px; */
  border-left-width: 0px;
  margin-left: 17px;
  margin-right: 15px;
}



</style>