<?php
include_once "dao/DaoUsuario.php";
session_start();
$usuario = new DaoUsuario();
$usuario = $usuario->getUsuario($_SESSION['id']);
// Usuario::checkPermissao(3);
?><html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/img/favicon.ico">
    <title>Jogos Educacionais</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="text-center">
    <?php include_once('assets/layout/header.php') ?>

    <main role="main" class="container">
        <div class="starter-template">
        <img class="mb-4" src="assets/img/logo2.png" width="220px" height="85px">
            <h2>Publicar Jogo</h2>
            <br>
            
             <form class="form-signin" method="POST">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="InputTitulo">Titulo </label>
                            <input type="text" class="form-control" id="InputTitulo" name="titulo" placeholder="Título do jogo" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                     <label for="textareaColabore">Descrição do Jogo </label>
                     <textarea class="form-control" id="textareaColabore" rows="6" name="descricao" placeholder="Escreva aqui uma breve descrição do jogo.." required></textarea>
                </div>
                <div class="form-group">
                    <label for="EscolherArquivo"></label>
                    <input type="file" class="form-control-file" name="arquivo" id="EscolherArquivo" required>
                </div>
                    <button type="submit" class="btn btn-dark">Publicar</button>
            </form>
        </div>
        
    </main>

    <?php include_once('assets/layout/footer.html') ?>

</body>