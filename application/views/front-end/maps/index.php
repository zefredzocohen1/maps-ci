<?php // if(!empty($debug)) $this->load->view($debug); ?>
<?php // exit; ?>
<style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    #map {
        height: 100%;
    }
    .aaa{
        position: relative;
    }

</style>

<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>public/asset/css/custom.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>public/asset/css/its_custom.css"/>
</head>
<body>
    <div id="map"></div>
    <div class="modal fade" id="myModal" data-keyboard="false"
         tabindex="-1" role="dialog" data-backdrop="static"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="width: 80%;">
            <div class="modal-content">
                <div id="headerDiv" class=""
                     style="padding: 0px;border-bottom-width: 0px;">
                    <div class="alert alert-warning" id="WarningMessageAdd"></div>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true" class="close-span">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title label-vms" id="myModalLabelForm" style="margin-left: 10px; padding-top: 5px; font-size: 20px">Thêm mới</h4>
                </div>

                <div class="modal-body color-bgr-form" style="font-size: 12px;">
                    <div class="row " style="margin-left: 0px; margin-right: 0px;">
                        <div id="div-8-col" class="border-graph" style="padding-bottom: 10px">
                            <div class="row" style="margin-left: 0px !important; margin-top: 5px">
                                <div class="col-sm-12 form-horizontal">
                                    <h4 class="label-vms" style="background-color: #6d6e70; margin-bottom: -5px;margin-top: 0px;width: 35%;height: 25px;font-size: 16px;">THÔNG TIN CHUNG</h4>
                                    <hr style="border-top-color: #939598;">
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label label-vms">Tên<font color="red"><b>*</b></font></label>
                                        <div class="col-sm-5">
                                            <input id="vmsName" placeholder="Nhập tên bảng" type="text" name="" maxlength="100" value="" class="form-control input-sm vms-input">
                                        </div>
                                        <label class="col-sm-1 control-label label-vms">Loại<font color="red"><b>*</b></font></label>
                                        <div class="col-sm-3">
                                            <select id="vmsType" class="form-control input-sm vms-input">
                                                <option value="-1">--Loại biển--</option>
                                                <option value="0">Biển báo</option>
                                                <option value="1">Biển chỉ dẫn</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label label-vms">IP<font color="red"><b>*</b></font></label>
                                        <div class="col-sm-5">
                                            <input type="text" placeholder="Nhập IP" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <label class="col-sm-1 control-label label-vms">Port<font color="red"><b>*</b></font></label>
                                        <div class="col-sm-3">
                                            <input type="text" placeholder="Nhập port" id="vmsPort" maxlength="6" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-1 label-vms" style="text-align: right; padding-left: 0px">Mô tả</div>
                                        <div class="col-sm-11" style="">
                                            <textarea id="vmsDesc" placeholder="Nhập mô tả" name="" rows="1" maxlength="200" class="form-control input-sm vms-input"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label label-vms">Bảng<font color="red"><b>*</b></font></label>
                                        <div class="col-sm-5">
                                            <select id="vmsVesionId" class="form-control input-sm vms-input">
                                            </select>
                                        </div>
                                    </div>
                                    <hr style="border-top-color: #939598;">
                                </div>
                                <div class="col-sm-12 form-horizontal">
                                    <div class="form-group">
                                        <div id= "vmsModel" class="col-sm-2 label-vms" style="text-align: right; padding-right: 0px; margin-left: -20px; text-align: center;">Model: ABC</div>
                                        <div id="vmsColor" class="col-sm-2 label-vms" style="text-align: right; padding-left: 0px; padding-right: 0px; margin-left: 10px; text-align: center;">Màu sắc: đa sắc</div>
                                        <div id="vmsVendor" class="col-sm-3 label-vms" style="text-align: right; padding-left: 5px; padding-right: 0px; text-align: center;">Nhà cung cấp: Sam Sung</div>
                                        <div id="vmsWidthx" class="col-sm-2 label-vms" style="text-align: right; padding-left: 5px; padding-right: 0px; text-align: center;">Rộng: 100 cm</div>
                                        <div id="vmsHeighx" class="col-sm-3 label-vms" style="padding-left: 5px; padding-right: 0px; text-align: center;">&nbsp;&nbsp; Cao: 56 cm</div>
                                    </div>
                                </div>
                                <div class="col-sm-12 form-horizontal">
                                    <h4 class="label-vms" style="background-color: #6d6e70;margin-bottom: -5px;margin-top: 0px;width: 30%;height: 25px;font-size: 14px;">THÔNG TIN TUYẾN</h4>
                                    <hr style="border-top-color: #939598;">
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label label-vms">Tuyến<font color="red"><b>*</b></font></label>
                                        <div class="col-sm-5">
                                            <select id="vmsRoadId" class="form-control pointer input-sm vms-input"></select>
                                        </div>
                                        <label class="col-sm-1 control-label label-vms">Section<font color="red"><b>*</b></font>
                                        </label>
                                        <div class="col-sm-5">
                                            <select id="vmsSectionId" class="form-control pointer input-sm vms-input"></select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label label-vms">Link<font color="red"><b>*</b></font></label>
                                        <div class="col-sm-5">
                                            <select id="vmsLinkId" class="form-control pointer input-sm vms-input"></select>
                                        </div>
                                        <label class="col-sm-1 control-label label-vms">Làn<font color="red"><b>*</b></font></label>
                                        <div class="col-sm-5">
                                            <select id="vmsLaneId" class="form-control pointer input-sm vms-input">
                                                <option value="-1">--Chọn làn--</option>
                                                <option value="1">Làn 1</option>
                                                <option value="2">Làn 2</option>
                                                <option value="3">Làn 3</option>
                                                <option value="4">Làn 4</option>
                                                <option value="5">Làn 5</option>
                                                <option value="6">Làn 6</option>
                                                <option value="7">Làn 7</option>
                                                <option value="8">Làn 8</option>
                                                <option value="9">Làn 9</option>
                                                <option value="10">Làn 10</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label label-vms">Kinh độ</label>
                                        <div class="col-sm-2">
                                            <input id="vmsLongitude" placeholder="Nhập kinh độ" type="text" name="" value="" class="form-control input-sm vms-input">
                                        </div>
                                        <label class="col-sm-1 control-label label-vms">Vĩ độ</label>
                                        <div class="col-sm-2">
                                            <input id="vmsLatitude" placeholder="Nhập vĩ độ" type="text" name="" value="" class="form-control input-sm vms-input">
                                        </div>
                                        <label class="col-sm-1 control-label label-vms">Vị trí<font color="red"><b>*</b></font></label>
                                        <div class="col-sm-5">
                                            <label class="col-sm-1 control-label label-vms">KM</label>
                                            <div class="col-sm-5">
                                                <input id="vmsPositionFirst" type="text" maxlength="3" class="form-control input-sm vms-input">
                                            </div>
                                            <label class="col-sm-1 control-label label-vms" style="margin-left: -20px;">+</label>
                                            <div class="col-sm-5">
                                                <input id="vmsPositionSecond" type="text" maxlength="3" class="form-control input-sm vms-input">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id= "btnActionDiv" class="row" style="float: right; margin-right: 0px; margin-top: 20px">
                                <button type="button" id="btnAdd"
                                        class="btn btn-sm btn-info m-t-n-xs" style="margin-bottom: 0px; margin-right: 5px;color: white !important"
                                        data-dismiss="">Lưu lại</button>
                                <button type="button" id="btnResetData" 
                                        class="btn btn-sm btn-danger m-t-n-xs" style="margin-bottom: 0px; color: white !important"
                                        data-dismiss="">Xóa dữ liệu</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>

        // This example displays a marker at the center of Australia.
        // When the user clicks the marker, an info window opens.
        var jArray = <?php if (!empty($devicesInfo)) echo json_encode($devicesInfo); ?>;
        console.log(jArray[0]['lat']);

        function initMap() {
            var uluru = {lat: 21.029692, lng: 105.801643};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                maxZoom: 20,
                minZoom: 12,
                center: uluru
            });

            var contentString = 'aaaaa';

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });
            var makers = new google.maps.Marker();
            var i=0;
            for (i = 0; i < jArray.length; i++) {
                console.log(i);
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(jArray[i]['lat'], jArray[i]['lng']),
                    map: map,
                    title: jArray[i]['title'],
                    icon: '<?php echo base_url() ?>public/asset/image/bus.png',
                    id: i
                }).addListener('click', function () {
                    console.log(marker);
                    $.ajax({
                        url: '<?php echo base_url() ?>device/ajax_search',
                        type: "post",
                        dataType: "json",
                        data: {
                            'id': 1,
                        },
                        success: function (data) {
                            console.log(data)
//                            infowindow.setContent('<?php // $this->load->view('front-end/block/view_maker') ?>');
//                            console.log('<?php // $this->load->view('front-end/block/view_maker') ?>');
//                            infowindow.open(map, marker);
                            $('#myModal').modal('show');
                        }
                    });

                });
            }
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJj4O6Bf0zPYK4JsaAFHCMTNXg7GYXmd0&callback=initMap">
    </script>
</body>
</html>