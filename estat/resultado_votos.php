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
<title>Sistema de Apoio a Reuni&otilde;es: Inscri&ccedil;&otilde;es</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<table width="100%" border="1" cellspacing="0" bordercolor="#000000">
  <tr> 
    <td colspan="11"><p><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Semestres 
        </strong></font></p>
      <p> </p></td>
  </tr>
  <tr> 
    <td colspan="2" bgcolor="#6699FF"> <div align="center"><font color="#FFFFFF"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">pergunta</font></strong></font></div></td>
    <td bgcolor="#6699FF"> <div align="center"><font color="#FFFFFF"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">semestre</font></strong></font></div></td>
    <? while($rstemp2=mysql_fetch_array($rstemp_query2)){?>
    <td bgcolor="#6699FF"> <div align="center"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong> 
        <?   echo $rstemp2["docente"]; ?>
        / 
        <?   echo $rstemp2["disciplina"]; ?>
        </strong></font></div></td>
    <? } ?>
    <td><div align="center"></div></tr>
  <? while($rstemp=mysql_fetch_array($rstemp_query)){?>
  <tr> 
    <td> <div align="left"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <?   echo $rstemp["id_pergunta"]; ?>
        </font></div></td>
    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
      <?   echo $rstemp["perguntas"]; ?>
      </font></td>
    <td> <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>
        <?   echo $rstemp["semestre"]; ?>
        </strong></font> </div></td>
    <td> <div align="center"> 
        <?   echo $rstemp["resp1"]; ?>
      </div></td>
    <td> <div align="center"> 
        <?   echo $rstemp["resp2"]; ?>
      </div></td>
    <td> <div align="center"> 
        <?   echo $rstemp["resp3"]; ?>
      </div></td>
    <td> <div align="center"> 
        <?   echo $rstemp["resp4"]; ?>
      </div></td>
    <td> <div align="center"> 
        <?   echo $rstemp["resp5"]; ?>
      </div></td>
    <td> <div align="center"> 
        <?   echo $rstemp["resp6"]; ?>
      </div></td>
    <td> <div align="center"> 
        <?   echo $rstemp["resp7"]; ?>
      </div></td>
    <td> <div align="center"> 
        <?   echo $rstemp["resp8"]; ?>
      </div></td>
  </tr>
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

echo "<br><b>Total de Registros: </b>$total";
?>
  <?
mysql_close($conntemp);
$conntemp=null;

?>
</p>
</body>
</html>



