<?php
	include("config.php");

	$usu_codigo = intval($_GET['clienteTabela']);
	
	$sql_code = "DELETE FROM clienteTabela WHERE id = '$usu_codigo'";
	$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);

	if($sql_query)
		echo "<script>
			alert('O usuario foi deletado com sucesso!');
			location.href='index.php?p=inicial';
			</script>";	
	else
		echo "<script>alert('Nao foi possivel deletar o usuario'); location.href='index.php?p=inicial';</script>";

?>

