<?php
namespace Dao\Products;

use Dao\Table;

class Products extends Table {
    
    public static function getAllProducts() {
        // Tu tabla se llama 'products' según la imagen
        $sqlstr = "SELECT * FROM products;"; 
        return self::obtenerRegistros($sqlstr, []);
    }

    public static function getProductById($id) {
        $sqlstr = "SELECT * FROM products WHERE productId = :id;"; 
        return self::obtenerUnRegistro($sqlstr, ["id" => $id]);
    }

    public static function insertProduct($nombre, $descripcion, $precio, $imagen, $estado, $stock, $id_categoria) {
        // Nombres de columnas según tu captura image_0ee7a1.jpg
        $sqlstr = "INSERT INTO products (productName, productDescription, productPrice, productImgUrl, productStatus, productStock, categoryId) 
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
