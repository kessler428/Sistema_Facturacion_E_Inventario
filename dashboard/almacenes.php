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
            <h1>Total de Almacenes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inventario</a></li>
              <li class="breadcrumb-item active">Almacenes</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

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
                                <th>Codigo 2</th>
                                <th>Nombre</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Precio Venta</th>
                                <th>Precio Compra</th>
                                <th >Cantidad Almacen 1</th>
                                <th hidden>Cantidad Almacen 2</th>
                                <th hidden>Cantidad Almacen 3</th>
                                <th hidden>Cantidad Almacen 4</th>
                                <th hidden>Comentario</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data as $dat) {
                            ?>
                                <tr>
                                    <td hidden><?php echo $dat['IDCodigoAlmacen'] ?></td>
                                    <td><?php echo $dat['Codigo1'] ?></td>
                                    <td ><?php echo $dat['Codigo2'] ?></td>
                                    <td><?php echo $dat['NombreArticulo'] ?></td>
                                    <td><?php echo $dat['Marca'] ?></td>
                                    <td><?php echo $dat['Modelopresentacion'] ?></td>
                                    <td><?php echo number_format($dat['precioVenta'], 2, '.', ''); ?></td>
                                    <td hidden><?php echo number_format($dat['PrecioCompra'], 2, '.', ''); ?></td>                                    
                                    <td><?php echo $dat['almacenuno'] ?></td>
                                    <td hidden><?php echo $dat['almacendos'] ?></td>
                                    <td hidden><?php echo $dat['almacentres'] ?></td>
                                    <td hidden><?php echo $dat['almacencuatro'] ?></td>
                                    <td hidden><?php echo $dat['Notas'] ?></td>
                                    
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
    <script src="JS/Veralmacen.js"></script>
  
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

.card {
  margin-left: 14px;
  margin-right: 13px;
}
</style>