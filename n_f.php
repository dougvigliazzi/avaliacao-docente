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
$disc=$HTTP_GET_VARS["nc"];

//abre conexão com o banco
$conntemp=mysql_connect("localhost","root","");
mysql_select_db("notas",$conntemp);

//seleciona registros
$sqltemp="select * from notas where sem = '$sem' and ra='$ra' order by id ASC";
$rstemp_query=mysql_query($sqltemp,$conntemp);

?>
<table width="400" border="0">
  <tr>
    <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>
      <div align="center">Nota para o [<font color="#0066CC"> 
        <?   echo $sem ; ?>
        º Semestre :: R.A. <?   echo $ra ; ?></font>]</div>
      </strong></font> <table width="100%" border="1" cellpadding="1" cellspacing="0" bordercolor="#000000">
        <tr bgcolor="#CCCCCC"> 
          <td width="31%"> 
            <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Disciplina:</strong></font></div></td>
          <td width="10%"> 
            <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Nota</strong>:</font></div></td>
          <td width="10%"> 
            <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Faltas:</strong> 
              <? //escreve os registros selecionados
		;
	   	while($rstemp=$rstemp=mysql_fetch_array($rstemp_query) ){?>
              </font></div></td>
        </tr>
        <tr> 
          <td><div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $rstemp["disc"]; ?></strong></font></div></td>
          <td width="10%">
<div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
              <?   if($rstemp["nota"]==NULL){
	  			echo "<b>S/N *</b>";
			} else {
	  if($rstemp["nota"] < 5){ ?></font> 
              <font color="#FF0000"><b> <? echo $rstemp["nota"]; ?> </b></font>
              <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
              <? } else {
	  			 echo "<b>";
				 echo $rstemp["nota"];
	  			 echo "<b>";} }?>
              </font></div></td>
          <td width="10%">
<div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b> 
              <?   echo $rstemp["freq"]; ?>
              </b></font><br>
            </div></td>
          <? }  
		$rstemp=null;

		mysql_close($conntemp);
		$conntemp=null;


?>
        </tr>
      </table> 
<p><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>* 
        S/N = Sem Nota</strong></font> </td>
  </tr>
</table>
<p>&nbsp;</p>
<tr> 
              
  <td>&nbsp; </td>
</tr></table>
</body>
</html>
