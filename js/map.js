
var map = null;



function initMap() {
    var myMap = document.getElementById("map");
    var lat = myMap.dataset.lat;
    var lon = myMap.dataset.lon;
    //console.log("test " + lat + " " + lon);
    map = new google.maps.Map(myMap, {
        center: new google.maps.LatLng(lat, lon),
        zoom: 14,

    });

    var marker = new google.maps.Marker({
        position: {lat: lat, lng: lon},
        map: map
    });


    $.ajax({
        url: "http://localhost/newyork/index.php?c=map&t=getMonument",
    }).done(function (json) {
        var monuments = JSON.parse(json);
        // On parcourt l'objet monuments
        for (monument in monuments) {
            var marker = new google.maps.Marker({
                position: {lat: parseFloat(monuments[monument].lat), lng: parseFloat(monuments[monument].lon)},
                title: monuments[monument].name,
                map: map

            });

            var content = monuments[monument].price;

            var infowindow = new google.maps.InfoWindow({
                content: content
            });

            google.maps.event.addListener(marker,'click',function() {
                infowindow.open(map, marker);

            });


        }
    });

}

window.onload = function () {
    initMap();
};
