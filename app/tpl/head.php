<!DOCTYPE html>
<html>
<head>
	<title><?= $title; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?= APP_W.'pub/css/reset.css'; ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="<?= APP_W.'pub/css/m.css'; ?>">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="<?= APP_W.'pub/js/app.js'; ?>"></script>
</head>
<body>
	
	<header class="esquerra">
		<div>
			<h1><a href="<?=APP_W; ?>"><?= $title; ?></a></h1>	
			<form class="ajaxLogin" name="formlog" method="post" action="<?= APP_W.'home/login'; ?>"> 	
				<?php 
					if( (isset($_SESSION['connect'])) && ($_SESSION['connect']!="") ){
						echo '
						<div class="part btnMisAnuncios">
							<a href="'.APP_W.'desktop"><input type="button" value="Publicacions" id="btnDesconectar"></a>
						</div>
						<div class="part">
							<a href="'.APP_W.'perfil/home"><input type="button" value="Proves" id="btnDesconectar"></a>
						</div>
					    <div class="part btnTipo2">
							<a href="'.APP_W.'home/desconectar"><input type="button" value="Desconnecta t" id="btnDesconectar"></a>
						</div>';
					}else{
						echo '<div class="part">
					 
				      		<input type="text" class="" placeholder="Usuari" name="usuario" />
					    </div>

					    <div class="part">
					      
				      		<input type="password" class="" placeholder="Contrasenya" name="contrasena" />
					    </div>
						<div class="part">
							<input type="submit" value="Login" id="logsend">
						</div>
						<div class="part">
							<a href="'.APP_W.'register"><input type="button" value="Registrarse" id="btnRegistro"></a>
						</div>';
					}


		if ((isset($_SESSION['connect'])) && ($_SESSION['connect']!="")){
			if ((isset($_SESSION['usuario'])) && ($_SESSION['usuario']!="") && ($_SESSION['usuario']->rol=="1")){
					echo '<section class="afegit1">
						<div>
							<ul>';
					
					if(strpos($_SERVER['REQUEST_URI'],)){
						echo '

								<li>
									<button onClick="functionusers()" type="" id="gestionUsuarios">Administrar Usuaris</button>
								</li>';
					}else{
						echo '	
								<li> 
									<a href="'.APP_W.'desktopAdmin">
									<input type="button" value="Credencials Administrador" ></a>
								</li>';
					}
					echo'</ul>
						</div>
					</section>';
			}
		}


			    ?>
			</form>	
		</div>
	</header>
