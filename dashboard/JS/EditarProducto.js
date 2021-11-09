//Evento para editar un producto

$(document).on("click", ".btnEliminar", function(){    

    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());

    let respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");

    if(respuesta){
        $.ajax({
            url: "../dashboard/bd/agregarUsuarios.php",
            type: "POST",
            dataType: "json",
            data: {
                agregarproducto:5, 
                id:id
            },
            success: function(){
                tablaproductos.row(fila.parents('tr')).remove().draw();
            }
        });
    } 

});

$(document).on("click", ".btnEditar", function(){    
    
    fila = $(this).closest("tr");
    id = fila.find('td:eq(0)').text();
    codigo1 = fila.find('td:eq(1)').text();
    nombre = fila.find('td:eq(2)').text();
    marca = fila.find('td:eq(3)').text();
    modelopresentacion = fila.find('td:eq(4)').text();
    precioVenta = parseInt(fila.find('td:eq(5)').text());
    precioCompra = parseInt(fila.find('td:eq(6)').text());
    comentario = fila.find('td:eq(7)').text();
    Stock = fila.find('td:eq(8)').text();

    $("#nombre").val(nombre);
    $("#codigo1").val(codigo1);
    $("#marca").val(marca);
    $("#modelopresentacion").val(modelopresentacion);
    $("#pventa").val(precioVenta);
    $("#pcompra").val(precioCompra);
    $("#comentario").val(comentario);
    $("#idalmacen").val(id);
    $("#Stock").val(Stock);
        
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Producto");            
    $("#modalCRUD").modal("show"); 

});

$("#formPersonas").submit(function(e){
    e.preventDefault();    

    id = $.trim($("#idalmacen").val());
    nombre = $.trim($("#nombre").val());
    codigo1 = $.trim($("#codigo1").val());
    marca = $.trim($("#marca").val());       
    modelopresentacion = $.trim($("#modelopresentacion").val());
    precioVenta = $.trim($("#pventa").val());
    precioCompra = $.trim($("#pcompra").val());
    comentario = $.trim($("#comentario").val());
    Stock = $.trim($("#Stock").val());
    
    //Indice para actualizar los productos
    agregarproducto = 4;

    let preventa = parseInt(precioVenta);
    let precompra = parseInt(precioCompra);
    codigo2 = "nulo";

    if(preventa > precompra){
        $.ajax({
            url: "../dashboard/bd/agregarUsuarios.php",
            type: "POST",
            dataType: "json",
            data: {
                id: id,
                nombre:nombre, 
                codigo1:codigo1,
                codigo2:codigo2,
                marca:marca,
                modelopresentacion:modelopresentacion,
                pventa:precioVenta,
                pcompra:precioCompra,
                comentario:comentario,
                Stock: Stock,
                agregarproducto:agregarproducto,
            },
            success: function(data){  
                
                console.log(data);
                
                IDCodigoAlmacen = data[0].IDCodigoAlmacen;            
                nombre = data[0].NombreArticulo;
                Codigo1 = data[0].Codigo1;
                Marca = data[0].Marca;
                Modelopresentacion = data[0].Modelopresentacion;
                Notas = data[0].Notas;
                PrecioCompra = data[0].PrecioCompra;
                precioVenta = data[0].precioVenta;
                Stock = data[0].Stock;
    
                tablaproductos.row(fila).data([IDCodigoAlmacen, Codigo1,nombre, Marca, Modelopresentacion, precioVenta, PrecioCompra, Notas, Stock]).draw();
                $("#modaUpdate").modal("hide");
            }        
        });
    }else{
        Swal.fire({
            title: 'ERROR',
            text: 'El precio de Venta no puede ser "Menor" que el precio de la Compra',
            icon: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33'
        });
    }
    
});
