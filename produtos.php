<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="pt-br" > <![endif]--> 
<html class="no-js" lang="pt-br" > 
<head> 
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>Foundation 5</title> 
  <!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. --> 
  <link rel="stylesheet" href="css/normalize.css"> 
  <link rel="stylesheet" href="css/foundation.css"> 
  <!-- If you are using the gem version, you need this only --> 
  <script src="js/vendor/modernizr.js"></script> 
  <style>
   .red{ background-color:red;}
   .blue{ background-color:blue;}
  </style>
</head> 
<body> 
<?php include "topo.php"; ?>
<br>
<div class='row'>
	<nav class='large-3 columns'>
	  <div class='panel'>MENU DE NAVEGAÇÃO</div>
	</nav>
	<section class='large-9 columns'>
	  <div class='panel'>
	  
	  
produtos
	  
	  
	  
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
