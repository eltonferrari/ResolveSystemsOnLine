<span id='topo'></span>
<nav class="navbar navbar-expand-md navbar-light bg-light">
    <!-- LOGO -->
    <a href="\index.php" class="navbar-brand">
        <img src="\img/logos/logo.png" width="40">
    </a>
    <!-- MENU HAMBURGUER -->
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- NAVEGAÇÃO -->
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <?php
                    if (isset($_SESSION['logado']) && $_SESSION['logado'] == 1) {
                ?>
                        <a class="nav-link" href="\systems/visualizacoes/home/home.php">Home</a>
                <?php 
                    } else {
                ?>
                        <a class="nav-link" href="\index.php">Home</a>
                <?php
                    }
                 ?>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="\institucional.php">Institucional</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown">O que fazemos?</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="\tecnologias.php">Tecnologias</a>
                    <a class="dropdown-item" href="\ferramentas/ferramentas_p-00.php">Ferramentas</a>
                    <a class="dropdown-item" href="\portfolio.php">Portfólio</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="\contato.php">Contatos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="\systems/visualizacoes/fale_conosco/fale_conosco.php">Fale Conosco</a>
            </li>
        </ul>
        <?php
            if (isset($_SESSION['logado']) && $_SESSION['logado'] == 1) {
        ?>
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acesso</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="\systems/visualizacoes/pessoas/busca_perfil.php?user=<?= $_SESSION['id_logado'] ?>">Perfil</a>
                            <a class="dropdown-item" href="\systems/controladores/autenticacao/logoff.php">Sair</a>
                        </div>
                    </li>   
                </ul>
        <?php
            } else {
        ?>
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item pt-2">
                        <a class="clock px-2 py-1" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="\systems/visualizacoes/autenticacao/login.php">Login</a>
                    </li>
                </ul>
        <?php 
            }
        ?>
        </ul>
    </div>
</nav>