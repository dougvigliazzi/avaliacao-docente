<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<? 
//abre conexão com o banco
$conntemp=mysql_connect("localhost","root","");
mysql_select_db("avalia_ol",$conntemp);

//seleciona respostas
$sqlcont="select count(*) from controle_ra where semestre = 1";
$rstemp=$rstemp_query=mysql_query($sqlcont,$conntemp);
$cont=mysql_num_rows($rstemp);

echo "<b>Alunos participantes:</b> $cont";
$sqlcount="select * from resposta where semestre = 1";
$rstemp2=$rstemp_query2=mysql_query($sqlcount,$conntemp);
$cont2=mysql_num_rows($rstemp2);
$total=$cont2/$cont;

echo "<br><b>Total de Registros: </b>$total";

mysql_close($conntemp);
$conntemp=null;

?>

</html>