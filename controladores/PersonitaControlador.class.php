<?php 
    require "utils/autoload.php";

    class PersonitaControlador {
        public static function Alta($nombre,$apellido,$telefono,$email){
            $p = new PersonitaModelo();
            $p -> Nombre = $nombre;
            $p -> Apellido = $apellido;
            $p -> Telefono = $telefono;
            $p -> Email = $email;
            $p -> Guardar();

        }

        public static function Eliminar($id){
            $p = new PersonitaModelo($id);
            $p -> Eliminar();
        }


        public static function Modificar($id,$nombre,$apellido,$telefono,$email){
            $p = new PersonitaModelo($id);
            $p -> Nombre = $nombre;
            $p -> Apellido = $apellido;
            $p -> Telefono = $telefono;
            $p -> Email = $email;
            $p -> Guardar();
        }

        public static function Listar(){
            $p = new PersonitaModelo();
            $personas = $p -> ObtenerTodos();

            $resultado = array();
            foreach($personas as $elemento){
                $a = array(
                    'id' => $elemento -> Id,
                    'nombre' => $elemento -> Nombre,
                    'apellido' => $elemento -> Apellido,
                    'telefono' => $elemento -> Telefono,
                    'email' => $elemento -> Email
                );
                array_push($resultado,$a);
            }
            return $resultado;
            

        }
    }

