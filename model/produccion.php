<?php
require_once("db.php");

class Produccion {

    //Declaración de Atributos
    private $mesa;
    private $descripcion;
   
    //Declaración de constructor

    public function __construct(){

    }

    //Declaración de accesadores y mutadores
    public function getMesa(){
        return  $this->mesa;
    }

    public function setMesa($mesa){
        $this->mesa = $mesa;
    }

    public function getDescripcion(){
        return  $this->descripcion;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }


    //método de Mantenedor
    public function agregar($produccion){

        $mesa= $produccion->getMesa();
        $descripcion= $produccion->getDescripcion(); 
        $apellido= $paciente->getApellido();   

        $db= new DB();
        $stmt =  $db->getConexion()->prepare("INSERT INTO produccion (mesa,descripcion) VALUES (?,?)");
        $stmt->bindParam(1,  $mesa);
        $stmt->bindParam(2,  $descripcion);
        
        $stmt->execute();
    }

    public function finalizar($mesa){
        $db= new DB();
        $stmt =  $db->getConexion()->prepare("DELETE FROM produccion WHERE rut = ?");
        $stmt->bindParam(1, $mesa);
        $stmt->execute();
    }

    public function listar(){
        $db= new DB();
        $sql = "SELECT * FROM produccion";
        $stmt = $db->getConexion()->prepare($sql);
        $stmt->execute();
        $rs= $stmt->fetchAll();
        $produccion = [];
        if($rs){
            foreach ($rs as $fila) { 
                $produccion= new Paciente();
                $paciente->setMesa($fila["mesa"]);
                $paciente->setDescripcion($fila["descripcion"]);       
             
                $produccion[] =$produccion;
                }
        }

        return $produccion;
        }   
        
}
   
?>
