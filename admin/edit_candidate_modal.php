
<?php
	if(!$bool){
?>

<div class="modal fade" id="edit_candidate<?php  echo $candidate_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">         
					<div class="panel panel-primary">
						<div class="panel-heading">
							<center>Edit Candidate</center>
						</div>    
					</div>
				</h4>
			</div>
			
            <div class="modal-body">
				<form method = "post" enctype = "multipart/form-data">	
					<input type="hidden" name="candidate_id" value="<?php echo $row['candidate_id'] ?>">
					<div class="form-group">
						<label>Position</label>
						<select class = "form-control" name = "position">
								<option><?php echo $row ['position'];?></option>
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
							<input class="form-control" type ="text" name = "firstname" required="true" value = "<?php echo $row ['firstname']?>">
					</div>
					<div class="form-group">
						<label>Lastname</label>
							<input class="form-control"  type = "text" name = "lastname" value = "<?php echo $row ['lastname']?>" required="true">
					</div>

					<div class="form-group">
						<label>Panel</label>
							<select class = "form-control" name = "Panel" required="true">
								<option><?php echo $row ['panel']?></option>
								<option></option>
								<option value="" disabled selected>Panel</option>
								<option>Nepali Congress</option>
								<option>NCP-UML</option>
								<option>NCP-Maoist Centre</option>
								<option>RPP</option>
							</select>
					</div>
					
									
					<div class="form-group">
						<label>Gender</label>
							<select class = "form-control" name = "gender" required="true">
								<option><?php echo $row ['gender']?></option>
								<option></option>
								<option>Male</option>
								<option>Female</option>
								<option>Others</option>
							</select>
					</div>
					<div class="form-group">
									<label>Image</label>
									<input type="file" name="image"required="true"> 
					</div>

					<button name = "update" type="submit" class="btn btn-primary">Update</button>
					<button name = "cancel" type="reset" class="btn btn-success">Cancel</button>
				</form>
			</div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                
            </div>
		</div>
	</div>
</div>
<!-- /.modal-content -->
                               
	<?php 
		require 'dbcon.php';
		
		if(ISSET($_POST['update'])){
			$bool = true;
			$position=$_POST['position'];
			$firstname=$_POST['firstname'];
			$lastname=$_POST['lastname'];
			$gender=$_POST['gender'];
			$panel=$_POST['panel'];
			$candidate_id=$_POST['candidate_id'];
			$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name= addslashes($_FILES['image']['name']);
			$image_size= getimagesize($_FILES['image']['tmp_name']);
			move_uploaded_file($_FILES["image"]["tmp_name"],"../images/candidates/" . $_FILES["image"]["name"]);			
			$location="../images/candidates/" . $_FILES["image"]["name"];
		
	
			$conn->query("UPDATE candidate SET position = '$position', firstname = '$firstname', lastname = '$lastname', panel = '$panel', gender = '$gender',img='$location' WHERE candidate_id = '$candidate_id'")or die(mysql_error());
			echo "<script> window.location='candidate.php' </script>";
		}	
	?>
								
<?php
	}
?>