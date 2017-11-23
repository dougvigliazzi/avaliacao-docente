<html>
<head>
<title>[Sistema de Avalia&ccedil;&atilde;o de Docentes]</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style>
.tditem {
color: #990000;
}
</style>
<?
$ra=$HTTP_POST_VARS["ra"];
$semestre=$HTTP_POST_VARS["semestre"];
$ip_session=$HTTP_SERVER_VARS['REMOTE_ADDR'];
$SID=md5($ra);
$SID=$SID.$semestre;
include ("dic_sql.inc");

$hoje = date("m/Y");

//abre conexão com o banco
include "conexao.php";


?>
<script>
<!-- Begin
backColor = "#FF9900";

function disableForm(theform) {
if (document.all || document.getElementById) {
for (i = 0; i < theform.length; i++) {
var tempobj = theform.elements[i];
if (tempobj.type.toLowerCase() == "submit" || tempobj.type.toLowerCase() == "reset")
	tempobj.disabled = true;
	tempobj.visible=false;
}
tempobj.value="_";
return true;
}
else {
return false;
   }
}


function textCounter(field, countfield, maxlimit) {
  if (field.value.length > maxlimit)
      {field.value = field.value.substring(0, maxlimit);}
      else
      {countfield.value = maxlimit - field.value.length;}
  }
//  End -->
</script>

<link href="link.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="100%" border="0">
  <tr> 
    <td colspan="3" bgcolor="#3366CC"> <div align="center"><font color="#FFFFFF" size="4" face="Verdana, Arial, Helvetica, sans-serif"><strong>[Sistema 
        de Avalia&ccedil;&atilde;o Docente]</strong></font></div></td>
  </tr>
  <tr> 
    <td><p align="center"><font face="Verdana, Arial, Helvetica, sans-serif"><strong>[ 
        <? echo "  Semestre: "; echo $semestre; echo "º"; echo $ra ?> </strong> , Bem 
        Vindo ao Sistema! e<strong>]</strong></font></p></td>
    <td width="60"> 
      <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong></strong></font></div></td>
    <td width="120"><div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="atualiza_senha.php?ra=<? echo $ra ?>" target="notas"></a><strong><a href="javascript:timer()">SAIR</a></strong></font></div></td>
  </tr>
  <tr> 
</table>
<? 
//seleciona perguntas bloco 1
$sqltemp="select * from perguntas where bloco = 1";
$rstemp_query=mysql_query($sqltemp,$conexao);

//seleciona disciplinas e docentes por semestre
$sqltemp2="select * from ra_disc inner join doc_disc on doc_disc.id_doc_disc=ra_disc.id_doc_disc where ra_disc.ra = '$ra' and ra_disc.semestre = '$semestre'";// and doc_disc.semestre = '$semestre' ";
$rstemp_query2=mysql_query($sqltemp2,$conexao);
$totlinhas=mysql_num_rows($rstemp_query2);
$i=0;
			   	while($rstemp2=mysql_fetch_array($rstemp_query2) ){
						$disc[$i]=$rstemp2["disciplina"]; 
					 //	print $disc[$i]; print " $i  ";
						$doc[$i]=$rstemp2["docente"]; 
					 //	print $doc[$i]; print " $i  ";
					 	$resp[$i] = $rstemp2["id_doc_disc"]; 
					 //	print $resp[$i]; print " $i  ";
						$i++;
				}
?>
<table width="100%" border="0" id="tabela">
<? // cabecalho bloco 1 ?>
<tr>
    <td colspan="11"><table width="100%" border="0">
        <tr> 
          <td width="369" bgcolor="#6699CC"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Para 
            responder &agrave;s quest&otilde;es de 1 a 16, atribua:</strong></font></td>
          <td bgcolor="#FFFFCC"><div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
              A - Ótimo;</font></strong></div></td>
          <td bgcolor="#FFCC33">
<div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">B 
              - Bom;</font></strong></div></td>
          <td bgcolor="#FFFFCC"><div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">C 
              - Regular;</font></strong></div></td>
          <td bgcolor="#FFCC33">
