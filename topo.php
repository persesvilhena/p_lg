<?php
include "Conexao/conexao.php";
?>
<div style="background: #333333;">
<div class='row'>
	<div class='large-12 columns'>
	  <nav class="top-bar" data-topbar> 
		  <ul class="title-area"> 
			  <li class="name"> <h1><a href="grid.php">Home</a></h1> </li> 
			  <li class="toggle-topbar menu-icon"><a href="#"><span>Menu para celular</span></a></li> 
	      </ul> 
	      <section class="top-bar-section"> 
		   <ul class="right"> 
			   <li class="has-dropdown"> <a href="#">Contato</a> 
			    <ul class="dropdown"> 
					<li><a href="contato.php">Fale conosco</a></li>
			    </ul> 
			   </li> 
		   </ul> 
		   <ul class="left"> 
			   <li class="has-dropdown"><a href="produtos.php">Generos</a>
					<ul class="dropdown">

							  <?php 
	  $sql = mysql_query("select * from genero order by nomegenero;");
	  while($escrever = mysql_fetch_array($sql)){
		echo "<li><a href=genero.php?cod=" . $escrever['idgenero'] . ">" . $escrever['nomegenero'] . "</a></li>";
	  }
	  ?>
					</ul>
				</li>
			   <li><a href="noticias.php">Notícias</a></li>
		   </ul> 
		  </section> 
	  </nav>
	</div>
</div>
</div>
<br>
<div class="row">
	<header class='large-12 columns'>
		<div class='panel'>GAMES</div>
	</header>	
</div>