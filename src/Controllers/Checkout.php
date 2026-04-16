<?php
namespace Controllers;

use Views\Renderer;
use Utilities\Site;
use Dao\Products\Products as ProductsModel;

class Checkout extends PublicController {
    public function run(): void {
        $viewData = array();
        $items = $_SESSION["carrito"] ?? [];

        if (count($items) > 0) {
            $total = 0;

            // PROCESAR CADA PRODUCTO DEL CARRITO
            foreach ($items as $item) {
                $total += $item["precio"] * $item["cantidad"];

                // APLICAR DESCUENTO EN BASE DE DATOS
                // Esto restará el stock y cambiará el estado a 'Agotado' si llega a 0
                ProductsModel::decreaseStock($item["id"], $item["cantidad"]);
            }

            $viewData["productos"] = $items;
            $viewData["total"] = $total;
            $viewData["orden_id"] = "FL-" . rand(1000, 9999);

            // Limpiamos el carrito porque ya se compró
            $_SESSION["carrito"] = [];

            Renderer::render("checkout_success", $viewData);
        } else {
            Site::redirectTo("index.php?page=category&id=amor");
        }
    }
}