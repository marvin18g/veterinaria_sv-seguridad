<?php

class ControladorFomularios{


    static public function crtRegistro(){

        if(isset($_POST["username"])){
            
            if(preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ]+$/', $_POST["username"])&&
            preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ]+$/', $_POST["password"])&&
            preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ]+$/', $_POST["email"])&&
            preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ]+$/', $_POST["telefono"])&&
            preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ]+$/', $_POST["status"])&&
            preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ]+$/', $_POST["id_roles"])){

                $tabla = "usuarios";

                $datos = array("username" => $_POST["username"],
                 "password" => $_POST["password"],
                 "email" => $_POST["email"],
                 "telefono" => $_POST["telefono"],,
                 "status" => $_POST["status"],
                 "id_roles" => $_POST["id_roles"]);

                 $respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);

                 return $respuesta;

            }
            else{
                $respuesta = "error";

                return $respuesta;
            }
        }
    }
}