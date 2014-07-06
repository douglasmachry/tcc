
	<ul>
		<li><a href=".?a=gerenciamento">Gerenciar</a></li>
		<li><a href=".?a=pedidos">Pedidos</a></li>
		<?php if($_SESSION['perfil'] == 'admin'){ ?>
                    <li><a href=".?a=relatorios">Relat&oacute;rios</a></li> 
		<?php }; ?>
	
		
	</ul>
