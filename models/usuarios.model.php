<?php

require_once 'conexion.php';

class ModeloUsuarios
{
    //showing the specific user, use static to avoid issues with the php.ini
    static public function mdlMostrarUsuario($tabla, $item, $valor)
    {
        //instantiating class Conexion, SELECTING just one item(which is the user) is equal to a parameter :$item (parametro a ser enlazado)
        $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE $item = :$item");

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

    //showing all users
    static public function mdlMostrarUsuarios($tabla)
    {
        //instantiating class Conexion, SELECTING all the users
        $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla");

        //executing the SQL object
        $stmt -> execute();

        //returning just one row of the db table
        return $stmt -> fetchAll();

        //Closing connection
        $stmt -> close();

        $stmt = null;
    }

    //Registro de usuarios
    static public function mdlIngresarUsuario($tabla, $datos)
    {
        //: are paremeters
        $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla(nombre, usuario, password, role, foto) VALUES(:nombre, :usuario, :password, :role, :foto)");

        //linking : parameters with the ones that comes from the array
        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt -> bindParam(":role", $datos["role"], PDO::PARAM_STR);
        $stmt -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

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

    //Editar usuario
    static public function mdlEditarUsuario($tabla, $datos)
    {

        //: are paremeters
        $stmt = Conexion::conectar() -> prepare("UPDATE $tabla SET nombre = :nombre, password = :password, role = :role, foto = :foto WHERE usuario = :usuario");

        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt -> bindParam(":role", $datos["role"], PDO::PARAM_STR);
        $stmt -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        $stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

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

    // Activate or deactivate user
    // this information comes directly from ajax NOT through the controller
    static public function mdlActualizarUsuario($tabla, $estado, $valor1, $usuarioid, $valor2)
    {

        $stmt = Conexion::conectar() -> prepare("UPDATE $tabla SET $estado = :$valor1 WHERE $usuarioid = :$valor2");

        //$item1 = $valor1 and $item2 = $valor2
        $stmt -> bindParam(":".$valor1, $valor1, PDO::PARAM_STR);
        $stmt -> bindParam(":".$valor2, $valor2, PDO::PARAM_STR);

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