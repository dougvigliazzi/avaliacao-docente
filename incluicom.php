<html>
<head>
<title>Completo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script>
setTimeout("fecha()",3000);
</script>
</head>
<body>
<?
//captura variaveis
$ra=$HTTP_POST_VARS["ra"];
$comentario = $HTTP_POST_VARS["comentario"];
$sessao = $HTTP_POST_VARS["sessao"];
$sem = $HTTP_POST_VARS["sem"];
$ip = $HTTP_POST_VARS["ip"];

//echo "$disc = $nota";
//abre conexão com o banco
include "conexao.php";


$hoje = date("d/m/Y - h");
$data = date("d/m/Y");

$ve_semestre=date("m");
if($ve_semestre<8){
$semestre=1;
}else{
$semestre=2;
}

$erro = mysql_error();

//inclui comentario
$incluir="insert into comentario(comentario,sessao,semestre,ip) values('$comentario','$sessao','$semestre','$ip')";
$sql = mysql_query($incluir) or die ("<center><h2>Ocoreu um problema 1</h2><center>");

echo "<center><h1>Inclusão efetuada com sucesso!</h1>";
echo "<h1>Obrigado por participar!</h1></center>";

$sem_novo=$sem+1;

//$atualiza="update aluno set semestre = '$sem_novo' where ra='$ra'";
//$sql_atual=mysql_query($atualiza,$conexao) or die ("<center><h2>Ocoreu um problema 2.</h2><center>");


// fim avaliação
///////////////////////////////

//atualiza semestres em notas

$hoje = date("d/m/Y - h");

$erro = mysql_error();
/*inicio teste
echo "pergunta: $comentario";
echo "<br>Sessão: $sessao";
echo "<br>IP: $ip";
echo "<br> $semestre º semestre";

echo mysql_error();
fim teste*/

//inclui comentario

$sem_novo_n=$sem+1;
//echo $sem_novo_n;
$errei=mysql_error();

//$incluir_n="insert into semestre(ra,sem,semestre,data) values('$ra','$sem_novo','$semestre','$hoje')";
//$sql_n = mysql_query($incluir_n,$conexao) or die ("<center><h2>Ocoreu um problema na inclusao do semestre! $errei</h2><center>");

echo "<center><h1>Até o próximo semestre!</h1></center>";

$atualiza_n="update aluno set semestre = '$sem_novo_n' where ra='$ra'";
$sql_atual_n=mysql_query($atualiza_n,$conexao) or die ("<center><h2>Ocoreu um problema na atualizacao.</h2><center>");

$incluir="insert into controle_ra(ra,sessao,semestre) values('$ra','$sessao','$semestre')";
$sql = mysql_query($incluir) or die ("<h2 align=center>Impossível conectar, sua avaliação já foi computada !</h2>");


mysql_close($conexao);
$conntemp=null;

?>
</body>
</html>
