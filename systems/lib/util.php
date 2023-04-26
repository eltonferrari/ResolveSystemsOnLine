<?php
    function convertDataMySQL_DataPHP($dataMySQL){
        $dataPHP = date('d/m/Y', strtotime($dataMySQL));
        return $dataPHP;
    }

    function convertDataMySQL_HoraPHP($dataMySQL) {
        $horaPHP = date('H:i:s', strtotime($dataMySQL));
        return $horaPHP;
    }

    function convertDataPHP_MySQL($dataPHP, $horaPHP){
        $dataMySQL = date('Y-m-d', strtotime($dataPHP)) . ' ' . $horaPHP;        
        return $dataMySQL;
    }
?>