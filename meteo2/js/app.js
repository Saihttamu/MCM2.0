var bordeaux = [44.837789, -0.57918];
var nice = [43.700000, 7.250000];
//var paris = [48.856614, 2.3522219];
//création de la map
var mymap = L.map('mapid').setView(bordeaux, 5);

//création du calque images(qui forme la map)
			L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	maxZoom: 19,
   
}).addTo(mymap);
//ajouter un marqueur
var marker1 = L.marker(bordeaux).addTo(mymap);
var marker2 = L.marker(nice).addTo(mymap);
//ou var marker = new L.marker().addTo();
//var marker3 = L.marker(paris).addTo(mymap);
//ajout d'un popup
marker1.bindPopup('<h4>Bordeaux, France.</h4>').openPopup();
marker2.bindPopup('<h4>Nice, France.</h4>');
//.openPopup(); pour ouvrir la fenêtre autoatiquement.
