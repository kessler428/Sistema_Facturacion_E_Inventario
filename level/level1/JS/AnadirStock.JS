$(document).on("click", ".btnstock", function(){    
    fila = $(this).closest("tr");

    id = parseInt(fila.find('td:eq(0)').text());
    stock = parseInt(fila.find('td:eq(7)').text());

    document.getElementById("idvalor").value = id;
    document.getElementById("stockAntiguo").value = stock;
})


function el(el) {
    return document.getElementById(el);
  }
  
el('stocknew').addEventListener('input',function() {
    var val = this.value;
    this.value = val.replace(/\D|\-/,'');
});

function guadarStock(){

    var stockviejo = $.trim($("#stockAntiguo").val());
    var stocknew = $.trim($("#stocknew").val());

    stockviejo = parseFloat(stockviejo);
    stocknew = parseFloat(stocknew);

    stocknuevo = stockviejo + stocknew;
    var idvalor = $.trim($("#idvalor").val());
    
    $.ajax({
        url: "./bd/RegistrosSencillos.php",
        type: "POST",
        dataType: "json",
        data: {
            id: idvalor,
            sumadre: stocknew,
            stocknew:stocknuevo, 
            valorderegistros: 1
        },
        success: function(data){  

            console.log(data);
            
            id = data[0].IDAlmacenuno;            
            nombre = data[0].NombreArticulo;
            Codigo1 = data[0].Codigo1;
            Codigo2 = data[0].Codigo2;
            Marca = data[0].Marca;
            Modelopresentacion = data[0].Modelopresentacion;
            Notas = data[0].Notas;
            precioVenta = data[0].precioVenta;
            stock = data[0].stock;

            tablaproductos.row(fila).data([id,Codigo1,Codigo2,nombre, Marca, Modelopresentacion, precioVenta, stock, Notas]).draw();
          
        }        
    });

    $("#exampleModalCenter").modal("hide");       

    document.getElementById("idvalor").value = "";
    document.getElementById("stockAntiguo").value = "";
    document.getElementById("stocknew").value = "";

}



$(document).ready(function() {

    tablaproductos = $("#tablaproductos").DataTable({
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnstock' data-toggle='modal' data-target='#exampleModalCenter'>Añadir Stock</button></div>"
        }],

        "order": [
            [1, 'asc']
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