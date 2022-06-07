<?php 

require "utils/autoload.php";

    class PersonitaModelo extends Modelo{
        public $Id;
        public $Nombre;
        public $Apellido;
        public $Telefono;
        public $Email;

        public function __construct($id=""){
            parent::__construct();
            if($id != ""){
                $this -> id = $id;
                $this -> Obtener();
            }
        }

        public function Guardar(){
            if($this -> Id == NULL) $this -> insertar();
            else $this -> actualizar();
        }

        private function insertar(){
            $sql = "INSERT INTO personita (nombre,apellido,telefono,email) VALUES (
            '" . $this -> Nombre . "',
            '" . $this -> Apellido . "',
            " . $this -> Telefono . ",
            '" . $this -> Email . "')";
            $this -> conexionBaseDeDatos -> query($sql);
        }

        private function actualizar(){
            $sql = "UPDATE personita SET
            nombre = '" . $this -> Nombre . "',
            apellido = '" . $this -> Apellido . "',
            telefono = " . $this -> Telefono . ",
            email = '" . $this -> Email . "'
            WHERE id = " . $this -> id;
            $this -> conexionBaseDeDatos -> query($sql);
        }

        public function Obtener(){
            $sql = "SELECT * FROM personita WHERE id = " . $this ->id;
            $fila = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> id = $fila['id'];
            $this -> nombre = $fila['nombre'];
            $this -> apellido = $fila['apellido'];
            $this -> telefono = $fila['telefono'];
            $this -> email = $fila['email'];
        }

        public function Eliminar(){
            $sql = "DELETE FROM personita WHERE id = " . $this ->Id;
            $this -> conexionBaseDeDatos -> query($sql);
        }

        public function ObtenerTodos(){
            $sql = "SELECT * FROM personita";
            $filas = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC);

            $resultado = array();
            foreach($filas as $fila){
                $p = new PersonitaModelo();
                $p -> Id = $fila['id'];
                $p -> Nombre = $fila['nombre'];
                $p -> Apellido = $fila['apellido'];
                $p -> Telefono = $fila['telefono'];
                $p -> Email = $fila['email'];
                array_push($resultado,$p);
            }
            return $resultado;

        }

    }