<meta http-equiv="refresh" content="2; URL='index.php'"/>
<?php
session_start();
include('conexao.php');

$primeiro_nome = $_POST['name'];
$sobrenome = $_POST['surname'];
$nome_usuario = $_POST['username'];
$senha = $_POST['pass'];

echo $primeiro_nome." ".$sobrenome." ".$nome_usuario." ".$senha;

$query = "INSERT INTO usuario(nome, sobrenome, nomeUsuario, senha) VALUES ('$primeiro_nome', '$sobrenome', '$nome_usuario', MD5('$senha'));";


$result = mysqli_query($conexao, $query);

echo "<center><h1>Usuário Cadastrado com Sucesso !</h1></center>";

mysqli_close($conexao);