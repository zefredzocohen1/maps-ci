<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle" src="<?php echo base_url()?>public/asset/img/profile_small.jpg" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> 
                            <span class="block m-t-xs"> <strong class="font-bold"><?php echo mGetSession('user_name')?></strong>
                            </span> <span class="text-muted text-xs block">admin <b class="caret"></b></span> 
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="#">Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url()?>user/logout">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    Mp
                </div>
            </li>
            <li id="dashboard" data-choose="" >
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li data-choose="" ><a href="<?php echo base_url()?>home">Dashboard v.1</a></li>
                    <li data-choose="" ><a href="<?php echo base_url()?>table">Dashboard v.2</a></li>
                </ul>
            </li>
            <li id="user" data-choose="" >
                <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Quản lý user</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li data-choose="" ><a href="<?php echo base_url()?>user/list">Danh sách user</a></li>
                </ul>
                <ul class="nav nav-second-level">
                    <li data-choose="" ><a href="<?php echo base_url()?>user/create">Tạo user</a></li>
                </ul>
            </li>
            <li data-choose="" >
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Graphs</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li data-choose="" ><a href="graph_flot.html">Flot Charts</a></li>
                    <li data-choose="" ><a href="graph_morris.html">Morris.js Charts</a></li>
                    <li data-choose="" ><a href="graph_rickshaw.html">Rickshaw Charts</a></li>
                    <li data-choose="" ><a href="graph_chartjs.html">Chart.js</a></li>
                    <li data-choose="" ><a href="graph_chartist.html">Chartist</a></li>
                    <li data-choose="" ><a href="c3.html">c3 charts</a></li>
                    <li data-choose="" ><a href="graph_peity.html">Peity Charts</a></li>
                    <li data-choose="" ><a href="graph_sparkline.html">Sparkline Charts</a></li>
                </ul>
            </li>
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #2f4050 !important; float: right" >
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                </div>
            </nav>
        </ul>

    </div>
</nav>
<script>
$(document).ready(function(){
    console.log('<?php echo $action?>');
    <?php if(!empty($sidebarActive)):?>
            $("#<?php echo $sidebarActive?>").sidebarActive();
    <?php endif?>
})
</script>