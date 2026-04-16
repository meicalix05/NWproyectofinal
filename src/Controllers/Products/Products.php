<?php
namespace Dao\Products;

use Dao\Table;

class Products extends Table {
    
    // 1. Obtiene todos los productos (Para el Administrador)
    public static function getAllProducts() {
        $sqlstr = "SELECT * FROM productos;";
        return self::obtenerRegistros($sqlstr, []);
    }

    // 2. Obtiene productos por categoría (Para que NO salga "No hay arreglos")
    public static function getProductsByCategory($category) {
        // Buscamos por el ID de categoría que tienes en tu tabla
        $sqlstr = "SELECT * FROM productos WHERE id_categoria = :category;";
        return self::obtenerRegistros($sqlstr, ["category" => $category]);
    }

    // 3. Función para obtener un solo producto por ID (Para la vista de detalle)
    public static function getProductById($id) {
        $sqlstr = "SELECT * FROM productos WHERE id_producto = :id;";
        return self::obtenerUnRegistro($sqlstr, ["id" => $id]);
    }

    // 4. Función para insertar (Mantiene tu estructura exacta)
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

    // 5. Función para actualizar (Mantiene tu estructura exacta)
    public static function updateProduct($id_producto, $nombre, $descripcion, $precio, $imagen, $estado, $stock, $id_categoria) {
        $sqlstr = "UPDATE productos SET 
                   nombre = :nombre, descripcion = :descripcion, precio = :precio, 
                   imagen = :imagen, estado = :estado, stock = :stock, 
                   id_categoria = :id_categoria 
                   WHERE id_producto = :id_producto;";
        
        return self::executeNonQuery($sqlstr, [
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "precio" => $precio,
            "imagen" => $imagen,
            "estado" => $estado,
            "stock" => $stock,
            "id_categoria" => $id_categoria,
            "id_producto" => $id_producto
        ]);
    }

    // 6. Función para eliminar
    public static function deleteProduct($id_producto) {
        $sqlstr = "DELETE FROM productos WHERE id_producto = :id_producto;";
        return self::executeNonQuery($sqlstr, ["id_producto" => $id_producto]);
    }
}