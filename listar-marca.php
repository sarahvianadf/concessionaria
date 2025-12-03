<h1>Listar marca</h1>
<?php 
include('config.php');

	$SQL = "SELECT * FROM marca";

	$res = $conn->query($SQL);

	$qtd = $res->num_rows;

	if($qtd > 0){
		print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
		print "<table class='table table-bordered table-striped table-houver'>";
		print "<tr>";
		print "<th>#</th>";
		print "<th>Nome</th>";;
		print "<th>Ações</th>";
		print "</tr>";
		while ($row = $res->fetch_object()) {
			print "<tr>";
			print "<td>".$row->id_marca."</td>";
			print "<td>".$row->nome_marca."</td>";
			print "<td>
				<button class='btn btn-success' onclick=\"location.href='?page=editar-marca&id_marca={$row->id_marca}';\">Editar</button>

				<button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-marca&acao=excluir&id_marca={$row->id_marca}';}else{false;}\">Excluir</button>
				</td>";
			print "</tr>";
		}
		print "</table>";
	}else{
		print "`<P> Não Encontrou resuiltado</p>";
	}

		



	