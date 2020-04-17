<?php
date_default_timezone_set("Brazil/East");
?>
<?php //include "../engine/protege.php"; ?>
<LINK REL=StyleSheet HREF="../engine/style.css" TYPE="text/css">
<div style="width: 750px; border: 1px solid #cccccc; margin: 0 auto; text-align: left;">
<div align="center">
<a href="../index.php" class="botao">Voltar ao Menu Principal</a>
</div>
<hr size="1" width="750" color="#666666">
<div align="right">
<a href="genero.php?pag=4" class="botao">Adicionar um novo registro</a>
</div>
<div align="left" style="margin-top: -25px;">
<a href="genero.php?pag=1" class="botao">Voltar</a>
</div>
<hr size="1" width="750" color="#666666">
<?php
include "../../Conexao/conexao.php";
if(isset($_GET['pag'])){$pag = $class->antisql($_GET['pag']);}else {$pag = 1;}
if(isset($_GET['cod'])){$cod = $_GET['cod'];}
$mensagem = "";




if($pag == 1){
$res1 = mysql_query("SELECT * FROM genero ORDER BY nomegenero desc");
echo "<table border=\"1\" style=\"border-collapse:collapse;border-spacing:0;\"><tr>
<td width=20><span class=\"texto\">ID</span></td>
<td width=300><span class=\"texto\">Genero</span></td>
<td><span class=\"texto\">Detalhes</span></td>
<td><span class=\"texto\">Excluir</span></td>
</tr>";
 while($escrever1=mysql_fetch_array($res1)){
echo "<tr>
<td><span class=\"texto\">" . $escrever1['idgenero'] . "</span></td>
<td><span class=\"texto\"><a href=\"genero.php?pag=2&cod=" . $escrever1['idgenero'] . "\" class=\"botao\">" . $escrever1['nomegenero'] . "</a></span></td>
<td><span class=\"texto\"><a href=\"genero.php?pag=5&cod=" . $escrever1['idgenero'] . "\" class=\"botao\">Detalhes</a></span></td>
<td><span class=\"texto\"><a href=\"genero.php?pag=3&cod=" . $escrever1['idgenero'] . "\" class=\"botao\">Excluir</a></span></td>
</tr>";
}
}





if($pag == 2){

if(isset($_POST["cadastrar"])) {
if(!empty($_POST["nomegenero"])) {

$nomegenero = $class->antisql($_POST["nomegenero"]);

$insert = mysql_query("UPDATE genero SET nomegenero = '$nomegenero' where idgenero = '$cod';") or die(mysql_error());

if($insert) {
$mensagem = "<b>genero alterado com sucesso!</b><br>";
}
}
else {
$mensagem = "<b>Por favor, preencha os campos corretamente!</b><br>";	
}
}
$res2 = mysql_query("SELECT * FROM genero where idgenero = '$cod'");
$escrever2 = mysql_fetch_array($res2);
?>
<form method="post" action="<?php $PHP_SELF; ?>">
<span class="texto"><?php echo $mensagem; ?></span>

<span class="texto">
<b>Nome:</b> <input type="text" name="nomegenero" value="<?php echo $escrever2['nomegenero']; ?>"><br>

<button id="input1" type="submit" name="cadastrar" value="Cadastrar">Alterar</button>
</form>
<?php
}








if($pag == 3){
$apaga = mysql_query("DELETE FROM genero where idgenero = '$cod';") or die(mysql_error());
if($apaga) {
echo "<script>window.location.href = 'genero.php?pag=1';</script>";
}else{
echo "<script>alert('Houve um erro!');window.location.href = 'genero.php?pag=1';</script>";
}
}







if($pag == 4){

if(isset($_POST["cadastrar"])) {
if(!empty($_POST["nomegenero"])) {

$nomegenero = $class->antisql($_POST["nomegenero"]);

$insert = mysql_query("INSERT INTO genero(nomegenero) VALUES('$nomegenero');") or die(mysql_error());

if($insert) {
$mensagem = "<b>genero cadastrado com sucesso!</b><br>";
}
}
else {
$mensagem = "<b>Por favor, preencha os campos corretamente!</b><br>";	
}
}

echo "
<form method=\"post\" action=\"\">
<span class=\"texto\">" . $mensagem . "</span>

<span class=\"texto\">
<b>Nome:</b> <input type=\"text\" name=\"nomegenero\"><br>

</span>
<button id=\"input1\" type=\"submit\" name=\"cadastrar\" value=\"Cadastrar\">Cadastrar</button>
</form>
";
}





if($pag == 5){
$res5 = mysql_query("SELECT * FROM genero where idgenero = '$cod'");
$escrever5 = mysql_fetch_array($res5);
echo "
<span class=\"texto\">
<b>ID:</b> " . $escrever5['idgenero'] . "<br>
<b>Nome:</b> " . $escrever5['nomegenero'] . "<br>";


}
?>
</div>