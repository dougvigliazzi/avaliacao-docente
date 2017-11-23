<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<? 
//pega variáveis enviadas
$name=$HTTP_POST_VARS["nome"];
$ra=$HTTP_POST_VARS["ra"];

//abre conexão com o banco
$conntemp=mysql_connect("localhost","root","");
mysql_select_db("avalia_ol",$conntemp);

//seleciona respostas
$sqltemp="select * from perguntas inner join resposta on perguntas.id_pergunta = resposta.id_pergunta where resposta.semestre = '1' order by perguntas.id_pergunta ";
//$sqltemp="select * from resposta where semestre=1 order by id_pergunta"; // group by semestre";  
$rstemp=$rstemp_query=mysql_query($sqltemp,$conntemp);

//seleciona docentes
$sqltemp2="select * from doc_disc where semestre=1 order by resp"; 
$rstemp2=$rstemp_query2=mysql_query($sqltemp2,$conntemp);
//$sem=$rstemp("semestre");

?>
<title>Avaliar Docentes</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<table width="100%" border="1" cellspacing="0" bordercolor="#000000">
  <tr> 
    <td colspan="15"><p><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Semestres 
        <?   echo $rstemp["semestre"];?>
        </strong></font></p>
      <p> </p></td>
  </tr>
  <tr> 
    <td colspan="2" rowspan="2" bgcolor="#6699FF"> <div align="center"><font color="#FFFFFF"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">N&ordm; 
        / Pergunta</font></strong></font></div></td>
    <? while($rstemp2=mysql_fetch_array($rstemp_query2)){?>
    <td colspan="5" bgcolor="#6699FF"> <div align="center"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong> 
        <?   echo $rstemp2["docente"]; ?>
        / 
        <?   echo $rstemp2["disciplina"]; ?>
        </strong></font></div></td>
    <td><div align="center"></div></tr>
  <?  while($rstemp=mysql_fetch_array($rstemp_query)){?>
  <tr> 
    <td width="15"> <div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">1</font></strong></div></td>
    <td width="15"> <div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">2</font></strong></div></td>
    <td width="15"> <div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">3</font></strong></div></td>
    <td width="15"> <div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">4</font></strong></div></td>
    <td width="15"> <div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">5</font></strong></div></td>
  </tr>
    <? } ?>
  <tr> 
    <td width="10"> <div align="left"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <?   echo $rstemp["id_pergunta"]; $nperg=$rstemp["id_pergunta"]?>
        </font></div></td>
    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
      <?   echo $rstemp["perguntas"]; ?>
      </font></td>
    <?
	  for($i=1;$i<=5;$i++){
	  	//seleciona respostas
		$sqltemp_r.$i="select count(*) from resposta where resp$i='$i' and id_pergunta=$nperg and semestre=1";
		$rstemp_r.$i=$rstemp_query=mysql_query($sqltemp_r.$i,$conntemp);
		$rstemp_rr=$rstemp_r.$i;
	    $i++;
		//}	  
	  ?>
    <td> <div align="center"> <? echo $rstemp_rr;?> </div></td><? } ?>
  <? }  
$rstemp=null;
 ?>
</table>
<p> 
  <? 
$sqlcont="select count(*) from controle_ra where semestre = 1";
$rstempcont=$rstemp_query=mysql_query($sqlcont,$conntemp);
$cont=mysql_num_rows($rstempcont);

echo "<b>Alunos participantes:</b> $cont";
$sqlcount="select * from resposta where semestre = 1";
$rstempcont2=$rstemp_query2=mysql_query($sqlcount,$conntemp);
$cont2=mysql_num_rows($rstempcont2);
$total=$cont2/$cont;
//echo $rstempcont2;

echo "<br><b>Total de Registros: </b>$total";
?>
  <?
mysql_close($conntemp);
$conntemp=null;

?>
</p>
</body>
</html>



