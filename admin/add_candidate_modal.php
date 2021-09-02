<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<center>Add Candidate</center>
						</div>
					</div>
				</h4>
			</div>


			<div class="modal-body">
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Position</label>
						<select class="form-control" name="position" required="true">
							<option></option>
							<option value="" disabled selected>Position</option>
							<option>President</option>
							<option>Vice President for Internal Affairs</option>
							<option>Vice President for External Affairs</option>
							<option>Secretary</option>
							<option>Auditor</option>
							<option>Treasurer</option>
							<option>PIO</option>
							<option>Business Manager</option>
							<option>Sgt. @ Arms</option>
							<option>Muse</option>
							<option>Escort</option>
						</select>
					</div>


					<div class="form-group">
						<label>Firstname</label>
						<input class="form-control" type="text" name="firstname" placeholder="Please enter firstname" required="true">
					</div>
					<div class="form-group">
						<label>Lastname</label>
						<input class="form-control" type="text" name="lastname" placeholder="Please enter lastname" required="true">
					</div>

					<div class="form-group">
						<label>Panel</label>
						<select class="form-control" name="panel" required="true">
							<option></option>
							<option value=" " disabled selected>Panel</option>
							<option>Nepali Congress</option>
							<option>NCP-UML</option>
							<option>NCP-Maoist Centre</option>
							<option>RPP</option>
						</select>
					</div>

					<div class="form-group">
						<label>Gender</label>
						<select class="form-control" name="gender" required="true">
							<option></option>
							<option value=" " disabled selected>Gender</option>
							<option>Male</option>
							<option>Female</option>
							<option>Other</option>
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
				$position = $_POST['position'];
				$firstname = $_POST['firstname'];
				$lastname = $_POST['lastname'];
				$panel = $_POST['panel'];
				$gender = $_POST['gender'];
				$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
				$image_name = addslashes($_FILES['image']['name']);
				$image_size = getimagesize($_FILES['image']['tmp_name']);

				move_uploaded_file($_FILES["image"]["tmp_name"], "../images/candidates/" . $_FILES["image"]["name"]);
				$location = "../images/candidates/" . $_FILES["image"]["name"];


				$conn->query("INSERT INTO candidate(position,firstname,lastname,panel,gender,img)values('$position','$firstname','$lastname','$panel','$gender','$location')") or die(mysqli_error($conn));
			}
			?>
		</div>

		<!-- /.modal-content -->

	</div>

	<!-- /.modal-dialog -->

</div>