<?php // if(!empty($debug)) $this->load->view($debug);  ?>
<?php // exit;  ?>
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

<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>public/asset/css/custom.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>public/asset/css/its_custom.css"/>
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
                                        <label class="col-sm-1 control-label label-vms">Tên giao lộ<font color="red"><b>*</b></font></label>
                                        <div class="col-sm-5">
                                            <input id="vmsName" placeholder="Tên giao lộ" type="text" name="" maxlength="100" value="" class="form-control input-sm vms-input">
                                        </div>
                                        <label class="col-sm-1 control-label label-vms">Ưu tiên<font color="red"><b>*</b></font></label>
                                        <div class="col-sm-3">
                                            <select id="vmsType" class="form-control input-sm vms-input">
                                                <option value="-1">--Loại Ưu tiên--</option>
                                                <option value="0">Auto</option>
                                                <option value="1">Tuyến 1</option>
                                                <option value="2">Tuyến 2</option>
                                                <option value="3">Tuyến 3</option>
                                                <option value="4">Tuyến 4</option>
                                                <option value="5">Tuyến 5</option>
                                                <option value="6">Tuyến 6</option>
                                                <option value="7">Tuyến 7</option>
                                                <option value="8">Tuyến 8</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr style="border-top-color: #939598;">
                                </div>
                                <div class="col-sm-12 form-horizontal">
                                    <div class="form-group">
                                        <div id= "vmsModel" class="col-sm-2 label-vms" style="text-align: right; padding-right: 0px; margin-left: -20px; text-align: center;">Chiến lược giờ</div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label label-vms">Thời điểm<font color="red"><b>*</b></font></label>
                                        <div class="col-sm-5">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <label class="col-sm-1 control-label label-vms">Chiến lược<font color="red"><b>*</b></font></label>
                                        <div class="col-sm-3">
                                            <input type="text" placeholder="Chiến lược" id="vmsPort" maxlength="6" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label label-vms">Txanh<font color="red"><b>*</b></font></label>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label label-vms">TSxanh<font color="red"><b>*</b></font></label>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label label-vms">Tdibo<font color="red"><b>*</b></font></label>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label label-vms">TSdibo<font color="red"><b>*</b></font></label>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label label-vms">Tck<font color="red"><b>*</b></font></label>
                                        <div class="col-sm-5">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <label class="col-sm-1 control-label label-vms">Tgt<font color="red"><b>*</b></font></label>
                                        <div class="col-sm-3">
                                            <input type="text" placeholder="Chiến lược" id="vmsPort" maxlength="6" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label label-vms">Bắt đầu<font color="red"><b>*</b></font></label>
                                        <div class="col-sm-5">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <label class="col-sm-1 control-label label-vms">kết thúc<font color="red"><b>*</b></font></label>
                                        <div class="col-sm-3">
                                            <input type="text" placeholder="Chiến lược" id="vmsPort" maxlength="6" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 form-horizontal">
                                    <h4 class="label-vms" style="background-color: #6d6e70;margin-bottom: -5px;margin-top: 0px;width: 30%;height: 25px;font-size: 14px;">Chiến lược ngày</h4>
                                    <hr style="border-top-color: #939598;">
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label label-vms">T2->CN<font color="red"><b>*</b></font>
                                        </label>
                                        <div class="col-sm-1">
                                            <select id="vmsSectionId" class="form-control pointer input-sm vms-input">
                                                <option value="-1">--Loại chiến lược--</option>
                                                <option value="0">A</option>
                                                <option value="1">B</option>
                                                <option value="2">C</option>
                                                <option value="3">D</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <select id="vmsSectionId" class="form-control pointer input-sm vms-input">
                                                <option value="-1">--Loại chiến lược--</option>
                                                <option value="0">A</option>
                                                <option value="1">B</option>
                                                <option value="2">C</option>
                                                <option value="3">D</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <select id="vmsSectionId" class="form-control pointer input-sm vms-input">
                                                <option value="-1">--Loại chiến lược--</option>
                                                <option value="0">A</option>
                                                <option value="1">B</option>
                                                <option value="2">C</option>
                                                <option value="3">D</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <select id="vmsSectionId" class="form-control pointer input-sm vms-input">
                                                <option value="-1">--Loại chiến lược--</option>
                                                <option value="0">A</option>
                                                <option value="1">B</option>
                                                <option value="2">C</option>
                                                <option value="3">D</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <select id="vmsSectionId" class="form-control pointer input-sm vms-input">
                                                <option value="-1">--Loại chiến lược--</option>
                                                <option value="0">A</option>
                                                <option value="1">B</option>
                                                <option value="2">C</option>
                                                <option value="3">D</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <select id="vmsSectionId" class="form-control pointer input-sm vms-input">
                                                <option value="-1">--Loại chiến lược--</option>
                                                <option value="0">A</option>
                                                <option value="1">B</option>
                                                <option value="2">C</option>
                                                <option value="3">D</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <select id="vmsSectionId" class="form-control pointer input-sm vms-input">
                                                <option value="-1">--Loại chiến lược--</option>
                                                <option value="0">A</option>
                                                <option value="1">B</option>
                                                <option value="2">C</option>
                                                <option value="3">D</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 form-horizontal">
                                    <h4 class="label-vms" style="background-color: #6d6e70;margin-bottom: -5px;margin-top: 0px;width: 30%;height: 25px;font-size: 14px;">Cài đặt khác</h4>
                                    <hr style="border-top-color: #939598;">
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label label-vms">OPT 1<font color="red"><b>*</b></font>
                                        </label>
                                        <div class="col-sm-1">
                                            <select id="vmsSectionId" class="form-control pointer input-sm vms-input">
                                                <option value="-1">--Loại OPT--</option>
                                                <option value="0">Xanh</option>
                                                <option value="1">Đo</option>
                                                <option value="2">Vang</option>
                                                <option value="3">Chu thap</option>
                                                <option value="4">Bo xanh</option>
                                                <option value="5">Bo do</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <select id="vmsSectionId" class="form-control pointer input-sm vms-input">
                                                <option value="-1">--Loại OPT--</option>
                                                <option value="0">Xanh</option>
                                                <option value="1">Đo</option>
                                                <option value="2">Vang</option>
                                                <option value="3">Chu thap</option>
                                                <option value="4">Bo xanh</option>
                                                <option value="5">Bo do</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <select id="vmsSectionId" class="form-control pointer input-sm vms-input">
                                                <<option value="-1">--Loại OPT--</option>
                                                <option value="0">Xanh</option>
                                                <option value="1">Đo</option>
                                                <option value="2">Vang</option>
                                                <option value="3">Chu thap</option>
                                                <option value="4">Bo xanh</option>
                                                <option value="5">Bo do</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <select id="vmsSectionId" class="form-control pointer input-sm vms-input">
                                                <option value="-1">--Loại OPT--</option>
                                                <option value="0">Xanh</option>
                                                <option value="1">Đo</option>
                                                <option value="2">Vang</option>
                                                <option value="3">Chu thap</option>
                                                <option value="4">Bo xanh</option>
                                                <option value="5">Bo do</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <select id="vmsSectionId" class="form-control pointer input-sm vms-input">
                                                <option value="-1">--Loại chiến lược--</option>
                                                <option value="0">A</option>
                                                <option value="1">B</option>
                                                <option value="2">C</option>
                                                <option value="3">D</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <select id="vmsSectionId" class="form-control pointer input-sm vms-input">
                                                <option value="-1">--Loại OPT--</option>
                                                <option value="0">Xanh</option>
                                                <option value="1">Đo</option>
                                                <option value="2">Vang</option>
                                                <option value="3">Chu thap</option>
                                                <option value="4">Bo xanh</option>
                                                <option value="5">Bo do</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <select id="vmsSectionId" class="form-control pointer input-sm vms-input">
                                                <option value="-1">--Loại OPT--</option>
                                                <option value="0">Xanh</option>
                                                <option value="1">Đo</option>
                                                <option value="2">Vang</option>
                                                <option value="3">Chu thap</option>
                                                <option value="4">Bo xanh</option>
                                                <option value="5">Bo do</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <select id="vmsSectionId" class="form-control pointer input-sm vms-input">
                                                <option value="-1">--Loại OPT--</option>
                                                <option value="0">Xanh</option>
                                                <option value="1">Đo</option>
                                                <option value="2">Vang</option>
                                                <option value="3">Chu thap</option>
                                                <option value="4">Bo xanh</option>
                                                <option value="5">Bo do</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label label-vms">OPT 2<font color="red"><b>*</b></font>
                                        </label>
                                        <div class="col-sm-1">
                                            <select id="vmsSectionId" class="form-control pointer input-sm vms-input">
                                                <option value="-1">--Loại OPT--</option>
                                                <option value="0">Xanh</option>
                                                <option value="1">Đo</option>
                                                <option value="2">Vang</option>
                                                <option value="3">Chu thap</option>
                                                <option value="4">Bo xanh</option>
                                                <option value="5">Bo do</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <select id="vmsSectionId" class="form-control pointer input-sm vms-input">
                                                <option value="-1">--Loại OPT--</option>
                                                <option value="0">Xanh</option>
                                                <option value="1">Đo</option>
                                                <option value="2">Vang</option>
                                                <option value="3">Chu thap</option>
                                                <option value="4">Bo xanh</option>
                                                <option value="5">Bo do</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <select id="vmsSectionId" class="form-control pointer input-sm vms-input">
                                                <option value="-1">--Loại OPT--</option>
                                                <option value="0">Xanh</option>
                                                <option value="1">Đo</option>
                                                <option value="2">Vang</option>
                                                <option value="3">Chu thap</option>
                                                <option value="4">Bo xanh</option>
                                                <option value="5">Bo do</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <select id="vmsSectionId" class="form-control pointer input-sm vms-input">
                                                <<option value="-1">--Loại OPT--</option>
                                                <option value="0">Xanh</option>
                                                <option value="1">Đo</option>
                                                <option value="2">Vang</option>
                                                <option value="3">Chu thap</option>
                                                <option value="4">Bo xanh</option>
                                                <option value="5">Bo do</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <select id="vmsSectionId" class="form-control pointer input-sm vms-input">
                                                <option value="-1">--Loại OPT--</option>
                                                <option value="0">Xanh</option>
                                                <option value="1">Đo</option>
                                                <option value="2">Vang</option>
                                                <option value="3">Chu thap</option>
                                                <option value="4">Bo xanh</option>
                                                <option value="5">Bo do</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <select id="vmsSectionId" class="form-control pointer input-sm vms-input">
                                                <option value="-1">--Loại OPT--</option>
                                                <option value="0">Xanh</option>
                                                <option value="1">Đo</option>
                                                <option value="2">Vang</option>
                                                <option value="3">Chu thap</option>
                                                <option value="4">Bo xanh</option>
                                                <option value="5">Bo do</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <select id="vmsSectionId" class="form-control pointer input-sm vms-input">
                                                <option value="-1">--Loại OPT--</option>
                                                <option value="0">Xanh</option>
                                                <option value="1">Đo</option>
                                                <option value="2">Vang</option>
                                                <option value="3">Chu thap</option>
                                                <option value="4">Bo xanh</option>
                                                <option value="5">Bo do</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <select id="vmsSectionId" class="form-control pointer input-sm vms-input">
                                                <option value="-1">--Loại OPT--</option>
                                                <option value="0">Xanh</option>
                                                <option value="1">Đo</option>
                                                <option value="2">Vang</option>
                                                <option value="3">Chu thap</option>
                                                <option value="4">Bo xanh</option>
                                                <option value="5">Bo do</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label label-vms">Giờ mở<font color="red"><b>*</b></font></label>
                                        <div class="col-sm-2">
                                            <input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <label class="col-sm-1 control-label label-vms">Giờ tắt<font color="red"><b>*</b></font></label>
                                        <div class="col-sm-2">
                                            <input type="text" placeholder="Chiến lược" id="vmsPort" maxlength="6" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <label class="col-sm-1 control-label label-vms">Giờ chớp<font color="red"><b>*</b></font></label>
                                        <div class="col-sm-2">
                                            <input type="text" placeholder="Chiến lược" id="vmsPort" maxlength="6" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                        <label class="col-sm-1 control-label label-vms">Số pha<font color="red"><b>*</b></font></label>
                                        <div class="col-sm-2">
                                            <input type="text" placeholder="Chiến lược" id="vmsPort" maxlength="6" class="form-control input-sm vms-input" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id= "btnActionDiv" class="row" style="float: right; margin-right: 0px; margin-top: 20px">
                                <button type="button" id="btnAdd"
                                        class="btn btn-sm btn-info m-t-n-xs" style="margin-bottom: 0px; margin-right: 5px;color: white !important"
                                        data-dismiss="">Start</button>
                                <button type="button" id="btnResetData" 
                                        class="btn btn-sm btn-danger m-t-n-xs" style="margin-bottom: 0px; color: white !important"
                                        data-dismiss="">Stop</button>
                                <button type="button" id="btnAdd"
                                        class="btn btn-sm btn-info m-t-n-xs" style="margin-bottom: 0px; margin-right: 5px;color: white !important"
                                        data-dismiss="">Toggle</button>
                                <button type="button" id="btnResetData" 
                                        class="btn btn-sm btn-danger m-t-n-xs" style="margin-bottom: 0px; color: white !important"
                                        data-dismiss="">Set time</button>
                                <button type="button" id="btnAdd"
                                        class="btn btn-sm btn-info m-t-n-xs" style="margin-bottom: 0px; margin-right: 5px;color: white !important"
                                        data-dismiss="">Upload</button>
                                <button type="button" id="btnResetData" 
                                        class="btn btn-sm btn-danger m-t-n-xs" style="margin-bottom: 0px; color: white !important"
                                        data-dismiss="">Download</button><button type="button" id="btnAdd"
                                        class="btn btn-sm btn-info m-t-n-xs" style="margin-bottom: 0px; margin-right: 5px;color: white !important"
                                        data-dismiss="">Cancle</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var jArray = <?php if (!empty($devicesInfo)) echo json_encode($devicesInfo); ?>;
        function initMap() {
            var uluru = {lat: 21.029692, lng: 105.801643};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                maxZoom: 20,
                minZoom: 12,
                center: uluru
            });
            var markers = [];
            var i = 0;
            for (i = 0; i < jArray.length; i++) {
                markers.push(new google.maps.Marker({
                    position: new google.maps.LatLng(jArray[i]['lat'], jArray[i]['lng']),
                    map: map,
                    title: jArray[i]['title'],
                    icon: '<?php echo base_url() ?>public/asset/image/bus.png',
                    id: i
                }))
            }
            for (i = 0; i < markers.length; i++) {
                markers[i].addListener('click', toggleBounce);
            }
        }
        function toggleBounce() {
            console.log(this.position.lat());
            $('#myModal').modal('show');
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJj4O6Bf0zPYK4JsaAFHCMTNXg7GYXmd0&callback=initMap">
    </script>
</body>
</html>