<div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">D 
              - Ruim;</font></strong></div></td>
          <td bgcolor="#FFFFCC"><div align="center"><strong></strong></div></td>
          <td bgcolor="#FFCC33">
<div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">E 
              - Insatisfatório;</font></strong></div></td>
          <td bgcolor="#FFFFCC"><div align="center"><strong></strong></div></td>
        </tr>
      </table></td>
</tr>
<tr>

        <td colspan="11"> 
    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Pergunta: 
    Metodologia do professor</strong></font></td></tr> 
        <? //escreve as perguntas do bloco 1
		while($rstemp=mysql_fetch_array($rstemp_query)){
		$xi=1; ?>
                <tr>
      <td colspan="11"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">[<? echo $rstemp["perguntas"]; ?>] 
        </font></td>
    </tr>
  	<form name="avaliar<? echo $resp[$xi]; ?>" action="inclui.php" method="get" target="_blank" onSubmit="return disableForm(this);">


        <tr bgcolor="#99CCFF" id="linha<? echo $rstemp["id_pergunta"]; ?>"> 
        <? //escreve os registros disciplinas e docentes 
	$perg=$rstemp["id_pergunta"];
	for($ii=0;$ii<$totlinhas;$ii++){
				?>
      <td id="cel<? echo $perg; echo $ii;?>"> <font size="1" face="Verdana, Arial, Helvetica, sans-serif">

        <? echo $disc[$ii]; ?> || <br>
        <b> 
        <? echo $doc[$ii]; ?>
        :</b></font> <select id="td<? echo $ii;?>" name="nota[]" onChange="cel<? echo $perg; echo $ii; ?>.bgColor='#99FF00'">
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>
        <input name="disc[]" type="hidden" value="<? echo $resp[$ii]; ?>">

      	</td>



	<? } ?>
	</tr>
</td>
<td>
        <input name="pergunta" type="hidden" value="<? echo $rstemp["id_pergunta"]; ?>">
        <input name="sessao" type="hidden" id="sessao" value="<? echo $SID; ?>">
        <input name="ip" type="hidden" id="ip" value="<? echo $ip_session; ?>">
        <input name="sem" type="hidden" value="<? echo $semestre; ?>">
 
       <input name="env" type="submit" value="OK" onClick="linha<? echo $rstemp["id_pergunta"]; ?>.bgColor='backColor'">
        <? echo mysql_error();?></div>


</form><?  } ?>
</td>
</tr>
	<?
		$rstemp2=null;
		$rstemp=null;
	?>
</table>
<p></p>

<?//===========================20-11-2007=============================================================================?>

<? 
//seleciona perguntas bloco 2
$sqltemp="select * from perguntas where bloco = 2";
$rstemp_query=mysql_query($sqltemp,$conexao);

//seleciona disciplinas e docentes por semestre
$sqltemp2="select * from ra_disc inner join doc_disc on doc_disc.id_doc_disc=ra_disc.id_doc_disc where ra_disc.ra = '$ra' and ra_disc.semestre = '$semestre'";// and doc_disc.semestre = '$semestre' ";
$rstemp_query2=mysql_query($sqltemp2,$conexao);
$totlinhas=mysql_num_rows($rstemp_query2);
$i=0;
			   	while($rstemp2=mysql_fetch_array($rstemp_query2) ){
						$disc[$i]=$rstemp2["disciplina"]; 
					 //	print $disc[$i]; print " $i  ";
						$doc[$i]=$rstemp2["docente"]; 
					 //	print $doc[$i]; print " $i  ";
					 	$resp[$i] = $rstemp2["id_doc_disc"]; 
					 //	print $resp[$i]; print " $i  ";
						$i++;
				}
?>
<table width="100%" border="0" id="tabela">
<tr>
    <td colspan="11"><table width="100%" border="0">
        <tr> 
          <td width="369" bgcolor="#6699CC"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Para 
            responder &agrave;s quest&otilde;es de 1 a 16, atribua:</strong></font></td>
          <td bgcolor="#FFFFCC"><div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
              1 - Nunca;</font></strong></div></td>
          <td bgcolor="#FFCC33">
