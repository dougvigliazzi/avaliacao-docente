<?xml version="1.0" ?>

<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.2//EN" 
    "http://www.wapforum.org/DTD/wml12.dtd"> 
<wml>
    <card title="Welcome">
        <p align="center">
 <? 
//registro de session
 session_start();
// session_register("nome_s");
// session_register("ra_s");
  
 
$name_session=$HTTP_POST_VARS["ra"];
$pass_session=$HTTP_POST_VARS["chave"];

//$dbname="notas";
$nome=$name_session;
// $senha=$pass_session;

// $conntemp=mysql_connect("localhost","root","");
// mysql_select_db($dbname,$conntemp);

// $sqltemp="select * from aluno where ra LIKE '$nome'";

// $rstemp=$rstemp_query=mysql_query(($sqltemp),$conntemp);
// $rstemp=mysql_fetch_array($rstemp_query);
// if (($rstemp==0))
// {
// echo "  $nome ,   você não é um usuário cadastrado em nosso SISTEMA!
 // Tente <do href='login.wml'>Conectar-se</a> novamente como um usuário válido! ";

// exit();
//}  
?>
            Please enter a valid password.
<br/>
<?
if ($rstemp["senha"]==$senha){
$name_session=$nome;
$pass_session=$senha;
$ip_session=$HTTP_SERVER_VARS['REMOTE_ADDR'];
$SID=session_id();
echo "<b> Você é: $rstemp['nome'];
echo " - R.A.: $nome";
echo " - Seu IP está sendo registrado como: $ip_session";   ?>
            <br/>

        </p>
    </card>
</wml>
