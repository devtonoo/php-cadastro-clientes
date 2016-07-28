<?php
    
    include("config.php");

?>

<html>
<head>
<title>Busca</title>
</head>
<body>

<form method="POST">
  <input type="text" name="busca" size="50">
  <input type="submit" value="Buscar" name="ok">
  <style type="text/css"></style>
  <table border=3 cellpadding=10>
</form>

    <?php
        
            $busca=$_POST['busca'];
        
            $sql_code = "SELECT * FROM clienteTabela WHERE nome LIKE '%$busca%' or email LIKE '%$busca%'";
            $sql_query = $mysqli->query($sql_code) or die($mysqli->error);
            

            // query para selecionar todos os campos da tabela usuários se $busca contiver na coluna nome ou na coluna email
            // % antes e depois de $busca serve para indicar que $busca por ser apenas parte da palavra ou frase
            // $busca é a variável que foi enviada pelo nosso formulário da página anterior
            $count = mysqli_num_rows($sql_query);
            
            // conta quantos registros encontrados com a nossa especificação
            if ($count == 0) {
                echo "Nenhum resultado!";
                echo "\n";
            } else {
                // senão
                if ($count == 1) {
                    echo "1 resultado encontrado!";
                    
                }
                // se houver um resultado diz que existe um resultado
                if ($count > 1) {
                    echo "$count resultados encontrados!";
                    echo "\n";
                }
                // se houver mais de um resultado diz quantos resultados existem
                ?>
                
                <?php while ($dados = mysqli_fetch_array($sql_query)) 
                {
                    // enquanto houverem resultados...?>
                    
                    <tr>
                    <td><p><?php echo "Nome: ", $dados['nome'];?></td>
                    <td><?php echo "Email: ", $dados['email'];?></td>
                    <td><?php echo "Ativo: ";
                    if($dados['ativo']==1) 
                        echo "ATIVO";
                    else
                        echo "INATIVO";?>
                    <td><?php echo "Ação: ";?><br> <a href="index.php?p=editar&clienteTabela=<?php echo $dados['id'];?>">Editar</a>
                        <?php echo "  ";?>
                        <a href="index.php?p=deletar&clienteTabela=<?php echo $dados['id'];?>">Deletar</a>
                    <p></td>
                       
                    
                    </tr>
                  <?php  } // exibir a coluna nome e a coluna email
                   }?>
                   
           
</body>
</html>