<?php
session_start();

include('conexao.php');

if (empty($_POST['username']) || empty($_POST['pass'])) {
	header('location: index.php');
}

$usuario = mysqli_real_escape_string($conexao, $_POST['username']);
$senha = mysqli_real_escape_string($conexao, $_POST['pass']);

$query = "select idusuario, nome from usuario where nomeUsuario = '{$usuario}' and senha = md5('{$senha}');";
echo $query;

$result = mysqli_query($conexao, $query);



if (mysqli_num_rows($result) == 1) {
	$_SESSION['usuario'] = $usuario;
	header('location: painel.php');
	exit();
}else {
	$_SESSION['nao_autenticado'] = true;
	header('location: index.php');
	exit();
}
?>