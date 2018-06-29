<?php
include_once "dao/DaoUsuario.php";
session_start();
$usuario = new DaoUsuario();
$usuario = $usuario->getUsuario($_SESSION['id']);

?><!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="assets/img/favicon.ico">

  <title>Jogos Educacionais</title>

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <?php include_once('assets/layout/header.php') ?>

  <main role="main" class="container">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Encontre as Vidrarias</h1> <!--Jogo 1-->
              <p class="alinhamento-texto">Encontre as vidrarias pedidas e diga qual o nome de cada uma delas! Mas cuidado: Você só tem 30 segundos. Depois elas somem!</p>
              <p>
                <a class="btn btn-lg btn-dark" href="jogo1.php" role="button">Jogar</a>
              </p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="second-slide" src="jogos/cenario_equipamentos.png" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1 style="color: black;">Equipe o Laboratório</h1><!--Jogo 2-->
              <p>
                <a class="btn btn-lg btn-dark" href="jogo2.php" role="button">Jogar</a>
              </p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="third-slide" src="jogos/jogo03/img/cenario.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1 style="color: black;">Organize as Vidrarias</h1><!--Jogo 3-->
              <p>
                <a class="btn btn-lg btn-dark" href="jogo3.html" role="button" target="_blank">Jogar</a>
              </p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Qr Code</h1><!--Jogo 4-->
              <p class="alinhamento-texto">Instale um leitor de QR Code em seu Smartphone Android e tenha acesso as vidrarias da apostila na tela do seu celular!</p>
              <p>
                <a class="btn btn-lg btn-dark" href="jogo4.php" role="button">Jogar</a>
              </p>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="starter-template">
      <h1>Jogos Educacionais </h1>
      <br>
      <p class="lead alinhamento-texto">
      Esta plataforma de jogos foi criada com o principal objetivo de suprir a necessidade dos professores, Reinaldo e Guilherme, que ministram a disciplina de química na UTFPR campus Dois Vizinhos.
    
      A principal dificuldade esta associada a identificação das vidrarias utilizadas durante as aulas práticas, e também ao local correto deos equipamentos de segurança do laboratório.
      <br> <br>
     Para solucionar os problemas acima, os professores procuraram a coordenação do curso de Engenharia de Software deste mesmo campus, onde os professores da materia de Oficina de Integração 2 aceitaram o desafio.
     <br><br>O desenvolvimento ficou por conta dos acadêmicos Caroline Adami, Élio Costa, Jackson Schimit, Jean Londero, Jessica Pegorini, Leonardo Nicolai, Matheus Zilio, Micheli Dietrich e Tiago Traça, juntamente com os professores Marlon Marcon e André Ortoncelli.
      </p>
    </div>
  </main>

  <?php include_once('assets/layout/footer.html') ?>

</body>

</html>