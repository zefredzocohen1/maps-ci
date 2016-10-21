
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Danh sách thiết bị</h5>
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
                                <th>sim_number</th>
                                <th>device_serial</th>
                                <th>device_mainboard</th>
                                <th>mode</th>
                                <th>state</th>
                                <th>created_time</th>
                                <th>register_string</th>
                                <th>Hành-động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($listDevice)):?>
                            <?php foreach ($listDevice as $i =>$row):?>
                            <tr class="gradeX">
                                <td><?php echo isset($row['name'])?$row['name']:'';?></td>
                                <td><?php echo isset($row['sim_number'])?$row['sim_number']:'';?></td>
                                <td><?php echo isset($row['device_serial'])?$row['device_serial']:'';?></td>
                                <td><?php echo isset($row['device_mainboard'])?$row['device_mainboard']:'';?></td>
                                <td><?php echo isset($row['mode'])?$row['mode']:'';?></td>
                                <td><?php echo isset($row['state'])?'Bật':'Tắt';?></td>
                                <td><?php echo isset($row['created_time'])?$row['created_time']:'';?></td>
                                <td><?php echo isset($row['register_string'])?$row['register_string']:'';?></td>
                                <td colspan="2">
                                    <div class="form-inline" style="display:inline">
                                        <button style="display:inline" class="btn btn-primary btn-circle btn-xs btn-detail" type="button" title="Thông tin thiết bị" data-name="dev_<?php echo $row['name'];?>"><i class="fa fa-info"></i>
                            </button>
                                        <button style="display:inline" class="btn btn-info btn-circle btn-xs btn-update" type="button" title="Cập nhật thiết bị" data-name="dev_<?php echo $row['name'];?>"><i class="fa fa-refresh"></i>
                            </button>
                                        <button style="display:inline" class="btn btn-danger btn-circle btn-xs btn-delete" type="button" title="Xóa thiết bị" data-name="dev_<?php echo $row['name'];?>"><i class="fa  fa-times-circle"></i>
                            </button></div>
                                    </td>
                            </tr>
                            <?php endforeach;?>
                            <?php endif;?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Tên</th>
                                <th>sim_number</th>
                                <th>device_serial</th>
                                <th>device_mainboard</th>
                                <th>mode</th>
                                <th>state</th>
                                <th>created_time</th>
                                <th>register_string</th>
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

    function fnClickAddRow() {
        $('#editable').dataTable().fnAddData([
            "Custom row",
            "New row",
            "New row",
            "New row",
            "New row"]);

    }
    
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
</script>
