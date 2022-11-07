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

        //Closing connection
        $stmt -> close();

        $stmt = null;
    }

    //Registro de usuarios
    static public function mdlIngresarUsuario($tabla, $datos)
    {
        //: are paremeters
        $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla(nombre, usuario, password, role) VALUES(:nombre, :usuario, :password, :role)");

        //linking : parameters with the ones that comes from the array
        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt -> bindParam(":role", $datos["role"], PDO::PARAM_STR);

        if($stmt->execute())
        {
            return "ok";
        }else
        {
            return "error";
        }

        //Closing connection
        $stmt -> close();

        $stmt = null;
    }
}