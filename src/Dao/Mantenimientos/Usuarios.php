<?php

namespace Dao\Mantenimientos;

use Dao\Table;

class Usuarios extends Table
{
    /*
    usuario

    usercod bigint(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    useremail varchar(80) DEFAULT NULL UNIQUE,
    username varchar(80) DEFAULT NULL,
    userpswd varchar(128) DEFAULT NULL,
    userfching datetime DEFAULT NULL,
    userpswdest char(3) DEFAULT NULL,
    userpswdexp datetime DEFAULT NULL,
    userest char(3) DEFAULT NULL,
    useractcod varchar(128) DEFAULT NULL,
    userpswdchg varchar(128) DEFAULT NULL,
    usertipo char(3) DEFAULT NULL
    */

    public static function getAllUsuarios(): array
    {
        $sqlstr = "SELECT * FROM usuario;";
        return self::obtenerRegistros($sqlstr, []);
    }

    public static function getUsuarioById(int $usercod): array
    {
        $sqlstr = "SELECT * FROM usuario WHERE usercod = :usercod;";
        $param = ["usercod" => $usercod];
        return self::obtenerUnRegistro($sqlstr, $param);
    }

    public static function crearUsuario(
        $useremail,
        $username,
        $userpswd,
        $userfching,
        $userpswdest,
        $userpswdexp,
        $userest,
        $useractcod,
        $userpswdchg,
        $usertipo
    ): int {
        $sqlstr = "INSERT INTO usuario (useremail, username, userpswd, userfching, userpswdest, userpswdexp, userest, useractcod, userpswdchg, usertipo)
                   VALUES (:useremail, :username, :userpswd, :userfching, :userpswdest, :userpswdexp, :userest, :useractcod, :userpswdchg, :usertipo);";
        return self::executeNonQuery($sqlstr, [
            "useremail" => $useremail,
            "username" => $username,
            "userpswd" => $userpswd,
            "userfching" => $userfching,
            "userpswdest" => $userpswdest,
            "userpswdexp" => $userpswdexp,
            "userest" => $userest,
            "useractcod" => $useractcod,
            "userpswdchg" => $userpswdchg,
            "usertipo" => $usertipo
        ]);
    }

    public static function actualizarUsuario(
        $usercod,
        $useremail,
        $username,
        $userpswd,
        $userfching,
        $userpswdest,
        $userpswdexp,
        $userest,
        $useractcod,
        $userpswdchg,
        $usertipo
    ): int {
        $sqlstr = "UPDATE usuario SET
                    useremail = :useremail, username = :username,
                    userpswd = :userpswd, userfching = :userfching,
                    userpswdest = :userpswdest, userpswdexp = :userpswdexp,
                    userest = :userest, useractcod = :useractcod,
                    userpswdchg = :userpswdchg, usertipo = :usertipo
                   WHERE usercod = :usercod;";
        return self::executeNonQuery($sqlstr, [
            "usercod" => $usercod,
            "useremail" => $useremail,
            "username" => $username,
            "userpswd" => $userpswd,
            "userfching" => $userfching,
            "userpswdest" => $userpswdest,
            "userpswdexp" => $userpswdexp,
            "userest" => $userest,
            "useractcod" => $useractcod,
            "userpswdchg" => $userpswdchg,
            "usertipo" => $usertipo
        ]);
    }

    public static function eliminarUsuario($usercod): int
    {
        $sqlstr = "DELETE FROM usuario WHERE usercod = :usercod;";
        return self::executeNonQuery($sqlstr, ["usercod" => $usercod]);
    }
}
