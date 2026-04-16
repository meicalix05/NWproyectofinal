<?php
namespace Controllers\Admin;

use Controllers\PublicController;
use Views\Renderer;
use Dao\Products\Products as ProductsModel;
use Utilities\Site;

class ProductForm extends PublicController {
    public function run(): void {
        $viewData = [
            "mode_dsc" => "Agregar Nuevo Producto",
            "error" => ""
        ];

        if ($this->isPostBack()) {
            // 1. CAPTURA DE DATOS
            $nombre = $_POST["nombre"];
            $descripcion = $_POST["descripcion"]; // <--- CAPTURAMOS LA NUEVA DESCRIPCIÓN
            $precio = (float)$_POST["precio"];
            $stock  = (int)$_POST["stock"];
            $imagen = "default.jpg";
            $id_categoria = (int)$_POST["id_categoria"];

            // 2. VALIDACIÓN DE STOCK
            if ($stock < 1) {
                $viewData["error"] = "El stock debe ser mayor a 0.";
            } else {
                // Manejo de la imagen
                if (isset($_FILES["imagen_file"]) && $_FILES["imagen_file"]["name"] !== "") {
                    $nom_archivo = time() . "_" . $_FILES["imagen_file"]["name"];
                    if (move_uploaded_file($_FILES["imagen_file"]["tmp_name"], "public/img/productos/" . $nom_archivo)) {
                        $imagen = $nom_archivo;
                    }
                }

                // 3. INSERCIÓN EN LA BASE DE DATOS
                // Reemplazamos "Arreglo Floral" por la variable $descripcion
                ProductsModel::insertProduct(
                    $nombre, 
                    $descripcion, 
                    $precio, 
                    $imagen, 
                    "disponible", 
                    $stock, 
                    $id_categoria
                );
                
                // Redirección al listado
                Site::redirectTo("index.php?page=Admin_Productos");
                return;
            }
        }

        Renderer::render("admin/product_form", $viewData);
    }
}