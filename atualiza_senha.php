<html>
<?php
$raG = $_GET["ra"];
$conexao = mysql_connect("localhost","root","");
$db = mysql_select_db("notas",$conexao);
$sql = "SELECT * FROM aluno WHERE ra='$raG'";
$resultado = mysql_query($sql)
or die ("Não foi possível realizar a consulta ao banco de dados");

while ($linha=mysql_fetch_array($resultado)) {
$ra = $linha["ra"];
$reuniao_no = $linha["reuniao_no"];
$item = $linha["item"];
$descr = $linha["descr"];
$n_ordem= $linha["n_ordem"];
}
?>
<body bgcolor="#FFFFFF">
<h1>Altera&ccedil;&atilde;o de Senha...</h1>
<form action='atualiza_senha_exe.php' method='post'>
 
  <table width="200" border="0">
    <tr> 
      <td><div align="right"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">R.A.:</font></div></td>
      <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $ra; ?> 
        <input type="hidden" name="ra" value="<? echo $ra; ?>">
        </strong> </font></td>
    </tr>
    <tr> 
      <td><div align="right"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nova 
          Senha</font></div></td>
      <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input name='chave' type='password' id="chave" size=10 maxlength="8">
        </font></td>
    </tr>
    <tr> 
      <td><div align="right"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Redigite 
          a Senha:</font></div></td>
      <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input name='chave_nova' type='password' id="chave_nova" size=10 maxlength="8">
        </font></td>
    </tr>
    <tr> 
      <td colspan="2"><div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
          <input name="submit" type='submit' value='Alterar'>
          </font><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></div></td>
    </tr>
  </table>
  </form>
</html>