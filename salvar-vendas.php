<?php
include('config.php');

switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $cliente_id = $_POST['cliente_id_cliente'];
        $funcionario_id = $_POST['funcionario_id_funcionario'];
        $modelo_id = $_POST['modelo_id_modelo'];
        $valor = $_POST['valor_venda'];
        $data = $_POST['data_venda'];

        $sql = "INSERT INTO venda (data_venda, valor_venda, cliente_id_cliente, funcionario_id_funcionario, modelo_id_modelo)
                VALUES ('{$data}', '{$valor}', {$cliente_id}, {$funcionario_id}, {$modelo_id})";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Venda cadastrada com sucesso!');</script>";
            print "<script>location.href='listar-vendas.php';</script>";
        } else {
            print "<script>alert('Erro ao cadastrar venda! Detalhes: " . $conn->error . "');</script>";
            print "<script>location.href='listar-vendas.php';</script>";
        }
        break;

    case 'editar':
        // Implementação da edição de vendas, se necessário.
        break;

    case 'excluir':
        // Implementação da exclusão de vendas, se necessário.
        break;
}
?>
