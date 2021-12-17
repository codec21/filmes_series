<?php
session_start();
include('conexao.php');



	$idfilme = $_GET["idfilme"];
	$iduser = $_GET["iduser"];


	

    	$adiciona_pedido = "DELETE FROM filme WHERE idfilme = $idfilme AND usuario_idusuario = $iduser;";
		mysqli_query($conexao, $adiciona_pedido);
   


?>