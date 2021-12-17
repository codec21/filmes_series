<?php

$busca = @($_GET['pesquisa']);

$buscaCorrigida = str_replace(' ', '+', $busca);

$contwill = 1;

for ($i = 1; $i <= 2; $i++) {



if($contwill == 1){
	$tipo = "tv";
	$serie_ou_filme = "Série";
	$serie_ou_filme_cor = "#a4a65a";
}
elseif($contwill == 2){
	$tipo = "movie";
	$serie_ou_filme = "Filme";
	$serie_ou_filme_cor = "#ad43a5";
}


$variavelBusca = "https://api.themoviedb.org/3/search/".$tipo."?api_key=6e6c40866dae31034b8c04ffa5f1ae88&language=pt-BR&query=".$buscaCorrigida;

$dados = file_get_contents($variavelBusca);

$decode = json_decode($dados, true);

//echo var_dump($decode);

foreach($decode as $bagbag){
    foreach($bagbag as $outroResult){
        //echo var_dump($outroResult);
        $arrrrr = $outroResult["poster_path"];
        //echo $arrrrr;
        

?>

<div class="container p-0">
  
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 movie_list">
                    <div class="pt-8 pb-2 mb-3 border-bottom">
 
                        <!--<div class="row">
                            <h1>Movies</h1>
                        </div>-->
 
                        <div class="row">

                        <style>
                            .capa_<?php echo $outroResult["id"]; ?> {
                                background: url('<?php echo "https://www.themoviedb.org/t/p/w500/".$arrrrr; ?>');
                                background-size: 240px;
                                background-repeat: no-repeat;
                                background-position: center;
                            }
                        </style>
                        
 
                            <!-- Movie Card Start -->
                            <div class="card-view">
                                <div class='card-header capa_<?php echo $outroResult["id"]; ?>'>
                                    <div class="card-header-icon">
                                        <a href="#">
                                            <i class="material-icons header-icon"><!--play_arrow--></i>
                                        </a>
                                    </div>
                                </div>

                                <div id="tag-cont" style="background-color: <?php echo $serie_ou_filme_cor; ?>"><?php echo $serie_ou_filme; ?></div>
 
                                <div class="card-movie-content">
                                    <div class="card-movie-content-head">
                                        <a href='informacoes/serie/<?php echo $outroResult["id"]; ?>'>
                                            <h3 class="card-movie-title">
                                            	<?php
                                            		if($contwill == 1){
														echo $outroResult["name"];
													}
													elseif($contwill == 2){
														echo $outroResult["title"];
													}
                                            	?>
                                            	
                                            </h3>
                                        </a>
                                        <div class="ratings"><span><?php echo $outroResult["vote_average"]; ?></span>/10</div>
                                    </div>
                                    <div class="card-movie-info">
                                        <div class="movie-running-time">
                                            <label>Sinopse</label>
                                            <span><?php echo $outroResult["overview"]; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Movie Card End -->
 
                            
 
                        </div>
                    </div>
 
                </main>
            </div>
        </div>
 
    </div>
 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>








<?php
        //echo "<br> ----------------- <br> ";
    }
}

$contwill = $contwill+1;

}

?>