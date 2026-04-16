<?php
namespace Controllers;

use Views\Renderer;
use Dao\Cart\Sales as SalesModel; 
use Utilities\Security; 

class History extends PublicController {
    public function run() :void {
        $viewData = array();
        
        // Obtenemos el usuario (ID 1 para tus pruebas actuales)
        $usercod = Security::getUserId(); 
        if (!$usercod) { $usercod = 1; }

        $ventas = SalesModel::getSalesByUser($usercod);
        
        // Buscamos el detalle en 'venta_detalle'
        foreach ($ventas as $key => $venta) {
            $ventas[$key]["detalles"] = SalesModel::getDetailBySale($venta["salesid"]);
        }
        
        $viewData["titulo"] = "Mis Transacciones";
        $viewData["compras"] = $ventas;
        $viewData["tiene_ventas"] = count($ventas) > 0;

        Renderer::render("history", $viewData);
    }
}