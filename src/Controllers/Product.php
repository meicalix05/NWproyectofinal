<?php
namespace Controllers;

use Views\Renderer;
use Dao\Products\Products as ProductsModel;

class Product extends PublicController {
    public function run() :void {
        $id = $_GET["id"] ?? 0;
        $producto = ProductsModel::getProductById($id);

        if (!$producto) {
            \Utilities\Site::redirectTo("index.php");
        }

        $viewData = $producto;
        $viewData["titulo"] = $producto["nombre"];

        // FORZAMOS LA VALIDACIÓN (Como hay 15 o 12 unidades, esto será TRUE)
        $hayStock = intval($producto["stock"]) > 0;
        
        $viewData["hasStock"] = $hayStock;
        $viewData["canBuy"] = $hayStock; // Por si tu .tpl usa canBuy
        
        Renderer::render("product_detail", $viewData);
    }
}