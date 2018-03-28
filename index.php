<!DOCTYPE html>
<html>
    <head>
        <title>leafletjs</title>
        <!-- Make sure you put this BBEFORE Leaflet's JS -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin=""/>
        <style type="text/css">
            #mapid { height: 900px; }
        </style>
        <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
        <script src="jquery-2.1.1.js"></script>

    </head>
    <body>
        <div id="mapid"></div>
        <h1>ola</h1>
    </body>
    <script type="text/javascript">

        var mymap = L.map('mapid').setView([16.00, -24.00],10);

        
        var basemap = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
            maxZoom: 28,
            subdomains:['mt0','mt1','mt2','mt3']
        });
        basemap.addTo(mymap);

        $.ajax({
            "type":"GET",
            "url":"server.php"
        }).success(function(response){
           for(i=0;i<response.length;i++){
                //var marker = L.marker([14.917522, -23.524902],13).addTo(mymap);
                
                var lat=response[i]["lat"];
                var longit=response[i]["longit"];
                var designacao=response[i]["designacao"];
                var obs=response[i]["obs"];
                var marker = L.marker([lat,longit],13).addTo(mymap);
                L.marker([lat,longit]).addTo(mymap)
                
                .bindPopup(
                            'designacao -> ' + designacao +'<br>'+
                            'obs -> ' + obs +'<br>'+
                            'lat -> ' + lat +'<br>'+
                            'longit -> ' + longit +'<br>'
                        )
                .openPopup();

              
                /*var popup+name = L.popup()
                .setLatLng([x,y])
                .setContent("ANAS")
                .openOn(mymap);   */    
            }
        });

          var littleton = L.marker([15.0465,-23.6033]).bindPopup('This is Littleton, CO.'),
            denver    =     L.marker([15.1256,-23.5652]).bindPopup('This is Denver, CO.'),
            aurora    =     L.marker([15.0565,-23.574]).bindPopup('This is Aurora, CO.'),
            golden    =     L.marker([15.0578,-23.5737]).bindPopup('This is Golden, CO.');
            var cities = L.layerGroup([littleton, denver, aurora, golden]);

            
         /* var jsonData = [
                            {"x":"14.917522","y":"-23.524902","nam":"test1"},
                            {"x":"15.152727","y":"-23.645006","nam":"test2"},
                            {"x":"15.027663","y":"-23.554649","nam":"test3"},
                            {"x":"15.000776","y":"-23.668185","nam":"test4"},
                            {"x":"15.048063","y":"-24.363419","nam":"test5"},
                            {"x":"15.012672","y":"-24.429595","nam":"Sao Jorge"},
                            {"x":"15.017593","y":"-24.404675","nam":"As Campanas"},
                            {"x":"16.6326","y":"-24.3282","nam":"São Nicolau, Ribeira Brava, Nossa Senhora da Lapa, Queimadas"}
                        ];
       
        for(i=0;i<jsonData.length;i++){
            //var marker = L.marker([14.917522, -23.524902],13).addTo(mymap);
            var x=jsonData[i]["x"];
            var y=jsonData[i]["y"];
            var name=jsonData[i]["nam"];
            
            console.log(name)
            var marker = L.marker([x, y],13).addTo(mymap);
            
            /*var popup+name = L.popup()
            .setLatLng([x,y])
            .setContent("ANAS")
            .openOn(mymap);*        
        }

        
        marker.bindPopup("<b>Localizacão</b><br>ANAS").openPopup();
        circle.bindPopup("ANAS");
        polygon.bindPopup("ANAS.");

        

        var wmsLayer = L.tileLayer.wms('http://localhost:8080/geoserver/cite/wms?', {
             layers: 'cite:session_thow'
        }).addTo(mymap);*/


    </script>
</html>