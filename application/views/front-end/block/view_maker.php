<div class="maker">
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
            <label for="router">Chọn tuyến</label>
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
        <div class="form-group row">
            <label class="col-xs-2" for="open_time">Giờ mở </label>
            <div class="col-xs-10 input-group spinner" id="open_time">
                <input type="text" class="form-control" value="42">
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
                <label for="open_time">Giờ mở </label>
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
                <label for="open_time">Giờ tắt </label>
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
                <label for="open_time">Giờ Chớp </label>
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
        <div class="form-group row">
            <label class="col-xs-2" for="open_time">Số pha </label>
            <div class="col-xs-10 input-group spinner" id="open_time">
                <input type="text" class="form-control" value="42">
                <div class="input-group-btn-vertical">
                  <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                  <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                </div>
            </div>
        </div>
        
    </div>
</div>
<script>(function ($) {
  $('.spinner .btn:first-of-type').on('click', function() {
    $('.spinner input').val( parseInt($('.spinner input').val(), 10) + 1);
  });
  $('.spinner .btn:last-of-type').on('click', function() {
    $('.spinner input').val( parseInt($('.spinner input').val(), 10) - 1);
  });
})(jQuery);</script>

