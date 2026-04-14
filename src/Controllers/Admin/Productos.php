<?php
namespace Controllers\Admin;

use Controllers\PublicController;
use Views\Renderer;
use Dao\Products\Products as ProductsModel;

class Productos extends PublicController {
    public function run(): void {
        $viewData = [];
        // Traemos los datos de la tabla 'productos'
        $viewData["products"] = ProductsModel::getAllProducts();
        
        // Llamamos a tu vista de lista
        Renderer::render("admin/products", $viewData);
    }
}

