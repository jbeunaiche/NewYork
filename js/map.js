var lat = "40.784457";
var lon = "-73.963204";
var map = null;


function initMap() {
	map = new google.maps.Map(document.getElementById("map"), {
		center: new google.maps.LatLng(lat, lon),
		zoom: 14,
		
	});
	
	// Nous ajoutons un marqueur
var marker = new google.maps.Marker({
	position: {lat: lat, lng: lon},
	map: map
});
	// Nous appelons la fonction ajax de jQuery
	$.ajax({
		// On pointe vers le fichier l'url
		url : "http://localhost/newyork/index.php?c=map&t=getMonument",
	}).done(function(json){ // Si on obtient une réponse, elle est stockée dans la variable json
		// On construit l'objet monuments à partir de la variable json
		var monuments = JSON.parse(json);
		// On parcourt l'objet monuments
		for(monument in monuments){
			var marker = new google.maps.Marker({
				position: {lat: parseFloat(monuments[monument].lat), lng: parseFloat(monuments[monument].lon)},
				title: monuments[monument].name,
				map: map
			});	
		}
	});
}

window.onload = function(){
				// Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
				initMap(); 
			};
