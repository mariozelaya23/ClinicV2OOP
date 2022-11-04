<?php

class Conexion
{
    static public function conectar()
    {
        //instantiating a new PDO object, which has the following parameters, server connection - user - password - latino characters
        $db_link = new PDO("mysql:host=localhost;dbname=clinic_oop", 
                            "root", 
                            "");

        //evaluating what $db_link brings, this exec("set names utf8") avoid issues with latino characters
        $db_link -> exec("set names utf8");

        //retunr connection
        return $db_link;
    }
}