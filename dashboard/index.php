<?php
  include_once "Views/parte_superior.php"
?>

<script src="JS/index.js"></script>

<!-- EL MERO INDEX -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tablero Principal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Vista principal</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Usuarios registrados</span>
                <span class="info-box-number" id="NumeroUsuariossistema" name="NumeroUsuariossistema" >
                  
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-cash-register"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Ventas del Dia</span>
                <span class="info-box-number" id="Ventasdeldia" name="Ventasdeldia"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill-wave"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Dinero en caja</span>
                <span class="info-box-number" id="dineroencaja" name="dineroencaja"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-warehouse"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Inventario</span>
                <span class="info-box-number" id="inventario" name = "inventario"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Reporte</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-9">
                    <p class="text-center">
                      <strong>Ventas</strong>
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>

                  <div class="col">
                    <div class = "card-header">Panel de Descuentos</div>
                      <div class="col form-group descuento-almacen1">
                        <label>Tienda</label>
                        <input type="checkbox" id = "unochek" name = "unochek" data-toggle="toggle" data-on="ON" data-off="Off">
                      </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i>%</span>
                      <h5 class="description-header" id = "ventatotal"></h5>
                      <span class="description-text">COSTO DE VENTAS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i>%</span>
                      <h5 class="description-header" id = "compras"></h5>
                      <span class="description-text">COSTOS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i>%</span>
                      <h5 class="description-header" id = "ganancias"></h5>
                      <span class="description-text">UTILIDAD BRUTA</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->

                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <!-- Boton de cerrar Tienda -->
                      <label>Tienda</label>
                      <input type="checkbox" id = "tienda" name = "tienda" data-toggle="toggle" data-on="Abrir" data-off="Cerrar">
                    </div>
                    <!-- /.description-block -->
                  </div>
                  
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  
<?php
  include_once "Views/parte_inferior.php"
?>

<style>

/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/index.php */

.col-md-12 > div:nth-child(1) > div:nth-child(2) > div:nth-child(1) > div:nth-child(2) {
  margin-top: -17px;
}

/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/index.php */

div.form-group:nth-child(2) {
  margin-left: 26px;
}

/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/index.php */

div.col:nth-child(3) {
  margin-left: 26px;
}

/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/index.php */

div.col:nth-child(4) {
  margin-left: 26px;
}

/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/index.php */

div.col:nth-child(5) {
  margin-left: 26px;
}

/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/index.php */

.col-md-12 > div:nth-child(1) > div:nth-child(2) > div:nth-child(1) > div:nth-child(2) > div:nth-child(1) {
  font-weight: 600;
  font-style: normal;
  font-size: 21px;
  line-height: 19px;
  letter-spacing: 0.024em;
}


/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/index.php */

div.form-group:nth-child(2) > div:nth-child(2) {
  margin-left: 16px;
}

/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/index.php */

div.col:nth-child(3) > div:nth-child(2) {
  margin-left: 16px;
}

/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/index.php */

div.col:nth-child(4) > div:nth-child(2) {
  margin-left: 16px;
}

/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/index.php */

div.col:nth-child(5) > div:nth-child(2) {
  margin-left: 16px;
}


/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/index.php */

div.col-sm-3:nth-child(4) > div:nth-child(1) {
  margin-top: 29px;
}

/* Elemento | http://localhost/administracion/Virtual_Innova/dashboard/index.php */

div.col-sm-3:nth-child(4) > div:nth-child(1) > label:nth-child(1) {
  margin-right: 15px;
}

.descuento-almacen1{
  padding-top: 4rem;
}
</style>