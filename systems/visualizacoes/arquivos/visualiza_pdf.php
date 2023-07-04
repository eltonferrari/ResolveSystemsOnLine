<?php
    session_start();
    include '../../controladores/arquivos/class_arquivos.php';

    $idArquivo = $_GET['id_arquivo'];
    $arquivo = new Arquivos();
    $arquivo = $arquivo->getArquivoById($idArquivo);
    $file = $arquivo[0]['caminho'];
    $filename = $arquivo[0]['arquivo']; /* Note: Always use .pdf at the end. */
    header("Content-type: application/pdf");
    header("Content-Disposition: inline; filename=$filename");
    @readfile("$file/$filename");
?>