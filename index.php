<?php

require_once "controllers/template.controller.php";
require_once "controllers/usuarios.controller.php";
require_once "controllers/categorias.controller.php";
require_once "controllers/productos.controller.php";
require_once "controllers/clientes.controller.php";
require_once "controllers/ventas.controller.php";

require_once "models/usuarios.model.php";
require_once "models/categorias.model.php";
require_once "models/productos.model.php";
require_once "models/clientes.model.php";
require_once "models/ventas.model.php";

$template = new ControllerTemplate();
$template -> ctrTemplate();  //the word "ctr" means controller, this function belongs to the ControllerTemplate class

