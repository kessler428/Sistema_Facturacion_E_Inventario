$(document).ready(function() {

    let url = "../dashboard/bd/Consultas2.php?valordeConsulta=1";

    var  table = $('#tablaproductos').DataTable( {
        "ajax": url,
        "columns": [
                { "data": "IDFactura" },
                { "data": "fechaEmision" },
                { "data": "cliente" },
                { "data": "codigoRUCcedula" },
                { "data": "total" },
                { "data": "SumaAbonos" },
                { "data": "resta" },
                { "data": null },
        ],
        "columnDefs": [{
            "targets" : -1,
            "data" : null,
            "defaultContent": "<div class='text-center row'><button class='btn btn-primary btneditar' data-toggle='modal' data-target='.bd-example-modal-sm'><i class='far fa-eye'></i></button>&nbsp;<button class='btn btn-success abono' id= 'abono' data-toggle='modal' data-target='#abonos'><i class='far fa-money-bill-alt'></i></button></div>",
        }],
        "lengthMenu": [ 10, 25, 50, 75, 100, 200],
    });

    new $.fn.dataTable.Buttons( table, {
        buttons: [
            'pdf'
        ]   
    });

    table.buttons( 0, null ).container().prependTo(
        table.table().container()
    );

    $('#tablaproductos tbody').on( 'click', '.abono', function () {
        var data = table.row( $(this).parents('tr') ).data();
        id = data.IDFactura;
        document.getElementById("idfac").value = id;   
    });

    $('#tablaproductos tbody').on( 'click', '.btneditar', function () {
        var data = table.row( $(this).parents('tr') ).data();
        id = data.IDFactura;
        
        $.ajax({
            url: "../dashboard/bd/Consultas2.php",
            type: "GET",
            dataType: "json",
            data: {
                valordeConsulta: 2, 
                id: id
            },
            success: function(data){
                data["data"].forEach(function(dato) {
                    fila="<tr>" +
                            "<td class='txt total'>"+dato.idAbonado+"</td>"+    
                            "<td class='txt'>"+dato.montoAbonado+"</td>"+
                            "<td class='txt' >"+dato.Concepto+"</td>"+
                            "<td class='txt'>"+dato.Metododepago+"</td>"+                            
                        "</tr>";

                    var btn = document.createElement("TR");
                    btn.innerHTML=fila;
                    document.getElementById("abonostabla").appendChild(btn);
                }); 
            }
            
        });

    });
});
//Metodo de abonos para guardar en la BD

const enviarabono = () => {
    var valor = $.trim($("#valor").val());
    var concepto = $.trim($("#concepto").val());
    var metodopago = $.trim($("#metodopago").val());
    var idfactura = $.trim($("#idfac").val());
    
    console.log(idfactura);

    $.ajax({
        url: "../dashboard/bd/insercciones.php",
        type: "POST",
        dataType: "json",
        data: {
            valordeConsulta: 7, 
            valor: valor,
            concepto: concepto,
            metodopago: metodopago,
            idfactura: idfactura
        },
        success: function(data){
            if(data == "exito"){

                Swal.fire(
                    'Abono Generado',
                    'Listo',
                    'success'
                )

                document.getElementById("valor").value = "";
                document.getElementById("concepto").value = "";
                document.getElementById("metodopago").value = "Efectivo";  
                document.getElementById("idfac").value = ""; 
                $('#abonos').modal('hide');

            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Algo salio mal, NO se puedo guardar',
                })
            }              
        }
    });
}

const eliminar = () =>{
    const $elemento = document.querySelector("#abonostabla");
    $elemento.innerHTML = "";
    $('#contenido').modal().hide();
}
