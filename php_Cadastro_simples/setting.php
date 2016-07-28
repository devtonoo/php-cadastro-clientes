<?php
	
	$con = mysql_connect("localhost","root","root");
	
	mysql_select_db("CadastroClienteGATI",$con);
	
	if(!$con){
		die(mysql_error());
	}	
	$query = mysql_query("SELECT * FROM clienteTabela");
	
	if (!$query) {
			die(mysql_error());
		}	
	while ($row = mysql_fetch_array($query)) {
		echo $row['nome'];
	}
?>
