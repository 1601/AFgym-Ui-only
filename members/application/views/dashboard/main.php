<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard 
                            </li>
                            <span class="pull-right">
                                <i class="fa fa-clock-o fa-spin"></i> 
                                <?php 
                                $firstname = $this->session->userdata('first_name');
                                echo "Hi, $firstname today is " . date("l , Y-m-d"); ?>
                            </span>
                        </ol>
                    
                    </div>
                </div>
                  <!-- /.row -->

                <div class="row">
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Sales</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-login-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Recruitment</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-reqcruitment-chart"></div>
                                <div class="text-right">
                                    <a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-male fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">2</div>
                                        <div>Trainers @ Work</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-thumbs-o-up fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">12</div>
                                        <div>New Clients</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">24</div>
                                        <div>ZUMBA Clients!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-money fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">10</div>
                                        <div>Paid Membership!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
              
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Todos</h3>
                            </div>
                             <div class="panel-body">
                                <div class="todolist not-done">
                                    <input type="text" class="form-control add-todo" placeholder="Add todo">
                                        <button id="checkAll" class="btn btn-success">Mark all as done</button>
                                        
                                        <hr>
                                        <ul id="sortable" class="list-unstyled">
                                        <li class="ui-state-default">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="" />Take out the trash</label>
                                            </div>
                                        </li>
                                        <li class="ui-state-default">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="" />Clean Equipment</label>
                                            </div>
                                        </li>
                                        <li class="ui-state-default">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="" />Do some push ups</label>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="todo-footer">
                                        <strong><span class="count-todos"></span></strong> Items Left
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Task/s Done</h3>
                            </div>
                             <div class="panel-body">
                                <div class="todolist">
                                    <ul id="done-items" class="list-unstyled">
                                        <li>I am done <button class="remove-item btn btn-default btn-xs pull-right"><span class="glyphicon glyphicon-remove"></span></button></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Members Panel</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Gym #</th>
                                                <th>Login Date</th>
                                                <th>Login Time</th>
                                                <th>Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>6</td>
                                                <td>9/10/2015</td>
                                                <td>3:29 PM</td>
                                                <td>Marciliano Higop</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>9/10/2015</td>
                                                <td>3:20 PM</td>
                                                <td>Marciliano Higop</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>9/10/2015</td>
                                                <td>3:03 PM</td>
                                                <td>Marciliano Higop</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="#">View All Members <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div
>            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->