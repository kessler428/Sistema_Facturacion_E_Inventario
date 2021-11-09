<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>

    <?php

        include_once './bd/conexion.php';
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();

        $idfacturavieja = $_GET["id"];

        //Consulta de detalle de Factura.
        $consult = "SELECT fac.IDFactura, 
                            fac.Total, 
                            fac.montopagado, 
                            fac.cambio, 
                            det.Unidades, 
                            al.NombreArticulo, 
                            det.Precio,
                            det.preciounit,
                            al.precioVenta,
                            al.Modelopresentacion,
                            fac.descuento,
                            fac.cliente,
                            fac.codigoRUCcedula
                        FROM factura as fac 
                        INNER JOIN detalledefactura as det ON det.IDFacturaPK = fac.IDFactura
                        INNER JOIN almacenuno as uno ON uno.IDAlmacenuno = det.producto
                        INNER JOIN almacen as al ON al.IDCodigoAlmacen = uno.IDCodigoAlmacenPK
                        WHERE fac.IDFactura = '$idfacturavieja'";

        $consulta = $consult;			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();      
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
       
        json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
        $conexion = NULL;
    ?>


        <div class="ticket">
        <img
                src="../dashboard/img/logo.jpg"
                alt="Logotipo">
            <p class="centrado">BRAVO´S<br>LLANTAS Y REPUESTOS<br>
            LL Y R
            <br>RUC: 4081703600001C
            <br id='fechahora' name="fechahora">N° Factura: 000<?php echo $data[0]["IDFactura"];?>
            <br>Cliente: <?php echo $data[0]["cliente"];?>
            <br>Codigo RUC Cliente: <?php echo $data[0]["codigoRUCcedula"];?></p>

        <table>
                <thead>
                    <tr>
                        <th>CANT</th>
                        <th>PRODUCTO</th>
                        <th>P.UNIT</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($data as $dat) {
                    ?>
                        <tr>
                            <td><?php echo $dat['Unidades'] ?></td>
                            <td><?php echo (($dat['NombreArticulo'])." ".($dat['Modelopresentacion'])) ?></td>
                            <td><?php echo number_format($dat['preciounit'], 2, '.', ''); ?></td>                                        
                            <td><?php 
                                        echo number_format(($dat['preciounit']) * ($dat['Unidades']),2,'.',''); 
                            ?></td>    
                            
                        </tr>                        
                    <?php
                        }
                    ?>
                </tbody>
                <tfooter>
                        <?php if($data[0]["descuento"] != "0"){ ?>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>DESCUENTO: </th>
                            <th><?php echo $data[0]["descuento"];?></th>
                        </tr>
                        <?php } ?>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>TOTAL: </th>
                            <th> <?php echo number_format(($data[0]["Total"]),2); ?> </th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>TOTAL RECIBIDO: </th>
                            <th><?php echo $data[0]["montopagado"];?></th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>CAMBIO: </th>
                            <th><?php echo $data[0]["cambio"];?></th>
                        </tr>
                    </tfooter>
            </table>
            <p class="centrado">¡GRACIAS POR SU COMPRA!<br></p>
        </div>
    </body>
    <footer>
        <div class="ticket">
            <P class="centrado">FAVOR GUARDAR <br>ESTE DOCUMENTO</P>
        </div>
    </footer>
</html>

<script>
//window.print();
</script>

<style>
* {
    font-size: 12px;
    font-family: 'Times New Roman';
}

td,
th,
tr,
table {
    border-top: 1px solid black;
    border-collapse: collapse;
}

td.producto,
th.producto {
    width: 75px;
    max-width: 75px;
}

td.cantidad,
th.cantidad {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

td.precio,
th.precio {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

.centrado {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 200px;
    max-width: 300px;
    align-content: center;
}

img {
    max-width: inherit;
    width: inherit;
}</style>