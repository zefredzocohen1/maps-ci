<style>
    .line-info-config{
        margin-bottom: 35px;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Thêm thiết bị</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <h2>
                    Form thêm mới thiết bị
                </h2>
                <form id="form" action="#" class="wizard-big">
                    <h1>Thông số thiết bị</h1>
                    <fieldset>
                        <h2>Thông số cơ bản</h2>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label>Modem-id *</label>
                                    <input id="userName" name="modemId" type="text" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Name *</label>
                                    <input id="password" name="nameDev" type="text" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Device-serial *</label>
                                    <input id="confirm" name="serialDev" type="text" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Device-id *</label>
                                    <input id="confirm" name="DeviceId" type="text" class="form-control required">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="text-center">
                                    <div style="margin-top: 20px">
                                        <i class="fa fa-sign-in" style="font-size: 180px;color: #e5e5e5 "></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                    <h1>Config thiết bị</h1>
                    <fieldset>
                        <h2>Thông số chung và cấu hình chính</h2>
                        <div class="row">
                            <div class="form-group line-info-config">
                                <label class="col-sm-2 control-label label-vms">Tên giao lộ<font color="red"><b>*</b></font></label>
                                <div class="col-sm-5">
                                    <input id="vmsName" placeholder="Tên giao lộ" type="text" name="intersection_name" maxlength="100" value="<?php echo !@empty($data->config->name)?$data->config->name:''?>" class="form-control input-sm vms-input">
                                </div>
                                <label class="col-sm-2 control-label label-vms">Ưu tiên</label>
                                <div class="col-sm-3">
                                    <select id="vmsType" name="vmsTypeOrder" class="form-control input-sm vms-input">
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
                            <div class="clearfix"></div>
                            <div class="form-group line-info-config">
                                <label class="col-sm-2 control-label label-vms">Thời điểm<font color="red"><b>*</b></font></label>
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
                                <label class="col-sm-2 control-label label-vms" name="chien-luoc">Chiến lược<font color="red"><b>*</b></font></label>
                                <div class="col-sm-3">
                                    <!--<input type="text" placeholder="Chiến lược" id="vmsPort" maxlength="6" class="form-control input-sm vms-input" placeholder="">-->
                                    <select  id="chien-luoc" class="form-control input-sm vms-input" name="chien-luoc">
                                        <option value="-1">--Chọn chiến lược--</option>
                                        <option value="0">A</option>
                                        <option value="1">B</option>
                                        <option value="2">C</option>
                                        <option value="3">D</option>
                                    </select>
                                    <input type="hidden" name="config_device_stragetiesA" id="config_device_stragetiesA" value='<?php echo @!empty($data->config->mainConfig->stragetiesA)?json_encode($data->config->mainConfig->stragetiesA):''?>'/>
                                    <input type="hidden" name="config_device_stragetiesB" id="config_device_stragetiesB" value='<?php echo @!empty($data->config->mainConfig->stragetiesB)?json_encode($data->config->mainConfig->stragetiesB):''?>'/>
                                    <input type="hidden" name="config_device_stragetiesC" id="config_device_stragetiesC" value='<?php echo @!empty($data->config->mainConfig->stragetiesC)?json_encode($data->config->mainConfig->stragetiesC):''?>'/>
                                    <input type="hidden" name="config_device_stragetiesD" id="config_device_stragetiesD" value='<?php echo @!empty($data->config->mainConfig->stragetiesD)?json_encode($data->config->mainConfig->stragetiesD):''?>'/>
                                </div>
                            </div>
                            <div class="form-group line-info-config">
                                <label class="col-sm-2 control-label label-vms">Txanh<font color="red"><b>*</b></font></label>
                                <?php for($i=0;$i<8;$i++):?>
                                <div class="col-sm-1">
                                    <input type="text" placeholder="Thời điểm" id="vmsTx<?php echo $i?>" name="vmsTx<?php echo $i?>" maxlength="20" class="form-control input-sm vms-input vms-input-tx" placeholder="" value="<?php echo @!empty($data->config->mainConfig->active->tx[0])?$data->config->mainConfig->active->tx[0]:''?>">
                                </div>
                                <?php endfor;?>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group line-info-config">
                                <label class="col-sm-2 control-label label-vms">TSxanh<font color="red"><b>*</b></font></label>
                                <?php for($i=0;$i<8;$i++):?>
                                <div class="col-sm-1">
                                    <input type="text" placeholder="Thời điểm" id="vmsTsx<?php echo $i?>" name="vmsTsx<?php echo $i?>" maxlength="20" class="form-control input-sm vms-input vms-input-tsx" placeholder="" value="">
                                </div>
                                <?php endfor;?>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group line-info-config">
                                <label class="col-sm-2 control-label label-vms">Tdibo<font color="red"><b>*</b></font></label>
                                <?php for($i=0;$i<8;$i++):?>
                                <div class="col-sm-1">
                                    <input type="text" placeholder="Thời điểm" id="vmsTdbx<?php echo $i?>" name="vmsTdbx<?php echo $i?>" maxlength="20" class="form-control input-sm vms-input vms-input-tdbx" placeholder="" value="">
                                </div>
                                <?php endfor;?>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group line-info-config">
                                <label class="col-sm-2 control-label label-vms">TSdibo<font color="red"><b>*</b></font></label>
                                <?php for($i=0;$i<8;$i++):?>
                                <div class="col-sm-1">
                                    <input type="text" placeholder="Thời điểm" id="vmsTsdbx<?php echo $i?>" name="vmsTsdbx<?php echo $i?>" maxlength="20" class="form-control input-sm vms-input vms-input-tsdbx" placeholder="" value="">
                                </div>
                                <?php endfor;?>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group line-info-config">
                                <label class="col-sm-2 control-label label-vms">Tck<font color="red"><b>*</b></font></label>
                                <div class="col-sm-5">
                                    <input type="text" placeholder="Thời điểm" id="vmsFreq" name="vmsFreq" maxlength="20" class="form-control input-sm vms-input vms-input-tck" placeholder="">
                                </div>
                                <label class="col-sm-2 control-label label-vms">Tgt<font color="red"><b>*</b></font></label>
                                <div class="col-sm-3">
                                    <input type="text" placeholder="Chiến lược" id="vmsGt" name="vmsGt" maxlength="6" class="form-control input-sm vms-input vms-input-tgt" placeholder="">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group line-info-config">
                                <label class="col-sm-2 control-label label-vms">Bắt đầu<font color="red"><b>*</b></font></label>
                                <div class="col-sm-5">
                                    <input type="text" placeholder="Thời điểm" id="vmsStartTime" name="vmsStartTime" maxlength="20" class="form-control input-sm vms-input vms-input-start-time" placeholder="">
                                </div>
                                <label class="col-sm-2 control-label label-vms">kết thúc<font color="red"><b>*</b></font></label>
                                <div class="col-sm-3">
                                    <input type="text" placeholder="Chiến lược" id="vmsEndTime" name="vmsEndTime" maxlength="6" class="form-control input-sm vms-input vms-input-end-time" placeholder="">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="clearfix"></div>
                    <h1>Cấu hình khác</h1>
                        <fieldset>
                            <h2>Thông tin cấu hình khác</h2>
                            <div class="row">
                                <div class="form-group line-info-config">
                                <label class="col-sm-2 control-label label-vms">T2->CN<font color="red"><b>*</b></font>
                                </label>
                                <?php for($i=0;$i<7;$i++):?>
                                    <div class="col-sm-1">
                                        <select id="<?php echo 'stragetiesDay['.($i).']';?>" name="chien-luoc-ngay[<?php echo $i+2?>]" class="form-control pointer input-sm vms-input">
                                            <option value="-1">--Loại chiến lược--</option>
                                            <option value="0" <?php echo @!empty($data->config->otherConfig->strageties[$i]) && $data->config->otherConfig->strageties[$i]=='A'?' selected':''?>>A</option>
                                            <option value="1"  <?php echo @!empty($data->config->otherConfig->strageties[$i]) && $data->config->otherConfig->strageties[$i]=='B'?' selected':''?>>B</option>
                                            <option value="2"  <?php echo @!empty($data->config->otherConfig->strageties[$i]) && $data->config->otherConfig->strageties[$i]=='C'?' selected':''?>>C</option>
                                            <option value="3"  <?php echo @!empty($data->config->otherConfig->strageties[$i]) && $data->config->otherConfig->strageties[$i]=='D'?' selected':''?>>D</option>
                                        </select>
                                    </div>
                                <?php endfor;?>
                            </div>
                                <div class="clearfix"></div>
                                <div class="form-group line-info-config">
                                <label class="col-sm-2 control-label label-vms">OPT 1<font color="red"><b>*</b></font>
                                </label>
                                <?php for($i=0;$i<8;$i++):?>
                                    <div class="col-sm-1">
                                        <select id="<?php echo 'option1['.$i.']'?>" class="form-control pointer input-sm vms-input vms-input-option1" name="option1_[<?php echo $i?>]">
                                            <option name="item" value="-1">--Loại OPT--</option>
                                            <option name="item" value="0" <?php echo @!is_null($data->config->otherConfig->option1[$i])&&$data->config->otherConfig->option1[$i]==0?' selected':''?>>Xanh</option>
                                            <option name="item" value="1" <?php echo @!is_null($data->config->otherConfig->option1[$i])&&$data->config->otherConfig->option1[$i]==1?' selected':''?>>Đo</option>
                                            <option name="item" value="2" <?php echo @!is_null($data->config->otherConfig->option1[$i])&&$data->config->otherConfig->option1[$i]==2?' selected':''?>>Vang</option>
                                            <option name="item" value="3" <?php echo @!is_null($data->config->otherConfig->option1[$i])&&$data->config->otherConfig->option1[$i]==3?' selected':''?>>Chu thap</option>
                                            <option name="item" value="4" <?php echo @!is_null($data->config->otherConfig->option1[$i])&&$data->config->otherConfig->option1[$i]==4?' selected':''?>>Bo xanh</option>
                                            <option name="item" value="5" <?php echo @!is_null($data->config->otherConfig->option1[$i])&&$data->config->otherConfig->option1[$i]==5?' selected':''?>>Bo do</option>
                                        </select>
                                    </div>
                                <?php endfor;?>
                            </div>
                                <div class="clearfix"></div>
                            <div class="form-group line-info-config">
                                <label class="col-sm-2 control-label label-vms">OPT 2<font color="red"><b>*</b></font>
                                </label>
                                <?php for($i=0;$i<8;$i++):?>
                                    <div class="col-sm-1">
                                        <select id="<?php echo 'option2['.$i.']';?>" class="form-control pointer input-sm vms-input vms-input-option2" name="option2_[<?php echo $i?>]">
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
                                <div class="clearfix"></div>
                            <div class="form-group line-info-config">
                                <label class="col-sm-2 control-label label-vms">Giờ mở<font color="red"><b>*</b></font></label>
                                <div class="col-sm-2">
                                    <input type="text" placeholder="Thời điểm" id="vmsIp" name="otherStartTime" value="<?php echo @!is_null($data->config->otherConfig->hour_on)&&@!is_null($data->config->otherConfig->minute_on)?$data->config->otherConfig->hour_on.':'.$data->config->otherConfig->minute_on:''?>"  maxlength="20" class="form-control input-sm vms-input" placeholder="">
                                </div>
                                <label class="col-sm-2 control-label label-vms">Giờ tắt<font color="red"><b>*</b></font></label>
                                <div class="col-sm-2">
                                    <input type="text" placeholder="Chiến lược" id="vmsPort" name="otherEndTime" value="<?php echo @!is_null($data->config->otherConfig->hour_off)&&@!is_null($data->config->otherConfig->minute_off)?$data->config->otherConfig->hour_off.':'.$data->config->otherConfig->minute_off:''?>"  maxlength="6" class="form-control input-sm vms-input" placeholder="">
                                </div>
                                <label class="col-sm-2 control-label label-vms">Giờ chớp<font color="red"><b>*</b></font></label>
                                <div class="col-sm-2">
                                    <input type="text" placeholder="Chiến lược" id="vmsPort" name="otherBlinkTime" value="<?php echo @!is_null($data->config->otherConfig->hour_blink)&&@!is_null($data->config->otherConfig->minute_blink)?$data->config->otherConfig->hour_blink.':'.$data->config->otherConfig->minute_blink:''?>"  maxlength="6" class="form-control input-sm vms-input" placeholder="">
                                </div>
                                <label class="col-sm-2 control-label label-vms">Số pha<font color="red"><b>*</b></font></label>
                                <div class="col-sm-2">
                                    <input type="text" placeholder="Chiến lược" id="vmsPort"  name="otherAlpha" value="<?php echo @!is_null($data->config->otherConfig->so_pha)?$data->config->otherConfig->so_pha:''?>" maxlength="6" class="form-control input-sm vms-input" placeholder="">
                                </div>
                            </div>
                            </div>
                        </fieldset>

                </form>
            </div>
        </div>
    </div>

</div>
<script>
    $(document).ready(function () {
        $("#wizard").steps();
        $("#form").steps({
            bodyTag: "fieldset",
            onStepChanging: function (event, currentIndex, newIndex)
            {
                // Always allow going backward even if the current step contains invalid fields!
                if (currentIndex > newIndex)
                {
                    return true;
                }
                console.log(newIndex);
                console.log(currentIndex);
                // Forbid suppressing "Warning" step if the user is to young
                if (newIndex === 3 && Number($("#age").val()) < 18)
                {
                    return false;
                }

                var form = $(this);
                console.log($(".body:eq(" + newIndex + ") label.error", form));
                // Clean up if user went backward before
                console.log('curr: ' + currentIndex);
                console.log('newindex: ' + newIndex);
                if (currentIndex < newIndex)
                {
                    // To remove error styles
                    $(".body:eq(" + newIndex + ") label.error", form).remove();
                    $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                }

                // Disable validation on fields that are disabled or hidden.
                form.validate().settings.ignore = ":disabled,:hidden";

                // Start validation; Prevent going forward if false
                return form.valid();
            },
            onStepChanged: function (event, currentIndex, priorIndex)
            {
                // Suppress (skip) "Warning" step if the user is old enough.
                if (currentIndex === 2 && Number($("#age").val()) >= 18)
                {
                    $(this).steps("next");
                }

                // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                if (currentIndex === 2 && priorIndex === 3)
                {
                    $(this).steps("previous");
                }
            },
            onFinishing: function (event, currentIndex)
            {
                var form = $(this);

                // Disable validation on fields that are disabled.
                // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                form.validate().settings.ignore = ":disabled";

                // Start validation; Prevent form submission if false
                return form.valid();
            },
            onFinished: function (event, currentIndex)
            {
                var form = $(this);

                // Submit form input
                form.submit();
            }
        }).validate({
            errorPlacement: function (error, element)
            {
                element.before(error);
            },
            rules: {
                confirm: {
                    equalTo: "#password"
                }
            }
        });
    });
</script>
