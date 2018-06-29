<?php
include_once "dao/DaoUsuario.php";
session_start();
$usuario = new DaoUsuario();
$usuario = $usuario->getUsuario($_SESSION['id']);

$msg = '';
$msgStatus = false;

if($_POST && isset($_FILES['arquivo'])){

    $recipient_name     = 'Elio Machado Costa';
    $recipient_email    = 'eliocostac4@gmail.com';
        
    //Get uploaded file data
    $file_tmp_name    = $_FILES['arquivo']['tmp_name'];
    $file_name        = $_FILES['arquivo']['name'];
    $file_size        = $_FILES['arquivo']['size'];
    $file_type        = $_FILES['arquivo']['type'];
    $file_error       = $_FILES['arquivo']['error'];

    $titulo         = $_POST['titulo'];
    $nome           = $_POST['nome'];
    $email          = $_POST['email'];
    $universidade   = $_POST['universidade'];
    $curso          = $_POST['curso'];
    $descricao      = $_POST['descricao'];
    $arquivo        = $_POST['arquivo'];

    if($file_error > 0){
        die('Arquivo não suportado, envie apenas .zip');
    }

    //read from the uploaded file & base64_encode content for the mail
    $handle = fopen($file_tmp_name, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $encoded_content = chunk_split(base64_encode($content));

    $boundary = md5(time());
    //header
    $headers = "MIME-Version: 1.0\r\n"; 
    $headers .= "From: $nome <$email>\r\n"; 
    $headers .= "Reply-To: $nome <$email>\r\n"; 
    $headers .= "Return-Path: $nome <$email>\r\n";
    $headers .= "X-Priority: 3\r\n";
    $headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
    $headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n"; 
    

    $message = "<html><head></head><body>
                <strong>Titulo:</strong> $titulo <br>
                <strong>Nome:</strong> $nome <br>
                <strong>Email:</strong> $email <br>
                <strong>Universidade:</strong> $universidade <br>
                <strong>Curso:</strong> $curso <br>
                <strong>Descricao:</strong> <br>".nl2br($descricao)."<br>
                <br><br>
                <strong>Confira o arquivo em anexo</strong></body></html>";
    $subject = "Novo envio de jogo para a plataforma";

    //plain text 
    $body = "--$boundary\r\n";
    $body .= "MIME-Version: 1.0\r\n";
    $body .= "Content-Type: text/html; charset=UTF-8\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
    $body .= chunk_split(base64_encode($message)); 
    
    //attachment
    $body .= "--$boundary\r\n";
    $body .="Content-Type: $file_type; name=".$file_name."\r\n";
    $body .="Content-Disposition: attachment; filename=".$file_name."\r\n";
    $body .="Content-Transfer-Encoding: base64\r\n";
    $body .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n"; 
    $body .= $encoded_content;

    $sentMail = @mail("$recipient_name <$recipient_email>", $subject, $body, $headers);
    if($sentMail){       
        $msg = "Obrigado por colaborar com nossa plataforma, entraremos em contato.";
        $msgStatus = true;
    }else{
        $msg = "Não foi possível enviar, por favor verifique os dados e tente novamente.";
        $msgStatus = false;
    }
}

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

        <div class="starter-template">
            <h1>Colabore com a Plataforma</h1>
            <br>
            <p class="lead alinhamento-texto ">
                        Para você, aluno, professor ou desenvolvedor que gostaria de divulgar seus trabalhos voltados a área de desenvolvimento de jogos educacionais, pode colaborar com a nossa plataforma que é meramente acadêmica, e desta forma não possui fins lucrativos!
                        <br><br>
                        Para participar é fácil: basta completar o formulário abaixo e enviar o seu jogo compactado .ZIP, que nós faremos a validação. Assim, se estiver dentro do propósito do portal, o jogo ficará disponivel em seguida.       
            </p>
        </div>

        <div class="starter-template">
            <span class="campo-requerido" id="campo-requerido"> * </span>
            <span id="campo-requerido">Campos Obrigatórios</span>
        </div>
        <div class="starter-template">
            <form enctype="multipart/form-data" id="formulario" method="POST">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="InputTitulo">Titulo: </label>
                            <label for="" class="campo-requerido">*</label>
                            <input type="text" class="form-control" id="InputTitulo" name="titulo" placeholder="Título do jogo" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="InputNome">Nome: </label>
                            <label for="" class="campo-requerido">*</label>
                            <input type="text" class="form-control" id="InputNome" name="nome" placeholder="Nome completo" required>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="InputEmail">E-mail: </label>
                            <label for="" class="campo-requerido">*</label>
                            <input type="email" class="form-control" id="InputEmail" name="email" placeholder="E-mail" required>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="InputUniversidade">Universidade: </label>
                            <input type="text" class="form-control" id="InputUniversidade" name="universidade" placeholder="Digite o nome da universidade">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="InputCurso">Curso: </label>
                            <input type="text" class="form-control" id="InputCurso" name="curso" placeholder="Digite o nome do curso">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="textareaColabore">Descrição do Jogo: </label>
                    <label for="" class="campo-requerido">*</label>
                    <textarea class="form-control" id="textareaColabore" rows="10" name="descricao" placeholder="Escreva aqui uma breve descrição do jogo e as instruções, seguindo as regras estabelecidas acima...." required></textarea>
                </div>
                <div class="form-group">
                    <label for="EscolherArquivo"></label>
                    <input type="file" class="form-control-file" name="arquivo" id="EscolherArquivo" required>
                </div>
                <?php if(!empty($msg)){ ?>

                    <p class="alert <?php echo ($msgStatus?'alert-success':'alert-danger')?>"><?php echo $msg ?></p>

                <?php } ?>
                <button type="submit" class="btn btn-dark">Enviar</button>
            </form>
        </div>
        
    </main>

    <?php include_once('assets/layout/footer.html') ?>

</body>

</html>