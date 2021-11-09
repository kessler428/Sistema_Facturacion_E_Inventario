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
            <h1 class="m-0">Usuarios</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Usuarios</a></li>
              <li class="breadcrumb-item active">Administrador de Usuarios</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Cuerpo de la ventana-->
    <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Añadir Cliente</h3>

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
           
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Nombres Y Apellidos</label>
                    <input type="text" class="form-control" id="nombres" placeholder="Juan Adalid" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputcedula">Numero de Cedula / RUC</label>
                    <input type="text" class="form-control" id="numerodecedula" placeholder="000000000000S">
                </div>
              </div>
                <div class="form-group">
                    <label for="inputAddress2">Direccion</label>
                    <input type="text" class="form-control" id="direccion" placeholder="Managua, Bello Horizonte" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputCity">Numero telefonico</label>
                        <input type="Telephone" class="form-control" id="telefono" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputZip">Comentario</label>
                        <input type="email" class="form-control" id="comentario">
                    </div>
                </div>
                
                <button type="button" onclick="guadarDatos()" class="btn btn-primary">Guardar</button>
            </div>
        </div>
        <!-- /.card -->

</section>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>  
<?php
  include_once "./Views/parte_inferior.php"
?>

<style>
/* adminlte.min.css | http://localhost/administracion/Virtual_Innova/dashboard/Views/dist/css/adminlte.min.css */

.layout-navbar-fixed .wrapper .content-wrapper {
  margin-top: 0px;
}
</style>

<script>
function guadarDatos(){
    var nombres = $.trim($("#nombres").val());    
    var numerodecedula =$.trim($("#numerodecedula").val());    
    var direccion =$.trim($("#direccion").val());    
    var telefono =$.trim($("#telefono").val());    
    var email =$.trim($("#email").val());  
    var comentario =$.trim($("#comentario").val());
    var agregarproducto = 1;

    $.ajax({
        url:"../dashboard/bd/agregarUsuarios.php",
        type:"POST",
        datatype: "json",
        data: {
            nombres:nombres, 
            apellido: null,
            numerodecedula:numerodecedula,
            direccion:direccion,
            telefono:telefono,
            email:email,
            comentario:comentario,
            agregarproducto:agregarproducto,
        }, 
        success:function(data){
            if(data = "LISTO"){                
                document.getElementById("nombres").value = "";
                document.getElementById("numerodecedula").value = "";
                document.getElementById("direccion").value = "";
                document.getElementById("telefono").value = "";
                document.getElementById("email").value = "";
                document.getElementById("comentario").value = "";

                Swal.fire(
                    'EXITO',
                    'DATOS GUARDADOS',
                    'success'
                  )  
            }else{
                Swal.fire({
                    title: 'ERROR',
                    text: "NO SE HA PODIDO GUARDAR LA INFORMACION",
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33'
                });  
            }
        }    
     });

}

</script>