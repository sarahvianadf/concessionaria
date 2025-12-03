<?php
    include('config.php'); 
switch ($_REQUEST['acao']) {
    
    // --- AÇÃO DE CADASTRAR ---
    case 'cadastrar':
        
        $sql = "INSERT INTO modelo (marca_id_marca, nome_modelo, cor_modelo, ano_modelo, tipo_modelo) VALUES (?, ?, ?, ?, ?)";
        
       
        $stmt = $conn->prepare($sql);
        
        $stmt->bind_param("isssi", 
            $_POST['marca_id_marca'], 
            $_POST['nome_modelo'], 
            $_POST['cor_modelo'], 
            $_POST['ano_modelo'], 
            $_POST['tipo_modelo']
        );

     
        $res = $stmt->execute();

        if($res){
            print "<script>alert('Modelo cadastrado com sucesso!');</script>";
            print "<script>location.href='?page=listar-modelo';</script>";
        } else {
            print "<script>alert('Não foi possível cadastrar o modelo.');</script>";
            print "<script>location.href='?page=listar-modelo';</script>";
        }
        break;

    // --- AÇÃO DE EDITAR ---
    case 'editar':
        // SQL com 'placeholders' (?) para segurança.
        $sql = "UPDATE modelo SET marca_id_marca=?, nome_modelo=?, cor_modelo=?, ano_modelo=?, tipo_modelo=? WHERE id_modelo=?";
        
        // Prepara a consulta.
        $stmt = $conn->prepare($sql);
        
        // Associa as variáveis. O último 'i' é para o id_modelo.
        $stmt->bind_param("isssii", 
            $_POST['marca_id_marca'], 
            $_POST['nome_modelo'], 
            $_POST['cor_modelo'], 
            $_POST['ano_modelo'], 
            $_POST['tipo_modelo'],
            $_POST['id_modelo'] // Usamos $_POST aqui pois o ID vem do formulário hidden.
        );

        // Executa a consulta.
        $res = $stmt->execute();

        if($res){
            print "<script>alert('Modelo editado com sucesso!');</script>";
            print "<script>location.href='?page=listar-modelo';</script>";
        } else {
            print "<script>alert('Não foi possível editar o modelo.');</script>";
            print "<script>location.href='?page=listar-modelo';</script>";
        }
        break;

    // --- AÇÃO DE EXCLUIR ---
    case 'excluir':
        // SQL com 'placeholder' (?) para o ID.
        $sql = "DELETE FROM modelo WHERE id_modelo=?";
        
        // Prepara a consulta.
        $stmt = $conn->prepare($sql);
        
        // Associa o ID. 'i' para integer.
        $stmt->bind_param("i", $_REQUEST['id_modelo']);

        // Executa a consulta.
        $res = $stmt->execute();

        if($res){
            print "<script>alert('Modelo excluído com sucesso!');</script>";
            print "<script>location.href='?page=listar-modelo';</script>";
        } else {
            print "<script>alert('Não foi possível excluir o modelo.');</script>";
            print "<script>location.href='?page=listar-modelo';</script>";
        }
        break;
}
?>
