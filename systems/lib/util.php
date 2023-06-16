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

    function convertMascaraTelefone_Numero($telefoneMascara) {
        $str = $telefoneMascara;
        $arr1 = explode('(', $str);
        $arr2 = explode(')', $arr1[1]);
        $arr3 = explode(' ', $arr2[1]);
        $arr4 = explode('-', $arr3[1]);
        $numero = $arr2[0].$arr4[0].$arr4[1];
        return $numero;
    }
?>