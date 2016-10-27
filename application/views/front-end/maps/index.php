<style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    #map {
        height: 99%;
    }
    .aaa{
        position: relative;
    }
    .controls {
        position: absolute;
        z-index: 99;
        left: 100px;
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    }

    #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
    }

    #pac-input:focus {
        border-color: #4d90fe;
    }

    .pac-container {
        font-family: Roboto;
    }

    #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
    }

    #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
    }

</style>

<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>public/asset/css/custom.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>public/asset/css/its_custom.css"/>
</head>
<body>
<input id="pac-input" class="controls" type="text" placeholder="Search Box">
    <div id="map"></div>
    <div class="modal fade" id="myModal" tabindex="-1" data-keyboard="false" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
    </div>
    <script>
        var markers = [];
        var jArray = [];
        var map;
        function initialize() {
            initMap();
        }
        jArray = <?php echo  (!empty($devicesInfo)) ? json_encode($devicesInfo):  json_encode(array());?>;
        function initMap() {
            var uluru = {lat: 21.030385, lng: 105.787894};
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                maxZoom: 20,
                minZoom: 3,
                center: uluru
            });

            var i = 0;
            var img = '';
            for (i = 0; i < jArray.length; i++) {

                if(jArray[i]['state']==1){
                    img = 'maker-online-lite.png';
                }else if(jArray[i]['state']==0){
                    img = 'maker-offline-lite.png'
                }else{
                    continue;
                }
                markers.push(new google.maps.Marker({
                    position: new google.maps.LatLng(jArray[i]['lat'], jArray[i]['long']),
                    map: map,
                    title: jArray[i]['name'],
                    icon: '<?php echo base_url() ?>public/asset/image/'+img
                }))
            }
            for (i = 0; i < markers.length; i++) {
                markers[i].addListener('click', toggleBounce);

            }
        }

        function toggleBounce() {
            var data = {name:this.title};
        $.ajax({
            url: '<?php echo base_url().'Device/search'?>',
            type: "POST",
            dataType: "Json",
            data: data,
            success: function (data) {
                if(data.success){
                    $('#myModal').html(data.message);
                    $('#myModal').modal('show');
                }else{
                    toast('Có lỗi !',data.message,'error');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                toast('Có lỗi !',errorThrown+': '+textStatus,'error');

            }
        });
        }

        $(document).ready(function(){
            $('#pac-input').autocomplete({
                source: jArray,
                select: function (event, ui) {
                    event.preventDefault();
                    var itemc = ui.item;
                    $('#pac-input').val(itemc.label);
                    if(typeof markers !=undefined && markers.length>=0){
                        for(i=0;i<markers.length;i++){
                            if(markers[i]['position'].lat().toFixed(3)==itemc['lat']&&
                                markers[i]['position'].lng().toFixed(3)==itemc['long']){
                                map.setCenter({lat:itemc['lat'], lng:itemc['long']})
                                markers[i].setAnimation(google.maps.Animation.BOUNCE);
                                setTimeout(function() {
                                    markers[i].setAnimation(null)
                                }, 5000);
                                break;
                            }
                        }
                    }
                    return;
                }
            })
        })
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJj4O6Bf0zPYK4JsaAFHCMTNXg7GYXmd0&callback=initMap">
    </script>
</body>
</html>