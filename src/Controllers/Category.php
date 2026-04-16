<?php
namespace Controllers;

use Views\Renderer;
use Dao\Products\Products as ProductsModel;

class Category extends PublicController {
    public function run() :void {
        $viewData = array();
        
        // 1. Capturamos el slug (ej: 'amor') de la URL
        $cat_slug = $_GET["id"] ?? 'amor'; 

        // 2. Mapa de traducción para el título y el ID
        $nombres = [
            "amor" => "Colección Amor",
            "cumple" => "Cumpleaños",
            "grad" => "Graduación",
            "ramos" => "Ramos",
            "caballeros" => "Para Caballeros",
            "condolencias" => "Condolencias",
            "mama" => "Ofertas para Mamá",
            "premium" => "Colección Premium"
        ];

        // 3. Obtenemos los productos usando el slug
        // Usaremos el método que ya tienes en el DAO que maneja esta lógica
        $viewData["productos"] = ProductsModel::getProductsByCategory($cat_slug);
        
        // 4. Pasamos el título y el ID para el banner
        $viewData["titulo_categoria"] = $nombres[$cat_slug] ?? "Nuestros Arreglos";
        $viewData["categoria_id"] = $cat_slug;

        Renderer::render("category", $viewData);
    }
}