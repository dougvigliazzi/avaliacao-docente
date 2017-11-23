<?php

$senha = $HTTP_POST_VARS["chave"];
$senhan = $HTTP_POST_VARS["chaveo_nova"];
$ra = $HTTP_POST_VARS["ra"];

$conexao = mysql_connect("localhost","root","");
$db = mysql_select_db("avalia_ol",$conexao);
$sql = "UPDATE aluno SET senha='$senha' WHERE ra='$ra'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a alteração da senha");

echo "<h1>Senha alterada com sucesso!</h1>";

mysql_close($conexao);

?>
