<?php

require_once "controllers/template.controller.php";
require_once "controllers/usuarios.controller.php";

require_once "models/usuarios.model.php";

//in this case index.php is requering through the object $template is calling the the class ControllerTemplate() which is stored in the template.controller.php
$template = new ControllerTemplate();
//if we got the class, now we can execute methods that are inside the class using the -> simbol
//this -> ctrTemplate() execute the method whitout any condition, this will trigger the views/template.php
$template -> ctrTemplate();  //the word "ctr" means that it is a controller mothod, this function belongs to the ControllerTemplate class

