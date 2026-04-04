<?php

namespace Dao\Mantenimientos;

use Dao\Table;

class DatosVehiculos extends Table
{
    /*
    DatosVehiculos

    id_vehiculo INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(50) NOT NULL,
    modelo VARCHAR(50),
    anio_fabricacion INT,
    tipo_combustible VARCHAR(20),
    kilometraje INT
    */

    public static function getAllVehiculos(): array
    {
        $sqlstr = "SELECT * FROM DatosVehiculos;";
        return self::obtenerRegistros($sqlstr, []);
    }

    public static function getVehiculoById(int $id_vehiculo): array
    {
        $sqlstr = "SELECT * FROM DatosVehiculos WHERE id_vehiculo = :id_vehiculo;";
        $param = ["id_vehiculo" => $id_vehiculo];
        return self::obtenerUnRegistro($sqlstr, $param);
    }

    public static function crearVehiculo(
        $marca,
        $modelo,
        $anio_fabricacion,
        $tipo_combustible,
        $kilometraje
    ): int {
        $sqlstr = "INSERT INTO DatosVehiculos (marca, modelo, anio_fabricacion, tipo_combustible, kilometraje)
                   VALUES (:marca, :modelo, :anio_fabricacion, :tipo_combustible, :kilometraje);";

        $affectedRow = self::executeNonQuery($sqlstr, [
            "marca"            => $marca,
            "modelo"           => $modelo,
            "anio_fabricacion"  => $anio_fabricacion,
            "tipo_combustible" => $tipo_combustible,
            "kilometraje"      => $kilometraje
        ]);
        return $affectedRow;
    }

    public static function actualizarVehiculo(
        $id_vehiculo,
        $marca,
        $modelo,
        $anio_fabricacion,
        $tipo_combustible,
        $kilometraje
    ): int {
        $sqlstr = "UPDATE DatosVehiculos SET
                    marca = :marca,
                    modelo = :modelo,
                    anio_fabricacion = :anio_fabricacion,
                    tipo_combustible = :tipo_combustible,
                    kilometraje = :kilometraje
                   WHERE id_vehiculo = :id_vehiculo;";

        $affectedRow = self::executeNonQuery($sqlstr, [
            "id_vehiculo"      => $id_vehiculo,
            "marca"            => $marca,
            "modelo"           => $modelo,
            "anio_fabricacion"  => $anio_fabricacion,
            "tipo_combustible" => $tipo_combustible,
            "kilometraje"      => $kilometraje
        ]);
        return $affectedRow;
    }

    public static function eliminarVehiculo($id_vehiculo): int
    {
        $sqlstr = "DELETE FROM DatosVehiculos WHERE id_vehiculo = :id_vehiculo;";
        return self::executeNonQuery($sqlstr, ["id_vehiculo" => $id_vehiculo]);
    }
}
