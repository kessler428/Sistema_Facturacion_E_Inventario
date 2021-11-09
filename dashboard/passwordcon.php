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
              <li class="breadcrumb-item"><a href="#">Clientes</a></li>
              <li class="breadcrumb-item active">Cambios de contraseñas</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Contraseñas</h3>

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
                    <label class="" for="inputGroupSelect01">Tienda</label>               
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected>Usuarios...</option>
                        <option value="1">llantayrbravos@gmail.com</option>
                        <option value="2">llyrbravos@gmail.com</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputZip">Contraseña</label>
                    <input type="password" class="form-control" id="pass">
                </div>
                <div class="form-group col-md-4">
                    <button type="button" onclick="cambiarpassword()" class="btn btn-primary botoncito">Cambiar Contraseña</button>
                </div>
            </div>
                                
                
            </div>
        </div>
        <!-- /.card -->

        </section>
  

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<?php
  include_once "./Views/parte_inferior.php"
?>

<style>
.btn-primary {
  margin-top: 32px;
}
</style>

<script>

const cambiarpassword = () =>{
    var use = document.getElementById("inputGroupSelect01").value;
    var comtra = document.getElementById("pass").value;

   
    $.ajax({
        url: "../dashboard/bd/insercciones.php",
        type: "POST",
        dataType: "json",
        data: {
            valordeConsulta: 8, 
            use: use,
            comtra: comtra
        },
        success: function(data){
            if(data == "exito"){
                
                Swal.fire(
                    'Contraseña Actualizada',
                    'Listo',
                    'success'
                )
                document.getElementById("pass").value = "";
            
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Algo salio mal, NO se puedo Actualizar',
                })
            }
        }
    });
            
}

</script>
