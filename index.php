<?php

require_once "controllers/template.controller.php";
require_once "controllers/usuarios.controller.php";

require_once "models/usuarios.model.php";

$template = new ControllerTemplate();
$template -> ctrTemplate();  //the word "ctr" means controller, this function belongs to the ControllerTemplate class

