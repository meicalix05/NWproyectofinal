<?php

namespace Controllers\Mantenimientos\DatosVehiculos;

use Dao\Mantenimientos\DatosVehiculos as DatosVehiculosDAO;
use Controllers\PublicController;
use Views\Renderer;
use Utilities\Site;

const DATOSVEHICULOS_FORMULARIO_URL = "index.php?page=Mantenimientos-DatosVehiculos-Formulario";
const DATOSVEHICULOS_LISTADO_URL    = "index.php?page=Mantenimientos-DatosVehiculos-Listado";
const XSRF_KEY                      = "Mantenimientos_DatosVehiculos_Formulario";

class Formulario extends PublicController
{
    private array $viewData = [];
    private array $modes = [
        "INS" => "Nuevo Vehículo",
        "UPD" => "Actualizar %s %s",
        "DSP" => "Detalle de %s %s",
        "DEL" => "Eliminando %s %s"
    ];
    private array $confirmTooltips = [
        "INS" => "",
        "UPD" => "",
        "DSP" => "",
        "DEL" => "¿Está Seguro de Realizar la Eliminación? ¡¡Esto no se puede Revertir!!"
    ];

    private $id_vehiculo;
    private $marca;
    private $modelo;
    private $anio_fabricacion;
    private $tipo_combustible;
    private $kilometraje;

    private $xsrfToken = '';
    private $mode;

    public function run(): void
    {
        $this->LoadPage();
        if ($this->isPostBack()) {
            $this->CapturarDatos();
            if ($this->ValidarDatos()) {
                switch ($this->mode) {
                    case "INS":
                        if (DatosVehiculosDAO::crearVehiculo(
                            $this->marca,
                            $this->modelo,
                            $this->anio_fabricacion,
                            $this->tipo_combustible,
                            $this->kilometraje
                        ) !== 0) {
                            Site::redirectToWithMsg(DATOSVEHICULOS_LISTADO_URL, "Vehículo creado satisfactoriamente");
                        }
                        break;
                    case "UPD":
                        if (DatosVehiculosDAO::actualizarVehiculo(
                            $this->id_vehiculo,
                            $this->marca,
                            $this->modelo,
                            $this->anio_fabricacion,
                            $this->tipo_combustible,
                            $this->kilometraje
                        ) !== 0) {
                            Site::redirectToWithMsg(DATOSVEHICULOS_LISTADO_URL, "Vehículo actualizado satisfactoriamente");
                        }
                        break;
                    case "DEL":
                        if (DatosVehiculosDAO::eliminarVehiculo(
                            $this->id_vehiculo
                        ) !== 0) {
                            Site::redirectToWithMsg(DATOSVEHICULOS_LISTADO_URL, "Vehículo eliminado satisfactoriamente");
                        }
                        break;
                }
            }
        }
        $this->GenerarViewData();
        Renderer::render("mantenimientos/datosvehiculos/formulario", $this->viewData);
    }

    private function LoadPage(): void
    {
        $this->mode = $_GET["mode"] ?? '';
        if (!isset($this->modes[$this->mode])) {
            Site::redirectToWithMsg(DATOSVEHICULOS_LISTADO_URL, "Error al cargar formulario, Intente de nuevo");
        }
        $this->id_vehiculo = intval($_GET["id"] ?? '0');
        if ($this->mode !== "INS" && $this->id_vehiculo <= 0) {
            Site::redirectToWithMsg(DATOSVEHICULOS_LISTADO_URL, "Error al cargar formulario, Se requiere Id del Vehículo");
        } else {
            if ($this->mode !== "INS") {
                $this->CargarDatos();
            }
        }
    }

    private function CargarDatos(): void
    {
        $tmpVehiculo = DatosVehiculosDAO::getVehiculoById($this->id_vehiculo);
        if (count($tmpVehiculo) <= 0) {
            Site::redirectToWithMsg(DATOSVEHICULOS_LISTADO_URL, "No se encontró el Vehículo");
        }
        $this->marca            = $tmpVehiculo["marca"];
        $this->modelo           = $tmpVehiculo["modelo"];
        $this->anio_fabricacion = $tmpVehiculo["año_fabricacion"];
        $this->tipo_combustible = $tmpVehiculo["tipo_combustible"];
        $this->kilometraje      = $tmpVehiculo["kilometraje"];
    }

    private function CapturarDatos(): void
    {
        $this->id_vehiculo      = intval($_POST["id"]               ?? '0');
        $this->marca            = $_POST["marca"]                   ?? '';
        $this->modelo           = $_POST["modelo"]                  ?? '';
        $this->anio_fabricacion = intval($_POST["anio_fabricacion"] ?? '0');
        $this->tipo_combustible = $_POST["tipo_combustible"]        ?? '';
        $this->kilometraje      = intval($_POST["kilometraje"]      ?? '0');
        $this->xsrfToken        = $_POST["uuid"]                    ?? '';
    }

    private function ValidarDatos(): bool
    {
        $sessionToken = $_SESSION[XSRF_KEY] ?? '';
        if ($this->xsrfToken !== $sessionToken) {
            Site::redirectToWithMsg(DATOSVEHICULOS_LISTADO_URL, "Error al cargar formulario, Inconsistencia en la Petición");
        }
        $validateId = intval($_GET["id"] ?? '0');
        if ($validateId !== $this->id_vehiculo) {
            return false;
        }
        return true;
    }

    private function GenerarViewData(): void
    {
        $this->viewData["mode"]             = $this->mode;
        $this->viewData["modeDsc"]          = sprintf($this->modes[$this->mode], $this->id_vehiculo, $this->marca);
        $this->viewData["id"]               = $this->id_vehiculo;
        $this->viewData["marca"]            = $this->marca;
        $this->viewData["modelo"]           = $this->modelo;
        $this->viewData["año_fabricacion"]  = $this->anio_fabricacion;
        $this->viewData["tipo_combustible"] = $this->tipo_combustible;
        $this->viewData["kilometraje"]      = $this->kilometraje;
        $this->viewData["isReadonly"]       = ($this->mode === 'DEL' || $this->mode === 'DSP') ? 'readonly' : '';
        $this->viewData["hideConfirm"]      = $this->mode === 'DSP';
        $this->viewData["confirmToolTip"]   = $this->confirmTooltips[$this->mode];
        $this->viewData["xsrf_token"]       = $this->GenerateXSRFToken();
    }

    private function GenerateXSRFToken(): string
    {
        $tmpStr             = "datosvehiculos_formulario" . time() . rand(10000, 99999);
        $this->xsrfToken    = md5($tmpStr);
        $_SESSION[XSRF_KEY] = $this->xsrfToken;
        return $this->xsrfToken;
    }
}
