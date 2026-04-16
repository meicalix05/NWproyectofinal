<?php
namespace Controllers;

use Utilities\Site;
use Dao\Products\Products as ProductsModel;

class CartAdd extends PublicController {
    public function run(): void {
        $id_producto = (int)($_POST["id_producto"] ?? 0);
        $cantidad_a_agregar = (int)($_POST["cantidad"] ?? 1);

        if ($id_producto > 0) {
            $producto = ProductsModel::getProductById($id_producto);

            if ($producto) {
                $stock_disponible = (int)$producto["stock"];
                $cantidad_en_carrito = 0;
                
                if (isset($_SESSION["carrito"][$id_producto])) {
                    $cantidad_en_carrito = $_SESSION["carrito"][$id_producto]["cantidad"];
                }

                if (($cantidad_en_carrito + $cantidad_a_agregar) <= $stock_disponible) {
                    if (!isset($_SESSION["carrito"])) {
                        $_SESSION["carrito"] = [];
                    }

                    if (isset($_SESSION["carrito"][$id_producto])) {
                        $_SESSION["carrito"][$id_producto]["cantidad"] += $cantidad_a_agregar;
                    } else {
                        $_SESSION["carrito"][$id_producto] = [
                            "id" => $id_producto,
                            "nombre" => $producto["nombre"],
                            "precio" => (float)$producto["precio"],
                            "imagen" => $producto["imagen"],
                            "cantidad" => $cantidad_a_agregar
                        ];
                    }
                    Site::redirectTo("index.php?page=Cart"); 
                } else {
                    Site::redirectTo("index.php?page=Product&id=" . $id_producto . "&error=stock");
                }
            }
        }
    }
}