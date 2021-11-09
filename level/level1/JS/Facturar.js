//Fecha actual del sistema
let totalglobal = 0;

n =  new Date();
//Año
y = n.getFullYear();
//Mes
m = n.getMonth() + 1;
//Día
d = n.getDate();

//Lo ordenas a gusto.
document.getElementById("date").innerHTML = "Fecha: "+d + "/" + m + "/" + y;

// Colocar el Usuario registrado --->
// Numero 5 corresponde a la consulta 5 que es sacar el tipo de usuario que existe

verrol();

function verrol(){
    
    correousuario = document.getElementById("Correo").innerHTML;

    $.ajax({
        url: '../level1/bd/Consultas.php',
        type:"POST",
        datatype: "json",
        data: {
            valordeConsulta: 5,
            correousuario: correousuario
        }, 
        success:function(data){
            let inv = JSON.parse(data)[0].RolUsuario;
            $('#nombreUsuario').html(inv);
        }
    });

    //Nombre de la variable invoiceable
    $.ajax({
        url: '../level1/bd/Consultas.php',
        type:"POST",
        datatype: "json",
        data: {
            valordeConsulta: 6,
        }, 
        success:function(data){
            let inv = 1234;
            //let inv = JSON.parse(data)[0].RolUsuario;
            $('#invoiceable').html("N° Factura: " + inv);
        }
    });
} 

// Funcion del Buscador
$(function () {
    $('.select2').select2({});

    $('.select2').on("select2:open", function(e) {
        asyncCall();
    })
})
function resolveAfter2Seconds() {
    return new Promise(resolve => {
      setTimeout(() => {
        resolve('resolved');
      }, 200);
    });
}
  
  async function asyncCall() {
    $("#prodi").empty();
    const result = await resolveAfter2Seconds();
    spiner();
  }
  

// Para sacar los productos

spiner();

function spiner(){
    var $select = $('#prodi');
    $.ajax({
        url: '../level1/bd/Consultas.php',
        type:"POST",
        datatype: "json",
        data: {
            valordeConsulta: 7, 
        }, 
        success: function(data) {
            $.each(JSON.parse(data), function(Nivel, name) {
                let union = name.NombreArticulo + " " + name.Modelopresentacion + " / " + name.Codigo1;
                $select.append('<option value=' + name.IDAlmacenuno + '>' + union + '</option>');
            });
        }
    });
}

( function () {

    var $select = $('#cliente');
    $.ajax({
        url: '../level1/bd/Consultas.php',
        type:"POST",
        datatype: "json",
        data: {
            valordeConsulta: 16, 
        }, 
        success: function(data) {
            $.each(JSON.parse(data), function(Nivel, name) {
                let union = name.Primer_Nombre_Empresa + " / " + name.NumeroRUC_Cedula;
                $select.append('<option value=' + name.IDcatalogoDatos + '>' + union + '</option>');
            });
        }
    });

})()

function revisarstock(id){
    $.ajax({
        url: '../level1/bd/Consultas.php',
        type:"POST",
        datatype: "json",
        data: {
            valordeConsulta: 15,
            id:id
        }, 
        success: function(data) {
            $.each(JSON.parse(data), function(Nivel, name) {
                return(name.PrecioCompra);
            });
        }
    });

}


