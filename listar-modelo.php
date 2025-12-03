<?php include("config.php"); ?>
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h1>Listar Modelo</h1>

            <?php
            $sql = "SELECT 
                        m.id_modelo, 
                        ma.nome_marca, 
                        m.nome_modelo, 
                        m.cor_modelo, 
                        m.ano_modelo, 
                        m.tipo_modelo 
                    FROM 
                        modelo AS m
                    JOIN 
                        marca AS ma ON m.marca_id_marca = ma.id_marca
                    ORDER BY 
                        m.nome_modelo";

            $res = $conn->query($sql);

            if ($res === false) {
                die("Erro na consulta: " . $conn->error);
            }

            $qtd = $res->num_rows;

            if ($qtd > 0) {
                print "<table class=\"table table-hover table-striped table-bordered\">";
                print "<tr>";
                print "<th>#</th>";
                print "<th>Marca</th>";
                print "<th>Modelo</th>";
                print "<th>Cor</th>";
                print "<th>Ano</th>";
                print "<th>Tipo</th>";
                print "<th>Ações</th>";
                print "</tr>";

                while ($row = $res->fetch_object()) {
                    print "<tr>";
                    print "<td>{$row->id_modelo}</td>";
                    print "<td>{$row->nome_marca}</td>";
                    print "<td>{$row->nome_modelo}</td>";
                    print "<td>{$row->cor_modelo}</td>";
                    print "<td>{$row->ano_modelo}</td>";
                    print "<td>{$row->tipo_modelo}</td>";
                    print "<td>
                               <button onclick=\"location.href='?page=editar-modelo&id_modelo={$row->id_modelo}';\" class=\"btn btn-success\">Editar</button>
                               <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-modelo&acao=excluir&id_modelo={$row->id_modelo}';}else{false;}\" class=\"btn btn-danger\">Excluir</button>
                           </td>";
                    print "</tr>";
                }

                print "</table>";
            } else {
                print "<p class=\"alert alert-danger\">Nenhum modelo encontrado.</p>";
            }
            ?>
        </div>
    </div>
</div>
