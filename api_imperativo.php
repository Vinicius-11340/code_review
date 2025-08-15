<?php

require_once 'bd.php';

$acao = $_REQUEST['acao'] ?? 'listar';

if ($acao === 'criar' && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $marca = $_POST['marca'] ?? '';
    $modelo = $_POST['modelo'] ?? '';
    $ano = $_POST['ano'] ?? 0;
    $preco = $_POST['preco'] ?? 0.0;
    $imagem_url = $_POST['imagem_url'] ?? '';

    $preco_formatado = str_replace(['.', ','], ['', '.'], $preco);

    $sql = "INSERT INTO carros (marca, modelo, ano, preco, imagem_url) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$marca, $modelo, $ano, $preco_formatado, $imagem_url]);

    header('Location: index.php');
    exit;

} elseif ($acao === 'excluir' && isset($_GET['id'])) {

    $id = $_GET['id'];
    $sql = "DELETE FROM carros WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    header('Location: index.php');
    exit;

} elseif ($acao === 'listar') {

    $stmt = $pdo->query("SELECT * FROM carros ORDER BY id DESC");
    $carros = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');

    echo json_encode($carros);
    exit;
}

header('Location: index.php');
exit;
?>