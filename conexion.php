<?php

class conexion{

    private $servidor ="localhost";
    private $usuario ="root";
    private $pass = "";
    private $conexion;

    public function __construct(){
        try{
            $this->conexion = new PDO("mysql:host=$this->servidor;dbname=world",$this->usuario,$this->pass);
            #ACTIVAMOS LOS ERRORES Y LAS EXCEPTIONES
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){
            return "Falla de Conexión".$e;
        }
    }

     #creo un metodo de ejecucion a sql de insert, update, borrar  
    public function ejecutar($sql){
        #Execute una consulta de sql
        $this->conexion->exec($sql);
        #esto nos da el valor de id insertado
        return $this->conexion->lastInsertId();
    }
    public function consultar($sql){
        #ejecuta la consulta y nos devuelve la info de la base
        $sentencia = $this->conexion->prepare($sql);
        $sentencia->execute();
        #retorna todos los registros de la consulta sql
        return $sentencia->fetchAll();
    }


}

?>