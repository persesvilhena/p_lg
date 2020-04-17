<?php include("../Conexao/conexao.php"); ?>
<link rel="shortcut icon" href="../files/imgs/icone.ico">
<link rel="stylesheet" href="../files/style.css" type="text/css">
<title>Show Me - Logar</title>
<body>
<div id="tudo">
<br><br><br><br><br><br><br>
<div id="conteudo">
<!--<div id="conteudodf" style="position: relative; left: 0px; top: 0px; width: 1000px; height: 60px; text-align: justify;" align="left">-->

<!--</div>-->
<?php
session_start();
$mensagem_erro = "";

if(!empty($_COOKIE["login"]) && !empty($_COOKIE["senha"]) && !empty($_COOKIE["id"])) { // Verifico se já existem os cookies de login. Caso existam, redirecionam o user para a página restrita

	header("Location: index.php?index");
	exit();
	
	
}
if(isset($_POST["logar"])) { // Verifico se o botão de login foi acionado
	
	if(!empty($_POST["login"]) && !empty($_POST["senha"])) { // Verifico se os campos foram preenchidos
		
		$login = $class->antisql($_POST["login"]); // Filtro os dados de login name originados do formulário
		$senha = $class->antisql($_POST["senha"]); // Filtro a senha originada do formulário
		
		$senha_sha1 = sha1($senha); // Codifico a senha inserida para consulta ao SQL
		
		$valida_user = mysql_query("SELECT * FROM user WHERE login='$login' AND senha='$senha'") or die(mysql_error()); // Faço a consulta ao SQL para buscar o usuário com os dados informados pelo form
		
		if(mysql_num_rows($valida_user) > 0) { // Verifico se a consulta retorna alguma linha
			
			$lembrar = $_POST["lembrar"]; // Pego o valor do checkbox 'Lembrar' do formulário
			$info = mysql_fetch_array($valida_user); // Defino a var responsável por trazer as informações do BD
			
			$login = $info["login"]; // Recupero o campo nome do BD
			$pass = $info["senha"]; // Recupero o campo senha do BD
			$id_generico = $info["id"]; // Recupero o campo id do BD
			
			$id = base64_encode($id_generico); // Codifico o id para obter mais segurança
			
			if($lembrar == "1") { // Se o checkbox foi marcado, gravo cookies de 1 ano
				
				// Gravo os cookies responsáveis pelo login
				setcookie("login", $login, time()+31536000); // setcookie(nome_cookie, valor_cookie, tempo_expiracao)
				setcookie("senha", $pass, time()+31536000); // Nesses casos, usei o tempo como anual
				setcookie("id", $id, time()+31536000); // Assim: time()[agora]+[mais]3153600[60*60*24*365]{segs.*min.= 1 hora em segs => 1 hr em segs * 24 hrs = 1 dia => 1 dia * 365 dias = 1 ano}
				
			}
			else { // Caso contrário, gravo cookies que expirarão assim q o browser fechar
				
				// Gravo os cookies responsáveis pelo login
				setcookie("login", $login, 0); // Aqui os cookies expiram assim q o browser fechar
				setcookie("senha", $pass, 0);
				setcookie("id", $id, 0);
			}
			
			// Redireciono para a página restrita
			header("Location: index.php");
			exit();
		}
		else { // Se não retornar, define mensagem de erro
			
			$mensagem_erro = "<b>Dados Incorretos!</b>";
		}
	}
	else { // Caso tenha algum campo em branco, define mensagem de erro
		
		$mensagem_erro = "<b>Por favor, preencha os campos corretamente!</b>";
	}
}
?>
<br>
<div id="conteudo3">
<div align="center">
<form method="post" action="<?php $PHP_SELF; ?>">
<span class="texto">Login: </span><input type="text" name="login" id="input1"><br>
<span class="texto">Senha: </span><input type="password" name="senha" id="input1"><br>
<input type="checkbox" name="lembrar" id="input1"><span class="texto">Manter-me conectado</span>
<button type="submit" name="logar" value="Logar" id="input1">Logar</button>
</form>
<span class="texto"><?php echo $mensagem_erro; ?></span>
</div>
</div>