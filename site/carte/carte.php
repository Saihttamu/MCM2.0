<!DOCTYPE html>
<html lang="fr-FR">
<head>

	

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

	<link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet"> 

	<link rel="stylesheet" href="../style/style-menuBurger.css">
	<link rel="stylesheet" href="../style/style-index.css">
	<link rel="stylesheet" href="../style/style-carte.css">

	<!--Pour la carte-->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
		  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
		  crossorigin=""/>
	<title>Quid Est Tempestas</title>
</head>
<body>
	<div id="bloc">

		<div id="mapid"></div>
	
		<div id='conteneur2'>
			<div id="hamburger">
				<div id="hamburger-content">
					<div id="menu">
						<nav>
							<ul>
								<li><a href="../index.php">ACCEUIL</a></li>
								<li><a href="../releves/releves.php">RELEVES</a></li></li>
								<li><a href="../graphique/graphique.php">GRAPHIQUE DES DONNEES</a></li>
								<li><a href="../utilisateur/connexion.php">SE CONNECTER</a></li>
							</ul>
						</nav>
					</div>
				</div>

				<button id="hamburger-button">&#9776;</button>
				
				<div id="hamburger-sidebar">
					<div id="hamburger-sidebar-header"><h1>Quid Est Tempestas ?</h1></div>
				
					<div id="hamburger-sidebar-body"></div>
				</div>

				<div id="hamburger-overlay"></div> 
			</div>			
		</div>
	</div>

	<div id="footer">
		<footer>
			<p><strong>By :</strong> Matthias Braneyre, Clément Rafaneau, Mélina Joum.</p>
		</footer>
	</div>

	<script type="text/javascript" src="../js/main.js"></script>
	<!--Pour la carte-->
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
			integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
		   	crossorigin=""></script>
	<script type="text/javascript" src="../js/app.js"></script>  
</body>
</html>