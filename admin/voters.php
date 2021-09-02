<?php include('session.php'); ?>
<?php include('head.php'); ?>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include('side_bar.php'); ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Voters List</h3>

                </div>

                <?php
                        $count = $conn->query("SELECT COUNT(*) as total FROM `voters`")->fetch_array();
                        $count1 =  $conn->query("SELECT COUNT(*) as total FROM `voters` WHERE `status` = 'Voted'")->fetch_array();
                        $count2 = $conn->query("SELECT COUNT(*) as total FROM `voters` WHERE `status` = 'Unvoted'")->fetch_array();
                        ?>
				<a href="voters.php" class = "btn btn-primary btn-outline"><i class = "fa fa-paw"></i> ALL Voters (<?php echo $count['total'] ?>)</a>
				<a href="voted.php" class = "btn btn-success btn-outline"><i class = "fa fa-paw"></i> Voted(<?php echo $count1['total'] ?>)</a>
				<a href="unvoted.php" class = "btn btn-danger btn-outline"><i class = "fa fa-paw"></i> Unvoted(<?php echo $count2['total'] ?>) </a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
				
				<a  href = "update_status.php"class = "btn btn-danger btn-outline pull-right" style = "margin-right:12px;" name = "go"><i class = "fa fa-asterisk fa-spin"></i> Activate All Voters Account</a>
				<br />
				<br />
				<a href="download.php" class="btn btn-success btn-outline"><i class="glyphicon glyphicon-save"></i> Import Data (csv exel file)</a>
                
                <a href="../register/index.php" class = "btn btn-primary btn-outline"><i class = "fa fa-paw"></i> Add Voters</a>

                <hr />

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="modal-title" id="myModalLabel">
                            <div class="panel panel-primary">
                                <div class="panel-heading"><i class="fa fa-users"></i>
                                    Voters List
                                </div>
                            </div>
                        </h4>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>ID Number</th>
                                        <th>Password</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Mobile Number</th>
                                        <th>Status</th>
                                        <th>Account</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        require 'dbcon.php';
                                        $query = $conn->query("SELECT * FROM voters ORDER BY voters_id DESC");
                                        while ($row1 = $query->fetch_array()) {
                                            $voters_id = $row1['voters_id'];
                                        ?>

                                            <td><?php echo $row1['voters_id']; ?></td>
                                            <td><?php echo $row1['id_number']; ?></td>
                                            <td><?php echo $row1['password']; ?></td>
                                            <td><?php echo $row1['firstname'] . " " . $row1['lastname']; ?></td>
                                            <td><?php echo $row1['gender']; ?></td>
                                            <td><?php echo $row1['mobilenumber']; ?></td>
                                            <td><?php echo $row1['status']; ?></td>
                                            <td><?php echo $row1['account']; ?></td>
                                            <td width="50"><img src="<?php echo $row1['img']; ?>" width="50" height="50" class="img-rounded"></td>

                                            <td style="text-align:center">

                                                <a rel="tooltip" title="Delete" id="<?php echo $voters_id; ?>" href="#delete_user<?php echo $voters_id; ?>" data-target="#delete_user<?php echo $voters_id ?>" data-toggle="modal" class="btn btn-danger btn-outline"><i class="fa fa-trash-o"></i> Delete</a>
                                                <?php include('delete_voters_modal.php'); ?>

                                                <a rel="tooltip" title="Edit" id="<?php echo $row1['voters_id'] ?>" href="#edit_voters<?php echo $row1['voters_id'] ?>" data-toggle="modal" class="btn btn-success btn-outline"><i class="fa fa-pencil"></i> Edit</a>
                                                <?php include 'edit_voters_modal.php'; ?>
                                            </td>


                                    </tr>

                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->

                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->



    </div>
    <!-- /#wrapper -->

    <?php include('script.php'); ?>

</body>

</html>