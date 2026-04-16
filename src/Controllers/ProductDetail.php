<?php
namespace Controllers;

use Views\Renderer;
use Dao\Products\Products as ProductsDao;

class ProductDetail extends PublicController {
    public function run() :void {
        $id = $_GET["id"] ?? 0;
        $producto = ProductsDao::getProductById($id);

        if ($producto) {
            $viewData = $producto;
            
            // Esta variable es la "llave" para que el botón aparezca
            // Como en tu foto hay 12 unidades, esto será verdadero
            $viewData["hasStock"] = intval($producto["stock"]) > 0;
            
            Renderer::render("product_detail", $viewData);
        } else {
            \Utilities\Site::redirectTo("index.php");
        }
    }
}