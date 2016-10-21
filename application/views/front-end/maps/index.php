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

</style>

<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>public/asset/css/custom.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>public/asset/css/its_custom.css"/>
</head>
<body>
    <div id="map"></div>
    <div class="modal fade" id="myModal" tabindex="-1" data-keyboard="false" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true"> 
    </div>
    <script>
        var jArray = <?php echo  (!empty($devicesInfo)) ? json_encode($devicesInfo):  json_encode(array());?>;
        console.log(jArray);
        function initMap() {
            var uluru = {lat: 21.030385, lng: 105.787894};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                maxZoom: 20,
                minZoom: 3,
                center: uluru
            });
            var markers = [];
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
        $(document).ajaxComplete(function () {
//            $("#titleCheck").change(function () {
//                $("input:checkbox").prop('checked', $(this).prop("checked"));
//            });
        });
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJj4O6Bf0zPYK4JsaAFHCMTNXg7GYXmd0&callback=initMap">
    </script>
</body>
</html>