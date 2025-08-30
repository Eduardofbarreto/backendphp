<?php

/**
 * Declara uma função para classificar o IMC de um valor informado.
 *
 * @param float $imc_value O valor numérico do IMC a ser classificado.
 */
function classificaFaixaIMC($imc_value) {
    // Declara o array com as faixas e classificações de IMC
    $faixas_imc = [
        ['faixa' => 18.5, 'classificacao' => 'Magreza'],
        ['faixa' => 24.9, 'classificacao' => 'Saudável'],
        ['faixa' => 29.9, 'classificacao' => 'Sobrepeso'],
        ['faixa' => 34.9, 'classificacao' => 'Obesidade Grau I'],
        ['faixa' => 39.9, 'classificacao' => 'Obesidade Grau II']
    ];

    // Variável para armazenar a classificação encontrada
    $classificacao_encontrada = 'Obesidade Grau III';

    // Percorre o array para encontrar a faixa correspondente
    foreach ($faixas_imc as $faixa) {
        if ($imc_value <= $faixa['faixa']) {
            $classificacao_encontrada = $faixa['classificacao'];
            break; // Sai do loop assim que a faixa é encontrada
        }
    }

    // Exibe a mensagem formatada na tela
    echo "Atenção, seu IMC é " . number_format($imc_value, 2, '.', '') . ", e você está classificado como " . $classificacao_encontrada . ".";
}

// Valor numérico de IMC para teste
$meu_imc = 21.30;

// Chama a função para classificar o IMC
classificaFaixaIMC($meu_imc);

?>