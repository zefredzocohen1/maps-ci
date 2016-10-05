<div class="modal-dialog modal-lg" style="width: 80%;">
    <div class="modal-content">
        <div id="headerDiv" class="" style="padding: 0px;border-bottom-width: 0px;">
            <div class="alert alert-warning" id="WarningMessageAdd"></div>
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true" class="close-span">&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title label-vms" id="myModalLabelForm" style="margin-left: 10px; padding-top: 5px; font-size: 20px">Thêm mới</h4>
        </div>
        <div class="modal-body color-bgr-form" style="font-size: 12px;">
            <?php if(!empty($data)):?>
            <div class="row " style="margin-left: 0px; margin-right: 0px;">
                <div id="div-8-col" class="border-graph" style="padding-bottom: 10px">
                    <div class="row" style="margin-left: 0px !important; margin-top: 5px">
                        <div class="col-sm-12 form-horizontal">
                            <h4 class="label-vms" style="background-color: #6d6e70; margin-bottom: -5px;margin-top: 0px;width: 35%;height: 25px;font-size: 16px;">THÔNG TIN CHUNG</h4>
                            <hr style="border-top-color: #939598;">
                            <div class="form-group">
                                <label class="col-sm-1 control-label label-vms">Tên giao lộ<font color="red"><b>*</b></font></label>
                                <div class="col-sm-5">
                                    <input id="vmsName" placeholder="Tên giao lộ" type="text" name="ten-giao-lo" maxlength="100" value="<?php echo !@empty($data->config->name)?$data->config->name:''?>" class="form-control input-sm vms-input">
                                    <input type="hidden" name="device-name" id="device-name" value="<?php echo @!empty($data->config->deviceName)?$data->config->deviceName:''?>"/>
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
                                    <!--<input type="text" placeholder="Thời điểm" id="vmsIp" maxlength="20" class="form-control input-sm vms-input" placeholder="">-->
                                    <select class="form-control input-sm vms-input" id="thoi-diem" name="thoi-diem">
                                        <option value="-1">--Chọn thời điểm--</option>
                                        <option value="0">1</option>
                                        <option value="1">2</option>
                                        <option value="2">3</option>
                                        <option value="3">4</option>
                                        <option value="4">5</option>
                                        <option value="5">6</option>
                                    </select>
                                </div>
                                <label class="col-sm-1 control-label label-vms" name="chien-luoc">Chiến lược<font color="red"><b>*</b></font></label>
                                <div class="col-sm-3">
                                    <!--<input type="text" placeholder="Chiến lược" id="vmsPort" maxlength="6" class="form-control input-sm vms-input" placeholder="">-->
                                    <select  id="chien-luoc" class="form-control input-sm vms-input" name="chien-luoc">
                                        <option value="-1">--Chọn chiến lược--</option>
                                        <option value="0">A</option>
                                        <option value="1">B</option>
                                        <option value="2">C</option>
                                        <option value="3">D</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label label-vms">Txanh<font color="red"><b>*</b></font></label>
                                <?php for($i=0;$i<8;$i++):?>
                                <div class="col-sm-1">
                                    <input type="text" placeholder="Thời điểm" id="vmsTx<?php echo $i?>" name="vmsTx<?php echo $i?>" maxlength="20" class="form-control input-sm vms-input" placeholder="" value="<?php echo @!empty($data->config->mainConfig->active->tx[0])?$data->config->mainConfig->active->tx[0]:''?>">
                                </div>
                                <?php endfor;?>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label label-vms">TSxanh<font color="red"><b>*</b></font></label>
                                <?php for($i=0;$i<8;$i++):?>
                                <div class="col-sm-1">
                                    <input type="text" placeholder="Thời điểm" id="vmsTsx<?php echo $i?>" name="vmsTsx<?php echo $i?>" maxlength="20" class="form-control input-sm vms-input" placeholder="" value="">
                                </div>
                                <?php endfor;?>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label label-vms">Tdibo<font color="red"><b>*</b></font></label>
                                <?php for($i=0;$i<8;$i++):?>
                                <div class="col-sm-1">
                                    <input type="text" placeholder="Thời điểm" id="vmsTdbx<?php echo $i?>" name="vmsTdbx<?php echo $i?>" maxlength="20" class="form-control input-sm vms-input" placeholder="" value="">
                                </div>
                                <?php endfor;?>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label label-vms">TSdibo<font color="red"><b>*</b></font></label>
                                <?php for($i=0;$i<8;$i++):?>
                                <div class="col-sm-1">
                                    <input type="text" placeholder="Thời điểm" id="vmsTsdbx<?php echo $i?>" name="vmsTsdbx<?php echo $i?>" maxlength="20" class="form-control input-sm vms-input" placeholder="" value="">
                                </div>
                                <?php endfor;?>
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
                                    <input type="text" placeholder="Thời điểm" id="vmsStartTime" name="vmsStartTime" maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                </div>
                                <label class="col-sm-1 control-label label-vms">kết thúc<font color="red"><b>*</b></font></label>
                                <div class="col-sm-3">
                                    <input type="text" placeholder="Chiến lược" id="vmsEndTime" name="vmsEndTime" maxlength="6" class="form-control input-sm vms-input" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 form-horizontal">
                            <h4 class="label-vms" style="background-color: #6d6e70;margin-bottom: -5px;margin-top: 0px;width: 30%;height: 25px;font-size: 14px;">Chiến lược ngày</h4>
                            <hr style="border-top-color: #939598;">
                            <div class="form-group">
                                <label class="col-sm-1 control-label label-vms">T2->CN<font color="red"><b>*</b></font>
                                </label>
                                <?php for($i=0;$i<7;$i++):?>
                                    <div class="col-sm-1">
                                        <select id="vmsSectionId" name="chien-luoc-ngay-<?php echo $i+2?>" class="form-control pointer input-sm vms-input">
                                            <option value="-1">--Loại chiến lược--</option>
                                            <option value="0" <?php echo @!empty($data->config->otherConfig->strageties[$i]) && $data->config->otherConfig->strageties[$i]=='A'?' selected':''?>>A</option>
                                            <option value="1"  <?php echo @!empty($data->config->otherConfig->strageties[$i]) && $data->config->otherConfig->strageties[$i]=='B'?' selected':''?>>B</option>
                                            <option value="2"  <?php echo @!empty($data->config->otherConfig->strageties[$i]) && $data->config->otherConfig->strageties[$i]=='C'?' selected':''?>>C</option>
                                            <option value="3"  <?php echo @!empty($data->config->otherConfig->strageties[$i]) && $data->config->otherConfig->strageties[$i]=='D'?' selected':''?>>D</option>
                                        </select>
                                    </div>
                                <?php endfor;?>
                            </div>
                        </div>
                        <div class="col-sm-12 form-horizontal">
                            <h4 class="label-vms" style="background-color: #6d6e70;margin-bottom: -5px;margin-top: 0px;width: 30%;height: 25px;font-size: 14px;">Cài đặt khác</h4>
                            <hr style="border-top-color: #939598;">
                            <div class="form-group">
                                <label class="col-sm-1 control-label label-vms">OPT 1<font color="red"><b>*</b></font>
                                </label>
                                <?php for($i=0;$i<8;$i++):?>
                                    <div class="col-sm-1">
                                        <select id="vmsSectionId" class="form-control pointer input-sm vms-input" name="opt1-<?php echo $i?>">
                                            <option value="-1">--Loại OPT--</option>
                                            <option value="0" <?php echo @!is_null($data->config->otherConfig->option1[$i])&&$data->config->otherConfig->option1[$i]==0?' selected':''?>>Xanh</option>
                                            <option value="1" <?php echo @!is_null($data->config->otherConfig->option1[$i])&&$data->config->otherConfig->option1[$i]==1?' selected':''?>>Đo</option>
                                            <option value="2" <?php echo @!is_null($data->config->otherConfig->option1[$i])&&$data->config->otherConfig->option1[$i]==2?' selected':''?>>Vang</option>
                                            <option value="3" <?php echo @!is_null($data->config->otherConfig->option1[$i])&&$data->config->otherConfig->option1[$i]==3?' selected':''?>>Chu thap</option>
                                            <option value="4" <?php echo @!is_null($data->config->otherConfig->option1[$i])&&$data->config->otherConfig->option1[$i]==4?' selected':''?>>Bo xanh</option>
                                            <option value="5" <?php echo @!is_null($data->config->otherConfig->option1[$i])&&$data->config->otherConfig->option1[$i]==5?' selected':''?>>Bo do</option>
                                        </select>
                                    </div>
                                <?php endfor;?>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label label-vms">OPT 2<font color="red"><b>*</b></font>
                                </label>
                                <?php for($i=0;$i<8;$i++):?>
                                    <div class="col-sm-1">
                                        <select id="vmsSectionId" class="form-control pointer input-sm vms-input" name="opt2-<?php echo $i?>">
                                            <option value="-1">--Loại OPT--</option>
                                            <option value="0" <?php echo @!is_null($data->config->otherConfig->option1[$i])&&$data->config->otherConfig->option1[$i]==0?' selected':''?>>Xanh</option>
                                            <option value="1" <?php echo @!is_null($data->config->otherConfig->option1[$i])&&$data->config->otherConfig->option1[$i]==1?' selected':''?>>Đo</option>
                                            <option value="2" <?php echo @!is_null($data->config->otherConfig->option1[$i])&&$data->config->otherConfig->option1[$i]==2?' selected':''?>>Vang</option>
                                            <option value="3" <?php echo @!is_null($data->config->otherConfig->option1[$i])&&$data->config->otherConfig->option1[$i]==3?' selected':''?>>Chu thap</option>
                                            <option value="4" <?php echo @!is_null($data->config->otherConfig->option1[$i])&&$data->config->otherConfig->option1[$i]==4?' selected':''?>>Bo xanh</option>
                                            <option value="5" <?php echo @!is_null($data->config->otherConfig->option1[$i])&&$data->config->otherConfig->option1[$i]==5?' selected':''?>>Bo do</option>
                                        </select>
                                    </div>
                                <?php endfor;?>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label label-vms">Giờ mở<font color="red"><b>*</b></font></label>
                                <div class="col-sm-2">
                                    <input type="text" placeholder="Thời điểm" id="vmsIp" value="<?php echo @!is_null($data->config->otherConfig->hour_on)&&@!is_null($data->config->otherConfig->minute_on)?$data->config->otherConfig->hour_on.':'.$data->config->otherConfig->minute_on:''?>"  maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                </div>
                                <label class="col-sm-1 control-label label-vms">Giờ tắt<font color="red"><b>*</b></font></label>
                                <div class="col-sm-2">
                                    <input type="text" placeholder="Chiến lược" id="vmsPort" value="<?php echo @!is_null($data->config->otherConfig->hour_off)&&@!is_null($data->config->otherConfig->minute_off)?$data->config->otherConfig->hour_off.':'.$data->config->otherConfig->minute_off:''?>"  maxlength="6" class="form-control input-sm vms-input" placeholder="">
                                </div>
                                <label class="col-sm-1 control-label label-vms">Giờ chớp<font color="red"><b>*</b></font></label>
                                <div class="col-sm-2">
                                    <input type="text" placeholder="Chiến lược" id="vmsPort" value="<?php echo @!is_null($data->config->otherConfig->hour_blink)&&@!is_null($data->config->otherConfig->minute_blink)?$data->config->otherConfig->hour_blink.':'.$data->config->otherConfig->minute_blink:''?>"  maxlength="6" class="form-control input-sm vms-input" placeholder="">
                                </div>
                                <label class="col-sm-1 control-label label-vms">Số pha<font color="red"><b>*</b></font></label>
                                <div class="col-sm-2">
                                    <input type="text" placeholder="Chiến lược" id="vmsPort" value="<?php echo @!is_null($data->config->otherConfig->so_pha)?$data->config->otherConfig->so_pha:''?>" maxlength="6" class="form-control input-sm vms-input" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id= "btnActionDiv" class="row" style="float: right; margin-right: 0px; margin-top: 20px">
                        <button type="button" id="btnAdd"
                                class="btn btn-sm btn-info m-t-n-xs" style="margin-bottom: 0px; margin-right: 5px;color: white !important"
                                data-dismiss="">Start</button>
                        <button type="button" id="btnResetData" 
                                class="btn btn-sm btn-info m-t-n-xs" style="margin-bottom: 0px;margin-right: 5px; color: white !important"
                                data-dismiss="">Stop</button>
                        <button type="button" id="btnAdd"
                                class="btn btn-sm btn-info m-t-n-xs" style="margin-bottom: 0px; margin-right: 5px;color: white !important"
                                data-dismiss="">Toggle</button>
                        <button type="button" id="btnResetData" 
                                class="btn btn-sm btn-info m-t-n-xs" style="margin-bottom: 0px; margin-right: 5px; color: white !important"
                                data-dismiss="">Set time</button>
                        <button type="button" id="btnAdd"
                                class="btn btn-sm btn-info m-t-n-xs" style="margin-bottom: 0px; margin-right: 5px;color: white !important"
                                data-dismiss="">Upload</button>
                        <button type="button" id="btnResetData" 
                                class="btn btn-sm btn-info m-t-n-xs" style="margin-bottom: 0px; margin-right: 5px; color: white !important"
                                data-dismiss="">Download</button>
                        <button type="button" id="btnAdd"
                                class="btn btn-sm btn-danger m-t-n-xs" style="margin-bottom: 0px; margin-right: 5px;color: white !important"
                                data-dismiss="">Cancle</button>
                    </div>
                </div>
            </div>
            <?php endif;?>
        </div>
    </div>