<div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">2 
              - Poucas vezes;</font></strong></div></td>
          <td bgcolor="#FFFFCC"><div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">3 
              - Muitas vezes;</font></strong></div></td>
          <td bgcolor="#FFCC33">
<div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">4 
              - Sempre;</font></strong></div></td>
          <td bgcolor="#FFFFCC"><div align="center"><strong></strong></div></td>
        </tr>
      </table></td>
</tr>
<tr>

        <td colspan="11"> 
    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Pergunta: 
    Quanto ao conteúdo da disciplina...</strong></font></td></tr> 
        <? //escreve as perguntas do bloco 2
		while($rstemp=mysql_fetch_array($rstemp_query)){
		$xi=1; ?>
                <tr>
      <td colspan="11"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">[<? echo $rstemp["perguntas"]; ?>] 
        </font></td>
    </tr>
  	<form name="avaliar<? echo $resp[$xi]; ?>" action="inclui.php" method="get" target="_blank" onSubmit="return disableForm(this);">


        <tr bgcolor="#99CCFF" id="linha<? echo $rstemp["id_pergunta"]; ?>"> 
        <? //escreve os registros disciplinas e docentes 
	$perg=$rstemp["id_pergunta"];
	for($ii=0;$ii<$totlinhas;$ii++){
				?>
      <td id="cel<? echo $perg; echo $ii;?>"> <font size="1" face="Verdana, Arial, Helvetica, sans-serif">

        <? echo $disc[$ii]; ?> || <br>
        <b> 
        <? echo $doc[$ii]; ?>
        :</b></font> <select id="td<? echo $ii;?>" name="nota[]" onChange="cel<? echo $perg; echo $ii; ?>.bgColor='#99FF00'">
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>
        <input name="disc[]" type="hidden" value="<? echo $resp[$ii]; ?>">

      	</td>



	<? } ?>
	</tr>
</td>
<td>
        <input name="pergunta" type="hidden" value="<? echo $rstemp["id_pergunta"]; ?>">
        <input name="sessao" type="hidden" id="sessao" value="<? echo $SID; ?>">
        <input name="ip" type="hidden" id="ip" value="<? echo $ip_session; ?>">
        <input name="sem" type="hidden" value="<? echo $semestre; ?>">
 
       <input name="env" type="submit" value="OK" onClick="cel<? echo $perg; echo $ii; ?>.bgColor='backColor'">
        <? echo mysql_error();?></div>


</form><?  } ?>
</td>
</tr>
	<?
		$rstemp2=null;
		$rstemp=null;
	?>
</table>
<p></p>

<? 
//seleciona perguntas bloco 3
$sqltemp="select * from perguntas where bloco = 3";
$rstemp_query=mysql_query($sqltemp,$conexao);

//seleciona disciplinas e docentes por semestre
$sqltemp2="select * from ra_disc inner join doc_disc on doc_disc.id_doc_disc=ra_disc.id_doc_disc where ra_disc.ra = '$ra' and ra_disc.semestre = '$semestre'";// and doc_disc.semestre = '$semestre' ";
$rstemp_query2=mysql_query($sqltemp2,$conexao);
$totlinhas=mysql_num_rows($rstemp_query2);
$i=0;
			   	while($rstemp2=mysql_fetch_array($rstemp_query2) ){
						$disc[$i]=$rstemp2["disciplina"]; 
					 //	print $disc[$i]; print " $i  ";
						$doc[$i]=$rstemp2["docente"]; 
					 //	print $doc[$i]; print " $i  ";
					 	$resp[$i] = $rstemp2["id_doc_disc"]; 
					 //	print $resp[$i]; print " $i  ";
						$i++;
				}
?>
<table width="100%" border="0" id="tabela">
<tr>
    <td colspan="11"><table width="100%" border="0">
        <tr> 
          <td width="369" bgcolor="#6699CC"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Para 
            responder &agrave;s quest&otilde;es de 1 a 16, atribua:</strong></font></td>
          <td bgcolor="#FFFFCC"><div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
              1 - Nunca;</font></strong></div></td>
          <td bgcolor="#FFCC33">
