<html>
<head>
<title>[Sistema de Acompanhamento de Notas/Freq&uuml;&ecirc;ncia]</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?
//registro de session
/*  session_start();
  session_register("nome_s");
  session_register("ra_s");
*/

//$name=$nome_s;
//$ra=$ra_s;
$name=$HTTP_POST_VARS["nome"];
$ra=$HTTP_POST_VARS["ra"];
$semestre=$HTTP_POST_VARS["semestre"];
$ip_session=$HTTP_SERVER_VARS['REMOTE_ADDR'];
$SID=session_id();
include ("dic_sql.inc");

//abre conexão com o banco
$conntemp=mysql_connect("localhost","root","");
mysql_select_db("notas",$conntemp);

?>

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
        <? echo "  Semestre: "; echo $semestre; echo "º" ?> </strong> , Bem 
        Vindo ao Sistema! <strong>]</strong></font></p></td>
    <td width="60"> 
      <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="index.php" target="_top">SAIR</a></strong></font></div></td>
    <td width="120"><div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="atualiza_senha.php?ra=<? echo $ra ?>" target="notas"><strong>Alterar 
        Senha</strong></a></font></div></td>
  </tr>
  <tr> 
</table>
<? 
//seleciona perguntas bloco 1
$sqltemp="select * from perguntas where bloco = 1";
$rstemp_query=mysql_query($sqltemp,$conntemp);

//seleciona disciplinas e docentes por semestre
$sqltemp2="select * from doc_disc where semestre = '$semestre'";
$rstemp_query2=mysql_query($sqltemp2,$conntemp);
$totlinhas=mysql_num_rows($rstemp_query2);
$i=0;
			   	while($rstemp2=$rstemp2=mysql_fetch_array($rstemp_query2) ){
						$disc[$i]=$rstemp2["disciplina"]; 
					 //	print $disc[$i]; print " $i  ";
						$doc[$i]=$rstemp2["docente"]; 
					 //	print $doc[$i]; print " $i  ";
					 	//$resp[$i] = $rstemp2["resp"]; 
					 //	print $resp[$i]; print " $i  ";
						$i++;
				}
?>
<table width="100%" border="0">
<tr>
    <td colspan="9"><table width="100%" border="0">
        <tr> 
          <td width="369" bgcolor="#990000"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Para 
            responder &agrave;s quest&otilde;es de 1 a 20, atribua:</strong></font></td>
          <td bgcolor="#FFFFCC"><div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
              1 - Nunca;</font></strong></div></td>
          <td bgcolor="#FFCC33">
<div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">2 
              - Poucas vezes;</font></strong></div></td>
          <td bgcolor="#FFFFCC"><div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">3 
              - Satisfat&oacute;rio;</font></strong></div></td>
          <td bgcolor="#FFCC33">
<div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">4 
              - Muitas vezes;</font></strong></div></td>
          <td bgcolor="#FFFFCC"><div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">5 
              - Sempre.</font></strong></div></td>
        </tr>
      </table></td>
</tr>
<tr>

        <td colspan="9"> 
    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Pergunta: 
    O professor...</strong></font></td></tr> 
        <? //escreve as perguntas do bloco 1
		while($rstemp=$rstemp=mysql_fetch_array($rstemp_query) ){ ?>
  <form name="avaliar" action="inclui.php" method="post" target="_BLANK">
                <tr><td colspan="9"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><br>[<? echo $rstemp["perguntas"]; ?>] </font></td></tr>
                <tr> 
                <? //escreve os registros disciplinas e docentes 
			for($ii=0;$ii<$totlinhas;$ii++){
				?>
                    <td bgcolor="#99CCFF"> <font size="1" face="Verdana, Arial, Helvetica, sans-serif">
                      <? echo $disc[$ii]; ?> || <b><?  echo $doc[$ii]; ?>:</b></font> 
			<select name="resp">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                      </select>
                      </td><?  } ?>
                  
    <td> <div align="center">
        <input name="pergunta" type="hidden" value="<? echo $rstemp["id_pergunta"]; ?>">
          <input name="sessao" type="hidden" id="sessao" value="<? echo $SID; ?>">
          <input name="ip" type="hidden" id="ip" value="<? echo $ip_session; ?>">
        <input name="semestre" type="hidden" value="<? echo $semestre; ?>">
        <input type="submit" value="Avaliar"><? echo mysql_error();?></form>
      </div></td></tr>
	   <? } ?>
</td>
</tr>
	   <?
		$rstemp2=null;
		$rstemp=null;
		?>
</table>
<p></p>
<table width="100%" border="0">
<? 
//seleciona perguntas bloco 2
$sqltemp="select * from perguntas where bloco = 2";
$rstemp_query=mysql_query($sqltemp,$conntemp);

