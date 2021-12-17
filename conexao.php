<?php
define('HOST', '127.0.0.1');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'series_e_filmes');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('não foi possível conectar');

?>