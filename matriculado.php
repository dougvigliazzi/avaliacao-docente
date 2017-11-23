<html>
<head>
<title>Notas e Freq&uuml;encia</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<? 
$dis=$HTTP_GET_VARS["d"];
$sem=$HTTP_GET_VARS["s"];
$ra=$HTTP_GET_VARS["ra"];

//abre conexão com o banco
$conntemp=mysql_connect("localhost","root","");
mysql_select_db("notas",$conntemp);

//seleciona registros
$sqltemp="select * from doc_disc order by disciplina ASC";
$rstemp_query=mysql_query($sqltemp,$conntemp);

?>
<table width="100%" border="0">
  <tr>
    <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>
      <div align="center">Disciplinas matriculadas para o [<font color="#0066CC"> 
        R.A. 
        <?   echo $ra ; ?>
        </font>]</div>
      </strong></font> <table width="100%" border="1" cellpadding="1" cellspacing="0" bordercolor="#000000">
        <tr bgcolor="#CCCCCC"> 
          <td> <div align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Disciplinas:</strong></font></div>
            <div align="center"></div></td>
          <td width="10%"> <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
              <? //escreve os registros selecionados
		
	   	while($rstemp=mysql_fetch_array($rstemp_query) ){?>
              </font></div></td>
        </tr>
        <tr> 
          <td> <div align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $rstemp["disciplina"]; ?></strong></font></div>
            <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
              </font><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
              </font></div></td>
          <td width="10%"> <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b> 
              </b></font><br>
            </div></td>
          <? }  
		$rstemp=null;

		mysql_close($conntemp);
		$conntemp=null;


?>
        </tr>
      </table> 
      <p>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<tr> 
              
  <td>&nbsp; </td>
</tr></table>
</body>
</html>
