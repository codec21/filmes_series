<?php
session_start();
include('conexao.php');

//$busca = @($_POST["busca"]);

ini_set('display_errors', 0 );
error_reporting(0);

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet"/>
	<meta charset="utf-8">
	<title>Busque por filmes ou séries</title>
	<style type="text/css">
		.busca{
			margin-top: 20px;
		}
		.idem {
  padding: 15px;
  border: 1px #DDD solid;
}
.idem:nth-child(1){
  font-size: 18px;
  width: calc(100vw - 100px);
  border-radius: 10px 0px 0px 10px;
}
.idem:nth-child(2){
	font-size: 18px;
  width: 50px;
  border-radius: 0px 10px 10px 0px;
  text-align:left;
  color: white;
  background: linear-gradient(90deg, #FF5C01 0%, rgba(198, 66, 218, 0.99) 100%);
  cursor: pointer;
  text-indent: -1.3px;
}

.intro {
    text-align: center;
}
 
ul {
    list-style-type: none;
}
 
h1,
h2,
h3,
h4,
h5,
p {
    font-weight: 400;
}
 
a {
    text-decoration: none;
    color: inherit;
}
 
a:hover {
    color: #6ABCEA;
}
 
/*.container {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    max-width: 100%;
    margin-left: auto;
    margin-right: auto;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
}*/
 
.navbar-dark {
    padding: 15px !important;
    background: #13191d !important;
}
 
.sidebar {
    line-height: 26px;
    padding-top: 50px;
}
 
.sidebar ul {
    margin: 30px 0px;
}
 
.sidebar .nav-link {
    display: block;
    text-align: center;
}
 
.sidebar .nav-link i {
    display: block;
    text-align: center;
}
 
.sidebar .nav-link.active {
    color: #03A9F4;
}
 
.movie_list {
    margin-top: 10px;
    margin-bottom: 20px;
    padding-left: calc(50vw - 150px) !important;
    
}
 
.card-view {
    background: #ffffff;
    box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.1);
    width: 300px;
    max-width: 315px;
    border-radius: 10px;
    display: inline-block;
}
 
.card-header {
    padding: 0;
    margin: 0;
    height: 367px;
    width: 100%;
    display: block;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}
 
.avengerEndgame {
    background: url("img/avengers.jpg");
    background-size: cover;
}
 
.hobbsShaw {
    background: url("img/hobbs-and-shaw.jpg");
    background-size: cover;
}
 
.Johnwick {
    background: url("img/john-wick-3.jpg");
    background-size: cover;
    background-position: 100% 100%;
}
 
.deadPool {
    background: url("img/deadpool-2.jpg");
    background-size: cover;
}
 
.theLionking {
    background: url("img/lion_king.jpg");
    background-size: cover;
}
 
.madMax {
    background: url("img/mad_max.jpg");
    background-size: cover;
}
 
.aquaMan {
    background: url("img/aqua_man.jpg");
    background-size: cover;
}
 
.missionImpossible {
    background: url("img/mission_Impossible.jpg");
    background-size: cover;
}
 
.card-header-icon {
    position: relative;
}
 
.header-icon {
    width: 100%;
    height: 367px;
    line-height: 367px;
    text-align: center;
    vertical-align: middle;
    margin: 0 auto;
    color: #ffffff;
    font-size: 54px;
    text-shadow: 0px 0px 20px #6abcea, 0px 5px 20px #6ABCEA;
    opacity: .85;
}
 
.header-icon:hover {
    background: rgba(0, 0, 0, 0.15);
    font-size: 74px;
    text-shadow: 0px 0px 20px #6abcea, 0px 5px 30px #6ABCEA;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    opacity: 1;
}
 
.card-view:hover {
    -webkit-transform: scale(1.03);
    transform: scale(1.03);
    box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.08);
}
 
.card-movie-content {
    padding: 18px 18px 24px 18px;
    margin: 0;
}
 
.card-movie-content-head,
.card-movie-info {
    display: table;
    width: 100%;
}
 
.card-movie-title {
    font-size: 22px;
    margin: 0;
    display: table-cell;
}
 
.ratings {
    width: 50px;
    height: 15px;
    background-size: contain;
    display: table-cell;
    text-align: right;
    position: relative;
    margin-top: 5px;
    font-weight: 600;
}
 
.ratings span {
    color: #2196F3;
}
 
.card-movie-info {
    margin-top: 1em;
}
 
.movie-running-time {
    display: table-cell;
    text-transform: uppercase;
    text-align: center;
}
 
.movie-running-time:first-of-type {
    text-align: left;
}
 
.movie-running-time:last-of-type {
    text-align: justify;
}
 
.movie-running-time label {
    display: block;
    color: rgba(0, 0, 0, 0.5);
    margin-bottom: .5em;
    font-size: 9px;
}
 
.movie-running-time span {
    font-weight: 700;
    font-size: 11px;
}
#tag-cont{
	width: 80px;
	height: 20px;
	border-radius: 50px;
	text-align: center;
	line-height: 20px;
	color: #fff;
	font-size: 12px;
	margin-left: 20px;
}
 
@media Running time and (max-width: 500px) {
    .card-view {
        width: 95%;
        max-width: 95%;
        margin: 1em;
        display: block;
    }
    .container {
        padding: 0;
        margin: 0;
    }
}

	</style>
</head>
<body>

	  <div id="cont-page">

	  	
			<center>
				<div class="col-6 col-md-4">
   					<div class="busca">
   						<form>
   						<input type="text" placeholder="O que você procura?" class="idem" name="pesquisa">
   						<button type="submit" class="buscar_produto idem" id="bot-pes"><i class="fa fa-search"></i></button>
   						</form>
   					</div> 
 				</div>
                <div id="des-conte"></div>
			</center>

	  </div>

<!-- todo o cont -->



<script type="text/javascript" src="https://code.jquery.com/jquery-1.4.3.min.js"></script>
  <script type="text/javascript">

      $('input').click(function(){
          $.ajax({
              url: 'login.html',
              success: function(data) {
                $('#des-conte').html(data);                
              },
              beforeSend: function(){
                $('.loader').css({display:"block"});
              },
              complete: function(){
                $('.loader').css({display:"none"});
              }
        });
      });
  </script>



</body>
</html>