
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
                                <th>device_series</th>
                                <th>device_mainboard</th>
                                <th>device_state</th>
                                <th>Active</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($listDevice)):?>
                            <?php foreach ($listDevice as $i =>$row):?>
                            <tr class="gradeX">
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['sim_number'];?></td>
                                <td><?php echo $row['device_series'];?></td>
                                <td><?php echo $row['device_mainboard'];?></td>
                                <td><?php echo $row['device_state'];?></td>
                                <td><?php echo $row['isActive']?'Bật':'Tắt';?></td>
                            </tr>
                            <?php endforeach;?>
                            <?php endif;?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Tên</th>
                                <th>sim_number</th>
                                <th>device_series</th>
                                <th>device_mainboard</th>
                                <th>device_state</th>
                                <th>Active</th>
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
</script>
