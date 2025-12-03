<h1>Editar Modelo</h1>
<?php
    // Consulta preparada para buscar o modelo específico com segurança.
    $sql = "SELECT * FROM modelo WHERE id_modelo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_REQUEST['id_modelo']);
    $stmt->execute();
    $res = $stmt->get_result();
    $row = $res->fetch_object();
?>
<form action="?page=salvar-modelo" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_modelo" value="<?php print $row->id_modelo; ?>">

    <div class="mb-3">
        <label>Marca</label>
        <select name="marca_id_marca" class="form-control" required>
            <option value="">-- Escolha uma Marca --</option>
            <?php
                $sql_marcas = "SELECT id_marca, nome_marca FROM marca";
                $res_marcas = $conn->query($sql_marcas);
                while($row_marca = $res_marcas->fetch_object()){
                    // Usa um operador ternário para definir se a marca deve ser selecionada.
                    $selected = ($row->marca_id_marca == $row_marca->id_marca) ? 'selected' : '';
                    print "<option value='{$row_marca->id_marca}' {$selected}>{$row_marca->nome_marca}</option>";
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Nome do Modelo</label>
        <input type="text" name="nome_modelo" class="form-control" value="<?php print htmlspecialchars($row->nome_modelo); ?>" required>
    </div>

    <div class="mb-3">
        <label>Cor</label>
        <input type="text" name="cor_modelo" class="form-control" value="<?php print htmlspecialchars($row->cor_modelo); ?>" required>
    </div>

    <div class="mb-3">
        <label>Ano</label>
        <input type="number" name="ano_modelo" class="form-control" value="<?php print htmlspecialchars($row->ano_modelo); ?>" required>
    </div>

    <div class="mb-3">
        <label>Tipo</label>
        <input type="text" name="tipo_modelo" class="form-control" value="<?php print htmlspecialchars($row->tipo_modelo); ?>" required>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </div>
</form>
