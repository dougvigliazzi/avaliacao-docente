<html>
<head>
<title>Busca de documento</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong>Inclusão de dados através 
de arquivos de texto</strong></font> 

<script>

function InitSaveVariables(form) {
ShipFirst = form.arquivo_csv.value;
}
function esc(form){
	if (form.cheque.checked) {
		InitSaveVariables(form);
		csv.escreve.value = csv.arquivo_csv.value;
	}
replaceChars(csv.escreve.value)
}
function replaceChars(entry) {
out = "'\'"; // replace this
add = "%5C"; // with this
temp = "" + entry; // temporary holder

while (temp.indexOf(out)>-1) {
pos= temp.indexOf(out);
temp = "" + (temp.substring(0, pos) + add + 
temp.substring((pos + out.length), temp.length));
}
document.csv.escreve.value = temp;
}
	</script>	
<form action="exe_csv.php" method="post" enctype="multipart/form-data" name="csv" onSubmit="return esc(document.csv.arquivo_csv.value);">
  <p> 
    <input name="arquivo_csv" type="file" value="Clique em procurar" size="50">
    <input type="hidden" name="escreve">
    <input type="hidden" name="escrever">
    <br><select name="tabela">
      <option>Selecione a tabela de destino</option>
    <?
//  include("conectar_brw.inc");
$user="root";
$chave="";
$db="notas";

$conexao=mysql_connect("localhost",$user,$chave);

mysql_select_db($db,$conexao);

$consulta="show tables in notas";
$resultado=mysql_query($consulta,$conexao) or die("ERRO");
while($rstemp=mysql_fetch_array($resultado) ){
?>
	
      <option value="<?	echo $rstemp["Tables_in_notas"]; ?>"><? echo $rstemp["Tables_in_notas"];?> 
<? } ?>	  
    </select>
    <br>
    <input name="cheque" type="checkbox" value="checkbox" OnClick="javascript:esc(this.form);">
    <font color="#FF0000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Confirma envio dos dados</font> 
    <br>
    <input name="Enviar" type="submit" value="Enviar">
</form>
</body>
</html>