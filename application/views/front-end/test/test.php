<form action="<?php echo base_url().'device/test'?>" method="post" >
<div class="form-group">
<!--    <select name="select[1]">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
    <select name="select[2]">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
    <select name="select[3]">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>-->
    <?php for($i=0;$i<8;$i++):?>
        <div class="col-sm-1">
            <select  class="form-control pointer input-sm vms-input" name="opt2[<?php echo $i?>]">
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
    <label class="col-sm-1 control-label label-vms">Giờ mở<font color="red"><b>*</b></font></label>
    <div class="col-sm-2">
        <input type="text" placeholder="Thời điểm" id="vmsIp" name="name[1]" value="<?php echo @!is_null($data->config->otherConfig->hour_on) && @!is_null($data->config->otherConfig->minute_on) ? $data->config->otherConfig->hour_on . ':' . $data->config->otherConfig->minute_on : '' ?>"  maxlength="20" class="form-control input-sm vms-input" placeholder="">
    </div>
    <label class="col-sm-1 control-label label-vms">Giờ tắt<font color="red"><b>*</b></font></label>
    <div class="col-sm-2">
        <input type="text" placeholder="Chiến lược" id="vmsPort" name="name[2]" value="<?php echo @!is_null($data->config->otherConfig->hour_off) && @!is_null($data->config->otherConfig->minute_off) ? $data->config->otherConfig->hour_off . ':' . $data->config->otherConfig->minute_off : '' ?>"  maxlength="6" class="form-control input-sm vms-input" placeholder="">
    </div>
    <label class="col-sm-1 control-label label-vms">Giờ chớp<font color="red"><b>*</b></font></label>
    <div class="col-sm-2">
        <input type="text" placeholder="Chiến lược" id="vmsPort" name="name[3]" value="<?php echo @!is_null($data->config->otherConfig->hour_blink) && @!is_null($data->config->otherConfig->minute_blink) ? $data->config->otherConfig->hour_blink . ':' . $data->config->otherConfig->minute_blink : '' ?>"  maxlength="6" class="form-control input-sm vms-input" placeholder="">
    </div>
    <label class="col-sm-1 control-label label-vms">Số pha<font color="red"><b>*</b></font></label>
    <div class="col-sm-2">
        <input type="text" placeholder="Chiến lược" id="vmsPort" name="name[4]" value="<?php echo @!is_null($data->config->otherConfig->so_pha) ? $data->config->otherConfig->so_pha : '' ?>" maxlength="6" class="form-control input-sm vms-input" placeholder="">
    </div>
</div>
    <button type="submit">dk</button>
</form>