<?php
  include_once "./Views/parte_superior.php"
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Reporte de Tiendas </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Tablero </a></li>
              <li class="breadcrumb-item active">Reporte </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<div class="card">
  <div class="card-header">
    Generar reportes
  </div>
  <div class="card-body">
    <div class="container">
      <div class="row"> 
        <div class="col-xs-12 col-md-12">

            <div class="form-group">
              <label for="example-datetime-local-input">Inicio</label>              
              <input class="form-control" type="date"  id="dateinicios">                
            </div>             
        
            <div class="form-group">
                <label for="example-datetime-local-input">Final</label>                
                <input class="form-control" type="date"  id="datefini">                
            </div>      
              
            <div class="form-group">               
                <label class="" for="inputGroupSelect01">Tienda</label>               
                <select class="custom-select" id="inputGroupSelect01">
                    <option selected>Choose...</option>
                    <option value="1">Ventas</option>
                    <option value="2">Productos mas vendidos</option>
                </select>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class = "card-footer">
    <button type="button" class="btn btn-light" onclick = "generar()" >Generar</button>
  </div>
</div>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="JS/reportes.js"></script>

<?php
  include_once "./Views/parte_inferior.php"
?>

<style>

.layout-navbar-fixed .wrapper .content-wrapper {
  margin-top: 0px;
}

.card-footer {
    text-align: center;
}

.card {
  margin-left: -1px;
  margin-right: 0px;
}

.card-header {
    text-align: center;
    font-size: 24px;
}
@media (min-width: 768px){
  .form-group{
    margin: 0px 10px;
    padding: 0px, 15px;
    float: left;
    width:30%
  }
}
</style>