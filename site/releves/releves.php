<?php

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

		// On récupère les mesures
		$testReq = curl_init();
        curl_setopt($testReq, CURLOPT_URL, "localhost:5000/measures");
        curl_setopt($testReq, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($testReq, CURLOPT_CUSTOMREQUEST, "GET");
        $response = curl_exec($testReq);
        curl_close($testReq);
    }


?><!DOCTYPE html>
<html lang="fr-FR">
<head>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

	<link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet"> 

	<link rel="stylesheet" href="../style/style-menuBurger.css">
	<link rel="stylesheet" href="../style/style-index.css">
	<link rel="stylesheet" href="../style/style-releves.css">
	<title>Releves</title>
</head>
<body>
	<div id="bloc">
		<div id="conteneur1">
			<form method="post" action="">
				<p>
					<label for="ville">Choisissez la ville</label><br>
					<select name="ville" id="ville">
						<option value="bordeaux">Bordeaux</option>
						<option value="nice">Nice</option>
					</select>
					</p>
			</form>
			<table class="table table-striped">
				<thead>
       				<tr>
       					<th>Date</th>
            			<th>Température</th>
            			<th>Humidité</th>
			        </tr>
			    </thead>
    			<tbody>
			        <tr>
			        	<td></td>
			            <td></td>
			            <td></td>
			        </tr>
			    </tbody>
			</table>
			<style type="text/css">
				table{
					background-color: white;
				}
			</style>
		</div>

		<div id='conteneur2'>
			<div id="hamburger">
				<div id="hamburger-content">
					<div id="menu">
						<nav>
							<ul>
								<li><a href="../index.php">ACCEUIL</a></li></li>
								<li><a href="../graphique/graphique.php">GRAPHIQUE DES DONNEES</a></li>
								<li><a href="../carte/carte.php">CARTE DES SONDES</a></li>
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
</body>
</html>