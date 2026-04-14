<?php
namespace Dao\Products;

use Dao\Table;

class Products extends Table {
    // Función para obtener todos los productos (Nombre exacto que pide el controlador)
    public static function getAllProducts() {
        $sqlstr = "SELECT * FROM productos;";
        return self::obtenerRegistros($sqlstr, []);
    }

    // Función para obtener un solo producto por ID
    public static function getProductById($id) {
        $sqlstr = "SELECT * FROM productos WHERE id_producto = :id;";
        return self::obtenerUnRegistro($sqlstr, ["id" => $id]);
    }

    // Función para insertar (Asegúrate de incluir id_categoria para evitar el error 1452)
    public static function insertProduct($nombre, $descripcion, $precio, $imagen, $estado, $stock, $id_categoria) {
        $sqlstr = "INSERT INTO productos (nombre, descripcion, precio, imagen, estado, stock, id_categoria) 
                   VALUES (:nombre, :descripcion, :precio, :imagen, :estado, :stock, :id_categoria);";
        return self::executeNonQuery($sqlstr, [
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "precio" => $precio,
            "imagen" => $imagen,
            "estado" => $estado,
            "stock" => $stock,
            "id_categoria" => $id_categoria
        ]);
    }
}
