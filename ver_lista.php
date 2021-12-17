<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="lang" content="pt-br">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.4.3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<title>Lista de Filmes</title>

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
	td.excluir{
		font-size: 32px;
		cursor: pointer;
	}
</style>
<?php
session_start();
include('conexao.php');
include('verifica_login.php');
$usuario = $_SESSION['usuario'];
$idusuario = $_SESSION['idusuario'];


//SELECT * FROM filme WHERE lista = 1 and usuario_idusuario = 1;

echo "<center><div id='todo_conteudo'><h1>Lista de Filmes</h1><table>";
$consulta = "SELECT * FROM filme WHERE lista = 1 and usuario_idusuario = $idusuario;";
  		$result = mysqli_query($conexao, $consulta);
   		$nregistos = mysqli_num_rows($result);

              for ($i=0; $i <$nregistos; $i++)  {  
               $registo = mysqli_fetch_assoc($result);

               $idparaoja = "exclui".$registo['idfilme'];

               echo "<tr id='tr".$idparaoja."'><td><img src='https://www.themoviedb.org/t/p/w500".$registo['url_capa']."' height='120px'></td><td>".$registo['titulo']."</td><td class='excluir' id='".$idparaoja."'>&#10008;</td><tr>";

               ?>


<script type="text/javascript">

$(document).ready(function(){
        $('#<?php echo $idparaoja; ?>').click(function(){
            var idfilme = "<?php echo $registo['idfilme']; ?>";
            var iduser = "<?php echo $idusuario; ?>";
            
            //alert(nome);

            //$('#alert').html('');

            $.ajax({
                //url:'cad_visto_filme.php',
                method: 'GET',
                url: "exclui_lista_filme.php",
                data: {idfilme: idfilme, iduser: iduser},



                //alert(data);
                success: function(result) {

                    var myDiv = document.getElementById("<?php echo $idparaoja; ?>");
                    myDiv.innerHTML = "addicionado à lista<br>&#10003;";
                    document.getElementById("tr<?php echo $idparaoja; ?>").style.display = "none";
                }
            });

        });
    });

</script> 



               <?php
               
                }

                echo "</table></div></center>";