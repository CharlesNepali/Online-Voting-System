<?php include ('head.php');?>
<body>
<?php
	function passFunc($len, $set = "")
		{
			$gen = "";
			for($i = 0; $i < $len; $i++)
				{
					$set = str_shuffle($set);
					$gen.= $set[0]; 
				}
			return $gen;
		} 
		
?>
    <div id="wrapper">

       <?php include ('side_bar.php');?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Registration</h3>
                </div>
				<div class = "well col-lg-5">
					<div class="panel panel-green">
                        <div class="panel-heading">
                            Please Enter the Detail Needed Below
                        </div>
                        <div class="panel-body">
                         <form method = "post" enctype = "multipart/form-data">	
											<div class="form-group">
												<label>Your ID Number</label>
												<input class ="form-control" type = "text" name = "id_number" placeholder = "ID number" required="true">
													
											</div>

											<div class="form-group">
												<label>Create your password</label>
												<input class ="form-control" type = "text" name = "password" placeholder = "Create your password" required="true">
													
											</div>
											
											<!-- <div class="form-group">
											<?php 
													$change =  passFunc(8, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890');
											?>	
												<label>Password</label>
													<input class="form-control"  type = "text" name = "password" id = "pass" required="true" readonly="readonly" />
													<input type = "button" value = "Generate" onclick = "document.getElementById('pass').value = '<?php echo $change?>'">
											</div> -->
											
											<div class="form-group">
												<label>Firstname</label>
													<input class="form-control" type ="text" name = "firstname" placeholder="Firstname" required="true">
											</div>
											<div class="form-group">
												<label>Lastname</label>
													<input class="form-control"  type = "text" name = "lastname" placeholder="Please enter lastname" required="true">
											</div>
											
											<div class="form-group">
												<label>Mobile Number</label>
													<input class="form-control"  type = "number" onkeyup="validatenumber()" name = "mobilenumber" placeholder="Please enter 10 digit Mobile Number" required="true">
													
												</div>

											<div class="form-group">
												<label>Gender</label>
													<select class = "form-control" name = "gender">
														<option></option>
														<option>Male</option>
														<option>Female</option>
														<option>Other</option>
														<option> Prefer not to say</option>		
													</select>
											</div>

											<div class="form-group">
												<label>Image</label>
												<input type="file" name="image"required="true"> 
											</div>
																	
											 	<button name = "save" type="submit" class="btn btn-primary">Save Data</button>
												<button name="save" type="reset" class="btn btn-success">Clear Data</button>
												 
						  				 </div>
											<div class="modal-footer">
											<a href="../admin/canvassing.php" class = "btn btn-primary btn-outline"><i class = "fa fa-paw"></i> Back</a>
												<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Back</button> -->
											</div>
										</form>
								
							<?php 
								require 'dbcon.php';
								if (isset($_POST['save'])){
									$id_number=$_POST['id_number'];
									$password = $_POST['password'];
									$firstname=$_POST['firstname'];
									$lastname=$_POST['lastname'];
									$mobilenumber=$_POST['mobilenumber'];
									$gender=$_POST['gender'];
									$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
									$image_name= addslashes($_FILES['image']['name']);
									$image_size= getimagesize($_FILES['image']['tmp_name']);
									move_uploaded_file($_FILES["image"]["tmp_name"], "../images/voters/" . $_FILES["image"]["name"]);
									$location = "../images/voters/" . $_FILES["image"]["name"];
									

									$query = $conn->query("SELECT * FROM voters WHERE id_number='$id_number'") or die (mysql_error());
									$count = $query->fetch_array();

									if ($count  > 0){ 
										echo '<script>alert("ID already exist")</script>';
									}
										else{
										$conn->query("INSERT INTO voters(id_number,password,firstname,lastname,mobilenumber,gender,status,account,img) VALUES ('$id_number', '$password','$firstname','$lastname','$mobilenumber','$gender','Unvoted','Inactive','$location')")or die (mysqli_error($conn));
										echo '<script>alert("Added Successfully !")</script>';
								}

								} 
								$conn = null;
								$_POST = NULL;
							?>

						</div>
						</form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include ('script.php');?>
</body>

</html>

