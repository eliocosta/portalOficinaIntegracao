<?php
include_once('dao/DaoUsuario.php');
include_once('dao/DaoJogo.php');
session_start();
$daousuario = new DaoUsuario();
$usuario = $daousuario->getUsuario($_SESSION['id']);
Usuario::checkPermissao(2);

$pagina = (!empty($_GET['pagina'])?$_GET['pagina']:0);
$dataInicio = (!empty($_GET['dataInicio'])?:'');
$dataFinal  = (!empty($_GET['dataFinal'])?:'');
$ra = (!empty($_GET['ra'])?:'');

$daojogo = new DaoJogo();
$jogadas = $daojogo->listarJogadas($pagina, $dataInicio, $dataFinal, $ra);

// echo '<pre>';
// print_r($jogadas);
// echo '</pre>';

?><!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/img/favicon.ico">

    <title>Jogos Educacionais</title>

    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>

    <?php include_once("assets/layout/header.php") ?>

    <main role="main" class="container">

        <div class="starter-template">
            <h1>Pagina de controle do professor</h1>
            <hr style="width: auto;">
            <div class="row">
                <div class="col-lg-8">
                    Busca por data: <input type="date" class="form-control form-control-inline" name=""> até <input class="form-control form-control-inline" type="date" name="">
                    <button class="btn btn-dark" type="button">Filtrar</button>
                </div>

                <div class="col-lg-4">
                    <div class="input-group padding-pesquisaProf">
                        <input type="text" class="form-control form-control-inline" placeholder="Pesquisar por RA">
                        <span class="input-group-btn">
                        <button class="btn btn-dark" type="button">Pesquisar</button>
                        </span>
                    </div>
                </div>
            </div>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">RA</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Jogo</th>
                        <th scope="col">Data</th>
                    </tr>
                </thead>
                <?php 
                if(is_array($jogadas['list'])){
                ?>
                <tbody>
                    <?php
                    foreach ($jogadas['list'] as $row) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $row['ra'] ?></th>
                        <td><?php echo $row['nome_aluno'] ?></td>
                        <td><?php echo $row['nome_jogo'] ?></td>
                        <td><?php echo $row['data_conclusao'] ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <?php
                }
                ?>
            </table>

            <div class="row">
                <div class="col-lg-12 ">
                    <?php
                    $numPgs = ceil($jogadas['count']/$jogadas['step']);
                    for($x = 1; $x <= $numPgs; $x++){
                        if($pagina == $x){
                            ?><button class="btn btn-dark disabled" type="button"><?php echo $x ?></button> <?php
                        }
                        else{
                            ?><button class="btn btn-dark" type="button"><?php echo $x ?></button> <?php
                        }
                    }
                    ?>
                </div>
            </div>          
            <br>
            <button type="button" class="btn btn-dark">Imprimir</button>
        </div>

    </main>

    <?php include_once('assets/layout/footer.html') ?>

</body>
</html>
