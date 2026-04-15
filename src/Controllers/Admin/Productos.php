<?php
namespace Controllers\Admin;

use Controllers\PublicController;
use Views\Renderer;
use Dao\Products\Products as ProductsModel;

class Productos extends PublicController {
    public function run(): void {
        $viewData = [];
        
        $viewData["products"] = ProductsModel::getAllProducts();
        
        
        Renderer::render("admin/products", $viewData);
    }
}

