<?php include('config.php'); ?>
<h1>Cadastrar Venda</h1>
<form action="salvar-vendas.php" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    
    <div class="mb-3">
        <label for="cliente_id_cliente" class="form-label">Cliente</label>
        <select name="cliente_id_cliente" id="cliente_id_cliente" class="form-control" required>
            <option value="">Selecione o Cliente</option>
            <?php
            $sql_cliente = "SELECT id_cliente, nome_cliente FROM cliente ORDER BY nome_cliente";
            $res_cliente = $conn->query($sql_cliente);
            if ($res_cliente && $res_cliente->num_rows > 0) {
                while ($row_cliente = $res_cliente->fetch_object()) {
                    print "<option value='{$row_cliente->id_cliente}'>{$row_cliente->nome_cliente}</option>";
                }
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="funcionario_id_funcionario" class="form-label">Funcionário</label>
        <select name="funcionario_id_funcionario" id="funcionario_id_funcionario" class="form-control" required>
            <option value="">Selecione o Funcionário</option>
            <?php
            $sql_funcionario = "SELECT id_funcionario, nome_funcionario FROM funcionario ORDER BY nome_funcionario";
            $res_funcionario = $conn->query($sql_funcionario);
            if ($res_funcionario && $res_funcionario->num_rows > 0) {
                while ($row_funcionario = $res_funcionario->fetch_object()) {
                    print "<option value='{$row_funcionario->id_funcionario}'>{$row_funcionario->nome_funcionario}</option>";
                }
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="modelo_id_modelo" class="form-label">Modelo do Veículo</label>
        <select name="modelo_id_modelo" id="modelo_id_modelo" class="form-control" required>
            <option value="">Selecione o Modelo</option>
            <?php
            $sql_modelo = "SELECT id_modelo, nome_modelo FROM modelo ORDER BY nome_modelo";
            $res_modelo = $conn->query($sql_modelo);
            if ($res_modelo && $res_modelo->num_rows > 0) {
                while ($row_modelo = $res_modelo->fetch_object()) {
                    print "<option value='{$row_modelo->id_modelo}'>{$row_modelo->nome_modelo}</option>";
                }
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="valor_venda" class="form-label">Valor da Venda (R$)</label>
        <input type="number" step="0.01" name="valor_venda" id="valor_venda" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="data_venda" class="form-label">Data da Venda</label>
        <input type="date" name="data_venda" id="data_venda" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Registrar Venda</button>
    </div>
</form>
