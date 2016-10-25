<style>
    #DataTables_Table_0{
        font-size: 11px;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Danh sách user</h5>
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

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Ngày tạo</th>
                            <th>Quyền</th>
                            <th>Hành-động</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($listUser)):?>
                            <?php foreach ($listUser as $i =>$row):?>
                                <tr class="gradeX">
                                    <td class="username"><?php echo isset($row->username)?$row->username:'';?></td>
                                    <td class="createTime"><?php echo isset($row->create_time)?$row->create_time:'';?></td>
                                    <td class="permisson"><?php echo  isset($row->permisson)&&$row->permissson==1?' User':'Admin';?></td>
                                    <td colspan="2">
                                        <div class="form-inline" style="display:inline">
                                            <button style="display:inline" class="btn btn-primary btn-circle btn-xs btn-detail" type="button" title="Thông tin người dùng" data-name="dev_<?php echo $row->username;?>"><i class="fa fa-info"></i>
                                            </button>
                                            <button style="display:inline" class="btn btn-info btn-circle btn-xs btn-update" data-toggle="modal" data-target="#myModal" type="button" title="Cập nhật thông tin người dùng" data-name="dev_<?php echo $row->username;?>"><i class="fa fa-refresh"></i>
                                            </button>
                                            <button style="display:inline" class="btn btn-danger btn-circle btn-xs btn-delete" type="button" title="Xóa người dùng" data-name="dev_<?php echo $row->username;?>"><i class="fa  fa-times-circle"></i>
                                            </button></div>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                        </tbody>
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form action="<?php echo base_url().'Device/updateInfo'?>" method="post" id="updateDev">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Thông tin thiết bị</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label>Name *</label>
                                                    <input id="nameDev" name="nameDev" type="text" class="form-control required">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Serial *</label>
                                                    <input id="serialDev" name="serialDev" type="text" class="form-control required">
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label>mainboard *</label>
                                                    <input id="mainboardDev" name="mainboardDev" type="text" class="form-control required">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>register-string *</label>
                                                    <input id="registerStringDev" name="registerStringDev" type="text" class="form-control required">
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label>sim-number *</label>
                                                    <input id="simNumberDev" name="simNumberDev" type="text" class="form-control required">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>state *</label>
                                                    <select name="stateDev" class="form-control required">
                                                        <option value="1">Online</option>
                                                        <option value="0">Offline</option>
                                                        <option value="-1">Ẩn</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label>Long *</label>
                                                    <input id="longDev" name="longDev" type="text" class="form-control required">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Lat *</label>
                                                    <input id="latDev" name="latDev" type="text" class="form-control required">
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label>Mô tả *</label>
                                                <textarea id="descriptionDev" name="descriptionDev" type="text" class="form-control required"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" id="frmUpdate">Update</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                </div>
                <tfoot>
                <tr>
                    <th>Tên</th>
                    <th>Ngày tạo</th>
                    <th>Quyền</th>
                    <th>Hành động</th>
                </tr>
                </tfoot>
                </table>
            </div>

        </div>
    </div>
</div>
</div>
<!-- Page-Level Scripts -->
<script>
    $(document).ready(function () {
        $('.dataTables-example').DataTable({
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
            ]

        });

        /* Init DataTables */
        var oTable = $('#editable').DataTable();

        /* Apply the jEditable handlers to the table */
        oTable.$('td').editable('../example_ajax.php', {
            "callback": function (sValue, y) {
                var aPos = oTable.fnGetPosition(this);
                oTable.fnUpdate(sValue, aPos[0], aPos[1]);
            },
            "submitdata": function (value, settings) {
                return {
                    "row_id": this.parentNode.getAttribute('id'),
                    "column": oTable.fnGetPosition(this)[2]
                };
            },
            "width": "90%",
            "height": "100%"
        });
    });

    $('.btn-delete').on('click',function(){
        var c = $(this);
        var name = c.data('name').substring(4);
        r = confirm('Bạn có chắc muốn thực hiện');
        if(r==true){
            $.ajax({
                url: '<?php echo base_url().'Device/delete'?>',
                type: "POST",
                dataType: "Json",
                data: {deviceName:name},
                success: function (data) {
                    if(data.success){
                        c.parents('tr').fadeOut(1000, function() { $(this).remove(); });
                        toast('Thành công','Lệnh thực hiện thành công','success');
                    }else{
                        toast('Có lỗi !',data.message,'error');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                }
            });
        }
    });
    $('.btn-update').on('click',function () {
        $('#myModal').modal('hide');
        var fillData = <?php echo json_encode(mConfig('DeviceInfo'));?>;
        var c = $(this),trData = c.parents('tr');
        $.ajax({
            url: '<?php echo base_url().'Device/getDeviceInfo'?>',
            type: "POST",
            dataType: "Json",
            data: {deviceName:trData.find('.NameDev').html()},
            success: function (data) {
                if(data.success){
                    for(var k in fillData){
                        if(fillData.hasOwnProperty(k)) {
                            $('#'+fillData[k]).val(data[k]);
                        }
                    }
                    $('#myModal').modal('show');
                }else{
                    toast('Thông tin thiết bị','Không lấy được thông tin thiết bị','error')
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
            }
        })
//        for(i=0;i<fillData.length;i++){
//            $('input#'+fillData[i]).val(trData.find('.'+fillData[i]).html());
//            console.log(trData.find());
//            console.log(trData.find('.'+fillData[i]).html());
//        }
    })

    $('#frmUpdate').on('click',function(){

    });
</script>
