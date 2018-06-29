<?php
include_once "dao/DaoUsuario.php";
include_once('dao/DaoJogo.php');

session_start();
$usuario = new DaoUsuario();
$usuario = $usuario->getUsuario($_SESSION['id']);
Usuario::checkPermissao(3);

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];

$msg = '';
$msgStatus = false;

if (!empty($titulo) && !empty($descricao)){

    $arquivo = $_FILES['arquivo'];

    if (isset($arquivo['tmp_name']) && !empty($arquivo['tmp_name'])) {
        if ($arquivo['type'] == "application/x-zip-compressed") {
            $nomeDoArquivo = SHA1(time() . rand(0, 9999));
            $uri = 'jogos/arquivos/' . $nomeDoArquivo . '.zip';
            $linkJogo = 'jogos/'.$nomeDoArquivo.'/';
            $upload = move_uploaded_file($arquivo['tmp_name'], $uri);

            $zip = new ZipArchive;
            if ($zip->open($uri) === TRUE) {
                $zip->extractTo($linkJogo);
                $zip->close();
            }

            $jogo = new Jogo();
            $jogo->setNome($titulo);
            $jogo->setHashArquivo($nomeDoArquivo);
            $jogo->setDescricao($descricao);
            $jogo->setIdUsuario($_SESSION['id']);
            unlink($uri);
            $daojogo = new DaoJogo();

            if($daojogo->salvar($jogo)){
                $msg = 'Jogo publicado com sucesso, link para acesso:<br>
                        <a href="'.$linkJogo.'">'.$linkJogo.'</a>';
                $msgStatus = true;
            }
            else{
                $msg = 'Não foi possível enviar o jogo, verifique os dados.';
                $msgStatus = false;
            }
        } else {
            header("Location: enviarJogo.php");
            exit;
        }
    }
}

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
            
            <?php if(!empty($msg)){ ?>

                <p class="alert <?php echo ($msgStatus?'alert-success':'alert-danger')?>"><?php echo $msg ?></p>
                <?php if($msgStatus){ ?>
                <a class="btn btn-lg btn-dark" href="login.php">Login</a>
                <?php } ?>

            <?php } if(!$msgStatus){ ?>

             <form class="form-signin" method="POST" enctype="multipart/form-data">
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
            <?php } ?>
        </div>
        
    </main>

    <?php include_once('assets/layout/footer.html') ?>

</body>