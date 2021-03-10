<?php
    class CRUD{
        public function select($query){
            $rows = null;
            $modelo = new ConexionDB();
            $conexion = $modelo->get_conexion();
            $stm = $conexion->prepare($query);
            $stm->execute();

            while ($result = $stm->fetch()){
                $rows[] = $result;
            }
            return $rows;
        }
        public function update ($query){

        }
        public function insert($query){

        }
    }


?>