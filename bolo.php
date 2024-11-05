<?php
function cakes($recipe, $ingredients){
  // Cria uma lista para armazenar quantos bolos podem ser feitos conforme os ingredientes
  $quantidade_bolos = [];

  // Faz um looping que vai interar sobre cada ingrediente
  foreach ($recipe as $ingredient => $quantia_necessária){

    // Verifica se o ingrediente da receita está disponível
    if (isset($ingredients[$ingredient])){
      
      // Recebe a quantidade disponível daquele ingrediente para analisar se é possível fazer a receita
      $quantia_disponível =  $ingredients[$ingredient];

      // Analisa se a quantidade do ingrediente x é menor que o necessário, se for return 0
      if ($quantia_disponível < $quantia_necessária){
        return 0; //"Nenhum bolo pode ser feito com os ingredientes disponíveis";
      }

      // A lista recebe uma divisão por inteiro da quantia do ingrediente disponível pela necessária
      $quantidade_bolos[] = intdiv($quantia_disponível, $quantia_necessária);
    }
    // Se o ingrediente da receita não estiver disponível, "retorna a falta de ingrediente"
    else{
      return 0; //"Você não tem um dos ingredientes necessários para a receita";
    }
  }

  // Retorna o menor valor da lista de bolos disponível, o que seria igual para todos
  return min($quantidade_bolos);
}

// Abaixo estão os casos de uso:
var_dump(cakes(
  ['flour' => 500, 'sugar' => 200, 'eggs' => 1], 
  ['flour' => 1200, 'sugar' => 1200, 'eggs' => 5, 'milk' => 200]) 
  === 2); 

var_dump(cakes(
  ['apples' => 3, 'flour' => 300, 'sugar' => 150, 'milk' => 100, 'oil' => 100], 
  ['sugar' => 500, 'flour' => 2000, 'milk' => 2000]) 
  === 0); 

var_dump(cakes(
  ['flour' => 500, 'sugar' => 200, 'eggs' => 1], 
  ['flour' => 1500, 'sugar' => 1200, 'eggs' => 5, 'milk' => 200]) 
  === 3);
?>