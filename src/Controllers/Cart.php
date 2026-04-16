<?php
namespace Controllers;

use Views\Renderer;

class Cart extends PublicController {
    public function run(): void {
        $viewData = [];
        
        // Sincronizamos: Usamos "carrito" en todo el código
        $items = $_SESSION["carrito"] ?? [];
        
        if (empty($items)) {
            $viewData["items"] = false; // Esto activará el mensaje de "Carrito vacío"
        } else {
            $subtotal_general = 0;
            foreach ($items as $key => $item) {
                // Cálculo de subtotal por producto
                $subtotal_linea = $item["precio"] * $item["cantidad"];
                $items[$key]["subtotal_item"] = number_format($subtotal_linea, 2);
                $subtotal_general += $subtotal_linea;
            }

            $isv = $subtotal_general * 0.15;
            $total = $subtotal_general + $isv;

            $viewData["items"] = $items;
            $viewData["subtotal_carrito"] = number_format($subtotal_general, 2);
            $viewData["isv"] = number_format($isv, 2);
            $viewData["total_carrito"] = number_format($total, 2);
            $viewData["total_raw"] = number_format($total, 2, '.', '');
        }

        Renderer::render("cart", $viewData);
    }
}