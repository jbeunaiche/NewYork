var Maps = { // Creation de l'objet Maps avec les propriétés et les valeurs
    lat: 40.784457, // La Latitude
    lng: -73.963204, // La longitude
    markers: [], // tableau de marqueurs
    iconDefault: "", // Icon par défault


    // Méthode pour la carte : 
    initMap: function () {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: this.lat,
                lng: this.lng
            }, // coordonnées de la carte et le zoom
            zoom: 14
        });
    },
};


