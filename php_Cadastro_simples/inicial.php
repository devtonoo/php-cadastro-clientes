<?php
	
	include("config.php");


	$sql_code = "SELECT * FROM clienteTabela";
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

<h1>Usuarios</h1>

<a href="index.php?p=cadastrar">Cadastrar usuario</a>
<a href="index.php?p=listar">Listar</a>
<a href="index.php?p=buscar">Buscar</a>
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
		<td><?php echo $linha['nome'];?></td>
		<td><?php echo $linha['email'];?></td>
		<td><?php echo $linha['telefone'];?></td>
		<td><?php echo $linha['endereco'];?></td>  
		<td><?php echo $linha['numero'];?></td>
		<td><?php echo $linha['bairro'];?></td>
		<td><?php echo $linha['cep'];?></td>
		<td><?php echo $linha['ativo'];?></td>
		<td><?php echo $linha['nivelAcesso'];?></td>
		<td>
			
			<a href="index.php?p=editar&clienteTabela=<?php echo $linha['id'];?>">Editar</a>
			<p>
			<a href="javascript: if(confirm('Tem certeza que deseja deletar o usuário <?php echo $linha['nome'];?>?'))
									location.href='index.php?p=deletar&clienteTabela=<?php echo $linha['id'];?>';">Deletar</a>
			
		</td>
	</tr>
	<?php } while($linha = $sql_query->fetch_assoc());?>

</table>



