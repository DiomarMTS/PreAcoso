function loadMap(){
    var uluru = {lat: -25.363, lng: 131.044};
    var map =  new google.maps.Map(document.getE1ementById( 'map' ) , {
        zoom : 4 ,
        center: uluru
    });
}