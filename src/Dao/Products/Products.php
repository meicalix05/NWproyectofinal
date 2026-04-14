<?php
namespace Dao\Products;

use Dao\Table;

class Products extends Table {

    public static function getAllProducts() {
        $sqlstr = "SELECT * FROM productos;";
        return self::obtenerRegistros($sqlstr, []);
    }

    public static function getProductById($id) {
        $sqlstr = "SELECT * FROM productos WHERE id_producto = :id;";
        return self::obtenerUnRegistro($sqlstr, ["id" => $id]);
    }

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

    // 🔽 Métodos que tu HomeController necesita
    public static function getDailyDeals() {
        // Usamos estado = 'oferta' para marcar productos en promoción
        $sqlstr = "SELECT * FROM productos WHERE estado = 'oferta';";
        return self::obtenerRegistros($sqlstr, []);
    }

    public static function getFeaturedProducts() {
        // Usamos estado = 'destacado' para marcar productos destacados
        $sqlstr = "SELECT * FROM productos WHERE estado = 'destacado';";
        return self::obtenerRegistros($sqlstr, []);
    }

    public static function getNewProducts() {
        // Como no hay fecha_creacion, podemos usar id_producto DESC para simular "nuevos"
        $sqlstr = "SELECT * FROM productos ORDER BY id_producto DESC LIMIT 10;";
        return self::obtenerRegistros($sqlstr, []);
    }
}