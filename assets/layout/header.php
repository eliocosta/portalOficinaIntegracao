<header>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Jogos Educacionais</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsMenu" aria-controls="navbarsMenu"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsMenu">
      <ul class="navbar-nav mr-auto">

        <?php if($usuario){ ?>
        <li class="nav-item">
          <a class="nav-link" id="nome-usuario"><?php echo $usuario->getNome() ?></a>
        </li>
        <?php } ?>

        <?php if($usuario){ ?>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Sair</a>
        </li>
        <?php }else{ ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Logar</a>
        </li>
        <?php } ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">Jogos</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="jogo1.php">Encontre as Vidrarias</a>
            <a class="dropdown-item" href="jogo2.php">Equipe o Laboratório</a>
            <a class="dropdown-item" href="jogo3.php">Organize as Vidrarias</a>
            <a class="dropdown-item" href="jogo4.php">App QR code</a>
            <?php
            $daojogo = new DaoJogo();
            foreach ($daojogo->listaJogos() as $key => $jogo) {
              echo '<a class="dropdown-item" href="jogos/'.$jogo['hash_arquivo'].'">'.$jogo['nome'].'</a>';
            }
            ?>
          </div>
        </li>

        <?php if($usuario){
            if($usuario->getNivelAcesso() >= 2){ ?>
            <li class="nav-item">
              <a class="nav-link" href="pagina-do-professor.php">Pagina do professor</a>
            </li>

        <?php }
        }
        ?>
            <li class="nav-item">
              <a class="nav-link" href="colabore.php">Colabore</a>
            </li>
            
            <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">Admin</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="publicar-jogo.php">Publicar Jogo</a>
            <a class="dropdown-item" href="deletar-jogo.php">Excluir Jogo</a>
          </div>
        </li>

      </ul>
      <img src="assets/img/logo1.png" class="logo-utf">
    </div>
  </nav>
</header>