$(document).ready(function() {

       tablauno = $("#tablaproducts").DataTable({
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button type='button' class='btn btn-primary btnver' data-toggle='modal' data-target='.bd-example-modal-sm'>Ver Detalles</button>&nbsp&nbsp&nbsp<button type='button' class='btn btn-danger btnEliminar' >Eliminar</button>&nbsp&nbsp&nbsp<button type='button' class='btn btn-success btnimprimir' ><i class='fas fa-print'></i></button>"
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

$(document).on("click", ".btnsalir", function(){   
    
    const $elemento = document.querySelector("#tablita");
    $elemento.innerHTML = "";
    $('#modal').modal().hide();

})


$(document).on("click", ".btnimprimir", function(){    

    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());

    window.location.href = '../dashboard/imprimirdetalles.php?id='+id;
});

$(document).on("click", ".btnEliminar", function(){    

    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    let respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");

    if(respuesta){
        $.ajax({
            url: "../dashboard/bd/estadosVisibles.php",
            type: "POST",
            dataType: "json",
            data: {
                verproducto: 1, 
                id:id
            },
            success: function(data){
                tablauno.row(fila.parents('tr')).remove().draw();
            },error: function(response){
                //location.reload();
            },
        });
    }
});

$(document).on("click", ".btnver", function(){    
    fila = $(this).closest("tr");
    id = fila.find('td:eq(0)').text();
    verdate(id);
})

function verdate(id){    
   
    $.ajax({
        url: "../dashboard/bd/Consultas.php",
        type: "POST",
        dataType: "json",
        data: {
            id: id,
            valordeConsulta: 19
        },
        success: function(data){

            data.forEach(function(dato) {
                console.log(dato.Unidades)

                fila="<tr>" +
                        "<td class='txt'>"+dato.Unidades+"</td>"+
                        "<td class='txt' >"+dato.NombreArticulo+"</td>"+
                        "<td class='txt'>"+dato.Codigo1+"</td>"+
                        "<td class='txt total'>"+dato.Precio+"</td>"
                    "</tr>";

                var btn = document.createElement("TR");
                btn.innerHTML=fila;
                document.getElementById("tablita").appendChild(btn);
            });
        }        
    });
}