$(document).ready(function(){

    let valor, id, valorporUnidad, valorporcantidadunidad;

    //Leer el valor de las cantidades
    $("#cantidad").on({
		change:function(){
            valor = $('#cantidad').val();
            id = $('#prodi').val();
            actualizar(id);
        }
	});

    $("#preciofi").on({
		change:function(){
            cant = parseInt($('#cantidad').val());
            preciofina = parseFloat($('#preciofi').val());
            precioUnidad = parseFloat($('#precioUnidad').val());

            $.ajax({
                url: '../level1/bd/Consultas.php',
                type:"POST",
                datatype: "json",
                data: {
                    valordeConsulta: 14,
                    id: 1
                }, 
                success: function(data) {
                    $.each(JSON.parse(data), function(Nivel, name) {
                        //facturar3(name.estado);
                        if(name.estado == 0){
                            if(preciofina < precioUnidad){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'El precio sugerido no puede ser menor al precio establecido por el sistema',
                                  })
                            }else{
                                $('#Subtotal').val(cant * preciofina);
                            }
                        }else{

                            $.ajax({
                                url: '../level1/bd/Consultas.php',
                                type:"POST",
                                datatype: "json",
                                data: {
                                    valordeConsulta: 15,
                                    id:($('#prodi').val())
                                }, 
                                success: function(data) {
                                    $.each(JSON.parse(data), function(Nivel, name) {
                                        if(preciofina < (name.PrecioCompra)){
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Oops...',
                                                text: 'Precio demasiado BAJO',
                                              })
                                        }else{
                                            $('#Subtotal').val(cant * preciofina);
                                        }
                                    });
                                }
                            });
                        }
                        
                    });
                }
            });    
        }
	});

    $("#prodi").on({
		change:function(){
            id = $('#prodi').val();
            actualizar(id);
        }
	});

    function actualizar(id){
        $.ajax({
            url: '../level1/bd/Consultas.php',
            type:"POST",
            datatype: "json",
            data: {
                valordeConsulta: 8,
                id: id
            }, 
            success: function(data) {
                $.each(JSON.parse(data), function(Nivel, name) {                    

                    valorporUnidad = name.precioVenta;
                    valorporcantidadunidad = name.precioVenta * valor;                    

                    $('#precioUnidad').val(valorporUnidad);
                    $('#preciofi').val(valorporUnidad);
                    $('#Subtotal').val(valorporcantidadunidad);
                
                });
            }
        });
    }
});

function añadircarrito(){
    
    //Añadimos al carrito
    var cantidad = document.getElementById("cantidad").value;
    var id = document.getElementById("prodi").value;
    var Subtotal = document.getElementById("Subtotal").value;
    var precioUnit = document.getElementById("preciofi").value;

    if((cantidad != "") && (Subtotal != "") && (precioUnit != "")){
        let Descripcion;
        let NombreArticulo;
        let fila;
    
        let sumatotaltodo = 0;
    
        $.ajax({
            url: '../level1/bd/Consultas.php',
            type:"POST",
            datatype: "json",
            data: {
                valordeConsulta: 8,
                id: id
            }, 
            success: function(data) {
    
                let dataparse = parseFloat(Subtotal)
                sumatotaltodo = dataparse + sumatotaltodo;     
                
                
    
                $.each(JSON.parse(data), function(Nivel, name) {
    
                    Stock = name.Stock;
                    
                    if(parseFloat(Stock) >= parseFloat(cantidad)){
                        
                        NombreArticulo = name.NombreArticulo;
                        marca = name.Marca;                
                        Modelo = name.Modelopresentacion;
                        Descripcion = marca + ', ' + Modelo;  
    
                        //Armamos la Tabla 
                        fila="<tr>" +
                                "<td class='txt' hidden>"+name.IDAlmacenuno+"</td>"+
                                "<td class='txt'>"+cantidad+"</td>"+
                                "<td class='txt' >"+NombreArticulo+"</td>"+
                                "<td class='txt'>"+Descripcion+"</td>"+
                                "<td class='txt total'>"+Subtotal+"</td>"+
                                "<td class='txt' hidden>"+precioUnit+"</td>"+
                                "<td><button type='button' class='btn btn-danger btnEditar'>Eliminar</button></td>"+
                            "</tr>";
    
                        var btn = document.createElement("TR");
                        btn.innerHTML=fila;
                        document.getElementById("tablita").appendChild(btn);
    
                        totalglobal = sumatotaltodo + totalglobal;
                        //$('#total').val(totalglobal);
                        $('.total > td:eq(0)').html("NIO: "+ totalglobal);
    
    
                    }else{
                        Swal.fire({
                            title: 'ERROR',
                            text: "NO HAY SUFICIENTES PRODUCTOS EN EL ALMACEN 1 REVISE EL STOCK",
                            icon: 'warning',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33'
                        }); 
                    }
                });   
                
    
            }        
        }); 
        
    
        //Limpieza de los valores
        document.getElementById("cantidad").value = "";                
        document.getElementById("precioUnidad").value = "";
        document.getElementById("Subtotal").value = "";
        document.getElementById("preciofi").value = "";
    }else{
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'REVISE QUE TODOS LOS CAMPOS ESTEN LLENOS',
          })

    }
}