<div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">2 
              - Poucas vezes;</font></strong></div></td>
          <td bgcolor="#FFFFCC"><div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">3 
              - Muitas vezes;</font></strong></div></td>
          <td bgcolor="#FFCC33">
<div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">4 
              - Sempre;</font></strong></div></td>
          <td bgcolor="#FFFFCC"><div align="center"><strong></strong></div></td>
        </tr>
      </table></td>
</tr>
<tr>

        <td colspan="11"> 
    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Pergunta: 
    Quanto à avaliação...</strong></font></td></tr> 
        <? //escreve as perguntas do bloco 3
		while($rstemp=mysql_fetch_array($rstemp_query)){
		$xi=1; ?>
                <tr>
      <td colspan="11"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">[<? echo $rstemp["perguntas"]; ?>] 
        </font></td>
    </tr>
  	<form name="avaliar<? echo $resp[$xi]; ?>" action="inclui.php" method="get" target="_blank" onSubmit="return disableForm(this);">


        <tr bgcolor="#99CCFF" id="linha<? echo $rstemp["id_pergunta"]; ?>"> 
        <? //escreve os registros disciplinas e docentes 
	$perg=$rstemp["id_pergunta"];
	for($ii=0;$ii<$totlinhas;$ii++){
				?>
      <td id="cel<? echo $perg; echo $ii;?>"> <font size="1" face="Verdana, Arial, Helvetica, sans-serif">

        <? echo $disc[$ii]; ?> || <br>
        <b> 
        <? echo $doc[$ii]; ?>
        :</b></font> <select id="td<? echo $ii;?>" name="nota[]" onChange="cel<? echo $perg; echo $ii; ?>.bgColor='#99FF00'">
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>
        <input name="disc[]" type="hidden" value="<? echo $resp[$ii]; ?>">

      	</td>



	<? } ?>
	</tr>
</td>
<td>
        <input name="pergunta" type="hidden" value="<? echo $rstemp["id_pergunta"]; ?>">
        <input name="sessao" type="hidden" id="sessao" value="<? echo $SID; ?>">
        <input name="ip" type="hidden" id="ip" value="<? echo $ip_session; ?>">
        <input name="sem" type="hidden" value="<? echo $semestre; ?>">
 
       <input name="env" type="submit" value="OK" onClick="cel<? echo $perg; echo $ii; ?>.bgColor='backColor'">
        <? echo mysql_error();?></div>


</form><?  } ?>
</td>
</tr>
	<?
		$rstemp2=null;
		$rstemp=null;
	?>
</table>
<p></p>

<? 
//seleciona perguntas bloco 4
$sqltemp="select * from perguntas where bloco = 4";
$rstemp_query=mysql_query($sqltemp,$conexao);

//seleciona disciplinas e docentes por semestre
$sqltemp2="select * from ra_disc inner join doc_disc on doc_disc.id_doc_disc=ra_disc.id_doc_disc where ra_disc.ra = '$ra' and ra_disc.semestre = '$semestre'";// and doc_disc.semestre = '$semestre' ";
$rstemp_query2=mysql_query($sqltemp2,$conexao);
$totlinhas=mysql_num_rows($rstemp_query2);
$i=0;
			   	while($rstemp2=mysql_fetch_array($rstemp_query2) ){
						$disc[$i]=$rstemp2["disciplina"]; 
					 //	print $disc[$i]; print " $i  ";
						$doc[$i]=$rstemp2["docente"]; 
					 //	print $doc[$i]; print " $i  ";
					 	$resp[$i] = $rstemp2["id_doc_disc"]; 
					 //	print $resp[$i]; print " $i  ";
						$i++;
				}
?>
<table width="100%" border="0" id="tabela">
<tr>
    <td colspan="11"><table width="100%" border="0">
        <tr> 
          <td width="369" bgcolor="#990000"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Para 
            responder &agrave;s quest&otilde;es de 17 a 19, atribua:</strong></font></td>
          <td bgcolor="#FFFFCC">
<div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
              1 - Sim;</font></strong></div></td>
          <td bgcolor="#FFCC33"> 
            <div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">2 
              - N&atilde;o;</font></strong></div></td>
        </tr>
      </table></td>
