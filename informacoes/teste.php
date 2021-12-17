<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    body{
        margin: 0;
        padding: 0;
    }
    #titulo-temporada{
        height: 50px;
        /*line-height:30px;*/
        background-color: #f4f4f4;
        border-radius: 4px;
        font-size: 16px;
        /*text-align:center;*/
        box-shadow: 1px 1px 2px #606060;
        font-family: arial;
        padding: 10px;
        font-weight: bold;
        color: #373737;
        margin: 20px 10px 20px 10px;
    }
    #titulo-temporada hr{
        margin-top: 2.5px;
    }
    #titulo-temporada svg{
        position: relative;
        float: right;
        margin-top: -5px;
    }
    .btn{
        position: relative;
        background-color: #0f0;
        width: 100px;
        padding: 2px;
        text-align: center;
        float: right;
        border-radius: 4px;
        margin-left: 10px;
    }
    .ass{
        background-color: #4D2AFD;
        color: #fff;
    }
    .img-season{
        width: 150px;
    }
    .episodio{
        width: 350px;
        position: relative;
        border-radius: 5px;
        border: 1px solid #a34;
        padding: 5px;
        margin-top: 10px;
        margin-left: calc(50vw - 175px);
        text-indent: justify;
    }
    .episodio img{
        position: relative;
        width: 350px;
        border-radius: 5px 5px 0px 0px;
    }
    #episodios_total_temp{
        /*background-color: #a4a;*/
        margin-bottom: 50px;
    }
    img#capa-filme{
        width: 250px;
    }
    #conteud-pagina-total{
        max-width: 350px;
    }
    #conteud-pagina-total p{
        text-align: justify;
    }
    #tagline{
        font-weight: bold;
        color: #606060;
    }
    table#btns_visto_add td{
        text-align: center;
        /*background-color: #3ae;*/
        margin: 10px;
        padding: 5px;
        border-radius: 5px;
        cursor: pointer;
    }
    table#btns_visto_add td#visto{
        background-color: #ac4;
    }
    table#btns_visto_add td#add{
        background-color: #4a3;
    }
</style>


<?php

session_start();
include('../conexao.php');


ini_set('display_errors', 0 );
error_reporting(0);

$url = explode('/', $_GET['url']);


if($url[0] === "serie"){
    //echo "isso é uma série";

    //https://api.themoviedb.org/3/tv/61223/season/1?api_key=6e6c40866dae31034b8c04ffa5f1ae88&language=pt-BR

    //https://api.themoviedb.org/3/tv/74387?api_key=6e6c40866dae31034b8c04ffa5f1ae88&language=pt-BR => listar informações da serie

    $variavelTemporadas = "https://api.themoviedb.org/3/tv/".$url[1]."?api_key=6e6c40866dae31034b8c04ffa5f1ae88&language=pt-BR";
    $dadosTemporada = file_get_contents($variavelTemporadas);
    $decodeTemporadas = json_decode($dadosTemporada, true);
    
    $decodeTemporadas2 = $decodeTemporadas["seasons"];

    //Leitura das temporadas da série
    foreach($decodeTemporadas2 as $InfosTemporada){
        //echo var_dump($InfosTemporada);


        ?>

        <div id="titulo-temporada"><?php echo $InfosTemporada["name"]." | ".date('d/m/Y',  strtotime($InfosTemporada["air_date"]));?>
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000" onclick="myFunction()"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/></svg>
        <hr>
        <div class="btn">Concluido</div>
        <div class="btn ass">Assistindo</div>
        </div>


        
        <?php



        $variavelBusca = "https://api.themoviedb.org/3/tv/".$url[1]."/season/".$InfosTemporada["season_number"]."?api_key=6e6c40866dae31034b8c04ffa5f1ae88&language=pt-BR
";

$dados = file_get_contents($variavelBusca);

$decode = json_decode($dados, true);

//echo var_dump($decode);

//echo var_dump($decode[1]);

    foreach($decode as $cortado){

        echo '<div id="episodios_total_temp">';

        //echo var_dump($cortado[2]);
        foreach($cortado as $informesEps){

            

            ?>



            <div class="episodio">
                <?php
                if(isset($informesEps["still_path"])){
                ?>
                <img src="<?php echo "https://www.themoviedb.org/t/p/w500".$informesEps["still_path"]; ?>" alt="">
                <?php } ?>
                <h2><?php echo $informesEps["name"]; ?></h2>
                <p><?php echo $informesEps["overview"]; ?></p>
            </div>

            <?php


        }
        echo "</div>";
    }




    }

    //echo var_dump($arrayTemporadas);

   
    foreach($arrayTemporadas as $elementosTemp){
        echo $elementosTemp;
    }


}



elseif($url[0] === "filme"){
    //echo "isso é um filme";

    $variavelFilme = "https://api.themoviedb.org/3/movie/".$url[1]."?api_key=6e6c40866dae31034b8c04ffa5f1ae88&language=pt-BR";
    $dadosTemporada = file_get_contents($variavelFilme);
    $decodeFilme = json_decode($dadosTemporada, true);
    

    //echo $variavelFilme;

    //echo "<br>";

    //echo var_dump($decodeFilme);

    //echo $decodeFilme['poster_path'];

    $capaFilme = "https://www.themoviedb.org/t/p/w500/".$decodeFilme['poster_path'];
    $imagemFundoFilme = "https://www.themoviedb.org/t/p/w500/".$decodeFilme['backdrop_path'];
    $tituloFilme = $decodeFilme['title'];
    $sinopseFilme = $decodeFilme['overview'];
    $taglineFilme = $decodeFilme['tagline'];
    $idTmdbFilme = $decodeFilme['id'];

    foreach($decodeTemporadas2 as $infosPegada){

        
    }

    ?>



    <center>
        <div id="conteud-pagina-total">
            <img src="<?php echo $capaFilme; ?>" id="capa-filme">
            <table id="btns_visto_add">
                <tr>
                    <td id="add">
                        Adicionar na Lista
                        <br>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
                    </td>

                    <td></td>

                    <td id="visto">
                        marcar como visto
                        <br>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 6c3.79 0 7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17s-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6m0-2C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 5c1.38 0 2.5 1.12 2.5 2.5S13.38 14 12 14s-2.5-1.12-2.5-2.5S10.62 9 12 9m0-2c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7z"/></svg>
                    </td>
                </tr>
            </table>
            <h2><?php echo $tituloFilme; ?></h2>
            <div id="tagline"><em><?php echo $taglineFilme; ?></em></div>
            <p><?php echo $sinopseFilme; ?></p>
        </div>
    </center>





    <?php

}






else{
    echo "is not serie or movie";
}


?>





<script type="text/javascript" src="https://code.jquery.com/jquery-1.4.3.min.js"></script>
<script type="text/javascript">

    $(document).ready(function(){
        $('#visto').click(function(){
            var nome = "De Olhos Bem Fechados";
            var idfilme = "345";
            
            //alert(nome);

            //$('#alert').html('');

            $.ajax({
                //url:'cad_visto_filme.php',
                method: 'GET',
                url: "cad_visto_filme.php",
                data: {nome: nome, idfilme: idfilme},



                //alert(data);
                success: function(result) {

                    var myDiv = document.getElementById("visto");
                    myDiv.innerHTML = "Assistido";
                    document.getElementById("visto").style.color = "red";
                }
            });

        });
    });

</script>
