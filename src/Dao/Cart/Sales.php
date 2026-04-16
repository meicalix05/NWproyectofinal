<?php
namespace Dao\Cart;

use Dao\Table;

class Sales extends Table {
    public static function getSalesByUser($usercod) {
        // Usando los nombres de tu tabla 'ventas'
        $sqlstr = "SELECT 
                    id_venta as salesid, 
                    fecha_venta as salesdate, 
                    total as salestotal, 
                    metodo_pago as method,
                    num_transaccion as track
                   FROM ventas 
                   WHERE usercod = :usercod 
                   ORDER BY fecha_venta DESC;";
                   
        return self::obtenerRegistros($sqlstr, ["usercod" => $usercod]);
    }

    public static function getDetailBySale($id_venta) {
        // CORRECCIÓN: Tabla 'venta_detalle' y 'productos'
        $sqlstr = "SELECT d.id_producto, p.nombre, d.cantidad, d.precio_unitario 
                   FROM venta_detalle d
                   INNER JOIN productos p ON d.id_producto = p.id_producto
                   WHERE d.id_venta = :id_venta;";
        return self::obtenerRegistros($sqlstr, ["id_venta" => $id_venta]);
    }
}