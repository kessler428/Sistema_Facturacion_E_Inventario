<?php
  include_once "./Views/parte_superior.php"
?>
<!-- EL MERO INDEX -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Insertar Productos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inventario</a></li>
              <li class="breadcrumb-item active">Insertar Productos</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Añadir Producto</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class=""></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class=""></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

            <div class="form-row">
                      <div class="form-group col-md-4">
                          <label for="inputCity">Nombre</label>
                          <input type="Telephone" class="form-control" id="nombre" required>
                      </div>
                      <div class="form-group col-md-4">
                          <label for="inputState">Codigo 1</label>
                          <input type="email" class="form-control" id="codigo1" required>
                      </div>
                      <div class="form-group col-md-4">
                          <label for="inputZip">Codigo 2</label>
                          <input type="email" class="form-control" id="codigo2">
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
                    <div class="form-group col-md-2">
                        <label for="inputCity">Precio  de Venta</label>
                        <input type="Telephone" class="form-control" id="pventa" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputState">Precio de Compra</label>
                        <input type="email" class="form-control" id="pcompra" required>
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label for="inputZip">Stock</label>
                        <input type="number" class="form-control" id="stock">
                    </div>
                    
                    <div class="form-group col-md-5">
                      <label for="inputPassword4">Comentario</label>
                      <input type="text" class="form-control" id="comentario" required>
                    </div>
                </div>
                                
                <button type="button" onclick="guadarDatosProductos()" class="btn btn-primary">Guardar</button>
            </div>
        </div>
        <!-- /.card -->

        </section>
  

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="JS/agregarUsuarios.js"></script>

<?php
  include_once "./Views/parte_inferior.php"
?>
