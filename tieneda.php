<?php
session_start();
$total = 0;
echo "<h3>CARRITO DE COMPRAS </h3>";
if(isset($_SESSION["carrito"])){
 foreach($_SESSION["carrito"] as $indice =>$arreglo){
 echo"<hr>Producto: <strong>".$indice ." </strong> <br>";
 $total +=$arreglo["cant"] * $arreglo["precio"];
 foreach($arreglo as $key =>$value){
 echo $key . ": ". $value. "<br>";
 }
 echo "<a href='carrito.php?item=$indice'>Eliminar Producto</a>";
 }
 echo "<h3>El total de la compra actual es $: $total </h3>";
 echo '<br> <a href="carritoCompras.php">Regresar </a>|
 <a href="carrito.php?vaciar=True">Vaciar Carrito</a>';
}else{
 echo "<script>alert('El carrito esta vacío'); </script> ";
 ?>
 <a href="carritoCompras.php">Regresar</a>
 <?php
}
if(isset($_REQUEST["vaciar"])){
 session_destroy();
 header("Location:carrito.php");
}
if(isset($_REQUEST["item"])){
 $producto = $_REQUEST["item"];
 // $_SESSION["carrito"][$producto]["cant"] = $cantidad;
 unset($_SESSION["carrito"][$producto]);
 echo "<script>alert('Se elimino el: $producto'); </script> ";
 header("Location:carrito.php");
}
?>
