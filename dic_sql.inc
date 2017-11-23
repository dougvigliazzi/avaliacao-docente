<?php
$conexao=mysql_connect("localhost","root","");

mysql_select_db("notas",$conexao);

$consulta="SELECT * FROM notas WHERE ra=$ra";
$resultado=mysql_query($consulta,$conexao);

?>
