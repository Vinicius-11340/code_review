<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Concessionária</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Gerenciador de Carros da Concessionária</h1>
        <div class="card mb-5">
            <div class="card-header">
                Adicionar Novo Carro
            </div>
            <div class="card-body">
                <form action="api_oo.php" method="POST">
                    <input type="hidden" name="acao" value="criar">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="marca" class="form-label">Marca</label>
                            <input type="text" class="form-control" id="marca" name="marca" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="modelo" class="form-label">Modelo</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="ano" class="form-label">Ano</label>
                            <input type="number" class="form-control" id="ano" name="ano" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="preco" class="form-label">Preço (R$ )</label>
                            <input type="text" class="form-control" id="preco" name="preco" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="imagem_url" class="form-label">URL da Imagem</label>
                        <input type="text" class="form-control" id="imagem_url" name="imagem_url">
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar Carro</button>
                </form>
            </div>
        </div>

        <h2>Carros à Venda</h2>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Ano</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once 'api_oo.php';
                $carros = listarCarros();

                foreach ($carros as $carro) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($carro['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($carro['marca']) . "</td>";
                    echo "<td>" . htmlspecialchars($carro['modelo']) . "</td>";
                    echo "<td>" . htmlspecialchars($carro['ano']) . "</td>";
                    echo "<td>R$ " . number_format($carro['preco'], 2, ',', '.') . "</td>";
                    echo "<td>
                                <a href='#' class='btn btn-sm btn-warning'>Editar</a>
                                <a href='api_oo.php?action=delete&id=" . $carro['id'] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Tem certeza?\")'>Excluir</a>
                              </td>";
                    echo "</tr>";
                }
                ?>

                <?php
                /*
                    $json_data = file_get_contents('http://localhost:8080/Concessionaria/api_imperativo.php?acao=listar');
                    
                    $carros = json_decode($json_data, true);

                    if ($carros) {
                        foreach ($carros as $carro) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($carro['id']) . "</td>";
                            echo "<td>" . htmlspecialchars($carro['marca']) . "</td>";
                            echo "<td>" . htmlspecialchars($carro['modelo']) . "</td>";
                            echo "<td>" . htmlspecialchars($carro['ano']) . "</td>";
                            echo "<td>R$ " . number_format($carro['preco'], 2, ',', '.') . "</td>";
                            echo "<td>
                                    <a href='#' class='btn btn-sm btn-warning'>Editar</a>
                                    <a href='api_imperativo.php?acao=excluir&id=" . $carro['id'] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Tem certeza?\")'>Excluir</a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center'>Nenhum carro encontrado.</td></tr>";
                    }
                        */
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>