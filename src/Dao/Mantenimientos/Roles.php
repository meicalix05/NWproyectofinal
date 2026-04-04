<?php

namespace Dao\Mantenimientos;

use Dao\Table;

class Roles extends Table
{
    /*
    roles

    rolescod varchar(128) NOT NULL PRIMARY KEY,
    rolesdsc varchar(45) DEFAULT NULL,
    rolesest char(3) DEFAULT NULL
    */

    public static function getAllRoles(): array
    {
        $sqlstr = "SELECT * FROM roles;";
        return self::obtenerRegistros($sqlstr, []);
    }

    public static function getRolById(string $rolescod): array
    {
        $sqlstr = "SELECT * FROM roles WHERE rolescod = :rolescod;";
        $param = ["rolescod" => $rolescod];
        return self::obtenerUnRegistro($sqlstr, $param);
    }

    public static function crearRol(
        $rolescod,
        $rolesdsc,
        $rolesest
    ): int {
        $sqlstr = "INSERT INTO roles (rolescod, rolesdsc, rolesest)
                   VALUES (:rolescod, :rolesdsc, :rolesest);";
        return self::executeNonQuery($sqlstr, [
            "rolescod" => $rolescod,
            "rolesdsc" => $rolesdsc,
            "rolesest" => $rolesest
        ]);
    }

    public static function actualizarRol(
        $rolescod,
        $rolesdsc,
        $rolesest
    ): int {
        $sqlstr = "UPDATE roles SET
                    rolesdsc = :rolesdsc,
                    rolesest = :rolesest
                   WHERE rolescod = :rolescod;";
        return self::executeNonQuery($sqlstr, [
            "rolescod" => $rolescod,
            "rolesdsc" => $rolesdsc,
            "rolesest" => $rolesest
        ]);
    }

    public static function eliminarRol($rolescod): int
    {
        $sqlstr = "DELETE FROM roles WHERE rolescod = :rolescod;";
        return self::executeNonQuery($sqlstr, ["rolescod" => $rolescod]);
    }
}
