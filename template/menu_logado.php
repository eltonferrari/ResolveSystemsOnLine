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
            <li class="nav-item">
                <a class="nav-link" href="\systems/visualizacoes/home/home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="\systems/visualizacoes/pessoas/busca_perfil.php?user=<?= $_SESSION['id_logado'] ?>">Perfil</a>
            </li>
        </ul>
        <ul class="navbar-nav navbar-right">
            <li class="nav-item">
                <a class="nav-link" href="\systems/controladores/autenticacao/logoff.php">Sair</a>
            </li>   
        </ul>
    </div>
</nav>