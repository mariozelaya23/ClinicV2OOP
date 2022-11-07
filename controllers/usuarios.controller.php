<?php

    class ControladorUsuarios
    {
        
        //user login public method
        static public function ctrIngresoUsuario()
        {
            //asking if we are reciving POST variables (attributes), in this case we will recive the name variables name="ingUsuario" and name="ingPassword" from the login form
            //bacause we are receiving the POST variable ingUsuario and ingPassword, we need to validate if does not comes special characters, this prevents SQL injection
            if(isset($_POST["ingUsuario"]))
            {
                if(preg_match('/^[a-zA-Z0-9-]+$/', $_POST['ingUsuario']) && preg_match('/^[a-zA-Z0-9-]+$/', $_POST['ingPassword']))
                {
                    //we will send to the user table
                    $tabla = 'tbl_usuario';

                    //the following information through a variable item the user on the table
                    $item = 'usuario';
                    //and what we are going to ask about is the value that comes $_POST['ingUsuario']
                    $valor = $_POST['ingUsuario'];

                    //and we are going to ask an response from the model Class::method, sending the 3 parameters above
                    $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

                    //checking with var_dump the response from the model (this return an array)
                    // var_dump($respuesta["usuario"]);

                    //comparing if the answer from the model $respuesta["usuario"] is equal to what comes in the POST variable $_POST['ingUsuario']
                    //because the response is an array we put this if
                    if(is_array($respuesta))
                    {
                        if($respuesta["usuario"] == $_POST['ingUsuario'] && $respuesta["password"] == $_POST["ingPassword"])
                        {
                            //YES we can access
                            // echo '<br><div class="alert alert-success">Bienvenido al sistema</div>';
                            //validating id session is equal to ok, this is located on the template.php
                            $_SESSION["iniciarSesion"] = "ok";

                            //redirecting with javascript
                            echo '<script>
                                window.location = "dashboard";
                            </script>';
                        }else
                        {
                            echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                        }

                    }

                }
            }
        }

        //Crear o registro de usuario
        static public function ctrCrearUsuario()
        {
            //if comes a variable POST type (any of the form) 
            if(isset($_POST["nuevoNombre"]))
            {
                //with preg_match and regular expressions we will allow spanis characters
                if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                    preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
                    preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPass"]))
                {
                    //if the variables post meets the requirements above to save the user
                    //sending user table
                    $tabla = "tbl_usuario";

                    //sending the array
                    $datos = array("nombre" => $_POST["nuevoNombre"], 
                                    "usuario" => $_POST["nuevoUsuario"], 
                                    "password" => $_POST["nuevoPass"],
                                    "role" => $_POST["nuevoPerfil"]);
                    
                    //asking to the model an response
                    $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

                    //if model reply ok, then we are going to show a success message that the user has been saved
                    if($respuesta == "ok")
                    {
                        echo 
                        "<script>
                            Swal.fire({
                                icon: 'success',
                                title: 'El usuario ha sido guardado correctamente!!',
                                showConfirmButton: true,
                                confirmButtonText: 'Cerrar',
                                closeOnConfirm: false
                            }).then((result)=>{
                                if(result.value)
                                {
                                    window.location = 'usuarios';
                                }
                            });        
                        </script>";
                    }

                }else
                {
                    echo 
                    "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'El usuario no puede ser vacio o con caracteres especiales!!',
                            showConfirmButton: true,
                            confirmButtonText: 'Cerrar',
                            closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value)
                            {
                                window.location = 'usuarios';
                            }
                        });        
                    </script>";
                }


            }

        }

    }