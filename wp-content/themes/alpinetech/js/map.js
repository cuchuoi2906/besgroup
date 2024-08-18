function initMap1() {
	var uluru = {
		lat: 35.369986,
		lng: 139.225973
	};
	var map = new google.maps.Map(document.getElementById('jp-maxp'), {
		zoom: 17,
		center: uluru
	});
	var marker = new google.maps.Marker({
		position: uluru,
		map: map
	});
	var contentString = '';
	var infowindow = new google.maps.InfoWindow({
		//content: contentString
	});
	//infowindow.open(map, marker);
}
