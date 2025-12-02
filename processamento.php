<?php

require 'funcoesBD.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nm_jogo = trim($_POST['nome']);
    
    $prc_og  = floatval($_POST['preco_original']);
    $prc_prm = floatval($_POST['preco_promocional']);

    
    
    if (empty($nm_jogo) || $prc_og <= 0 || $prc_prm <= 0 || $prc_prm >= $prc_og) {
       
        header("Location: index.php");
        exit;
    }

   
    $ok = inserirJogo($nm_jogo, $prc_og, $prc_prm);

    
    header("Location: index.php");
    exit;
} else {
    
    header("Location: index.php");
    exit;
}
?>