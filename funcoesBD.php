<?php

require 'conexaoBD.php';

/**
 
 * @param string $nm Nome do jogo.
 * @param float $prc_og Preço original.
 * @param float $prc_prm Preço promocional.
 * @return bool Retorna TRUE em caso de sucesso, FALSE em caso de falha.
 */
function inserirJogo($nm, $prc_og, $prc_prm) {
    $cnn = conexaoBD();
    
    
    $stmt = $cnn->prepare("INSERT INTO jogo (nome, preco_original, preco_promocional) VALUES (?, ?, ?)");
    
    
    $stmt->bind_param("sdd", $nm, $prc_og, $prc_prm);
    
    $res = $stmt->execute();
    
    $stmt->close();
    $cnn->close();
    
    return $res;
}

/**
 * Lista jogos
 * @return array 
 */
function listarJogos() {
    $cnn = conexaoBD();
    
    
    $sql = "SELECT id, nome, preco_original, preco_promocional FROM jogo ORDER BY id DESC";
    $res_query = $cnn->query($sql);
    
    $lista_jogos = [];
    
    
    while ($row = $res_query->fetch_assoc()) {
        $lista_jogos[] = $row;
    }
    
    $cnn->close();
    
    return $lista_jogos;
}
?>