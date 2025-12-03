<?php include("config.php"); ?>
<div class="container mt-3">
    <div class="row">
        <div class="col">
   <h1>Listar Vendas</h1>

<?php
$sql = "SELECT 
            v.id_venda, 
            c.nome_cliente, 
            f.nome_funcionario, 
            m.nome_modelo, 
            v.data_venda, 
            v.valor_venda 
        FROM 
            venda AS v
        JOIN 
            cliente AS c ON v.cliente_id_cliente = c.id_cliente
        JOIN 
            funcionario AS f ON v.funcionario_id_funcionario = f.id_funcionario
        JOIN 
            modelo AS m ON v.modelo_id_modelo = m.id_modelo
        ORDER BY 
            v.data_venda DESC";

$res = $conn->query($sql);

if ($res === false) {
    die("Erro na consulta: " . $conn->error);
}

$qtd = $res->num_rows;

if ($qtd > 0) {
    print "<table class=\"table table-hover table-striped table-bordered\">";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Cliente</th>";
    print "<th>Funcionário</th>";
    print "<th>Modelo</th>";
    print "<th>Data da Venda</th>";
    print "<th>Valor da Venda</th>";
    print "<th>Ações</th>";
    print "</tr>";

    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>{$row->id_venda}</td>";
        print "<td>{$row->nome_cliente}</td>";
        print "<td>{$row->nome_funcionario}</td>";
        print "<td>{$row->nome_modelo}</td>";
        print "<td>" . date("d/m/Y", strtotime($row->data_venda)) . "</td>";
        print "<td>R$ " . number_format($row->valor_venda, 2, ',', '.') . "</td>";
        print "<td>
                   <button onclick=\"location.href='?page=editar-vendas&id_venda={$row->id_venda}';\" class=\"btn btn-success\">Editar</button>
                   <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-vendas&acao=excluir&id_venda={$row->id_venda}';}else{false;}\" class=\"btn btn-danger\">Excluir</button>
               </td>";
        print "</tr>";
    }

    print "</table>";
} else {
    print "<p class=\"alert alert-danger\">Nenhuma venda encontrada.</p>";
}
?>
?>
        </div>
    </div>
</div>

