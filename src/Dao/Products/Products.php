<?php
namespace Dao\Products;

use Dao\Table;

class Products extends Table {
    
    /**
     * Obtiene todos los productos para el panel de administración
     * Soluciona el Error 500 en Admin_Productos
     */
    public static function getAllProducts() {
        $sqlstr = "SELECT * FROM productos;";
        return self::obtenerRegistros($sqlstr, []);
    }

    /**
     * Muestra productos por categoría
     * Soluciona el error de "No hay arreglos disponibles"
     */
    public static function getProductsByCategory($categorySlug) {
        // Forzamos minúsculas para que "AMOR" o "amor" funcionen igual
        $slug = strtolower($categorySlug);

        $catMap = [
            "amor"        => 1, 
            "cumpleaños"  => 2, 
            "cumple"      => 2,
            "graduación"  => 3, 
            "grad"        => 3,
            "ramos"       => 4,
            "caballeros"  => 5, 
            "condolencias"=> 6, 
            "mama"        => 7, 
            "premium"     => 8
        ];
        
        $catId = $catMap[$slug] ?? 1;
        
        // Cambiado a 'disponible' porque así están tus registros en la DB
        $sqlstr = "SELECT * FROM productos WHERE id_categoria = :catId AND estado = 'disponible';";
        return self::obtenerRegistros($sqlstr, ["catId" => $catId]);
    }

    /**
     * Obtiene un producto por ID
     * Útil para detalles y carritos
     */
    public static function getProductById($id) {
        $sqlstr = "SELECT * FROM productos WHERE id_producto = :id;";
        return self::obtenerUnRegistro($sqlstr, ["id" => $id]);
    }

    /**
     * Para la página principal
     */
    public static function getDailyDeals() {
        // Ajustado también a 'disponible' para que se vean en el Home
        $sqlstr = "SELECT * FROM productos WHERE estado = 'disponible' LIMIT 4;";
        return self::obtenerRegistros($sqlstr, []);
    }
}