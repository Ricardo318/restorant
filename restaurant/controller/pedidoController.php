<?php

require_once("/Applications/XAMPP/xamppfiles/htdocs/restaurant/models/pedidos.php");

class PedidoController
{	
	 public $pedido;

    public function __construct()
    {
        $this->pedido = new Pedido();
    }

    public function inicio()
    {
      include 'views/inicio.php';
    }

     public function verPedido()
    {
        $pedidos = $this->pedido->listarPedido();
        include 'views/verPedido.php';
        
    }
    public function verProduccion()
    {
        $pedidos = $this->pedido->listarPedido();
        include 'views/verProduccion.php';
        
    }

    public function agregar()
    {
        include 'views/agregar.php';
    }

    public function agregarPedido($pedidoNuevo)
    {
      $this->pedido->agregarPedido($pedidoNuevo);
      include 'views/agregar.php';
     
    }

    public function eliminarPedido($mesa)
    {
        $this->pedido->eliminarPedido($mesa);
        $pedidos = $this->pedido->listarPedido();
        include 'views/verPedido.php';
      
    }

    public function finalizarPedido($mesa)
    {
        $this->pedido->eliminarPedido($mesa);
        $pedidos = $this->pedido->listarPedido();
        include 'views/verProduccion.php';
      
    }




}
