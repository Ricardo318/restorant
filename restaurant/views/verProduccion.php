<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ver pedido</title>
</head>
<body>
<style>

	tr{ 
		box-sizing: border-box;
        background-color:whitesmoke;
      }
      
</style>

<form>

<table style="width: 500px;">
	<thead>
		<tr>
	        <th>Mesa</th>
	         <th>Descripcion</th>
	       <th>action</th>
       </tr>
  </thead>
  <tbody>
    	<tr>
        	<?php
            	if($pedidos){
                foreach ($pedidos as $pedido) { ?>
				<td><?php echo $pedido->getMesa() ?></td>
				<td><?php echo $pedido->getDescripcion() ?></td>

				<td><a href="index.php?op=finalizarPedido&mesa=<?php echo $pedido->getMesa() ?>">Finalizar</a></td>
        </tr>
            <?php }
                }
        	?>
    </tbody>
</table>
<br><br>
		<a href="index.php?op=inicio">Volver</a>
</form>
</body>
</html>
