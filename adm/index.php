<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
		
			<h1 align="center" >Convidados</h1>
			<p align="center">Casamento 21 de julho de 2018</p>
		 
			<div class="row">
				<div class="col">
					<a style="width: 200px; height: 50px" href="adicionar_convidado.php" class="btn btn-dark"><b>Adicionar convidado</b></a>
				</div>
				
				<div class="col- 10 ">
					<a style="width: 200px; height: 50px" href="pendentes.php" class="btn btn-danger"><b>Pendentes</b></a>
					<a style="width: 200px; height: 50px" href="conf.php" class="btn btn-success"><b>Confirmados</b></a>
					<a style="width: 200px; height: 50px" href="indecisos.php" class="btn btn-warning"><b>Indecisos</b></a>
				</div>
			</div>
			<br>
			<div class="row">
				<table class=" table table-dark table-striped">
					<thead>
						<tr align="center">
					   <!-- <th align="center">ID</th> -->
							<th>Nome</th>
							<th>Telefone</th>
							<!-- <th align="center">Código</th>-->
							<th>Situação</th>
							<th>Opções</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							include '../database.php';
							$pdo = Database::connect();
							$sql = 'SELECT * FROM convidados ORDER BY nome';
							foreach ($pdo->query($sql) as $row) {
								echo '<tr>';
									/* echo '<td>'. $row['id'] . '</td>'; */
									echo '<td>'. $row['nome'] .' - '. $row['referencia'] .'</td>';
									echo '<td align="center">'. $row['fone'] . '</td>';
									/* echo '<td>'. $row['codigo'] . '</td>'; */
									echo '<td><a class="btn btn-outline-primary" href="status.php?id='.$row['id'].'&nowstatus='.$row['status'].'">'.$row['status'].'</a></td>';
									echo '<td align="center">';
										/* echo '<a class="btn btn-success" href="gerar.php?id='.$row['id'].'&gerar=s">Gerar código</a>';  */
										echo '&nbsp;';
										echo '&nbsp;';
										echo '<a class="btn btn-outline-warning" href="atualizar.php?id='.$row['id'].'">Atualizar</a>';
										echo '&nbsp;';echo '&nbsp;';
										echo '&nbsp;';echo '&nbsp;';
										echo '<a class="btn btn-outline-danger" href="apagar.php?id='.$row['id'].'">Delete</a>';
										// echo '&nbsp;';
										// echo '<a class="btn btn-outline-info" href="fone.php?id='.$row['id'].'">+ Telefone</a>';
									echo '</td>';
								echo '</tr>';
							}
							Database::disconnect();
						?>
					</tbody>
				</table>
			</div>
		</div> <!-- /container -->
	</body>
</html>