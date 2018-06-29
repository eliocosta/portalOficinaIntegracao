<?php
include_once "dao/DaoUsuario.php";
session_start();
$usuario = new DaoUsuario();
$usuario = $usuario->getUsuario($_SESSION['id']);
Usuario::checkPermissao(3);
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
            
        <br>
            
         <div class="starter-template">  
            <h2>Excluir Jogo</h2>
            <hr style="width: auto;">
  

                <table class="table">
                    <thead class="thead-dark">
                         <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Ação</th>
                        </tr>
                     </thead>
                 <tbody>
                         <tr>
                            <td>Encontre as Vidrarias</td>
                            <td><button type="button" class="btn btn-dark">Excluir</button></td>
                        </tr> 
            
                        <tr>
                            <td>Equipe o Laboratório</td>
                            <td><button type="button" class="btn btn-dark">Excluir</button></td>
                        </tr> 
            
                        <tr>
                            <td>Organize as Vidrarias</td>
                            <td><button type="button" class="btn btn-dark">Excluir</button></td>
                        </tr>

                        <tr>
                            <td>App QR Code</td>
                            <td><button type="button" class="btn btn-dark">Excluir</button></td>
                        </tr>
                </tbody>
                </table>
    
         </div>
    </main>    

 <?php include_once('assets/layout/footer.html') ?>

</body>