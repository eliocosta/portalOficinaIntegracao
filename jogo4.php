<!doctype html>
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
            <h1>App QR code</h1>
            <hr style="width: auto;">
            <p class="lead alinhamento-texto">O objetivo deste jogo é ler os códigos da apostila e mostrar a respectiva vidraria na tela. Para os usuários que desejam ter a aplicação em seu Smartphone Android, basta realizar o Download do mesmo, que pode ser acessado posteriormente sem necessidade de estar conectado a Internet.
           <br><br>
           - Caso você seja usuário de IOS, o aplicativo deve ser utilizado através da plataforma e para isso precisará estar conectado na internet.
           </p>

             <br>
             <h3><a class="btn btn-lg btn-dark" href="jogos/jogo04/jogo04.php">Acesse aqui</a></h3>
            
            
                <div id="div-download-apk">
                    <h4>Baixe o aplicativo QR code via google play ou .apk a versão mobile</h4>
                    <br>
                    <a href="#"><img src="assets/img/img-playstore.png" class="img-download-apk"></a>
                    <a href="#"><img src="assets/img/img-apk.png" class="img-download-apk"></a>
                </div>
                <br><br>
                <!--Modal para imagem depois da leitura do Qr-code -->
            <button class="btn btn-dark" data-toggle="modal" data-target="#exampleModalCenter">Teste Modal</button>
            
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Nome da vidraria</h5>
                        </div>
                            <div class="modal-body">
                                <img id="img-qrcode" src="jogos/jogo04/assets/images/a5a7ccb2cc24dcf88565058b51694639.jpg">
                                
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                </div>
                        </div>
                    </div>
                </div>
        </div>

    </main>

    <?php include_once('assets/layout/footer.html') ?>

</body>

</html>