</tr>
<tr>

        <td colspan="11"> 
    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Pergunta: 
    Quanto aos resultados...</strong></font></td></tr> 
        <? //escreve as perguntas do bloco 4
		while($rstemp=mysql_fetch_array($rstemp_query)){
		$xi=1; ?>
                <tr>
      <td colspan="11"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">[<? echo $rstemp["perguntas"]; ?>] 
        </font></td>
    </tr>
  	<form name="avaliar<? echo $resp[$xi]; ?>" action="inclui.php" method="get" target="_blank" onSubmit="return disableForm(this);">


        <tr bgcolor="#99CCFF" id="linha<? echo $rstemp["id_pergunta"]; ?>"> 
        <? //escreve os registros disciplinas e docentes 
	$perg=$rstemp["id_pergunta"];
	for($ii=0;$ii<$totlinhas;$ii++){
				?>
      <td id="cel<? echo $perg; echo $ii;?>"> <font size="1" face="Verdana, Arial, Helvetica, sans-serif">

        <? echo $disc[$ii]; ?> || <br>
        <b> 
        <? echo $doc[$ii]; ?>
        :</b></font> <select id="td<? echo $ii;?>" name="nota[]" onChange="cel<? echo $perg; echo $ii; ?>.bgColor='#99FF00'">
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
        </select>
        <input name="disc[]" type="hidden" value="<? echo $resp[$ii]; ?>">

      	</td>



	<? } ?>
	</tr>
</td>
<td>
        <input name="pergunta" type="hidden" value="<? echo $rstemp["id_pergunta"]; ?>">
        <input name="sessao" type="hidden" id="sessao" value="<? echo $SID; ?>">
        <input name="ip" type="hidden" id="ip" value="<? echo $ip_session; ?>">
        <input name="sem" type="hidden" value="<? echo $semestre; ?>">
 
       <input name="env" type="submit" value="OK" onClick="cel<? echo $perg; echo $ii; ?>.bgColor='backColor'">
        <? echo mysql_error();?></div>


</form><?  } ?>
</td>
</tr>
	<?
		$rstemp2=null;
		$rstemp=null;
	?>
</table>

<? 
//seleciona perguntas bloco 5
$sqltemp="select * from perguntas where bloco = 5";
$rstemp_query=mysql_query($sqltemp,$conexao);

//seleciona disciplinas e docentes por semestre
$sqltemp2="select * from ra_disc inner join doc_disc on doc_disc.id_doc_disc=ra_disc.id_doc_disc where ra_disc.ra = '$ra' and ra_disc.semestre = '$semestre'";// and doc_disc.semestre = '$semestre' ";
$rstemp_query2=mysql_query($sqltemp2,$conexao);
$totlinhas=mysql_num_rows($rstemp_query2);
$i=0;
			   	while($rstemp2=mysql_fetch_array($rstemp_query2) ){
						$disc[$i]=$rstemp2["disciplina"]; 
					 //	print $disc[$i]; print " $i  ";
						$doc[$i]=$rstemp2["docente"]; 
					 //	print $doc[$i]; print " $i  ";
					 	$resp[$i] = $rstemp2["id_doc_disc"]; 
					 //	print $resp[$i]; print " $i  ";
						$i++;
				}
?>
<table width="100%" border="0" id="tabela">
<tr>
    <td colspan="11"><table width="100%" border="0">
        <tr> 
          <td width="369" bgcolor="#6699CC"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Para 
            responder &agrave;s quest&otilde;es de 20 a 25, atribua:</strong></font></td>
          <td bgcolor="#FFFFCC"><div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
              1 - Nunca;</font></strong></div></td>
          <td bgcolor="#FFCC33">
<div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">2 
              - Poucas vezes;</font></strong></div></td>
          <td bgcolor="#FFFFCC"><div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">3 
              - Muitas vezes;</font></strong></div></td>
          <td bgcolor="#FFCC33">
<div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">4 
              - Sempre;</font></strong></div></td>
          <td bgcolor="#FFFFCC"><div align="center"><strong></strong></div></td>
        </tr>
      </table></td>
