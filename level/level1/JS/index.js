//Consultas de Usuarios metodo AJAX

$.ajax({
    url: '../level1/bd/Consultas.php',
    type:"POST",
    datatype: "json",
    data: {
        valordeConsulta: 9, 
    }, 
    success:function(data2){
        let suma = JSON.parse(data2)[0].suma;
        if(suma == null){
            $('#Dinerocaja').html("C$: 0");
        }else{
            $('#Dinerocaja').html("C$: "+suma);
        }
    }
 });

 $.ajax({
    url: '../level1/bd/Consultas.php',
    type:"POST",
    datatype: "json",
    data: {
        valordeConsulta: 10, 
    }, 
    success:function(data2){
        let suma = JSON.parse(data2)[0].suma;
        
        $('#Facturashoy').html(suma );
    }
 });

 $.ajax({
    url: '../level1/bd/Consultas.php',
    type:"POST",
    datatype: "json",
    data: {
        valordeConsulta: 11, 
    }, 
    success:function(data2){
        let suma = JSON.parse(data2)[0].NombreArticulo;
        $('#productomasvendido').html(suma);
    }
 });

 $.ajax({
    url: '../level1/bd/Consultas.php',
    type:"POST",
    datatype: "json",
    data: {
        valordeConsulta: 12, 
    }, 
    success:function(data){
        let eso = JSON.parse(data)[0].procd;

        var toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
    }
 });