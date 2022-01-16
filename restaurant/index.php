<?php

require_once("/Applications/XAMPP/xamppfiles/htdocs/restaurant/controller/pedidoController.php");

$pedidoController = new PedidoController();

$validacion = (isset($_GET['op']) && !empty($_GET['op']));

if(!$validacion){   
    $pedidoController->inicio();
}else{
    $op=$_GET["op"];

    if($op=="inicio"){
        $pedidoController->inicio();
    }

    if($op=="agregar"){
        
            $pedidoController->agregar();
        
    }

    if($op=="verPedido"){
        
    }

    if($op=="verProduccion"){
        $pedidoController->verProduccion();
    }
    if($op=="agregrarPedido"){
        $mesa = $_POST['Mesa'];
        $comentario = $_POST['comentario'];
        
        if(isset($_POST['verPedido'])){
            $pedidoController->verPedido();
        }else{
            $pedidoNuevo = new Pedido();
        
        $pedidoNuevo->setMesa($mesa);
        $pedidoNuevo->setDescripcion($comentario); 
        
        $pedidoController->agregarPedido($pedidoNuevo);
        }
        
        
    }
    if($op=="eliminar"){
        $mesa = $_GET['mesa'];
        $pedidoController->eliminarPedido($mesa);
    }
}  
?>
