<?php
session_start();
if(empty($_SESSION["cuenta"])){
	header("Location: index.php");
	exit();
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{

	array_push($_SESSION["carrito"], $_POST["Producto"]);
	array_push($_SESSION["costo"], strval($_POST["Precio"]));
	array_push($_SESSION["cantidad"], $_POST["Cantidad"]);
				
}
if($_SESSION["categoria"]=="ropa"){
	header("Location: ropa.php");
}else{
	header("Location: accesorios.php");
}
?>
