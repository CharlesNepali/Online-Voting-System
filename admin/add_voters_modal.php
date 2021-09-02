<div class="modal fade" id="add_voters" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<center>Add Voter</center>
						</div>
					</div>
				</h4>
			</div>


			<div class="modal-body">
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>ID Number</label>
						<input class="form-control" type="text" name="id_number" placeholder="ID number" required="true">

					</div>


					<div class="form-group">
						<label>Password</label>
						<input class="form-control" type="text" name="password" placeholder="Password" required="true">
					</div>
					<div class="form-group">
						<label>Firstname</label>
						<input class="form-control" type="text" name="firstname" placeholder="Firstname" required="true">
					</div>
					<div class="form-group">
						<label>Lastname</label>
						<input class="form-control" type="text" name="lastname" placeholder="Please enter lastname" required="true">
					</div>

					<div class="form-group">
						<label>Mobile Number</label>
						<input class="form-control" type="number" name="mobilenumber" placeholder="Please enter 10 digit Mobile Number" required="true">
					</div>

					<div class="form-group">
						<label>Status</label>
						<select class="form-control" name="gender" required="true">
							<option></option>
							<option>Male</option>
							<option>Female</option>
							<option>Other</option>
							<option> Prefer not to say</option>
						</select>
					</div>
					<div class="form-group">
						<label>Image</label>
						<input type="file" name="image" required="true">
					</div>
					<button name="save" type="submit" class="btn btn-primary">Save Data</button>
					<button name="save" type="reset" class="btn btn-success">Clear Data</button>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>

			</form>


			<?php include('dbcon.php');
			if (isset($_POST['save'])) {
				$id_number = $_POST['id_number'];
				$password = $_POST['password'];
				$firstname = $_POST['firstname'];
				$lastname = $_POST['lastname'];
				$gender = $_POST['gender'];
				$mobilenumber = $_POST['mobilenumber'];
				$account = $_POST['account'];
				$status = $_POST['status'];
				
				$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
				$image_name = addslashes($_FILES['image']['name']);
				$image_size = getimagesize($_FILES['image']['tmp_name']);
				move_uploaded_file($_FILES["image"]["tmp_name"], "../images/voters/" . $_FILES["image"]["name"]);
				$location = "../images/voters/" . $_FILES["image"]["name"];

				$query = $conn->query("SELECT * FROM voters WHERE id_number='$id_number'") or die (mysql_error());
									$count = $query->fetch_array();

									if ($count  > 0){ 
										echo '<script>alert("ID already exist")</script>';
									}
										else{
											$conn->query("INSERT INTO voters(id_number,password,firstname,lastname,mobilenumber,gender,status,account,img) VALUES ('$id_number',$password',$firstname',$lastname',$mobilenumber',$gender','Unvoted','Inactive',$location')")or die(mysql_error());
											echo '<script>alert("Voter Added!")</script>';
										}


			}

			?>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>