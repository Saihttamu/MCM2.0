<!DOCTYPE html>
<html lang="fr-FR">
<head>


	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

	<link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet"> 

	
	<link rel="stylesheet" href="../style/style-menuBurger.css">
	<link rel="stylesheet" href="../style/style-graphique.css">

	<!--Pour le graphique-->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.min.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

	<title>Graphique</title>
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
			<div id="graphique">
				<canvas id="myChart" width="400" height="400">   
					<script>
						var ctx = document.getElementById('myChart').getContext('2d');
						var myChart = new Chart(ctx, {
						 	type: 'line',
							data: {
							  	labels : [1, 2, 3, 4],
							  	datasets: [{
							    	label: 'Température',
							    	data: [25, 22, 26, 28],
							    	borderColor: 'rgb(255,0,0)',
							    	backgroundColor: 'rgb(255,0,0)',
							    	yAxisID: 'y',
							  	},
							{
								    label: 'Humidité',
								    data: [70, 80, 50, 65],
								    borderColor: 'rgb(0,255,255)',
								    backgroundColor: 'rgb(0,255,255)',
								    yAxisID: 'y1',
							 	}]
							},
							options: {
								responsive: true,
								interaction: {
									mode: 'index',
									intersect: false,
								},
								stacked: false,
								plugins: {
									      	title: {
										        display: true,
										        text: 'Chart.js Line Chart - Multi Axis'
									      	}
									    },
								scales: {
									y: {
									    type: 'linear',
									    display: true,
									    position: 'left',
									},
									y1: {
									    type: 'linear',
									    display: true,
									    position: 'right',
								// grid line settings
										grid: {
											drawOnChartArea: false, // only want the grid lines for one axis to show up
										},
								    },
								}
							}
						});
					</script>
				</canvas>
			</div>
			<div class="box">
  				<input type="checkbox"id="checkbox" />

	  			<div class="menu">
				    <a href="#">
				      	<div class="menuItems">
				      		<a target="_blank" title="Linkedin" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=" rel="nofollow" onclick="javascript:window.open(this.href, '','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=450,width=650');
				      		return false;">
				      		<i class="fab fa-linkedin-in"></i>
				      	</a>	
				      	</div>
				      	<a href="#">
			     		<div class="menuItems">
			     			<a target="_blank" title="Whatsapp" href="https://wa.me/?text=" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=700');
				        	return false;">
				        	<i class="fab fa-whatsapp"></i></a>
			      		</div><!--whatsapp://send?text=-->
			    	</a><!--https://wa.me/?text=${postTitle} ${postUrl}`-->
				    </a>
				    <a href="#">
				      	<div class="menuItems">
				        	<a target="_blank" title="Facebook" href="https://www.facebook.com/sharer.php?u=" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=700');
				        		return false;">
				        		<i class="fab fa-facebook"></i>
				        	</a>
				      	</div>
				    </a>
				    <a href="#">
				      	<div class="menuItems">
				      		<a target="_blank" title="Envoyer par mail" href="mailto:?Graphique température/humidité&amp;Body=Graphique%20température%20/%20humidité%20 " rel="nofollow">
				      			<i class="fas fa-envelope-open-text"></i>
				      		</a>
				        	
				      	</div>
				    </a>
				    <a href="#">
				      	<div class="menuItems">
				      		<!--https://bitly.com/  - aller sur ce lien pour raccourcir l'url-->
				        	<a target="_blank" title="Twitter" href="https://twitter.com/share?url=https://" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=700');
				        	return false;">
				        	<i class="fab fa-twitter"></i>
				        </a>
				      	</div>
				    </a>
		  		</div>
			</div>
		</div>
		
		<div id='conteneur2'>
			<div id="hamburger">
				<div id="hamburger-content">
					<div id="menu">
						<nav>
							<ul>
								<li><a href="../index.php">ACCEUIL</a></li>
								<li><a href="../releves/releves.php">RELEVES</a></li></li>
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
	</div>
	<script type="text/javascript" src="../js/main.js"></script>
</body>
</html>