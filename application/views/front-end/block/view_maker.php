<style>
    .common_info{
        font-weight: bold;
    }
    .common_info *{
        float: left;
    }
    .border-graph {
        border-style: solid !important;
        border-width: thin !important;
        border-color: #939598 !important;
    }
    .body_maker{
        padding: 15px;
    }
    .color-bgr-form {
        background-color: #6d6e71 !important;
    }
    .common_info .label_common{
        width: 90px;
        padding: 0px 5px;
        margin: 0px 5px;
    }
    .chien_luoc_ngay .label_common{
        float: left;
    }
    .common_info input, .common_info select{
        width: auto;
        padding: 0px 5px;
        margin: 0px 5px;
    }
    .comm-clg .lbl-spin{
        width: 83px;
    }
    .comm-clg .chien-luoc-gio, .comm-clg .lbl-spin{
        float: left;
    }
    .comm-clg .chien-luoc-gio{
        margin: 0px 5px;
        padding: 0px 5px;
    }
    .chien-luoc-gio .spinner{
        float: left;
    }
    .chien_luoc_ngay .lbl_chien_luoc_ngay{
        margin-bottom: 10px;
    }
    .clt_chien_luoc{
        width: 60px;
    }
    .mgl_basic{
        margin-left: 10px; 
    }
    .mgr_basic{
        margin-right: 10px;
    }
    .control hr{
        margin: 0px 0px 10px 0px;
    }
</style>

