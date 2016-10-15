<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>FooTable with row toggler, sorting and pagination</h5>
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

                <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="8">
                    <thead>
                        <tr>

                            <th data-toggle="true">Project</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th data-hide="all">Company</th>
                            <th data-hide="all">Completed</th>
                            <th data-hide="all">Task</th>
                            <th data-hide="all">Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Project - This is example of project</td>
                            <td>Patrick Smith</td>
                            <td>0800 051213</td>
                            <td>Inceptos Hymenaeos Ltd</td>
                            <td><span class="pie">0.52/1.561</span></td>
                            <td>20%</td>
                            <td>Jul 14, 2013</td>
                            <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                        </tr>
                        
                        <tr>
                            <td>Gamma project</td>
                            <td>Anna Jordan</td>
                            <td>(016977) 0648</td>
                            <td>Tellus Ltd</td>
                            <td><span class="pie">4,9</span></td>
                            <td>18%</td>
                            <td>Jul 22, 2013</td>
                            <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">
                                <ul class="pagination pull-right"></ul>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>