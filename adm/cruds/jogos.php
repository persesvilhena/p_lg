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
<a href="jogos.php?pag=4" class="botao">Adicionar um novo registro</a>
</div>
<div align="left" style="margin-top: -25px;">
<a href="jogos.php?pag=1" class="botao">Voltar</a>
</div>
<hr size="1" width="750" color="#666666">
<?php
include "../../Conexao/conexao.php";
if(isset($_GET['pag'])){$pag = $_GET['pag'];}else {$pag = 1;}
if(isset($_GET['cod'])){$cod = $_GET['cod'];}
$mensagem = "";




if($pag == 1){
$res1 = mysql_query("SELECT * FROM jogos ORDER BY idjogos desc");
echo "<table border=\"1\" style=\"border-collapse:collapse;border-spacing:0;\"><tr>
<td width=20><span class=\"texto\">ID</span></td>
<td width=300><span class=\"texto\">jogos</span></td>
<td><span class=\"texto\">Detalhes</span></td>
<td><span class=\"texto\">Excluir</span></td>
</tr>";
 while($escrever1=mysql_fetch_array($res1)){
echo "<tr>
<td><span class=\"texto\">" . $escrever1['idjogos'] . "</span></td>
<td><span class=\"texto\"><a href=\"jogos.php?pag=2&cod=" . $escrever1['idjogos'] . "\" class=\"botao\">" . $escrever1['nome'] . "</a></span></td>
<td><span class=\"texto\"><a href=\"jogos.php?pag=5&cod=" . $escrever1['idjogos'] . "\" class=\"botao\">Detalhes</a></span></td>
<td><span class=\"texto\"><a href=\"jogos.php?pag=3&cod=" . $escrever1['idjogos'] . "\" class=\"botao\">Excluir</a></span></td>
</tr>";
}
}





if($pag == 2){
if(isset($_POST["cadastrar"])) {
$idgenero = $class->antisql($_POST["idgenero"]);
$nome = $class->antisql($_POST["nome"]);
$descricao = $class->antisql($_POST["descricao"]);
$idrelacionado = $class->antisql($_POST["idrelacionado"]);
$lancamento = $class->antisql($_POST["lancamento"]);
$desenvolvedora = $class->antisql($_POST["desenvolvedora"]);
$distribuidora = $class->antisql($_POST["distribuidora"]);
$link = $class->antisql($_POST["link"]);

$insert = mysql_query("UPDATE jogos SET idgenero = '$idgenero', nome = '$nome', descricao = '$descricao', idrelacionado = '$idrelacionado', lancamento = '$lancamento', desenvolvedora = '$desenvolvedora', distribuidora = '$distribuidora', link = '$link' where idjogos = '$cod';") or die(mysql_error());

if($insert) {
$mensagem = "<b>Jogo alterado com sucesso!</b><br>";
}else {
$mensagem = "<b>Por favor, preencha os campos corretamente!</b><br>";	
}
}


$res2 = mysql_query("SELECT * FROM jogos where idjogos = '$cod'");
$escrever2 = mysql_fetch_array($res2);
?>
<form method="post" action="<?php $PHP_SELF; ?>">
<span class="texto"><?php echo $mensagem; ?></span>
<span class="texto">
<b>Genero:</b> <select name="idgenero"> <option value="#">Selecione o genero</option>
<?php
$res6 = mysql_query("SELECT * FROM genero order by nomegenero");
while($escrever6=mysql_fetch_array($res6)){
if($escrever6['idgenero'] == $escrever2['idgenero']){
echo "<option value=\"" . $escrever6['idgenero'] . "\" selected>" . $escrever6['nomegenero'] . "</option>";
}else{
echo "<option value=\"" . $escrever6['idgenero'] . "\">" . $escrever6['nomegenero'] . "</option>";
}
}
?>
</select><br>
<b>Nome:</b> <input type="text" name="nome" value="<?php echo $escrever2['nome']; ?>"><br>
<b>Descricao:</b> <input type="text" name="descricao" value="<?php echo $escrever2['descricao']; ?>"><br>
<b>Relacionado:</b> <select name="idrelacionado"> <option value="#">Selecione a franquia</option>
<?php
$res7 = mysql_query("SELECT * FROM relacionado order by nome");
while($escrever7=mysql_fetch_array($res7)){
if($escrever7['idrelacionado'] == $escrever2['idrelacionado']){
echo "<option value=\"" . $escrever7['idrelacionado'] . "\" selected>" . $escrever7['nome'] . "</option>";
}else{
echo "<option value=\"" . $escrever7['idrelacionado'] . "\">" . $escrever7['nome'] . "</option>";
}
}
?>
</select><br>
<b>Lançamento:</b> <input type="text" name="lancamento" value="<?php echo $escrever2['lancamento']; ?>"><br>
<b>Desenvolvedora:</b> <input type="text" name="desenvolvedora" value="<?php echo $escrever2['desenvolvedora']; ?>"><br>
<b>Distribuidora:</b> <input type="text" name="distribuidora" value="<?php echo $escrever2['distribuidora']; ?>"><br>
<b>Link:</b> <input type="text" name="link" value="<?php echo $escrever2['link']; ?>"><br>

<button id="input1" type="submit" name="cadastrar" value="Cadastrar">Alterar</button>
</form>
<?php
}








