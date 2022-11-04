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

    }