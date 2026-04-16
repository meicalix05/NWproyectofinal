<?php

namespace Controllers;

use Views\Renderer;
// IMPORTANTE: Esta es la línea que te falta para que no de error 500
use Dao\Cart\Sales as SalesDao; 

class SaleDetail extends PublicController {
    public function run() :void {
        $viewData = array();
        
        $id_venta = $_GET["id"] ?? 0;

        if (intval($id_venta) > 0) {
            $orden = SalesDao::getSaleHeader($id_venta);
            $detalle = SalesDao::getSaleDetailById($id_venta);

            if ($orden) {
                $viewData["orden"] = $orden;
                $viewData["detalle"] = $detalle;
                $viewData["titulo"] = "Detalle de Orden #" . $id_venta;
            } else {
                \Utilities\Site::redirectTo("index.php?page=History");
            }
        } else {
            \Utilities\Site::redirectTo("index.php?page=History");
        }

        // Fíjate en el nombre de la vista: debe ser en minúsculas si el archivo es saledetail.view.tpl
        Renderer::render("saledetail", $viewData);
    }
}