?>
    <td colspan="9"><table width="100%" border="0">
        <tr> 
          <td width="369" bgcolor="#990000"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Para 
            responder &agrave;s quest&otilde;es de 8 a 15, atribua:</strong></font></td>
          <td bgcolor="#FFFFCC"><div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
              1 - Nunca;</font></strong></div></td>
          <td bgcolor="#FFCC33">
<div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">2 
              - Poucas vezes;</font></strong></div></td>
          <td bgcolor="#FFFFCC"><div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">3 
              - Satisfat&oacute;rio;</font></strong></div></td>
          <td bgcolor="#FFCC33">
<div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">4 
              - Muitas vezes;</font></strong></div></td>
          <td bgcolor="#FFFFCC"><div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">5 
              - Sempre.</font></strong></div></td>
        </tr>
      </table></td>

  <tr> 
        <td colspan="9"> 
  <form name="avaliar" action="inclui.php" method="post">
    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Pergunta: 
    Quanto ao conteúdo da disciplina...</strong></font></td></tr> 
        <? //escreve as perguntas do bloco 1
		while($rstemp=$rstemp=mysql_fetch_array($rstemp_query) ){ ?>
                <tr><td colspan="9"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">[<? echo $rstemp["perguntas"]; ?>] </font></td></tr>
                <tr> 
                <? //escreve os registros disciplinas e docentes 
					for($ii=0;$ii<$totlinhas;$ii++){
				?>
                    <td bgcolor="#99CCFF"> <font size="1" face="Verdana, Arial, Helvetica, sans-serif">
                      <? echo $disc[$ii]; ?> || <b><?  echo $doc[$ii]; ?>:</b></font> 
					  <select name="resp<? echo $resp[$ii];?>">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                      </select>
                      </td><?  } ?>
                  
    <td> <div align="center">
        <input name="pergunta" type="hidden" value="<? echo $rstemp["id_pergunta"]; ?>">
          <input name="sessao" type="hidden" id="sessao" value="<? echo $SID; ?>">
          <input name="ip" type="hidden" id="ip" value="<? echo $ip_session; ?>">
        <input name="semestre" type="hidden" value="<? echo $semestre; ?>">
        <input type="submit" value="Avaliar"><? echo mysql_error();?>
      </div></form></td></tr>
	   <? } ?>
			</td>
       </tr>
	   <?
		$rstemp2=null;
		$rstemp=null;
		?>
</table>
<p></p>
<table width="100%" border="0">
<? 
//seleciona perguntas bloco 2
$sqltemp="select * from perguntas where bloco = 3";
$rstemp_query=mysql_query($sqltemp,$conntemp);

?>
    <td colspan="9"><table width="100%" border="0">
        <tr> 
          <td width="369" bgcolor="#990000"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Para 
            responder &agrave;s quest&otilde;es de 16 a 20, atribua:</strong></font></td>
          <td bgcolor="#FFFFCC"><div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
              1 - Nunca;</font></strong></div></td>
          <td bgcolor="#FFCC33">
<div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">2 
              - Poucas vezes;</font></strong></div></td>
          <td bgcolor="#FFFFCC"><div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">3 
              - Satisfat&oacute;rio;</font></strong></div></td>
          <td bgcolor="#FFCC33">
<div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">4 
              - Muitas vezes;</font></strong></div></td>
          <td bgcolor="#FFFFCC"><div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">5 
              - Sempre.</font></strong></div></td>
        </tr>
      </table></td>

  <tr> 
        <td colspan="9"> 
  <form name="avaliar" action="inclui.php" method="post">
    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Pergunta: 
    Quanto à avaliação...</strong></font></td></tr> 
        <? //escreve as perguntas do bloco 1
		while($rstemp=$rstemp=mysql_fetch_array($rstemp_query) ){ ?>
                <tr><td colspan="9"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">[<? echo $rstemp["perguntas"]; ?>] </font></td></tr>
                <tr> 
                <? //escreve os registros disciplinas e docentes 
					for($ii=0;$ii<$totlinhas;$ii++){
				?>
                    <td bgcolor="#99CCFF"> <font size="1" face="Verdana, Arial, Helvetica, sans-serif">
                      <? echo $disc[$ii]; ?> || <b><?  echo $doc[$ii]; ?>:</b></font> 
					  <select name="resp<? echo $resp[$ii];?>">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                      </select>
                      </td><?  } ?>
                  
    <td> <div align="center">
        <input name="pergunta" type="hidden" value="<? echo $rstemp["id_pergunta"]; ?>">
          <input name="sessao" type="hidden" id="sessao" value="<? echo $SID; ?>">
          <input name="ip" type="hidden" id="ip" value="<? echo $ip_session; ?>">
        <input name="semestre" type="hidden" value="<? echo $semestre; ?>">
        <input type="submit" value="Avaliar"><? echo mysql_error();?>
      </div></td></tr>
	   <? } ?>
			</form></td>
       </tr>
	   <?
		$rstemp2=null;
		$rstemp=null;
		?>
</table>