<div class="maker color-bgr-form">
    <div class="body_maker">
        <div class="border-graph">
            <div class="row">
                <div class="col-sm-12 form-horizontal">
                    <h4> Thông tin chung </h4>
                        <hr style="border-top-color: #939598;">
                    <div class="form-group">
                        <div class="common_info">
                            <label class="col-sm-1 control-label label-vms"> Tên giao lộ</label>
                            <input name="nameGL" value="CONG TY QC PARAGON" type="text">
                            <div class="label_common">ƯU tiên</div>
                            <select name="uu-tien">
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
                    
                </div>

                <div class="clearfix"></div>
                <div class="col-sm-12 form-horizontal">
                    <div>Chiến lược giờ</div>
                    <div class="comm-clg">
                        <div class="chien-luoc-gio" style="margin-top: 10px">
                            <div class="">
                                <div class="lbl-spin" for="open_time">Thời điểm</div>
                                <div class="input-group spinner" id="open_time">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chien-luoc-gio" style="margin-top: 10px">
                            <div class="">
                                <div class="lbl-spin" for="open_time">Chiến lược</div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="chien-luoc-gio" style="margin-top: 10px">
                            <div class="">
                                <div class="lbl-spin" for="open_time">Txanh</div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                        <div class="chien-luoc-gio" style="margin-top: 10px">
                            <div class="">
                                <div class="lbl-spin" for="open_time">TSxanh</div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="chien-luoc-gio" style="margin-top: 10px">
                            <div class="">
                                <div class="lbl-spin" for="open_time">Tdbo</div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                        <div class="chien-luoc-gio" style="margin-top: 10px">
                            <div class="">
                                <div class="lbl-spin" for="open_time">TSdbo</div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                                <div class="input-group spinner" id="open_time" style="margin-right: 10px">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                    <div class="Time" style="margin-top: 10px;">
                        <div class="chien-luoc-gio" style="float: left; margin-right: 10px;">
                            <div class="">
                                <div class="lbl-spin" for="open_time" style="float: left; margin-left: 10px;width: 83px;" >Bắt đầu</div>
                                <div class="input-group spinner" id="open_time" style="float: left">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chien-luoc-gio">
                            <div class="">
                                <div class="lbl-spin" for="open_time" style="float: left; margin-left: 10px;width: 83px;" >Kết thúc</div>
                                <div class="input-group spinner" id="open_time">
                                    <input type="text" class="form-control" value="0">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 form-horizontal">
                    <div class="chien_luoc_ngay">
                        <div class="lbl_chien_luoc_ngay" for="open_time">Chiến lược ngày</div>
                        <div class="label_common mgl_basic mgr_basic">T2-CN</div>
                        <select class="clt_chien_luoc mgl_basic" name="chien_luoc_ngay_1">
                            <option value="1">A</option>
                            <option value="2">B</option>
                            <option value="3">C</option>
                            <option value="4">D</option>
                        </select>
                        <select class="clt_chien_luoc mgl_basic"  name="chien_luoc_ngay_2">
                            <option value="1">A</option>
                            <option value="2">B</option>
                            <option value="3">C</option>
                            <option value="4">D</option>
                        </select>
                        <select class="clt_chien_luoc mgl_basic"  name="chien_luoc_ngay_3">
                            <option value="1">A</option>
                            <option value="2">B</option>
                            <option value="3">C</option>
                            <option value="4">D</option>
                        </select>
                        <select class="clt_chien_luoc mgl_basic"  name="chien_luoc_ngay_4">
                            <option value="1">A</option>
                            <option value="2">B</option>
                            <option value="3">C</option>
                            <option value="4">D</option>
                        </select>
                        <select class="clt_chien_luoc mgl_basic"  name="chien_luoc_ngay_5">
                            <option value="1">A</option>
                            <option value="2">B</option>
                            <option value="3">C</option>
                            <option value="4">D</option>
                        </select>
                        <select class="clt_chien_luoc mgl_basic"  name="chien_luoc_ngay_6">
                            <option value="1">A</option>
                            <option value="2">B</option>
                            <option value="3">C</option>
                            <option value="4">D</option>
                        </select>
                        <select class="clt_chien_luoc mgl_basic"  name="chien_luoc_ngay_7">
                            <option value="1">A</option>
                            <option value="2">B</option>
                            <option value="3">C</option>
                            <option value="4">D</option>
                        </select>
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="clearfix"></div>
                <div class="col-sm-12 form-horizontal">
                    <div class="config-other">
                        <div class="label_common">Cài đặt khác</div>
                        <div class="opt1"  style="margin-top: 10px; margin-left: 10px;">
                            <div class="lbl-spin" for="open_time" style="float: left; width: 83px;">opt1</div>
                            <select name="opt1_status_1">
                                <option value="0">Xanh</option>
                                <option value="1">Vang</option>
                                <option value="2">Do</option>
                                <option value="3">Chu thap</option>
                                <option value="4">Bo xanh</option>
                                <option value="5">Bo do</option>
                            </select>
                            <select name="opt1_status_2">
                                <option value="0">Xanh</option>
                                <option value="1">Vang</option>
                                <option value="2">Do</option>
                                <option value="3">Chu thap</option>
                                <option value="4">Bo xanh</option>
                                <option value="5">Bo do</option>
                            </select>
                            <select name="opt1_status_3">
                                <option value="0">Xanh</option>
                                <option value="1">Vang</option>
                                <option value="2">Do</option>
                                <option value="3">Chu thap</option>
                                <option value="4">Bo xanh</option>
                                <option value="5">Bo do</option>
                            </select>
                            <select name="opt1_status_4">
                                <option value="0">Xanh</option>
                                <option value="1">Vang</option>
                                <option value="2">Do</option>
                                <option value="3">Chu thap</option>
                                <option value="4">Bo xanh</option>
                                <option value="5">Bo do</option>
                            </select>
                            <select name="opt1_status_5">
                                <option value="0">Xanh</option>
                                <option value="1">Vang</option>
                                <option value="2">Do</option>
                                <option value="3">Chu thap</option>
                                <option value="4">Bo xanh</option>
                                <option value="5">Bo do</option>
                            </select>
                            <select name="opt1_status_6">
                                <option value="0">Xanh</option>
                                <option value="1">Vang</option>
                                <option value="2">Do</option>
                                <option value="3">Chu thap</option>
                                <option value="4">Bo xanh</option>
                                <option value="5">Bo do</option>
                            </select>
                            <select name="opt1_status_7">
                                <option value="0">Xanh</option>
                                <option value="1">Vang</option>
                                <option value="2">Do</option>
                                <option value="3">Chu thap</option>
                                <option value="4">Bo xanh</option>
                                <option value="5">Bo do</option>
                            </select>
                            <select name="opt1_status_8">
                                <option value="0">Xanh</option>
                                <option value="1">Vang</option>
                                <option value="2">Do</option>
                                <option value="3">Chu thap</option>
                                <option value="4">Bo xanh</option>
                                <option value="5">Bo do</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                        <div class="opt2" style="margin-top: 10px; margin-left: 10px;">
                            <div class="lbl-spin" for="open_time"  style="float: left; width: 83px;">opt2</div>
                            <select name="opt2_status_1">
                                <option value="0">Xanh</option>
                                <option value="1">Vang</option>
                                <option value="2">Do</option>
                                <option value="3">Chu thap</option>
                                <option value="4">Bo xanh</option>
                                <option value="5">Bo do</option>
                            </select>
                            <select name="opt2_status_2">
                                <option value="0">Xanh</option>
                                <option value="1">Vang</option>
                                <option value="2">Do</option>
                                <option value="3">Chu thap</option>
                                <option value="4">Bo xanh</option>
                                <option value="5">Bo do</option>
                            </select>
                            <select name="opt2_status_3">
                                <option value="0">Xanh</option>
                                <option value="1">Vang</option>
                                <option value="2">Do</option>
                                <option value="3">Chu thap</option>
                                <option value="4">Bo xanh</option>
                                <option value="5">Bo do</option>
                            </select>
                            <select name="opt2_status_4">
                                <option value="0">Xanh</option>
                                <option value="1">Vang</option>
                                <option value="2">Do</option>
                                <option value="3">Chu thap</option>
                                <option value="4">Bo xanh</option>
                                <option value="5">Bo do</option>
                            </select>
                            <select name="opt2_status_5">
                                <option value="0">Xanh</option>
                                <option value="1">Vang</option>
                                <option value="2">Do</option>
                                <option value="3">Chu thap</option>
                                <option value="4">Bo xanh</option>
                                <option value="5">Bo do</option>
                            </select>
                            <select name="opt2_status_6">
                                <option value="0">Xanh</option>
                                <option value="1">Vang</option>
                                <option value="2">Do</option>
                                <option value="3">Chu thap</option>
                                <option value="4">Bo xanh</option>
                                <option value="5">Bo do</option>
                            </select>
                            <select name="opt2_status_7">
                                <option value="0">Xanh</option>
                                <option value="1">Vang</option>
                                <option value="2">Do</option>
                                <option value="3">Chu thap</option>
                                <option value="4">Bo xanh</option>
                                <option value="5">Bo do</option>
                            </select>
                            <select name="opt2_status_8">
                                <option value="0">Xanh</option>
                                <option value="1">Vang</option>
                                <option value="2">Do</option>
                                <option value="3">Chu thap</option>
                                <option value="4">Bo xanh</option>
                                <option value="5">Bo do</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                </div>
                <div class="col-sm-12 form-horizontal">
                    <div class="control">
                        <div>
                        <label for="">Control</label>
                        <hr style="border-top-color: #939598;">
                        </div>
                        <div class="form-group">
                            <div style="margin-left: 35px">
                                <button name="start" type="button" class="btn btn-md btn-info m-t-n-xs mgr_basic">Start</button>
                                <button name="stop" type="button" class="btn btn-md btn-info m-t-n-xs mgr_basic">Stop</button>
                                <button name="toggle" type="button" class="btn btn-md btn-info m-t-n-xs mgr_basic">toggle</button>
                                <button name="settime" type="button" class="btn btn-md btn-info m-t-n-xs mgr_basic">settime</button>
                                <button name="upload" type="button" class="btn btn-md btn-info m-t-n-xs mgr_basic">upload</button>
                                <button name="download" type="button" class="btn btn-md btn-info m-t-n-xs mgr_basic">download</button>
                                <button name="cancel" type="button" class="btn btn-md btn-info m-t-n-xs mgr_basic">cancel</button>
                            </div>

                        </div>
                    </div>
                    
                </div>
            </div>  
        </div>
    </div>
