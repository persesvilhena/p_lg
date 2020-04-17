<?php
date_default_timezone_set("Brazil/East")
?>
<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="pt-br" > <![endif]--> 
<html class="no-js" lang="pt-br" > 
<head> 
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>Games</title> 
  <!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. --> 
  <link rel="stylesheet" href="css/normalize.css"> 
  <link rel="stylesheet" href="css/foundation.css"> 
  <!-- If you are using the gem version, you need this only --> 
  <script src="js/vendor/modernizr.js"></script> 
</head> 
<body> 
<?php include "topo.php"; ?>

<div class='row'>
	<nav class='large-3 columns'>
	  <div class='panel'><a href="http://store.steampowered.com/"><img src="files/imgs/steam.png"></a><a href="http://origin.com/"><img src="files/imgs/origin.png"></a><br></div>
	</nav>
	<section class='large-9 columns'>
	<?php
	if(isset($_GET['cod'])){$cod = $class->antisql($_GET['cod']);}
	  $sql = mysql_query("select * from jogos where idjogos = '$cod';");
	  $escrever = mysql_fetch_array($sql);
	  $sql1 = mysql_query("select * from genero where idgenero = '$escrever[idgenero]';");
	  $escrever1 = mysql_fetch_array($sql1);
	  $sql2 = mysql_query("select * from relacionado where idrelacionado = '$escrever[idrelacionado]';");
	  $escrever2 = mysql_fetch_array($sql2);
	  ?>
	  <div class='panel'>
	  <b>Nome:</b> <?php echo $escrever['nome']; ?><br>
	  <b>Genero:</b> <?php echo $escrever1['nomegenero']; ?><br>
	  <b>Descricao:</b> <?php echo $escrever['descricao']; ?><br>
	  <b>Franquia:</b> <?php echo $escrever2['nome']; ?><br>
	  <b>Lançamento:</b> <?php echo $escrever['lancamento']; ?><br>
	  <b>Desenvolvedora:</b> <?php echo $escrever['desenvolvedora']; ?><br>
      <b>Dstribuidora:</b> <?php echo $escrever['distribuidora']; ?><br>
	  <b>Link:</b> <a href="<?php echo $escrever['link']; ?>"><?php echo $escrever['link']; ?></a><br>
	  <b>Imagem:</b> <br><img src="adm/cruds/<?php echo $escrever['imagem']; ?>" width="500"><br>




	  
	  
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
