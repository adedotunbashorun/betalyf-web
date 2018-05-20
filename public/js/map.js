var icons = { parking: { icon: '/web/img/marker.png' } };

$(document).ready(function() {
    geoLocationInit();
    //infoWindow = new google.maps.InfoWindow;
});

function geoLocationInit() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(success, fail);
    } else {
        alert("Browser not supported");
    }

}

function success(position) {
    console.log(position);
    var latval = position.coords.latitude;
    var lngval = position.coords.longitude;
    myLatLng = new google.maps.LatLng(latval, lngval);
    createMap(myLatLng);
    // nearbySearch(myLatLng, "school");
    searchHospital(latval,lngval);
}

function fail() {
    var latval = 9.0612;
    var lngval = 7.4224;
    myLatLng = new google.maps.LatLng(latval, lngval);
    createMap(myLatLng);
    searchHospital(latval,lngval);
    alert("it fails");
}
    //Create Map
function createMap(myLatLng) {
    map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        zoom: 10,
        mapTypeId: "roadmap",
        styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#c6c6c6"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#dde6e8"},{"visibility":"on"}]}]
        //mapTypeId: 'terrain'
    });
    map.setTilt(45);
    var marker = new google.maps.Marker({
        position: myLatLng,
        //map: map
    });
    var contentString = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading">Welcome</h1>'+
        '<div id="bodyContent">'+
        '<p><b>State Location App </b>, this application is to, give you ' +
        'information about the health centers around you '+
        'Yo can also locate one for your friend far away and near just select a location'+
        '.</p>'+
        '<p>Attribution: State Location Map, <a href="/">'+
        'State Location Map</a> '+
        '.</p>'+
        '</div>'+
        '</div>';
    var infoWindow = new google.maps.InfoWindow({
        content : contentString,
        maxWidth: 200
    });
    google.maps.event.addListener(marker,'click',function(){
        map.setCenter(marker.getPosition());
        infoWindow.open(map,marker);
    });
    google.maps.event.addListener(map, 'click', function() {
            infoWindow.close();
        });
    
}

function createMarker(latlng, description,title,icons) {
   // markers.length= 0;
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        icon: icons,
        title: title
    });
    // markers.push(marker);
    // var markerCluster = new MarkerClusterer(map, markers,
    //             {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
        
    var InfoWindows = new google.maps.InfoWindow({});

    marker.addListener('mouseover', function() {
        InfoWindows.open(map, this);
        InfoWindows.setContent(description);
    });    
}

function searchHospital(lat,lng) {
    $.ajax({
        url: MAPLOCATION,
        method: "GET",
        data: {
            '_token': TOKEN,
            'lat': lat,
            'lng' : lng
        },
        success: function(response) {
            console.log(response.dataset);

            response.dataset.forEach(function(airport) {
                var glatval = airport.position.lat;
                var glngval = airport.position.lng;
                var description = airport.content; 
                var id = airport.id;
                var title = airport.title;
                var icon = icons[airport.icon].icon;
                var GLatLng = new google.maps.LatLng(glatval, glngval);
                createMarker(GLatLng,description,title,icon);
            });
        }
    });
}

var GetLocal = function(state_id) {
    $("#loading").show();

    $.ajax({
        url: LOCAL_GOVT,
        method: "GET",
        data: {
            '_token': TOKEN,
            'state_id': state_id
        },
        success: function(rst) {
            $("#loading").hide();
            $("#locals").addClass("col-md-6");
            $("#locals").fadeIn();
            $("#locals").html(rst);
            $("#local_label").hide();
        },
        error: function(jqXHR, textStatus, errorMessage) {
            $("#loading").hide();
            //toastr.error(errorMessage);
        }
    });
}

$("#state_id").on("change", function() {
    GetLocal($("#state_id").val());
});
