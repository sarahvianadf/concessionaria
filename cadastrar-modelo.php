<?php include('config.php'); ?>
<h1>Cadastrar Modelo</h1>
<form action="?page=salvar-modelo" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>Marca
        <select name="marca_id_marca" class="form-control" required>
            <option>-- Escolha uma Marca --</option>
            <?php
                $sql = "SELECT * FROM marca ";
                $res = $conn->query($sql);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $qtd = $res->num_rows;
                if ($qtd > 0) {
                    while ($row = $res->fetch_object()) {
                        print "<option value='{$row->id_marca}'>{$row->nome_marca}</option>";
                    }
                } else {
                    print "<option>Nenhuma marca cadastrada</option>";
                }
            ?>
        </select>
        </label>
    </div>
    <div class="mb-3">
            <label>Nome do Modelo
        <input type="text" name="nome_modelo" class="form-control">
    </div>
            </label>

    <div class="mb-3">
            <label>Cor
        <input type="text" name="cor_modelo" class="form-control" required>
    </div>
            </label>

    <div class="mb-3">
        <label>Ano</label>
        <input type="number" name="ano_modelo" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Tipo</label>
        <input type="text" name="tipo_modelo" class="form-control" required>
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>
