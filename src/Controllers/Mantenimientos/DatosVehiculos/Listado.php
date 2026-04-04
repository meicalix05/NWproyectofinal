<?php

namespace Controllers\Mantenimientos\DatosVehiculos;

use Controllers\PublicController;
use Views\Renderer;
use Dao\Mantenimientos\DatosVehiculos as DatosVehiculosDAO;

const LIST_VIEW_TEMPLATE = "mantenimientos/datosvehiculos/listado";

class Listado extends PublicController
{
    private array $vehiculosList = [];

    public function run(): void
    {
        $this->vehiculosList = DatosVehiculosDAO::getAllVehiculos();
        Renderer::render(LIST_VIEW_TEMPLATE, $this->prepareViewData());
    }

    private function prepareViewData(): array
    {
        return [
            "vehiculos" => $this->vehiculosList
        ];
    }
}
