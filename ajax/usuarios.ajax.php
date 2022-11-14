<?php

require_once "../controllers/usuarios.controller.php";
require_once "../models/usuarios.model.php";

class AjaxUsuarios
{

    //edit user
    
    //on a public variable we are getting idUsuario from usuarios.js
    public $idUsuario;

    //this function will capture $idUsuario
    public function ajaxEditarUsuario(){

        //table
        $item = "usuarioid";
        //$_POST["idUsuario"]
        $valor = $this -> idUsuario;
        
        $respuesta = ControladorUsuarios::ctrMostrarUsuario($item, $valor);

        echo json_encode($respuesta);
    }

}

//editar usuario

if(isset($_POST["idUsuario"]))
{

    // creating new object 
    $editar = new AjaxUsuarios();

    $editar -> idUsuario = $_POST["idUsuario"];

    //the function ajaxEditarUsuario will never be execure unless it comes a post variable
    $editar -> ajaxEditarUsuario();

}


