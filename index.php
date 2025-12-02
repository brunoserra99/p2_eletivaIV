<?php

require 'funcoesBD.php'; 
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Black Friday - Ofertas de Jogos</title>
    
</head>
<body>
<div class="container">
    <h1>Black Friday - Cadastro de Ofertas de Jogos</h1>

    <form action="processamento.php" method="post">
        <label for="nome">Nome do Jogo</label>
        <input type="text" id="nome" name="nome" required>

        <label for="preco_original">Preço Original (R$)</label>
        <input type="number" step="0.01" id="preco_original" name="preco_original" min="0.01" required>

        <label for="preco_promocional">Preço Promocional (R$)</label>
        <input type="number" step="0.01" id="preco_promocional" name="preco_promocional" min="0.01" required>

        <button type="submit">Cadastrar Oferta</button>
    </form>

    <hr>
    
    <h2>Jogos já cadastrados</h2>
    
    <?php
    
    $jogos_bd = listarJogos();

    if (count($jogos_bd) == 0) {
        
        echo "<p>Ainda não há jogos cadastrados.</p>";
    } else {
        
        echo "<table>
                <tr>
                    <th>Nome</th>
                    <th>Preço Original</th>
                    <th>Preço Promocional</th>
                    <th>Desconto</th>
                </tr>";
        
        
        foreach ($jogos_bd as $j) {
            
            $desc = round((1 - $j['preco_promocional'] / $j['preco_original']) * 100);
            
            
            $prc_og_fmt = number_format($j['preco_original'], 2, ',', '.');
            $prc_prm_fmt = number_format($j['preco_promocional'], 2, ',', '.');
            
            echo "<tr>
                    <td>{$j['nome']}</td>
                    <td>R$ {$prc_og_fmt}</td>
                    <td>R$ {$prc_prm_fmt}</td>
                    <td class='desconto'>-{$desc}%</td>
                  </tr>";
        }
        echo "</table>";
    }
    ?>
</div>
</body>
</html>