<html>
<head>

<title>Sistema de Avalia&ccedil;&atilde;o de Docentes : Validacao</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<? 
//registro de session
  session_start();
  session_register("nome_s");
  session_register("ra_s");
  
$name_session=$HTTP_POST_VARS["email"];
$ra_session=$HTTP_POST_VARS["chave"];

$nome=$name_session;
$senha=$pass_session;

include "conexao.php";

//$cnpath;
$sqltemp="select * from aluno where email LIKE '$nome'";

$rstemp=$rstemp_query=mysql_query($sqltemp);
$rstemp=mysql_fetch_array($rstemp_query);
if (($rstemp==0)){
?>
<body oncontextmenu="return false" ondragstart="return false" onselectstart="return false" onview="return false">
<div align="center"><b><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
  <?   echo $nome; ?>
  </font></b><font size="2" face="Verdana, Arial, Helvetica, sans-serif">, você 
  não é um usuário cadastrado em nosso SISTEMA!<br>
  Tente <A href='index.php'>Conectar-se</a> novamente como um usuário válido 
  <?   exit();

}else{
$ra=$rstemp["ra"];
//if ($rstemp["senha"]==$senha){
$name_session=$ra;
//$pass_session=$senha;
$ip_session=$HTTP_SERVER_VARS['REMOTE_ADDR'];
$SID=md5($nome);
echo "<center>
<font size=2 face='Verdana, Arial, Helvetica, sans-serif'><b> Você é: ";
echo $rstemp["nome"];
echo " - R.A.: ";
echo $ra;
echo " - e-mail:<font size=5> ";
echo $rstemp["email"];
echo " </font>- Seu IP será registrado como: ";
echo $ip_session;

$semestre=$rstemp["semestre"];
//inclui aluno para evitar duplicação de votos
//$incluir="insert into controle_ra(ra,sessao,semestre) values('$nome','$SID','$semestre')";
//$sql = mysql_query($incluir) or die ("<h2>Impossível conectar, sua avaliação já foi computada !</h2>");


?>
</b>
  </font> </div>
<form action="entrada.php" method="post" name="login">
  <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
Confira se seu <b>NOME</b> e <b>e-mail</b> est&atilde;o CORRETOS!<br>
    <input name="ra" value="<? echo $ra; ?>" type="hidden">
    <input name="semestre" value="<? echo $rstemp["semestre"]; ?>" type="hidden">
    <input name="nome" value="<? echo $rstemp["nome"];?>" type="hidden">
    <input type="submit" value="Ir para avalia&ccedil;&atilde;o">
    </font> </div>
</form>
<div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
  <strong><font color="#FF0000" size="3">Estas informações não serão registradas, 
  este é apenas um meio de assegurar a integridade, confiabilidade e impedir assim 
  a duplicidade dos dados.</font></strong> 
  <?
}

mysql_close($conntemp);
?>
  </font> 
</body>
</html>
