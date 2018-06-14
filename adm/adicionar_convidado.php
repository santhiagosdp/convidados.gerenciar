<?php 
	
	require '../database.php';

	if ( !empty($_POST)) {
		// acompanhar os erros de validação
		$nameError = null;
		$emailError = null;
		$mobileError = null;
		
		// acompanhar valores post
		$nome = $_POST['nome'];
		$fone = $_POST['fone'];
		$codigo = Database::geraSenha(5, true, true);
		$referencia = $_POST['referencia'];
		
		// validar entrada
		$valid = true;
		if (empty($nome)) {
			$nameError = 'Por favor, digite nome.';
			$valid = false;
		}
		
		// inserir dados
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO convidados (nome,codigo,referencia,status,fone) values(?, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($nome,$codigo,$referencia,"PENDENTE",$fone));
			Database::disconnect();
			header("Location: index.php");
		}
	}
?>

<!DOCTYPE html>
<html lang="pt-BR">
	<head>
	    <meta charset="utf-8">
	    <link href="../css/bootstrap.min.css" rel="stylesheet">
	    <script src="../js/bootstrap.min.js"></script>
	</head>
	<body>
	    <div class="container">
			<div class="row">
				<br>
	    		<h3>Cadastro de convidados</h3>
	    	</div>
	    	<div class="row">
				<form class="form-horizontal" action="adicionar_convidado.php" method="post">
				  	<div class="control-group <?php echo !empty($nameError)?'error':'';?>">
				    	<label for="nome">Nome</label>
				      		<input name="nome" type="text"  placeholder="Nome">
				     	<br>
				  		<label for="fone">Fone</label>
				      		<input name="fone" type="text"  placeholder="00 99999-9999">
				    	<br>
				    	<label for='referencia'>Referência:</label>
				      		<input name="referencia" type="text"  placeholder="Dally ou Santhiago">	  
						<br></div>
						<button type="submit" class="btn btn-success">Adicionar</button>
							  <a class="btn" href="index.php">Voltar</a>
					</div>
				</form>
			</div>
	    </div> <!-- /container -->
  	</body>
</html>