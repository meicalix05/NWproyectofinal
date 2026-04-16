<?php

namespace Controllers;

use Views\Renderer;
use Dao\Products\Products as ProductsDao;
use Dao\Products\Categories as CategoriesDao;

class Category extends PublicController {
    public function run() :void {
        $viewData = array();
        
        // Capturamos el ID de la URL: index.php?page=Category&id=1
        $id_categoria = $_GET["id"] ?? 0;

        // 1. Buscamos la info de la categoría para el título
        $categoria = CategoriesDao::getCategoryById($id_categoria);

        if ($categoria) {
            $viewData["categoria_nombre"] = $categoria["nombre_categoria"];
            $viewData["id_categoria"] = $categoria["id_categoria"];
            
            // 2. Buscamos los productos de esa categoría
            $productos = ProductsDao::getProductsByCategory($id_categoria);
            
            // Si hay productos, los mandamos a la vista
            if (count($productos) > 0) {
                $viewData["productos"] = $productos;
                $viewData["hasProducts"] = true;
            } else {
                $viewData["hasProducts"] = false;
            }
        } else {
            // Si la categoría no existe, mostramos "Categoría No Encontrada"
            $viewData["categoria_nombre"] = "Categoría No Encontrada";
            $viewData["hasProducts"] = false;
        }

        Renderer::render("category", $viewData);
    }
}