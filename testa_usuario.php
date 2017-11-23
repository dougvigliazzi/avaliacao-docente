<html>
<head>

<title>Sistema de Apoio a Reuni&otilde;es: Valida&ccedil;&atilde;o</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<? 
//registro de session
  session_start();
  session_register("nome_s");
  session_register("ra_s");
  
  
$name_session=$HTTP_POST_VARS["ra"];

$ra=$HTTP_POST_VARS["ra"];
$semestre=$HTTP_POST_VARS["semestre"];
$ip_session=$HTTP_SERVER_VARS['REMOTE_ADDR'];
$SID=session_id();


$dbname="avalia_ol";
$nome=$name_session;

$conntemp=mysql_connect("localhost","root","");
mysql_select_db($dbname,$conntemp);


//$cnpath;
$sqltemp="select * from aluno where ra LIKE '$nome'";

$rstemp=$rstemp_query=mysql_query(($sqltemp),$conntemp);
$rstemp=mysql_fetch_array($rstemp_query);
if (($rstemp==0))
{
?><body>
<div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><font color="#FF0000" size="3"> 
  <strong> 
  <?   echo $nome; ?>
  </strong></font></font><strong><font color="#FF0000" size="3" face="Verdana, Arial, Helvetica, sans-serif">, 
  você já votou!</font></strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><br>
  <?   exit();

} 

$ip_session=$HTTP_SERVER_VARS['REMOTE_ADDR'];
$SID=session_id();
echo "<center>
<font size=2 face='Verdana, Arial, Helvetica, sans-serif'><b> Você é: ";
echo $rstemp["nome"];
echo " - R.A.: ";
echo $nome;
echo " - Semestre: ";
echo $rstemp["semestre"];
echo " - Seu IP está sendo registrado como: ";
echo $ip_session;
?></b>
  </font> </div>
<form action="entrada.php" method="post" name="login">
  <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
    <input name="ra" value="<? echo $nome; ?>" type="hidden">
    <input name="semestre" value="<? echo $rstemp["semestre"]; ?>" type="hidden">
    <input type="submit" value="Ir para avalia&ccedil;&atilde;o">
    </font> </div>
</form>
<div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
  <strong><font color="#FF0000" size="3">Estas informações não serão registradas, 
  este é apenas um meio de assegurar a integridade, confiabilidade e impedir assim 
  a duplicidade dos dados.</font></strong><font color="#FF0000" size="3"><br>
  </font></font></div>
<p align="center"> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
<? 
mysql_close($conntemp);
?>
  </font> 
</body>
</html>