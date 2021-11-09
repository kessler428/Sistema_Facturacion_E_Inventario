CREATE VIEW vistadeudas as 
SELECT
    fac.IDFactura AS IDFactura,
    fac.fechaEmision AS fechaEmision,
    fac.cliente AS cliente,
    fac.codigoRUCcedula AS codigoRUCcedula,
    fac.Total AS total,
    (
    SELECT
        SUM(
            residencial.abonoshis.montoAbonado
        )
    FROM
        residencial.abonoshis
    WHERE
        residencial.abonoshis.idFactura = fac.IDFactura
) AS SumaAbonos,
fac.Total -(
    SELECT
        SUM(
            residencial.abonoshis.montoAbonado
        )
    FROM
        residencial.abonoshis
    WHERE
        residencial.abonoshis.idFactura = fac.IDFactura
) AS resta
FROM
    residencial.factura fac
WHERE
    fac.tipofac = 2 AND fac.Total -(
    SELECT
        SUM(
            residencial.abonoshis.montoAbonado
        )
    FROM
        residencial.abonoshis
    WHERE
        residencial.abonoshis.idFactura = fac.IDFactura
) > 0