<html>
<head>
<title>Completo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script>
function fecha(){
window.close(self);
}
setTimeout("fecha()",500);
</script>
</head>

<body oncontextmenu="return false" ondragstart="return false" onselectstart="return false" onview="return false">
<div align="center">

<?

$pergunta = $HTTP_GET_VARS["pergunta"];
$sessao = $HTTP_GET_VARS["sessao"];
$ip = $HTTP_GET_VARS["ip"];
$disc = $_GET["disc"];
$nota = $_GET["nota"];
$sem = $HTTP_GET_VARS["sem"];
$a=0;


//echo "$disc = $nota";
//abre conexão com o banco
include "conexao.php";


$hoje = date("m/Y");

$erro = mysql_error();

$ve_semestre=date("m");

$semestre=$sem;


$proximo=$pergunta + 1;

$a=1;

foreach($nota as $nota_f){
	$nota_f;
	$n_f[$a]=$nota_f;
	$a++;
}

$b=1;

foreach($disc as $disc_f){

	$incluir="insert into resposta(id_pergunta,id_doc_disc,nota,sem,datahora,ip,session_id) values('$pergunta','$disc_f','$n_f[$b]','$sem','$hoje','$ip','$sessao')";
	$sql = mysql_query($incluir) or die ("<h2>Você já votou neste item. <br>Por favor, vote no item $proximo! </h2>");

	echo "$disc_f :: $n_f[$b] <br>";
	$b++;
}
/*
	$incluir="insert into resposta(id_pergunta,id_doc_disc,nota,sem,datahora,ip) values('1','1','A','1','$hoje','$ip')";
	$sql = mysql_query($incluir) or mysql_error();//die ("<h2>Você já votou neste item. <br>Por favor, vote no item $proximo! </h2>");*/

echo "<h1>Inclusão efetuada com sucesso!</h1>";



?>
</div>
<p>&nbsp;
</p><table width="90%" border="0" align="center">
  <tr> 
    <td width="68%"> 
    </td>
  </tr>
</table>
</body>
</html>
