function el(el) {
    return document.getElementById(el);
}
  
el('stock').addEventListener('input',function() {
    var val = this.value;
    this.value = val.replace(/\D|\-/,'');
});

function guadarDatosProductos(){

    var nombre = $.trim($("#nombre").val());    
    var codigo1 =$.trim($("#codigo1").val());    
    var codigo2 =$.trim($("#codigo2").val());    
    var marca =$.trim($("#marca").val());    
    var modelopresentacion =$.trim($("#modelopresentacion").val());    
    var pventa =$.trim($("#pventa").val());  
    var pcompra =$.trim($("#pcompra").val());
    var stock = $.trim($("#stock").val());
    var comentario =$.trim($("#comentario").val());

    let unidad = parseInt(stock);

    let preventa = parseInt(pventa);
    let precompra = parseInt(pcompra);

    var agregarproducto = 2;

    if(preventa > precompra){  

        $.ajax({
            url:"../dashboard/bd/agregarUsuarios.php",
            type:"POST",
            datatype: "json",
            data: {
                nombre:nombre, 
                codigo1:codigo1,
                codigo2:codigo2,
                marca:marca,
                modelopresentacion:modelopresentacion,
                pventa:pventa,
                pcompra:pcompra,
                stock:unidad,
                comentario:comentario,
                agregarproducto:agregarproducto,
            }, 
            success:function(data){
                if(data == 1){
                    Swal.fire({
                        title: 'ERROR',
                        text: "EL PRODUCTO YA EXISTE",
                        icon: 'warning',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33'
                    });
                }

                if(data == 2){
                    document.getElementById("nombre").value = "";
                    document.getElementById("codigo1").value = "";
                    document.getElementById("codigo2").value = "";
                    document.getElementById("marca").value = "";
                    document.getElementById("modelopresentacion").value = "";
                    document.getElementById("pventa").value = "";
                    document.getElementById("pcompra").value = "";
                    document.getElementById("stock").value = "";
                    document.getElementById("comentario").value = "";

                    Swal.fire(
                        'EXITO',
                        'PRODUCTO GUARDADO',
                        'success'
                    )
                }
                
                if(data == 3){
                    Swal.fire({
                        title: 'ERROR',
                        text: "NO SE HA PODIDO GUARDAR EL PRODUCTO",
                        icon: 'warning',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33'
                    });
                }
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
}