<div class="clearfix"></div>
<div id="sidebar" class="sidebar">
    <div data-scrollbar="true" data-height="100%">
        <ul class="nav">
            <li class="nav-profile">
                <div class="image">
                    <a href="javascript:;"><img src="<?php echo base_url() ?>public1/assets/img/user-13.jpg" alt="" /></a>
                </div>
                <div class="info">
                    <%=username%>
                    <small><a href="logout.jsp">Thoát</a></small> 
                </div>
            </li>
        </ul>
        <ul class="nav">
            <li class="nav-header"></li>
            <li class="has-sub setActive expand" id="1">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-laptop"></i>
                    <span>Quản lý xe</span>
                </a>
                <ul class="sub-menu">
                    <li class="setActive" id="1-1"><a href="<?php echo base_url() ?>public1/">Giám sát</a></li>
                    <li class="setActive" id="1-2"><a href="<?php echo base_url() ?>public1/transactions">Danh sách xe - OBU</a></li>
                </ul>
            </li>
            <li class="has-sub setActive expand" id="21">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-flag-o"></i>
                    <span>Quản lý đội xe</span>
                </a>
                <ul class="sub-menu">
                    <li class="setActive" id="21-1"><a href="<?php echo base_url() ?>public1/drivers">Danh sách lái xe</a></li>
                    <li class="setActive" id="21-2"><a href="<?php echo base_url() ?>public1/commands">Lệnh điều xe</a></li>
                </ul>
            </li>

            <li class="has-sub setActive expand" id="3">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-laptop"></i>
                    <span>Báo cáo thống kê</span>
                </a>
                <ul class="sub-menu">
                    <li class="setActive" id="3-1"><a href="<?php echo base_url() ?>public1/reports">Thống kê theo xe</a></li>
                    <li class="setActive" id="3-2"><a href="<?php echo base_url() ?>public1/report-drivers">Thống kê theo lái xe</a></li>
                    <li class="setActive" id="3-3"><a href="<?php echo base_url() ?>public1/report-departments">Thống kê theo phòng</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify">
                    <i class="fa fa-angle-double-left">
                    </i>
                </a>
            </li>
        </ul>
    </div>
</div>