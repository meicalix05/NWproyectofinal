<?php
namespace Dao\Products;

use Dao\Table;

class Productos extends Table {
    
    public static function obtenerTodos() {
        return self::obtenerRegistros("SELECT * FROM productos;", []);
    }

    public static function obtenerPorId($id) {
        return self::obtenerUnRegistro(
            "SELECT * FROM productos WHERE id_producto = :id;",
            ["id" => $id]
        );
    }

    public static function insertar($nombre, $descripcion, $precio, $stock, $imagen) {
        $sqlstr = "INSERT INTO productos (nombre, descripcion, precio, stock, imagen) 
                   VALUES (:nombre, :descripcion, :precio, :stock, :imagen);";

        return self::executeNonQuery($sqlstr, [
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "precio" => $precio,
            "stock" => $stock,
            "imagen" => $imagen
        ]);
    }

    public static function eliminar($id) {
        return self::executeNonQuery(
            "DELETE FROM productos WHERE id_producto = :id;",
            ["id" => $id]
        );
    }

    // NUEVO MÉTODO AGREGADO
    public static function getDailyDeals() {
        // Ajusta esta consulta según tu estructura de base de datos
        return self::obtenerRegistros(
            "SELECT * FROM productos ORDER BY id_producto DESC LIMIT 4;", 
            []
        );
    }
}