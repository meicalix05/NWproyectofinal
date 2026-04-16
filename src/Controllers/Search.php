<?php
namespace Controllers;

use Controllers\PublicController;
use Dao\Products\Products;
use Views\Renderer;

class Search extends PublicController {
    public function run(): void {
        $viewData = array();
        
        // Capturamos el término 'term' que viene del input del header
        $searchTerm = $_GET["term"] ?? "";
        
        $viewData["search_term"] = $searchTerm;
        $viewData["titulo_categoria"] = "Resultados para: '" . $searchTerm . "'";
        
        if (!empty($searchTerm)) {
            $viewData["productos"] = Products::getProductsBySearch($searchTerm);
        } else {
            $viewData["productos"] = [];
        }

        // Reutilizamos la vista de category.view.tpl para no escribir doble código CSS
        Renderer::render("category", $viewData);
    }
}