<p></p>
<table width="100%" border="0">
<? 
//seleciona perguntas bloco 2
$sqltemp="select * from perguntas where bloco = 4";
$rstemp_query=mysql_query($sqltemp,$conntemp);

?>
<tr>
    <td colspan="9"><table width="100%" border="0">
        <tr> 
          <td width="369" bgcolor="#990000"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Para 
            responder &agrave;s quest&otilde;es de 21 a 23, atribua:</strong></font></td>
          <td bgcolor="#FFFFCC">
<div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
              1 - Nunca;</font></strong></div></td>
          <td bgcolor="#FFCC33"> 
            <div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">2 
              - Poucas vezes;</font></strong></div></td>
        </tr>
      </table></td>
</tr>

  <tr> 
        <td colspan="9"> 
  <form name="avaliar" action="inclui.php" method="post">
    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Pergunta: 
    Quanto aos resultados...</strong></font></td></tr> 
        <? //escreve as perguntas do bloco 1
		while($rstemp=$rstemp=mysql_fetch_array($rstemp_query) ){ ?>
                <tr><td colspan="9"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">[<? echo $rstemp["perguntas"]; ?>] </font></td></tr>
                <tr> 
                <? //escreve os registros disciplinas e docentes 
					for($ii=0;$ii<$totlinhas;$ii++){
				?>
                    <td bgcolor="#99CCFF"> <font size="1" face="Verdana, Arial, Helvetica, sans-serif">
                      <? echo $disc[$ii]; ?> || <b><?  echo $doc[$ii]; ?>:</b></font> 
					  <select name="resp<? echo $resp[$ii];?>">
          <option value="1">1</option>
          <option value="2">2</option>
        </select>
                      </td><?  } ?>
                  
    <td> <div align="center">
        <input name="pergunta" type="hidden" value="<? echo $rstemp["id_pergunta"]; ?>">
          <input name="sessao" type="hidden" id="sessao" value="<? echo $SID; ?>">
          <input name="ip" type="hidden" id="ip" value="<? echo $ip_session; ?>">
        <input name="semestre" type="hidden" value="<? echo $semestre; ?>">
        <input type="submit" value="Avaliar"><? echo mysql_error();?>
      </div></td></tr>
	   <? } ?>
			</form></td>
       </tr>
	   <?
		$rstemp2=null;
		$rstemp=null;
		?>
</table>
<p></p>
<table width="100%" border="0">
<? 
//seleciona perguntas bloco 2
$sqltemp="select * from perguntas where bloco = 5";
$rstemp_query=mysql_query($sqltemp,$conntemp);

?>
<tr>
    <td colspan="9"><table width="100%" border="0">
        <tr> 
          <td width="369" bgcolor="#990000"><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Para 
            responder &agrave;s quest&otilde;es de 24 a 27, atribua:</strong></font></td>
          <td bgcolor="#FFFFCC"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
            1 - Nunca;</font></strong></td>
          <td bgcolor="#FFCC33"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">2 
            - Poucas vezes;</font></strong></td>
          <td bgcolor="#FFFFCC"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">3 
            - Satisfat&oacute;rio;</font></strong></td>
          <td bgcolor="#FFCC33"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">4 
            - Muitas vezes;</font></strong></td>
          <td bgcolor="#FFFFCC"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">5 
            - Sempre.</font></strong></td>
        </tr>
      </table></td>
</tr>

  <tr> 
        <td colspan="9"> 
  <form name="avaliar" action="inclui.php" method="post">
    <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Pergunta: 
    Geral...</strong></font></td></tr> 
        <? //escreve as perguntas do bloco 1
		while($rstemp=$rstemp=mysql_fetch_array($rstemp_query) ){ ?>
                <tr><td colspan="9"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">[<? echo $rstemp["perguntas"]; ?>] </font></td></tr>
                <tr> 
                <? //escreve os registros disciplinas e docentes 
					for($ii=0;$ii<$totlinhas;$ii++){
				?>
                    <td bgcolor="#99CCFF"> <font size="1" face="Verdana, Arial, Helvetica, sans-serif">
                      <? echo $disc[$ii]; ?> || <b><?  echo $doc[$ii]; ?>:</b></font> 
					  <select name="resp<? echo $resp[$ii];?>">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                      </select>
                      </td><?  } ?>
                  
    <td> <div align="center">
        <input name="pergunta" type="hidden" value="<? echo $rstemp["id_pergunta"]; ?>">
          <input name="sessao" type="hidden" id="sessao" value="<? echo $SID; ?>">
          <input name="ip" type="hidden" id="ip" value="<? echo $ip_session; ?>">
        <input name="semestre" type="hidden" value="<? echo $semestre; ?>">
        <input type="submit" value="Avaliar"><? echo mysql_error();?>
      </div></td></tr>
	   <? } ?>
			</form></td>
       </tr>
	   <?
		$rstemp2=null;
		$rstemp=null;
		?>
</table>

</body>
</html>



