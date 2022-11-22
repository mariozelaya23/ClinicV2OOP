<?php

require_once "../controllers/usuarios.controller.php";
require_once "../models/usuarios.model.php";

class AjaxUsuarios
{

    /**** METHODS ****/

    //edit user
    
    //on a public variable we are getting idUsuario from usuarios.js
    public $idUsuario;

    //this function will capture $idUsuario
    public function ajaxEditarUsuario(){

        //column
        $item = "usuarioid";
        //$_POST["idUsuario"]
        $valor = $this -> idUsuario;
        
        $respuesta = ControladorUsuarios::ctrMostrarUsuario($item, $valor);

        echo json_encode($respuesta);
    }



    //activating or deactivating users
    //this are the 2 variables that comes from usuarios.js -> $(".btnActivar").click(function()
    public $activarId;
    public $activarEstado;

    public function ajaxActivarUsuario()
    {

        $tabla = "tbl_usuario";

        $estado = "estado";

        //if state is 0 it will change to 1 and viceversa
        $valor1 = $this->activarEstado;

        $usuarioid = "usuarioid";

        $valor2 = $this->activarId;

        //asking a response directly to the model, without using the controller
        $repuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $estado, $valor1, $usuarioid, $valor2);
        
    }


    //checking unique username 
    public $validarUsuario;

    public function ajaxValidarUsuario()
    {

        //column
        $item = "usuario";

        //$_POST["validarUsuario"]
        $valor = $this -> validarUsuario;
        
        $respuesta = ControladorUsuarios::ctrMostrarUsuario($item, $valor);

        echo json_encode($respuesta);
        
    }




}

/*** OBJECTS ***/

//edit user

if(isset($_POST["idUsuario"]))
{

    // creating new object 
    $editar = new AjaxUsuarios();

    $editar -> idUsuario = $_POST["idUsuario"];

    //the function ajaxEditarUsuario will never be execure unless it comes a post variable
    $editar -> ajaxEditarUsuario();

}


//activating user
if(isset($_POST["activarEstado"]))
{
    //triggering AjaxUsuarios object
    $activarEstado = new AjaxUsuarios();
    $activarEstado -> activarEstado = $_POST["activarEstado"];
    $activarEstado -> activarId = $_POST["activarId"];

    //activating the method ajaxActivarUsuario()
    $activarEstado -> ajaxActivarUsuario();

}


//validating unique username
if(isset($_POST["validarUsuario"]))
{

    $valUsuario = new AjaxUsuarios();

    //linking the public variable with the post variable
    $valUsuario -> validarUsuario = $_POST["validarUsuario"];

    //executing the ajax method
    $valUsuario -> ajaxValidarUsuario();

}


