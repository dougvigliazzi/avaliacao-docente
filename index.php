<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Sistema de Avalia&ccedil;&atilde;o de Docentes</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1; Pragma=no-cache">
</head>

<body oncontextmenu="return false" ondragstart="return false" onselectstart="return false" onview="return false">
<?

$data_inicio_a=date("d/m/Y");
$checa_d_a_i="16/07/2013";
$checa_d_a_f="20/07/2013";

if($data_inicio_a<$checa_d_a_i&&$data_inicio_a>$checa_d_a_f){
	echo "<font face=\"Verdana, Arial, Helvetica, sans-serif\"><h1>Avalia&ccedil;&atilde;o Docente Indispon&iacute;vel</h1>";
}else{
?>  
<div align="center"><font face="Verdana, Arial, Helvetica, sans-serif"><h1>Avalia&ccedil;&atilde;o Docente</h1><h2>de <? echo $checa_d_a_i;?> a <? echo $checa_d_a_f;?> </font> </div>
<div align="center"> 
  <form action="validaEmail.php" method="post" name="login" id="login">
    <table width="501" border="1" cellspacing="0" bordercolor="#000000">
      <tr>
        <td><table width="500" border="0" cellspacing="0">
            <tr bgcolor="#999999"> 
              <td colspan="2"> <div align="center"></div>
                <div align="center"><font color="#FFFFFF" face="Verdana, Arial, Helvetica, sans-serif"><strong>LOGIN</strong></font></div></td>
            </tr>
            <tr> 
              <td width="150"><div align="right"><font face="Verdana, Arial, Helvetica, sans-serif"><b>E-MAIL: </b>
                  </font></div></td>
              <td width="189"> <div align="left"> 
                  <input name="email" type="text" id="email" size="60" maxlength="60">
                </div></td>
            </tr>        
              <td colspan="2"><div align="center"> 
                  <input type="submit" value="Conectar">
                </div></td>
            </tr>
          </table></td>
      </tr>
    </table>
    </form>
</div>
<? }?>
</body>
</html>



