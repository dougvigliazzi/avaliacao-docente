<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<? 
//variáveis
$sem=$HTTP_POST_VARS["semestre"];
$r=1;

//abre conexão com o banco
include "conexao.php";


//seleciona respostas
$sqltemp="select * from perguntas inner join resposta on perguntas.id_pergunta = resposta.id_pergunta where resposta.semestre = '1' order by perguntas.id_pergunta ";
$rstemp=$rstemp_query=mysql_query($sqltemp,$conexao);

//seleciona docentes
$sqltemp2="select * from doc_disc where semestre=1 order by resp"; 
$rstemp2=$rstemp_query2=mysql_query($sqltemp2,$conexao);

//seleciona perguntas
$sqltemp_p="select * from perguntas";
$rstemp_p=$rstemp_query_c=mysql_query($sqltemp_p,$conexao);
$contp=mysql_num_rows($rstemp_p);


// bla bla bla
$sqltemp_c="select * from doc_disc where semestre=1";
$rstemp_c=$rstemp_query_c=mysql_query($sqltemp_c,$conexao);
$contt=mysql_num_rows($rstemp_c);


?>
<title>Avaliar Docentes</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<table width="100%" border="1" cellspacing="0" bordercolor="#000000">
  <tr> 
    <td colspan="46"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Semestre: 
        <?   echo $rstemp2["semestre"];?>
        </strong></font>
	</td>
  </tr>
  <tr> 
    <td colspan="2" rowspan="2" bgcolor="#6699FF"> <div align="center"><font color="#FFFFFF"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">N&ordm; 
        / Pergunta</font></strong></font></div></td>
    <? while($rstemp2=mysql_fetch_array($rstemp_query2)){?>
    <td colspan="5" bgcolor="#6699FF"> <div align="center"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong> 
        <?   echo $rstemp2["docente"]; ?>
        / 
        <?   echo $rstemp2["disciplina"]; ?>
        </strong></font></div></td><? }?>
    </tr>
  <tr> 
  <?  for($i=1;$i<=8;$i++){ ?>
    <td width="15" bgcolor="#FFFFCC"> 
      <div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
        <? $x=1; echo $x; ?>
        </font></strong></div></td>
    <td width="15"> <div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><? $y=2; echo $y; ?></font></strong></div></td>
    <td width="15" bgcolor="#FFFFCC"> 
      <div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
        <? $w=3; echo $w; ?>
        </font></strong></div></td>
    <td width="15"> <div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><? $k=4; echo $k; ?></font></strong></div></td>
    <td width="15" bgcolor="#FFFFCC"> 
      <div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
        <? $z=5; echo $z; ?>
        </font></strong></div></td>
    <? 
	} ?></tr>
    <? 
		while($rstemp=mysql_fetch_array($rstemp_query)){
		for($fm=1;$fm<=$contp;$fm++){
		?>
		
    <tr><td> <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <? echo $fm;//$rstemp["id_pergunta"]; ?>
        </font> </div></td>
    <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <? echo " - - - ";//$rstemp["perguntas"]; ?>
      </font></td>
		<? 	for($s=1;$s<=$contt;$s++){
 			for($ii=1;$ii<=5;$ii++){ 
	  			//seleciona respostas
				$sqltemp_r="select count(*) from resposta where resp$s='$ii' and id_pergunta=$r and semestre=1";
				$rstemp_r=$rstemp_query=mysql_query($sqltemp_r,$conntemp);
				$res=mysql_result($rstemp_r,0,0);
		?>	  
    		<td bgcolor="#FFFFCC"><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $res; ?></font></div></td>
		<?   } 
		}
		$r++;
	}?>
	</tr>
<?	}
$rstemp=null;
$rstemp_r=null;
$rstemp_c=null;
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
$rstempcont2=null;
?>
</p>
</body>
</html>
