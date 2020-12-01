var mymap = L.map('mapid').setView([18.9902, 73.1277], 16);

        var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
                
                // Adding layer to the map
                mymap.addLayer(layer);

        var marker = L.marker([18.9902, 73.1277]).addTo(mymap);

        var circle = L.circle([18.9902, 73.1277], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 100
        }).addTo(mymap);

        marker.bindPopup("<b>Pillai College of Engineering</b><br>New Panvel").openPopup();

        var popup = L.popup();

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("You clicked the map at " + e.latlng.toString())
                .openOn(mymap);
        }

        mymap.on('click', onMapClick);