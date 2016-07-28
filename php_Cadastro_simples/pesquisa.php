<?php
	include("config.php");
	

	$sql_code = "SELECT * FROM clienteTabela WHERE id = '$usu_codigo'";
	$sql_query = $mysqli->query($sql_code) or die($mysqli->error);
	$linha = $sql_query->fetch_assoc();
	

?>
<style>
  .principal{
    width: 85%;
    margin: 0 auto;
    background-color: #FFF;
    border: 5px solid #201E23;
    border-radius: 10px;
  }
  body{
    background: #eaeaea;
    margin: 20px;
    padding: 0;
    outline: none;
    font-family:  "Arial";
    font-size: 18px;  
  }
  .txt{
    height: 35px;
    width: 150px;
    border: 5px;
    border-radius: 5px;
    background-color: #EEE;
  }
  #cad_table{
    height: 250px;
    margin: 0 auto;
    padding: 10px;
    border:non;
    margin-top: 200px;
  }
  #botaoCadastrar{
    width: 100px; 
    height: 30px;
    background-color: #EEEEEE;
    border-radius: 4px;
    border: 1px thin #CCC;
  }
  label{
    display: block;
    font-weight: bold;
  }
  .espaco{
    height: 15px;
    display: block;
  }
  input{
    font-size: 16px;
  }
  .titulo{
    font-weight: bold;
  }
  .pesquisa{
	font-weight: bold;
    height: 100px;
    margin: 0 auto;
    padding: 10px;
    border:non;
    margin-top: 200px;
  }
  </style>

<h6>Resultado da pesquisa</h6>
<a href="index.php?p=inicial">Voltar</a>
<p class=label></p>
<form action="index.php?p=cadastrar" method="POST">

		<table border=3 cellpadding=8>
		<tr class=titulo>
			<td>Nome</td>
			<td>Email</td>
			<td>Telefone</td>
			<td>Endereco</td>
			<td>Numero</td>
			<td>Bairro</td>
			<td>Cep</td>
			<td>Ativo</td>
			<td>Nivel de acesso</td>
			<td>Ação</td>
		</tr>
<?php

	do{
		
?>

		
		<tr>
			<td><?php echo $_SESSION['nome'];?></td>
			<td><?php echo $_SESSION['email'];?></td>
			<td><?php echo $_SESSION['telefone'];?></td>
			<td><?php echo $_SESSION['endereco'];?></td>  
			<td><?php echo $_SESSION['numero'];?></td>
			<td><?php echo $_SESSION['bairro'];?></td>
			<td><?php echo $_SESSION['cep'];?></td>
			<td><?php echo $_SESSION['ativo'];?></td>
			<td><?php echo $_SESSION['nivelAcesso'];?></td>
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

