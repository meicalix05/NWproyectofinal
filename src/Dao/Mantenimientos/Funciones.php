<?php

namespace Dao\Mantenimientos;

use Dao\Table;

class Funciones extends Table
{
    /*
    funciones

    fncod varchar(255) NOT NULL PRIMARY KEY,
    fndsc varchar(255) DEFAULT NULL,
    fnest char(3) DEFAULT NULL,
    fntyp char(3) DEFAULT NULL
    */

    public static function getAllFunciones(): array
    {
        $sqlstr = "SELECT * FROM funciones;";
        return self::obtenerRegistros($sqlstr, []);
    }

    public static function getFuncionById(string $fncod): array
    {
        $sqlstr = "SELECT * FROM funciones WHERE fncod = :fncod;";
        $param = ["fncod" => $fncod];
        return self::obtenerUnRegistro($sqlstr, $param);
    }

    public static function crearFuncion(
        $fncod,
        $fndsc,
        $fnest,
        $fntyp
    ): int {
        $sqlstr = "INSERT INTO funciones (fncod, fndsc, fnest, fntyp)
                   VALUES (:fncod, :fndsc, :fnest, :fntyp);";
        return self::executeNonQuery($sqlstr, [
            "fncod" => $fncod,
            "fndsc" => $fndsc,
            "fnest" => $fnest,
            "fntyp" => $fntyp
        ]);
    }

    public static function actualizarFuncion(
        $fncod,
        $fndsc,
        $fnest,
        $fntyp
    ): int {
        $sqlstr = "UPDATE funciones SET
                    fndsc = :fndsc,
                    fnest = :fnest,
                    fntyp = :fntyp
                   WHERE fncod = :fncod;";
        return self::executeNonQuery($sqlstr, [
            "fncod" => $fncod,
            "fndsc" => $fndsc,
            "fnest" => $fnest,
            "fntyp" => $fntyp
        ]);
    }

    public static function eliminarFuncion($fncod): int
    {
        $sqlstr = "DELETE FROM funciones WHERE fncod = :fncod;";
        return self::executeNonQuery($sqlstr, ["fncod" => $fncod]);
    }
}
