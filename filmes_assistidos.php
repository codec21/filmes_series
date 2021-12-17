<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="lang" content="pt-br">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<title>Filmes Assistidos</title>

<style type="text/css">
	#todo_conteudo{
		max-width: 350px;
	}
	td{
		background: linear-gradient(90deg, #FF5C01 0%, rgba(198, 66, 218, 0.99) 100%);
		padding: 5px;
		color: #fff;
		font-weight: bold;
		font-family: arial;
	}
</style>
<?php
session_start();
include('conexao.php');
include('verifica_login.php');
$usuario = $_SESSION['usuario'];
$idusuario = $_SESSION['idusuario'];



echo "<center><div id='todo_conteudo'><h1>Filmes Assistidos</h1><table>";
$consulta = "SELECT * FROM filme WHERE situacao = 1 and usuario_idusuario = $idusuario;";
  		$result = mysqli_query($conexao, $consulta);
   		$nregistos = mysqli_num_rows($result);

              for ($i=0; $i <$nregistos; $i++)  {  
               $registo = mysqli_fetch_assoc($result);

               echo "<tr><td><img src='https://www.themoviedb.org/t/p/w500".$registo['url_capa']."' height='120px'></td><td>".$registo['titulo']."</td><tr>";
               
                }

                echo "</table></div></center>";