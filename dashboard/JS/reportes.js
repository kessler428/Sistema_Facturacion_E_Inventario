function generar(){
    var inicio = document.getElementById("dateinicios").value;
    var final = document.getElementById("datefini").value;
    var tienda = document.getElementById("inputGroupSelect01").value;

    if(tienda == 1){
        window.location.href = '../dashboard/imprimirreporte.php?inicio='+inicio+'&final='+final+'&tienda='+tienda;
    }
    if(tienda == 2){
        window.location.href = '../dashboard/topmasvendido.php?inicio='+inicio+'&final='+final+'&tienda='+tienda;
    }   
    
}