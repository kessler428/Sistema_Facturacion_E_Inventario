//tiendas de Usuarios metodo AJAX

$.ajax({
    url: '../dashboard/bd/tiendas.php',
    type:"POST",
    datatype: "json",
    data: {
        valordeConsulta: 1,
        id: 1
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
    url: '../dashboard/bd/tiendas.php',
    type:"POST",
    datatype: "json",
    data: {
        valordeConsulta: 2,
        id: 1
    }, 
    success:function(data2){
        let suma = JSON.parse(data2)[0].suma;
        
        $('#Facturashoy').html(suma );
    }
 });

 $.ajax({
    url: '../dashboard/bd/tiendas.php',
    type:"POST",
    datatype: "json",
    data: {
        valordeConsulta: 3,
        id: 1
    }, 
    success:function(data2){
        let suma = JSON.parse(data2)[0].inversion;
        $('#ganancias').html(suma);
    }
 });

 $(document).ready(function() {

    tablauno = $("#tablaproductos").DataTable({
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": null
        }],      
        "order": [
            [1, 'desc']
        ],
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        }
    });
});
