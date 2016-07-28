<?php

  include("config.php");
  
  if(!isset($_GET['clienteTabela']))
	echo "<script> alert('Codigo invalido.'); location.href='index.php?p=inicial';</script>";
  else{
	  	
  $usu_codigo = intval($_GET['clienteTabela']);
  
  if(isset($_POST['confirmar'])){
    //registro
    if(!isset($_SESSION))
      session_start();
    
    foreach ($_POST as $chave=>$valor) {
      $_SESSION[$chave]= $mysqli->real_escape_string($valor);
    }
  
    
    //validacao
    if(strlen($_SESSION['nome'])==0)
      $erro[]="Preencha nome";
    if(substr_count($_SESSION['email'],'@')!=1||substr_count($_SESSION['email'],'.'<1))
      $erro[]="Preencha corretamente o email, talvez faltou ou sobrou (.) ou (@)";
    if(strlen($_SESSION['telefone'])==0)
      $erro[]="Preencha telefone";
    if(strlen($_SESSION['endereco'])==0)
      $erro[]="Preencha endereco";
    if(strlen($_SESSION['numero'])==0)
      $erro[]="Preencha numero";
    if(strlen($_SESSION['bairro'])==0)
      $erro[]="Preencha bairro";
    if(strlen($_SESSION['cep'])==0)
      $erro[]="Preencha cep";
    if(strlen($_SESSION['ativo'])==0)
      $erro[]="Preencha ativo";
    if(strlen($_SESSION['nivelAcesso'])==0)
      $erro[]="Preencha nivelAcesso";

    //banco de dados e redirecionamento
    if(count($erro)==0){

      $sql_code = "UPDATE clienteTabela SET 
        nome='$_SESSION[nome]',
        email='$_SESSION[email]', 
        telefone='$_SESSION[telefone]', 
        endereco='$_SESSION[endereco]', 
        numero='$_SESSION[numero]',
        bairro='$_SESSION[bairro]',
        cep='$_SESSION[cep]',
        ativo='$_SESSION[ativo]',
        nivelAcesso='$_SESSION[nivelAcesso]'
		WHERE id = '$usu_codigo'";

    $confirma = $mysqli->query($sql_code) or die ($mysqli->error);

    if ($confirma){
      unset($_SESSION[nome],
        $_SESSION[email],
        $_SESSION[telefone],
        $_SESSION[endereco],
        $_SESSION[numero],
        $_SESSION[bairro],
        $_SESSION[cep],
        $_SESSION[ativo],
        $_SESSION[nivelAcesso]);

      echo "<script> location.href='index.php?p=inicial'; </script>";
    }
    else
      echo ("erro do else no primeiro espaco PHP do editar.php");
      $erro[]=$confirma;
    }  
  }else{
	$sql_code="SELECT * FROM clienteTabela WHERE id = '$usu_codigo'";  
	$sql_query=$mysqli->query($sql_code)or die($mysqli->error    );
	$linha=$sql_query->fetch_assoc();
	
	if(!isset($_SESSION))
      session_start();
	
	$_SESSION[nome]=$linha['nome'];
    $_SESSION[email]=$linha['email'];
    $_SESSION[telefone]=$linha['telefone'];
    $_SESSION[endereco]=$linha['endereco'];
    $_SESSION[numero]=$linha['numero'];
    $_SESSION[bairro]=$linha['bairro'];
    $_SESSION[cep]=$linha['cep'];
    $_SESSION[ativo]=$linha['ativo'];
    $_SESSION[nivelAcesso]=$linha['nivelAcesso'];
	
  }
  

?>
<h1>Editar usuario</h1>
<?php
  if(count($erro)>0){
    echo "<div class='erro'>";
    foreach ($erro as $valor)
      echo "$valor <br>";
    echo "</div>";
  }  
?>
<a href="index.php?p=inicial">Voltar</a>
<p class=espaco></p>
<form action="index.php?p=editar&clienteTabela=<?php echo $usu_codigo; ?>" method="POST">
  <table id="cad_table">
    <tr> 	
      <p>
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="<?php echo $_SESSION[nome]; ?>" class="txt" />
      <p>
        <label for="emil">Email</label>
        <input type="text" name="email" id="email" value="<?php echo $_SESSION[email]; ?>" class="txt" />
      <p>
        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone" value="<?php echo $_SESSION[telefone]; ?>" class="txt" maxlength="15" />
      <p>
        <label for="endereco">Endereco</label>
        <input type="text" name="endereco" id="endereco" class="txt" value="<?php echo $_SESSION[endereco]; ?>" maxlength="100" />
      <p>
        <label for="numero">Numero</label>
        <input type="text" name="numero" id="numero" class="txt" value="<?php echo $_SESSION[numero]; ?>" maxlength="15" />
      <p>
        <label for="Bairro">Bairro</label>
        <input type="text" name="bairro" id="bairro" class="txt" value="<?php echo $_SESSION[bairro]; ?>" maxlength="15" />
      <p>
        <label for="cep">CEP</label>
        <input type="text" name="cep" id="cep" class="txt" value="<?php echo $_SESSION[cep]; ?>" maxlength="15" />
      <p>
        <label for="ativo">Ativo</label>
        <select name="ativo">
        <option value="1">Sim</option>
        <option value="2">Não</option>
      </select>
      <p>
      <p>
        <label for="nivelAcesso">Nivel de acesso</label>
        <select name="nivelAcesso">
        <option value="1">Básico</option>
        <option value="2">Administrador</option>
        </select>
        <p>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="Salvar" name="confirmar" id="botaoEditar"></td>
      </tr>
    <?php while($dado = $con->fetch_array()){ ?>
      <tr>
        <td><?php echo $dado["nome"];?></td>
        <td><?php echo $dado["email"];?></td>
        <td><?php echo $dado["telefone"];?></td>
        <td><?php echo $dado["endereco"];?></td>
        <td><?php echo $dado["numero"];?></td>
        <td><?php echo $dado["bairro"];?></td>
        <td><?php echo $dado["cep"];?></td>
        <td><?php echo $dado["ativo"];?></td>
      </tr>
    <?php 

    } ?>
  </table>
</form>
<?php } ?>
