<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="pt-br" > <![endif]--> 
<html class="no-js" lang="pt-br" > 
<head> 
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>Games - fale conosco</title> 
  <!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. --> 
  <link rel="stylesheet" href="css/normalize.css"> 
  <link rel="stylesheet" href="css/foundation.css"> 
  <!-- If you are using the gem version, you need this only --> 
  <script src="js/vendor/modernizr.js"></script> 
</head> 
<body> 
<?php include "topo.php"; ?>
<?php
if(isset($_POST["cadastrar"])) {
$nome = $_POST['nome'];
$email = $_POST['email'];
$fone = $_POST['fone'];
$uf = $_POST['uf'];
$cidade = $_POST['cidade'];
$mensagem = $_POST['mensagem'];

$sql = "insert into formcontato (nome,email,fone,estado,cidade,mensagem) values ('$nome','$email','$fone','$uf','$cidade','$mensagem')";
if(mysql_query($sql)){
echo "cadastrado";
}else{
echo "erro";
}
}
?>
<br>
<div class='row'>
	<nav class='large-3 columns'>
	  <div class='panel'>MENU DE NAVEGAÇÃO</div>
	</nav>
	<section class='large-9 columns'>
	  <div class='panel'>
	  
	  <form data-abide method="post" action="<?php $PHP_SELF; ?>">
  <!--<fieldset>
    <legend>Fale Conosco</legend>-->

    <div class="row">
      <div class="large-12 columns">
        <label for="nome">Nome <small>obrigatório</small>
          <input type="text" id="nome" placeholder="Digite seu nome" name="nome" required>
        </label>
        <small class="error">O campo nome é obrigatório</small>
      </div>
      <div class="large-12 columns">
        <label for="email">Email <small>obrigatório</small>
          <input type="email" id="email" placeholder="Digite seu Email" name="email" required>
        </label>
        <small class="error">O campo email é obrigatório</small>
      </div>
    </div>

    <div class="row">
      <div class="large-12 columns">
        <label for="fone">Fone
          <input type="text" id="fone" placeholder="Digite seu telefone" pattern="alpha_numeric" name="fone">
        </label>
        <small class="error">Digite um número de telefone válido</small>
      </div>
    </div>

    <div class="row">

      <div class="large-6 columns">
        <div class="row collapse">
          <label for="uf">Estado: <small>obrigatório</small>
            <select id="uf" class="medium" name="uf" required>
              <option value="">Selecione um estado</option>
              <option value="MG">Minas Gerais</option>
              <option value="RJ">Rio de Janeiro</option>
              <option value="SP">São Paulo</option>
            </select>
          </label>
          <small class="error">Selecione um estado</small>
        </div>
      </div>
      <div class="large-6 columns">
        <div class="row collapse">
          <label for="cidade">Cidade: <small>obrigátorio</small>
            <select id="cidade" class="medium" name="cidade" required>
              <option value="">Selecione uma cidade</option>
              <option value="guaxupe">Guaxupé</option>
              <option value="juruaia">Juruaia</option>
              <option value="montebelo">Monte Belo</option>
              <option value="muzambinho">Muzambinho</option>
            </select>
          </label>
          <small class="error">Selecione uma cidade</small>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="large-12 columns">
        <label for="mensagem">Mensagem: </label>
        <textarea id="mensagem" name="mensagem" placeholder="Digite uma mensagem"></textarea>
      </div>
    </div>

    <div class="row" align="right">
      <div class="large-12 columns">
		<button type="reset" class="small button green">Limpar</button>
        <button type="submit" class="small button green" name="cadastrar">Enviar</button>
      </div>
    </div>

 <!-- </fieldset>-->
</form>
	  
	  
	  </div>
	</section>
</div>

<?php include "rodape.php"; ?>
 
 
 <script src="js/vendor/jquery.js"></script> 
 <script src="js/foundation.min.js"></script> 
 <script> 
 $(document).foundation({
  orbit: {
    animation: 'slide',
    timer_speed: 2000,
    pause_on_hover: true,
    animation_speed: 500,
    navigation_arrows: true,
    bullets: false
  }
});
 </script> 
</body> </html>
