<?php

require_once 'conexion.php';

class ModeloUsuarios
{
    //showing the users, use static to avoid issues with the php.ini
    static public function mdlMostrarUsuarios($tabla, $item, $valor)
    {
        //instantiating class Conexion, SELECTING just one item(which is the user) is equal to a parameter :$item (parametro a ser enlazado)
        $stmt = Conexion::conectar() -> prepare("SELECT * FROM tbl_usuario WHERE $item = :$item");

        //linking parameter, because it comes a php variable (it starts with $), we concatenate on the binparam, the second parameter is
        //with what value are you going to compare $item, the third parameter is STRING TYPE, which means that we just going to receive string params
        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

        //executing the SQL object
        $stmt -> execute();

        //returning just one row of the db table
        return $stmt -> fetch();
    }
}