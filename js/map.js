var Maps = { 
    lat: 40.784457, 
    lng: -73.963204, 
    markers: [], // 
    iconDefault: "", 
 
    initMap: function () {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: this.lat,
                lng: this.lng
            }, 
            zoom: 14
        });
    },
};


