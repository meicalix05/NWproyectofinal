<?php
namespace Controllers;

use Views\Renderer;
use Dao\Products\Products as ProductsModel;

class HomeController extends PublicController {
    public function run() :void {
        $viewData = array();
        
        // Llamamos a la función que creamos en el paso 1
        $viewData["dailyDeals"] = ProductsModel::getDailyDeals();
        
        Renderer::render("home", $viewData);
    }
}