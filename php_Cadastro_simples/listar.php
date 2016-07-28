<?php
	
	include("config.php");
	
	$sql_code = "SELECT * FROM clienteTabela";
	$sql_query = $mysqli->query($sql_code) or die($mysqli->error);
	$linha = $sql_query->fetch_assoc();
	

?>

<a href="index.php?p=inicial">Voltar</a>
<p class=espaco></p>
<form action="index.php?p=cadastrar" method="POST">
	<table id="cad_table">
		<table border=3 cellpadding=8>
		<tr class=titulo>
			<td>Nome</td>
			<td>Email</td>
			<td>Endereco</td>
			<td>Ativo</td>
			<td>Ação</td>
		</tr>
<?php

	do{
?>

		
		<tr>
			<td><?php echo $linha['nome'];?></td>
			<td><?php echo $linha['email'];?></td>
			<td><?php echo $linha['endereco'];?></td>  
			<td><?php echo $linha['ativo'];?></td>
			<td>
				
				<a href="index.php?p=editar&clienteTabela=<?php echo $linha['id'];?>">Editar</a>
				<p>
				<a href="index.php?p=deletar&clienteTabela=<?php echo $linha['id'];?>">Deletar</a>
				
			</td>
		</tr>
<?php
	} while($linha = $sql_query->fetch_assoc());
?>
  </table>
</form>
