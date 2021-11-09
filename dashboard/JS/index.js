Viewusuarios();

function Viewusuarios(){



    //Vista de Usuarios
    $.ajax({
        url: '../dashboard/bd/Consultas.php',
        type:"POST",
        datatype: "json",
        data: {
            valordeConsulta: 1, 
        }, 
        success: function(data1) {
            let usu = JSON.parse(data1)[0].numberusuarios;
            $('#NumeroUsuariossistema').html(usu);
        }
    });

    //Vista de total de productos del inventario
    $.ajax({
        url: '../dashboard/bd/Consultas.php',
        type:"POST",
        datatype: "json",
        data: {
            valordeConsulta: 2, 
        }, 
        success:function(data2){
            let inv = JSON.parse(data2)[0].keslerpendejo;
            $('#inventario').html(inv);
        }
     });

     $.ajax({
      url: '../dashboard/bd/Consultas.php',
      type:"POST",
      datatype: "json",
      data: {
          valordeConsulta: 12, 
      }, 
      success:function(data){
          let inv = JSON.parse(data)[0].suma;
          $('#dineroencaja').html(parseFloat(inv).toLocaleString(undefined, {minimumFractionDigits: 2}));
      }
   });

   $.ajax({
    url: '../dashboard/bd/Consultas.php',
    type:"POST",
    datatype: "json",
    data: {
        valordeConsulta: 13, 
    }, 
    success:function(data){
        let inv = JSON.parse(data)[0].sumafac;
        $('#Ventasdeldia').html(inv);
    }
 });

 $.ajax({
  url: '../dashboard/bd/Consultas.php',
  type:"POST",
  datatype: "json",
  data: {
      valordeConsulta: 15, 
  }, 
  success:function(data){
      let venta = JSON.parse(data)[0].venta;
      $('#ventatotal').html("C$: "+ parseFloat(venta).toLocaleString(undefined, {minimumFractionDigits: 2}));

      let compra = JSON.parse(data)[0].compra;
      $('#compras').html("C$: "+parseFloat(compra).toLocaleString(undefined, {minimumFractionDigits: 2}));

      let ganancias = JSON.parse(data)[0].ganancias;
      $('#ganancias').html("C$: "+ parseFloat(ganancias).toLocaleString(undefined, {minimumFractionDigits: 2}));
  }
});

 $.ajax({
  url: '../dashboard/bd/Consultas.php',
  type:"POST",
  datatype: "json",
  data: {
      valordeConsulta: 14, 
  }, 
  success:function(data){
      let uno = JSON.parse(data)[0].uno;
      $('#uno').html(uno);

      let dos = JSON.parse(data)[0].dos;
      $('#dos').html(dos);

      let tres = JSON.parse(data)[0].tres;
      $('#tres').html(tres);

      let cuatro = JSON.parse(data)[0].cuatro;
      $('#cuatro').html(cuatro);
  }
});
}


function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }

  $(document).ready(function(){

    $(function () {
      'use strict'
  
      var salesChartData = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [
          {
            label: 'Digital Goods',
            backgroundColor: 'rgba(60,141,188,0.9)',
            borderColor: 'rgba(60,141,188,0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: [28, 48, 40, 19, 86, 27, 90]
          },
          {
            label: 'Electronics',
            backgroundColor: 'rgba(210, 214, 222, 1)',
            borderColor: 'rgba(210, 214, 222, 1)',
            pointRadius: false,
            pointColor: 'rgba(210, 214, 222, 1)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: [65, 59, 80, 81, 56, 55, 40]
          }
        ]
      }
    })

    
  $.ajax({
    url: '../dashboard/bd/insercciones.php',
    type:"POST",
    datatype: "json",
    data: {
        valordeConsulta: 5
    },success(data){
      //tienda
      if((JSON.parse(data)[0].estado) == 1)
          $('#tienda').bootstrapToggle('on');

    }
  })

    $.ajax({
      url: '../dashboard/bd/insercciones.php',
      type:"POST",
      datatype: "json",
      data: {
          valordeConsulta: 3
      }, 
      success:function(data){
        if((JSON.parse(data)[0].almacen == 1) && (JSON.parse(data)[0].estado == 1))
            $('#unochek').bootstrapToggle('on');

        if((JSON.parse(data)[1].almacen == 2) && (JSON.parse(data)[1].estado == 1))
            $('#doschek').bootstrapToggle('on');
        
            
        if((JSON.parse(data)[2].almacen == 3) && (JSON.parse(data)[2].estado == 1))
            $('#treschek').bootstrapToggle('on');

        
        if((JSON.parse(data)[3].almacen == 4) && (JSON.parse(data)[3].estado == 1))
            $('#cuatrochek').bootstrapToggle('on');
          
      }
    });

    $(function() {
      $('#unochek').change(function() {
        estado = $(this).prop('checked');
        cambiarestado(estado, 1);
      })
    })
  })


  function cambiartienda(estado, valor){

    if(estado){
      estado = 1;
    }else{
      estado = 0;
    }

    $.ajax({
      url: '../dashboard/bd/insercciones.php',
      type:"POST",
      datatype: "json",
      data: {
          valordeConsulta: 4,
          estado: estado,
          valor: valor
      }, 
      success:function(data){
          
      }
    });


  }

  function cambiarestado(estado, valor){

    if(estado){
      estado = 1;
    }else{
      estado = 0;
    }

    $.ajax({
      url: '../dashboard/bd/insercciones.php',
      type:"POST",
      datatype: "json",
      data: {
          valordeConsulta: 2,
          estado: estado,
          valor: valor
      }, 
      success:function(data){
          
      }
    });

  }
