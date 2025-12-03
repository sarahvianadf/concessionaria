<h1>Editar cliente</h1>

<?php 
include('config.php');
	$sql = "SELECT * FROM Cliente WHERE id_Cliente=".$_REQUEST['id_Cliente']; 

	$res = $conn->query($sql);

	$row = $res->fetch_object();
?>


<form action="?page=salvar-Cliente" method="POST">
	<input type="hidden" name="acao" value="editar">
	<input type="hidden" name="id_Cliente" value="<?php print $row->id_Cliente; ?>">
	<div class="mb-3">
		<label>Nome
			<input type="text" name="nome_Cliente" class="form-control"value="<?php print $row->nome_Cliente; ?>">
		</label>
	</div>
	<div class="mb-3">
		<label>E-mail
			<input type="email" name="email_Cliente" class="form-control" value="<?php print $row->email_Cliente; ?>">
		</label>
	</div>
	<div class="mb-3">
		<label>Telefone
			<input type="text" name="telefone_Cliente" class="form-control"value="<?php print $row->telefone_Cliente; ?>">
		</label>
	</div>
	<div>
		<button type="submit" class="btn  btn-primary">Enviar</button>
	</div>
</form>