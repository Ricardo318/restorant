<?php

require_once("db.php");

class Pedido{ 

private $mesa;
private $descripcion;

function __construct()
{
}

    public function getMesa()
    {
        return $this->mesa;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    
    public function setMesa($mesa)
    {
        $this->mesa = $mesa;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    
    public function agregarPedido($pedido)
    {
    	$mesa= $pedido->getMesa();
        $descripcion= $pedido->getDescripcion(); 

        $db= new DB();
        $stmt =  $db->getConexion()->prepare("INSERT INTO pedidos (mesa, descripcion) VALUES (?,?)");
        $stmt->bindParam(1,  $mesa);
        $stmt->bindParam(2,  $descripcion);
    

        $stmt->execute();
    }

    public function eliminarPedido($mesa){
        $db= new DB();
        $stmt =  $db->getConexion()->prepare("DELETE FROM pedidos WHERE mesa = ?");
        $stmt->bindParam(1, $mesa);
        $stmt->execute();
    
    }

    public function listarPedido()
   {
        $db= new DB();
        $sql = "SELECT * FROM pedidos";
        $stmt = $db->getConexion()->prepare($sql);
        $stmt->execute();
        $rs= $stmt->fetchAll();
        $pedidos = [];
        if($rs){
        foreach ($rs as $fila) { 
           $pedido= new Pedido();
           $pedido->setMesa($fila["mesa"]);
           $pedido->setDescripcion($fila["descripcion"]); 
         
           $pedidos[] =$pedido;
        }
    }
        return $pedidos;
    
    }

}
