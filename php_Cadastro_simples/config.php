<?php

$host = "localhost";
$usuario = "root";
$senha = "root";
$banco = "CadastroClienteGATI";

$mysqli = new mysqli("localhost","root","root","CadastroClienteGATI");


if($mysqli->connect_errno){
	echo ("Falha na conexão: (.$mysqli->connect_errno.) .$mysqli->connect_error");
	echo ("nao conectou no banco de dados");
}
?>
