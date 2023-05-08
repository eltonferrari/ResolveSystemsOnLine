<span id='topo'></span>
<nav class="navbar navbar-expand-md navbar-light bg-light">
    <!-- LOGO -->
    <a href="#" class="navbar-brand">
        <img src="\img/logos/logo.png" width="40">
    </a>
    <!-- MENU HAMBURGUER -->
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- NAVEGAÇÃO -->
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
            <?php
                if (isset($tipoUser)){
                    if ($tipoUser == 1) {
            ?>
                        <li class="nav-item">
                            <a class="nav-link" href="\systems/visualizacoes/home/home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="\systems/visualizacoes/fale_conosco/lista_mensagens.php">Fale conosco</a>
                        </li>
            <?php 
                    } else {
            ?>
                        <li class="nav-item">
                            <a class="nav-link" href="\systems/visualizacoes/pessoas/status_cliente.php">Cliente</a>
                        </li>
            <?php
                    }
                }
            ?>
           
        </ul>

        <div class="collapse navbar-collapse" id="navbar-list-4">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="\img/users/eltonferrari@gmail.com/Foto 3X4.jpg" width="30" height="40" class="rounded-circle"><?= $nomePerfil ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="\systems/visualizacoes/pessoas/busca_perfil.php?user=<?= $_SESSION['id_logado'] ?>">Perfil</a>
                        <a class="dropdown-item" href="\systems/visualizacoes/autenticacao/sair.php">Sair</a>
                    </div>
                </li>   
            </ul>
        </div>
    </div>
</nav>