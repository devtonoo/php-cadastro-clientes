<?php

include("config.php");

$consulta =  "SELECT * FROM clienteTabela";
$con = $mysqli->query($consulta) or die($mysqli->error);

?>

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html, charset=utf-8 ">
  <title>CADASTRO CLIENTES</title>
  <style>
  .principal{
    width: 60%;
    margin: 0 auto;
    background-color: #FFF;
    border: 1px solid #e3e3e3;
    border-radius: 5px;
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
    border: none;
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
</head>
<body>
  <div class=principal>
    <?php
      
      if (isset($_GET['p'])) {
        
        $pagina = $_GET['p'].".php";
          
        if (is_file("$pagina")) {
          include("$pagina");
        }else
          include("404.php");
      }else
        include("inicial.php");      
    ?>
  </div>
</body>
</html>