</div>
<?php
if(!empty($data)):
?>
<script>
    var chien_luoc = $('#chien-luoc');
    var thoi_diem = $('#thoi-diem');
chien_luoc.on('change',function(){
    if((parseInt(chien_luoc.val())>=0)&& typeof thoi_diem !='undefine' && parseInt(thoi_diem.val())>=0){
        $.ajax({
            url: '<?php echo base_url().'device/getMainConfig'?>',
            type: "POST",
            dataType: "Json",
            data: {name:'<?php echo @!empty($data->config->deviceName)?$data->config->deviceName:''?>',chien_luoc:chien_luoc.val(),thoi_diem:thoi_diem.val()},
            success: function (data) {
                if(data.success){
                    for(i=0;i<data['dataConfig']['active']['tx'].length;i++){
                        $('#vmsTx'+i).val(data['dataConfig']['active']['tx'][i]);
                    }
                    for(i=0;i<data['dataConfig']['active']['tsx'].length;i++){
                        $('#vmsTsx'+i).val(data['dataConfig']['active']['tsx'][i]);
                    }
                    for(i=0;i<data['dataConfig']['active']['tdbx'].length;i++){
                        $('#vmsTdbx'+i).val(data['dataConfig']['active']['tdbx'][i]);
                    }
                    for(i=0;i<data['dataConfig']['active']['tsdbx'].length;i++){
                        $('#vmsTsdbx'+i).val(data['dataConfig']['active']['tsdbx'][i]);
                    }
                    $('#vmsStartTime').val(data['dataConfig']['active']['hour_on']+ ":"+data['dataConfig']['active']['minute_on']);
                    $('#vmsEndTime').val(data['dataConfig']['active']['hour_off']+ ":"+data['dataConfig']['active']['minute_off']);
                }else{
                    console.log(1111);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(1)
                console.log(errorThrown)
                console.log(textStatus);
            }
        });
    }
});
thoi_diem.on('change',function(){
    if((parseInt(thoi_diem.val())>=0)&& typeof chien_luoc !='undefine' && parseInt(chien_luoc.val())>=0){
        $.ajax({
            url: '<?php echo base_url().'device/getMainConfig'?>',
            type: "POST",
            dataType: "Json",
            data: {name:'<?php echo @!empty($data->config->deviceName)?$data->config->deviceName:''?>',chien_luoc:chien_luoc.val(),thoi_diem:thoi_diem.val()},
            success: function (data) {
                if(data.success){
                    for(i=0;i<data['dataConfig']['active']['tx'].length;i++){
                        $('#vmsTx'+i).val(data['dataConfig']['active']['tx'][i]);
                    }
                    for(i=0;i<data['dataConfig']['active']['tsx'].length;i++){
                        $('#vmsTsx'+i).val(data['dataConfig']['active']['tsx'][i]);
                    }
                    for(i=0;i<data['dataConfig']['active']['tdbx'].length;i++){
                        $('#vmsTdbx'+i).val(data['dataConfig']['active']['tdbx'][i]);
                    }
                    for(i=0;i<data['dataConfig']['active']['tsdbx'].length;i++){
                        $('#vmsTsdbx'+i).val(data['dataConfig']['active']['tsdbx'][i]);
                    }
                    $('#vmsStartTime').val(data['dataConfig']['active']['hour_on']+ ":"+data['dataConfig']['active']['minute_on']);
                    $('#vmsEndTime').val(data['dataConfig']['active']['hour_off']+ ":"+data['dataConfig']['active']['minute_off']);
                }else{
                    console.log(1111);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(1)
                console.log(errorThrown)
                console.log(textStatus);
            }
        });
    }
});
</script>
<?php
endif;
?>