//Elimar registro
$(document).on("click", ".btnEditar", function(){
    event.preventDefault();
    valorprecio = parseFloat($(this).closest("tr").find('td:eq(4)').text());
    
    totalglobal = totalglobal - valorprecio;
    $('.total > td:eq(0)').html("NIO: "+ totalglobal);

    $(this).closest('tr').remove();
});

function facturar(){

    $.ajax({
        url: '../level1/bd/Consultas.php',
        type:"POST",
        datatype: "json",
        data: {
            valordeConsulta: 14,
            id: 1
        }, 
        success: function(data) {
            $.each(JSON.parse(data), function(Nivel, name) {
                facturar3(name.estado);
            });
        }
    });
}

function facturar3(descuento){        
    descuento = 0;
    facturar1(descuento, 0);
}

function facturar1(x, y){

    tipofac = $('input:radio[name=gridRadios]:checked').val();

   var Monto = document.getElementById("monto").value;
   var idcliente = document.getElementById("cliente").value;

   if(idcliente != 0){

       if(totalglobal > Monto){ 
        Swal.fire({
            title: 'ERROR',
            text: "EL MONTO INGRESADO ES POCO",
            icon: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33'
        }); 
        }else{
        
        //Guardamos los Valores pues XD
        //Insertar la FACTURA

        if(x != ""){
            x = parseFloat(x);
            sub = totalglobal;
            cambio = Monto - y;
            totalglobal = y;
        }else{
            cambio = Monto - totalglobal;
            sub = 0;
        }

        $.ajax({
            url: '../level1/bd/RegistrosSencillos.php',
            type:"POST",
            datatype: "json",
            data: {
                valorderegistros: 2,
                //Corresponde al Almacen en el que esta
                NumeroAlmacen: 1,
                Total: totalglobal,
                Monto: Monto,
                SubTotal: sub,
                descuento: x,
                cambio: cambio,
                nameuser: idcliente,
                tipofac: tipofac
            }, 
            success: function(data) {
                guardarDetalle();                

                Swal.fire({
                    title: 'Factura lista',
                    text: "Desea imprimir la Factura",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Imprimir'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        let timerInterval
                        Swal.fire({
                          title: 'Imprimiendo Factura',
                          html: 'Proceso de Factura PORFAVOR ESPERE<b></b> Segundos.',
                          timer: 200,
                          timerProgressBar: true,
                          didOpen: () => {
                            Swal.showLoading()
                            timerInterval = setInterval(() => {
                              const content = Swal.getContent()
                              if (content) {
                                const b = content.querySelector('b')
                                if (b) {
                                  b.textContent = Swal.getTimerLeft()
                                }
                              }
                            }, 100)
                          },
                          willClose: () => {
                            clearInterval(timerInterval)
                          }
                        }).then((result) => {
                          if (result.dismiss === Swal.DismissReason.timer) {
                            window.location.href = '../level1/ticket.php';
                          }
                        })
                    }else{
                        location.reload();
                    }
                  })
            }
        });   
    }

    }
    else{
        Swal.fire({
            title: 'ERROR',
            text: "NO HA SELECCIONADO UN CLIENTE",
            icon: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33'
        }); 
    }
}


function guardarDetalle(){
    $('#tabl tbody tr').each(function(idx, fila){ 

        codigoproducto = fila.children[0].innerHTML;
        cantidades = fila.children[1].innerHTML;
        precio = fila.children[4].innerHTML;
        preciounit = fila.children[5].innerHTML;

        //Inserccion de los valores.
        $.ajax({
            url: '../level1/bd/RegistrosSencillos.php',
            type:"POST",
            datatype: "json",
            data: {
                valorderegistros: 3,
                codigoproducto: codigoproducto,
                cantidades: cantidades,
                precio: precio,
                precioUnit: preciounit
            }, 
            success: function(data) {
                console.log("Factura Guardada");
                document.getElementById("monto").value = "";
                document.getElementById("nameuser").value = "Foraneo";
                document.getElementById("ruc").value = "";
            }
        });

    })    
}

function el(el) {
    return document.getElementById(el);
}
  
el('cantidad').addEventListener('input',function() {
    var val = this.value;
    this.value = val.replace(/\D|\-/,'');
});


