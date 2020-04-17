<?php
$conexao = mysql_connect("localhost","root","369875");
if($conexao){
if(mysql_select_db("projetophp",$conexao)){

}else{
echo "erro sel base";
}
}else{
echo "nao conect";
}
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
class SistemaLogin { // Defino a classe principal do sistema
	
	function antisql($sql) { // Funчуo Anti-SQL
		$sql = get_magic_quotes_gpc() == 0 ? addslashes($sql) : $sql;
		$sql = trim($sql);
		$sql = strip_tags($sql);
		$sql = mysql_escape_string($sql);
		return preg_replace("@(--|\#|\*|;|=)@s", '', $sql);
	}
}
$class = new SistemaLogin;
?>