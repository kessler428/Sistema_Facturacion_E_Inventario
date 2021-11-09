<?php
  include_once "./Views/parte_superior.php"
?>


<?php
    include_once 'bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consul = "SELECT al.IDCodigoAlmacen, 
                    al.Codigo1, 
                    al.Codigo2, 
                    al.NombreArticulo, 
                    al.Modelopresentacion, 
                    al.precioVenta, 
                    al.PrecioCompra, 
                    al.Stock, 
                    al.Marca, 
                    al.Notas,
                    uno.Stock as almacenuno,
                    dos.Stock as almacendos,
                    tres.Stock as almacentres,
                    cuatro.Stock as almacencuatro
                FROM almacen as al 
                INNER JOIN almacenuno as uno on uno.IDCodigoAlmacenPK = al.IDCodigoAlmacen 
                INNER JOIN almacendos as dos on dos.IDCodigoAlmacenPK = al.IDCodigoAlmacen
                INNER JOIN almacentres as tres on tres.IDCodigoAlmacenPK = al.IDCodigoAlmacen
                INNER JOIN almacencuatro as cuatro on cuatro.IDCodigoAlmacenPK = al.IDCodigoAlmacen
                WHERE al.IsVisible = 1
                ";

    $consulta = $consul;
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- EL MERO INDEX -->

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>LLenar Tiendas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inventario</a></li>
              <li class="breadcrumb-item active">Cargar Almacenes</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="card border-light mb-3" >
        <div class="card-header">Almacenes</div>
            <div class="card-body">
                <div class="row invoice-info">

                    <div class="col-sm-4 form-group">
                        <label>Productos</label>
                        <select class="form-control select2" id = "prodi" style="width: 100%;">
                            <option selected="selected">-- Seleccione --</option>
                        </select>
                    </div>

                    <div class = "col-sm-2">
                        <div class="col">
                            <label for="cantidad">Almacen 1</label>
                            <input type="number" class="form-control" id="aluno" readonly >
                        </div>
                    </div>

                    <div class = "col-sm-2">
                        <div class="col">
                            <label for="cantidad">Almacen 2</label>
                            <input type="number" class="form-control" id="aldos"  >
                        </div>
                    </div>

                    <div class = "col-sm-2">
                        <div class="col">
                            <label for="cantidad">Almacen 3</label>
                            <input type="number" id = "altres" class="form-control" >
                        </div>
                    </div>

                    <div class = "col-sm-2">
                        <div class="col">
                            <label for="cantidad">Almacen 4</label>
                            <input type="number" class="form-control" id="alcuatro" >
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card-footer text-muted">
                <button type="button" onclick= "añadirstock()" class="btn btn-warning float-center"><i class="far fa-credit-card"></i> Añadir Producto</button>
            </div>
    </div>

    <div class="card border-light mb-3" >
        <div class="card-header">Descargo</div>
            <div class="card-body">
                <div class="row invoice-info">
                    <div class="col-sm-6 form-group">
                        <label>Almacen salida</label>
                        <select class="form-control select2" id = "tiendapar" style="width: 100%;">
                            <option selected="selected">-- Seleccione --</option>
                            <option value = "almacenuno">-- Tienda 1 --</option>
                            <option value = "almacendos">-- Tienda 2 --</option>
                            <option value = "almacentres">-- Tienda 3 --</option>
                            <option value = "almacencuatro">-- Tienda 4 --</option>
                        </select>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>Almacen destino</label>
                        <select class="form-control select2" id = "tiendades" style="width: 100%;">
                            <option selected="selected">-- Seleccione --</option>
                            <option value = "almacenuno">-- Tienda 1 --</option>
                            <option value = "almacendos">-- Tienda 2 --</option>
                            <option value = "almacentres">-- Tienda 3 --</option>
                            <option value = "almacencuatro">-- Tienda 4 --</option>
                        </select>
                    </div>
                </div>
                <div class="row invoice-info">
                <div class="col-sm-5 form-group">
                        <label>Productos</label>
                        <select class="form-control select2" id = "prodi2" style="width: 100%;">
                            <option selected="selected">-- Seleccione --</option>
                        </select>
                    </div>
                    <div class = "col-sm-4">
                        <div class="col">
                            <label for="cantidad">Existencia</label>
                            <input type="number" class="form-control" id="existe" readonly>
                        </div>
                    </div>
                    <div class = "col-sm-3">
                        <div class="col">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" class="form-control" id="canti" >
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <div class="card-footer text-muted">
                <button type="button" onclick= "intercambio()" class="btn btn-warning float-center"><i class="far fa-credit-card"></i> Cargar</button>
            </div>
    </div>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="JS/cargar.js"></script>
  
<?php
  include_once "./Views/parte_inferior.php"
?>

<style>
/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/Facturas.php */

.card-header {
  background: #9ca2aa;
}


/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/cargar.php */

.btn-warning {
  margin-left: 409px;
}


/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/Facturas.php */

.btn-warning {
  margin-top: 0px;
}

/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/almacenes.php */

.card {
  margin-left: 14px;
  margin-right: 13px;
}


</style>