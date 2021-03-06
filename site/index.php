<!DOCTYPE html>
<html lang="fr-FR">
<head>

	
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

	<link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet"> 

	<link rel="stylesheet" href="style/style-menuBurger.css">
	<link rel="stylesheet" href="style/style-index.css">
	<title>Quid Est Tempestas</title>
</head>
<body>
	<div id="bloc">
		<div id="conteneur1">
			<header>
				<h1>Quid Est Tempestas* ?</h1>
				<p>*Quel est la météo ?</p>
			</header>
		</div>

		<div id='conteneur2'>
			<div id="hamburger">
				<div id="hamburger-content">
					<div id="menu">
						<nav>
							<ul>
								<li><a href="releves/releves.php">RELEVES</a></li></li>
								<li><a href="graphique/graphique.php">GRAPHIQUE DES DONNEES</a></li>
								<li><a href="carte/carte.php">CARTE DES SONDES</a></li>
								<li><a href="utilisateur/connexion.php">SE CONNECTER</a></li>
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
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>