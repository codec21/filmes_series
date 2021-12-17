<?php
session_start();
include('../conexao.php');


	$nome = $_GET["nome"];
	$idfilme = $_GET["idfilme"];
	$iduser = $_GET["iduser"];
	$urlcapa = $_GET["urlcapa"];

	$consulta_pedido = "SELECT * FROM filme WHERE idTmdb = $idfilme and usuario_idusuario = $iduser;";
    $execucao_query_pedido = mysqli_query($conexao, $consulta_pedido);
    $retorno_pedido = mysqli_fetch_assoc($execucao_query_pedido);
    $cor_topo = @($retorno_pedido['titulo']);


    if (isset($retorno_pedido['titulo'])) {
    	// 
    	$idfilme_cadastrado = $retorno_pedido['idfilme'];
    	$adiciona_pedido = "UPDATE filme SET lista = 1 WHERE idfilme = $idfilme_cadastrado;";
		mysqli_query($conexao, $adiciona_pedido);
    }
    else{

		$adiciona_pedido = "INSERT INTO filme (idTmdb, titulo, situacao, lista, url_capa, usuario_idusuario) VALUES ('$idfilme', '$nome', '0', '1', '$urlcapa', '$iduser');";
		mysqli_query($conexao, $adiciona_pedido);

    }


?>