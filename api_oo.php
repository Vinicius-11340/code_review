<?php

$mensagem = "Olá, imundo!"; //O PHP é o mosquito que injeta no html. - Prof. Ícaro
echo "<p> $mensagem </p>";

//String nome = "Vinicius"; <- Na linguagem Java é mais escrito
$nome = 'Vinicius'; //String (texto). Em PHP, o conteúdo define o tipo da variável 
$idade = 18; //inteiro
$gosto_de_bolo = true; //Booleano / Lógico
$altura = 1.80; //Float / Número com vírgula
$variavel_nula = null; //Nula

$frutas = array('banana','maçã','tomate') ; //Armazena vários dados de uma só vez
echo '<p>' . $frutas[0] . '</p>'; // As aspas simples ('') é apenas para texto, indicam que tudo entre elas é texto não variáveis. Os pontos dizem onde é o texto 
echo "<p> $frutas[1]  </p>"; //As aspas duplas ("") conseguem diferenciar o que é texto

$numeros = array(3, 6, 8, 10,);
$numeros_frutados = array(3, 'morango', true, 1.93);

//Declarar constantes
define('PI','3.14159');
const SITE_NOME = 'Meu Site';

$resultado = ($idade + 123 * 18) / 13;

$numerozinho = 13.4;
$numerozinho_convertido = (int) $numerozinho;

echo $numerozinho;
echo "<br>";
echo $numerozinho_convertido;
echo "<br>";

$nota = 0;

if ($nota >= 7) {
    echo "passou!";
    echo "<br>";
} else {
    echo "deu ruim!";
    echo "<br>";
}

// (condição) ? valor_se_verdadeiro : valor_se_falsa

$status = ($nota >= 7) ? 'passou!':'deu ruim!';

for ($i = 0; $i <= 5; $i++) {
    echo "<p> Contagem: $i</p>";
}

$contador = 5;

while ($contador > 0) {
    echo "<p> Contagem: $contador...</p>";
    $contador--;
}


function saudacao($nome) {
    return "Olá $nome";
}

echo "<p>" . saudacao(nome: 'Vinicius') . "</p>";


if ($_SERVER['REQUEST_METHOD'] === "POST") {

?>
