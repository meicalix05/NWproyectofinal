<?php
namespace Controllers\Admin;

use Controllers\PublicController;
use Views\Renderer;
use Dao\Products\Products as ProductsModel;
use Utilities\Site;

class ProductForm extends PublicController {
    public function run(): void {
        $viewData = [
            "mode_dsc" => "Agregar Nuevo Producto"
        ];

        if ($this->isPostBack()) {
            $nombre = $_POST["nombre"];
            $precio = (float)$_POST["precio"];
            $stock  = (int)$_POST["stock"];
            $imagen = "default.jpg";

            if (isset($_FILES["imagen_file"]) && $_FILES["imagen_file"]["name"] !== "") {
                $nom_archivo = time() . "_" . $_FILES["imagen_file"]["name"];
                if (move_uploaded_file($_FILES["imagen_file"]["tmp_name"], "public/img/productos/" . $nom_archivo)) {
                    $imagen = $nom_archivo;
                }
            }

            
            ProductsModel::insertProduct($nombre, "Arreglo Floral", $precio, $imagen, "disponible", $stock, 1);
            
          
            Site::redirectTo("index.php?page=Admin_Productos");
        }

      
        Renderer::render("admin/product_form", $viewData);
    }
}