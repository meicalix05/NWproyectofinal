<?php

namespace Controllers\Productos;

use Controllers\PublicController;
use Views\Renderer;

class Hello extends PublicController
{

    private string $txtNombre = "";
    private string $txtResultado = "";
    private array $viewData = [];
    public function run(): void
    {
        $viewData = [];

        if ($this->isPostBack()) {
            $this->txtNombre = $_POST["txtNombre"] ?? ""; //COALESCE
            if ($this->txtNombre === "") {
                $this->txtResultado = "Error: el nombre viene vacio";
            } else {
                $this->txtResultado = "Bienvenido, hola " . $this->txtNombre;
            }
        }
        $this->prepararViewData();

        Renderer::render("productos/hello", $this->viewData);
    }


    private function prepararViewData()
    {
        $this->viewData["txtNombre"] = $this->txtNombre;
        $this->viewData["mensajeFinal"] = $this->txtResultado;
    }
}