</div>
<script>(function ($) {
        $('.spinner .btn:first-of-type').on('click', function () {
            $('.spinner input').val(parseInt($('.spinner input').val(), 10) + 1);
        });
        $('.spinner .btn:last-of-type').on('click', function () {
            $('.spinner input').val(parseInt($('.spinner input').val(), 10) - 1);
        });
    })(jQuery);</script>
<?php exit; ?>
<div class="control">
    <button>Mở hệ thống</button><br/>
    <button>Tăt hệ thống</button><br/>
    <button>Chớp vàng</button><br/>
    <button>Ghi dữ liệu</button><br/>
    <button>Đọc dữ liệu</button><br/>
    <button>In</button><br/>
    <button>Số SERI</button><br/>
    <button>Thoát</button><br/>
    <div class="form-group">
        <div for="router">Chọn tuyến</div>
        <select>
            <option value="0">Auto</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8" >8</option>
        </select>
    </div>
    <div class="form-group">
        <button> Thời gian</button>
        <button>Kiểm tra</button>
    </div>
</div>
<!--    <div class="form-group">
        Hiển thị<input type="checkbox" name="cbxport" value="show"><br/>
        Cổng OPT<input type="checkbox" name="cbxport" value="portOPT"><br/>
        <div class="">
            <div class="col-xs-2" for="open_time">Giờ mở </div>
            <div class="col-xs-10 input-group spinner" id="open_time">
                <input type="text" class="form-control" value="0">
                <div class="input-group-btn-vertical">
                  <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                  <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                </div>
            </div>
        </div>
        
    </div>-->
<div class="row">
    <div class='col-sm-6'>
        <div class="form-group">
            <div for="open_time">Giờ mở </div>
            <div class='input-group date' id='dt_picker_Open'>
                <input type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('#dt_picker_Open').datetimepicker({
                format: 'LT'
            });
        });
    </script>
</div>
<div class="row">
    <div class='col-sm-6'>
        <div class="form-group">
            <div for="open_time">Giờ tắt </div>
            <div class='input-group date' id='dt_picker_Off'>
                <input type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('#dt_picker_Off').datetimepicker({
                format: 'LT'
            });
        });
    </script>
</div>
<div class="row">
    <div class='col-sm-6'>
        <div class="form-group">
            <div for="open_time">Giờ Chớp </div>
            <div class='input-group date' id='dt_picker_Other'>
                <input type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('#dt_picker_Other').datetimepicker({
                format: 'LT'
            });
        });
    </script>
</div>
<div class="form-group">
    <div class="">
        <div class="col-xs-2" for="open_time">Số pha </div>
        <div class="col-xs-10 input-group spinner" id="open_time">
            <input type="text" class="form-control" value="0">
            <div class="input-group-btn-vertical">
                <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
            </div>
        </div>
    </div>

</div>
</div>
<script>(function ($) {
        $('.spinner .btn:first-of-type').on('click', function () {
            $('.spinner input').val(parseInt($('.spinner input').val(), 10) + 1);
        });
        $('.spinner .btn:last-of-type').on('click', function () {
            $('.spinner input').val(parseInt($('.spinner input').val(), 10) - 1);
        });
    })(jQuery);</script>

