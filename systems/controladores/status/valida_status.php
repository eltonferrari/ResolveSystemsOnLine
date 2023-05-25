<?php
    session_start();
    include 'class_status.php';

    echo '===== SESSION =====';
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
    echo '===== POST =====';
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $anterior = $_POST['anterior'];
    $proximo = $_POST['proximo'];

    if ($anterior != 0 && $proximo != 0) {
        $statusNovo = new Status();
        $statusAnterior = new Status();
        $statusProximo = new Status();
        $statusNovo = $statusNovo->addStatus($nome, $descricao, $anterior, $proximo);
        $statusAnterior = $statusAnterior->setStatusAnterior($statusNovo,$anterior);
        $statusProximo = $statusProximo->setStatusProximo($statusNovo,$proximo);
        $msgStatus = 'Status criado e posicionado corretamente!';
    } else {
        $msgStatus = 'Todos os campos precisam ser preenchidos';
    }
        $_SESSION['msgStatusNovo'] = $msgStatus;
?>
        <meta http-equiv="refresh" content="0;url=../../visualizacoes/status/status.php">
<?php
?>