</tr>
<tr>

        <td colspan="11"> 
    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Pergunta: 
    Geral...</strong></font></td></tr> 
        <? //escreve as perguntas do bloco 5
		while($rstemp=mysql_fetch_array($rstemp_query)){
		$xi=1; ?>
                <tr>
      <td colspan="11"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">[<? echo $rstemp["perguntas"]; ?>] 
        </font></td>
    </tr>
  	<form name="avaliar<? echo $resp[$xi]; ?>" action="inclui.php" method="get" target="_blank" onSubmit="return disableForm(this);">


        <tr bgcolor="#99CCFF" id="linha<? echo $rstemp["id_pergunta"]; ?>"> 
        <? //escreve os registros disciplinas e docentes 
	$perg=$rstemp["id_pergunta"];
	for($ii=0;$ii<$totlinhas;$ii++){
				?>
      <td id="cel<? echo $perg; echo $ii;?>"> <font size="1" face="Verdana, Arial, Helvetica, sans-serif">

        <? echo $disc[$ii]; ?> || <br>
        <b> 
        <? echo $doc[$ii]; ?>
        :</b></font> <select id="td<? echo $ii;?>" name="nota[]" onChange="cel<? echo $perg; echo $ii; ?>.bgColor='#99FF00'">
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>
        <input name="disc[]" type="hidden" value="<? echo $resp[$ii]; ?>">

      	</td>

	<? } ?>
	</tr>
</td>
<td>
        <input name="pergunta" type="hidden" value="<? echo $rstemp["id_pergunta"]; ?>">
        <input name="sessao" type="hidden" id="sessao" value="<? echo $SID; ?>">
        <input name="ip" type="hidden" id="ip" value="<? echo $ip_session; ?>">
        <input name="sem" type="hidden" value="<? echo $semestre; ?>">
 
       <input name="env" type="submit" value="OK" onClick="cel<? echo $perg; echo $ii; ?>.bgColor='backColor'">
        <? echo mysql_error();?></div>


</form><?  } ?>
</td>
</tr>
	<?
		$rstemp2=null;
		$rstemp=null;
	?>
</table>
<?
//===========================20-11-2007============================================================================= 
?>

<p>
	
<table width="100%" border="0">
  <form name="avaliar" action="incluicom.php" method="post" onSubmit="return disableForm(this);">
    <tr> 
      <td bgcolor="#FFFFFF"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Coment&aacute;rio 
        sobre semestre: &nbsp;&nbsp; 
        <input type=box readonly disabled name=remLentext size=4 value=4096>
        <strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Caracteres 
        restantes: TAMANHO M&Aacute;XIMO DO COMENT&Aacute;RIO (4KB)</font></strong></strong></font></td>
    </tr>
    <tr colspan=2> 
      <td valign="top" bgcolor="#99CCFF"> 
        <textarea name="comentario" cols="70" rows="10" id="comentario" wrap="hard" onKeyDown="textCounter(this.form.comentario,this.form.remLentext,4096);" onKeyUp="textCounter(this.form.comentario,this.form.remLentext,4096);"></textarea> 
        <input name="sessao" type="hidden" id="sessao" value="<? echo $SID; ?>"> 
	<input name="ra" type="hidden" id="sessao" value="<? echo $ra; ?>">
        <input name="ip" type="hidden" id="ip" value="<? echo $ip_session; ?>">
        <input name="semestre" type="hidden" value="<? echo $semestre; ?>"> <? echo $semestre; ?>

<? if($totlinhas==0 || $totlinhas==NULL){ ?>
	<H3>IMPOSS&Iacute;VEL CONCLUIR!</H3>
<? }else{ ?>
        <input type="submit" name="Submit" value="Concluir">
<? }; ?>
      </td>
      <td valign="top" bgcolor="#99CCFF">
	<font size=6 color="red"><b>Clique em concluir para finalizar.</b><br>Ao clicar em <B>CONCLUIR</B> não ser&aacute; poss&iacute;vel<br> acessar no sistema <B>NOVAMENTE!</B></font>
      </td>
    </tr>
    <tr> 
      <td>&nbsp; </td>
    </tr>
  </form>
</table>
</body>
</html>
