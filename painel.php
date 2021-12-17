<?php
session_start();
include('conexao.php');
include('verifica_login.php');
$usuario = $_SESSION['usuario'];

//SELECT * FROM usuario WHERE nomeUsuario = 'mario';


//;

$consulta_pedido = "SELECT * FROM usuario WHERE nomeUsuario = '$usuario';";
	$execucao_query_pedido = mysqli_query($conexao, $consulta_pedido);
	$retorno_pedido = mysqli_fetch_assoc($execucao_query_pedido);

	$nome_completo = $retorno_pedido['nome']." ".$retorno_pedido['sobrenome'];
	$_SESSION['idusuario'] = $retorno_pedido['idusuario'];
	$iduser = $retorno_pedido['idusuario'];






	$consulta_num_filmes = "SELECT COUNT(f.idfilme) as total FROM filme f JOIN usuario u on u.idusuario = f.usuario_idusuario WHERE u.idusuario = 1 AND f.situacao = 1;";
	$execucao_num_filmes = mysqli_query($conexao, $consulta_num_filmes);
	$retorno_filmes_total = mysqli_fetch_assoc($execucao_num_filmes);
	$total_de_filmes_assistidos = $retorno_filmes_total['total'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="lang" content="pt-br">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<title>página inicial</title>
	<style type="text/css">
		div#pagina_total{
			max-width: 500px;
		}
		a{
			text-decoration: none;
		}
		img#img-perfil{
			width: 110px;
			border-radius: 50%;
			margin-top: 40px;
		}
		#bar{
			height: 50px;
		}
		#bar svg{
			height: 40px;
			position: relative;
			float: right;
			margin-right: 20px;
			margin-top: 10px;
		}
		
		#bar svg#sair{
			height: 40px;
			position: relative;
			float: left;
			margin-left: 20px;
			margin-top: 10px;
		}
		h1{
			margin-top: 10px;
			color: #6C6C6C;
			font-size: 18px;
			font-weight: normal;
		}
		div#ver_todos{
			width: 200px;
			height: 40px;
			line-height: 40px;
			margin-top: 20px;
			background: linear-gradient(90deg, #FF5C01 0%, rgba(198, 66, 218, 0.99) 100%);
			border-radius: 50px;
			color: #fff;
		}
		#line{
			position: relative;
			width: 73px;
			height: 0px;
			border: 1px solid #D5A7D5;
			transform: rotate(90deg);			
		}
		table#state_ass{
			height: 73px;
			margin-top: 30px;
			margin-bottom: 40px;
		}
		table#state_ass td{
			text-align: center;
		}
		div#titulo_quantidade{
			margin-top: 5px;
			margin-bottom: -5px;
			color: #6C6C6C;
		}
		div#ultimos_assistidos{
			width: 160px;
			height: 30px;
			line-height: 30px;
			margin-top: 10px;
			margin-left: 30px;
			background: linear-gradient(180deg, #C845D5 0%, #FE5C04 100%);
			border-radius: 50px;
			color: #fff;
			float: left;
		}
		table#table_fil_se_assistidos{
			position: relative;
			float: left;
			margin-left: 30px;
			margin-top: 10px;
		}
		table#table_fil_se_assistidos div#ver_todos_btn{
			text-align: center;
			padding: 40px 3px 0px 3px;
			height: 120px;
			margin-top: -7px;
			background-color: #C4C4C4;
		}
	</style>
</head>
<body>


	<center>
		<div id="pagina_total">
	<div id="bar">
		<a href="logout.php">
			<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000" id="sair"><g><path d="M0,0h24v24H0V0z" fill="none"/></g><g><path d="M17,8l-1.41,1.41L17.17,11H9v2h8.17l-1.58,1.58L17,16l4-4L17,8z M5,5h7V3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h7v-2H5V5z"/></g></svg>
		</a>
		<a href="busca.php">
			<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="40px" fill="#000000"><g><path d="M0,0h24v24H0V0z" fill="none"/></g><g><path d="M7,9H2V7h5V9z M7,12H2v2h5V12z M20.59,19l-3.83-3.83C15.96,15.69,15.02,16,14,16c-2.76,0-5-2.24-5-5s2.24-5,5-5s5,2.24,5,5 c0,1.02-0.31,1.96-0.83,2.75L22,17.59L20.59,19z M17,11c0-1.65-1.35-3-3-3s-3,1.35-3,3s1.35,3,3,3S17,12.65,17,11z M2,19h10v-2H2 V19z"/></g></svg>
		</a>
	</div>
	


					
			<img src="images/perfil.jpg" id="img-perfil">
		<h1><?php echo $nome_completo; ?></h1>
		<a href="ver_lista.php"><div id="ver_todos">Ver Lista</div></a>
		<table id="state_ass">
			<tr>
				<td><div id="titulo_quantidade">Filmes Assistidos</div><br> <?php echo $total_de_filmes_assistidos; ?></td>
				<td width="2px"><div id="line"></div></td>
				<td><div id="titulo_quantidade">Séries Assistidas</div><br> 17</td>
			</tr>
		</table>


		

		<div id="ultimos_assistidos">Últimos Filmes</div><br>

		<table id="table_fil_se_assistidos">
			<tr>

				<?php
		$consulta = "SELECT * FROM filme WHERE situacao = 1 and usuario_idusuario = $iduser ORDER BY idfilme DESC LIMIT 3;";
  		$result = mysqli_query($conexao, $consulta);
   		$nregistos = mysqli_num_rows($result);

              for ($i=0; $i <$nregistos; $i++)  {  
               $registo = mysqli_fetch_assoc($result);

               echo "<td><img src='https://www.themoviedb.org/t/p/w500".$registo['url_capa']."' height='120px'><td>";
               
                }
		?>
				
				<td>
					<a href="filmes_assistidos.php">
					<div id="ver_todos_btn">
						Ver Todos
						<br>
						<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M16.01 11H4v2h12.01v3L20 12l-3.99-4z"/></svg>	
					</div>
					</a>					
				</td>
			</tr>
		</table>



		<div id="ultimos_assistidos">Últimos Séries</div><br>

		<table id="table_fil_se_assistidos">
			<tr>
				<td><img src="images/capa/serie1.jpeg" height="120px"></td>
				<td><img src="images/capa/serie2.jpg" height="120px"></td>
				<td><img src="images/capa/serie3.jpg" height="120px"></td>
				<td>
					<div id="ver_todos_btn">
						Ver Todas
						<br>
						<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M16.01 11H4v2h12.01v3L20 12l-3.99-4z"/></svg>	
					</div>					
				</td>
			</tr>
		</table>




		</div>		
	</center>

</body>
</html>