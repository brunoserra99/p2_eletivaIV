<?php


function conexaoBD() {
    
    $hst = 'localhost';
    $usr = 'root';
    $snh = '';
    $bco = 'friday';

    
    $cnn = new mysqli($hst, $usr, $snh, $bco);
    
    
    if ($cnn->connect_error) {
        
        die("Erro de conexão: " . $cnn->connect_error);
    }
    
    
    $cnn->set_charset("utf8mb4");
    
    return $cnn;
}
?>