if($pag == 3){
$apaga = mysql_query("DELETE FROM jogos where idjogos = '$cod';") or die(mysql_error());
if($apaga) {
echo "<script>window.location.href = 'jogos.php?pag=1';</script>";
}else{
echo "<script>alert('Houve um erro!');window.location.href = 'jogos.php?pag=1';</script>";
}
}







if($pag == 4){

if(isset($_POST["cadastrar"])) {
if(!empty($_POST["nome"])) {

$idgenero = $class->antisql($_POST["idgenero"]);
$nome = $class->antisql($_POST["nome"]);
$descricao = $class->antisql($_POST["descricao"]);
$idrelacionado = $class->antisql($_POST["idrelacionado"]);
$lancamento = $class->antisql($_POST["lancamento"]);
$desenvolvedora = $class->antisql($_POST["desenvolvedora"]);
$distribuidora = $class->antisql($_POST["distribuidora"]);
$link = $class->antisql($_POST["link"]);
if (is_uploaded_file($_FILES['imagem']['tmp_name'])){
	if(move_uploaded_file($_FILES['imagem']['tmp_name'],
	'fotos/'.$_FILES['imagem']['name'])){
	$dir = "fotos";
	$imagem = $_FILES['imagem']['name'];
	echo "<img src=$dir/$imagem>";
	$a = $dir."/".$imagem;

$sql = "INSERT INTO jogos (idgenero,nome,descricao,idrelacionado,lancamento,desenvolvedora,distribuidora,link,imagem) VALUES ('$idgenero','$nome','$descricao','$idrelacionado','$lancamento','$desenvolvedora','$distribuidora','$link','$a');";
if(mysql_query($sql)){
echo "Inserido com sucesso!";
}else{
echo "Houve um erro!";
echo $sql;
}
}else{ echo"erro na copia do arquivo";}
}else{ echo"falha no upload do arquivo";}
}
}

echo "
<form method=\"post\" action=\"\" enctype=\"multipart/form-data\">
<span class=\"texto\">" . $mensagem . "</span>

<span class=\"texto\">
<b>Genero:</b> <select name=\"idgenero\"> <option value=\"#\">Selecione o genero</option>";
$res6 = mysql_query("SELECT * FROM genero order by nomegenero");
while($escrever6=mysql_fetch_array($res6)){
echo "<option value=\"" . $escrever6['idgenero'] . "\">" . $escrever6['nomegenero'] . "</option>";
}
echo "
</select><br>
<b>Nome:</b> <input type=\"text\" name=\"nome\"><br>
<b>Descricao:</b> <input type=\"text\" name=\"descricao\"><br>
<b>Relacionado:</b> <select name=\"idrelacionado\"> <option value=\"#\">Selecione a franquia</option>";
$res7 = mysql_query("SELECT * FROM relacionado order by nome");
while($escrever7=mysql_fetch_array($res7)){
echo "<option value=\"" . $escrever7['idrelacionado'] . "\">" . $escrever7['nome'] . "</option>";
}
echo "
</select><br>
<b>Lancamento:</b> <input type=\"text\" name=\"lancamento\"><br>
<b>Desenvolvedora:</b> <input type=\"text\" name=\"desenvolvedora\"><br>
<b>Distribuidora:</b> <input type=\"text\" name=\"distribuidora\"><br>
<b>Link:</b> <input type=\"text\" name=\"link\"><br>
<b>Imagem:</b> <input type=\"file\" name=\"imagem\"><br>
</span>
<button id=\"input1\" type=\"submit\" name=\"cadastrar\" value=\"Cadastrar\">Cadastrar</button>
</form>
";
}





if($pag == 5){
$res5 = mysql_query("SELECT * FROM jogos where idjogos = '$cod'");
$escrever5 = mysql_fetch_array($res5);
$res8 = mysql_query("SELECT * FROM genero where idgenero = '$escrever5[idgenero]'");
$escrever8 = mysql_fetch_array($res8);
$res9 = mysql_query("SELECT * FROM relacionado where idrelacionado = '$escrever5[idrelacionado]'");
$escrever9 = mysql_fetch_array($res9);
echo "
<span class=\"texto\">
<b>ID:</b> " . $escrever5['idjogos'] . "<br>
<b>Genero:</b> " . $escrever8['nomegenero'] . "<br>
<b>Nome:</b> " . $escrever5['nome'] . "<br>
<b>Descricao:</b> " . $escrever5['descricao'] . "<br>
<b>Relacionado:</b> " . $escrever9['nome'] . "<br>
<b>Lancamento:</b> " . $escrever5['lancamento'] . "<br>
<b>Desenvolvedora:</b> " . $escrever5['desenvolvedora'] . "<br>
<b>Distribuidora:</b> " . $escrever5['distribuidora'] . "<br>
<b>Link:</b> " . $escrever5['link'] . "<br>
<b>Imagem:</b> <img src=\"" . $escrever5['imagem'] . "\" width=\"500\">";
echo "</span>";




}
?>
</div>