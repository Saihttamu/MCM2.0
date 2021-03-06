<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];

        $data = json_encode(array(
                "username" => $username,
                "password" => $password,
                "email"    => $email
        ));

        if ($username != "" && $password != "" && $email != "") {
            $testReq = curl_init();
            curl_setopt($testReq, CURLOPT_URL, "localhost:5000/users");
            curl_setopt($testReq, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($testReq, CURLOPT_POST, TRUE); // remove body
			curl_setopt($testReq, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
            curl_setopt($testReq, CURLOPT_POSTFIELDS, $data);
            curl_exec($testReq);
            curl_close($testReq);
            
        }
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
	<link rel="stylesheet" href="../style/style-utilisateur.css">
	<title>S'enregistrer</title>
</head>
<body>
	<div id="bloc">
		<div id="conteneur1">
			<form method="POST" action="#">
				<div class="mb-3">

					<label for="email" class="form-label">Votre email</label><br>
					<input type='text' name='email' id='email' class="form-label"></input><br>

					<label for="username" class="form-label">Votre pseudo</label><br>
					<input type='text' name='username' id='username' class="form-label"></input><br>
				
					<label for="password" class="form-label">Votre mot de passe</label><br>
					<input type='password' name='password' id='password' class="form-label"></input><br>

					<button type="submit" name="Login" class="btn btn-dark">S'enregistrer</button>

					<span class="color"></span>
				</div>
		
			</form>
		</div>

		<div id='conteneur2'>
			<div id="hamburger">
				<div id="hamburger-content">
					<div id="menu">
						<nav>
							<ul>
								<li><a href="../index.php">ACCEUIL</a></li>
								<li><a href="../releves/releves.php">RELEVES</a></li></li>
								<li><a href="../graphique/graphique.php">GRAPHIQUE DES DONNEES</a></li>
								<li><a href="../carte/carte.php">CARTE DES SONDES</a></li>
								
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
