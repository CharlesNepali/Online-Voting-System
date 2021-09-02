<div class="modal fade" id="edit_voters<?php  echo $voters_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
											<h4 class="modal-title" id="myModalLabel">         
												<div class="panel panel-primary">
													<div class="panel-heading">
														<center>Edit Voters</center>
													</div>    
												</div>
											</h4>
										</div>
																				
                                        <div class="modal-body">
											<form action="update_votes.php?voter_id=<?php echo $voters_id; ?>" method = "post" >	
											<form method = "post" enctype = "multipart/form-data">
											  <input type="hidden" name="voters_id" value="<?php echo $row1['voters_id'] ?>">
											<div class="form-group">
												<label>ID Number</label>
												<input type = "text" class = "form-control" name = "id_number" value="<?php echo $row1 ['id_number']?>"	>												
											</div>
											
											<div class="form-group">
	
												<label>Password</label>
													<input class="form-control" type ="text" name = "password" id = "pass" required="true" value = "<?php echo $row1 ['password']?>">
											</div>
										
											<div class="form-group">
												<label>Firstname</label>
													<input class="form-control" type ="text" name = "firstname" required="true" value = "<?php echo $row1 ['firstname']?>">
											</div>
											<div class="form-group">
												<label>Lastname</label>
													<input class="form-control"  type = "text" name = "lastname" value = "<?php echo $row1 ['lastname']?>" required="true">
											</div>

											<div class="form-group">
												<label>Gender</label>
													<select class = "form-control" name = "gender"  required="true">
														<option><?php echo $row ['gender']?></option>
														<option></option>
														<option>Male</option>
														<option>Female</option>
														<option>Others</option>
													</select>
											</div>

											
											<div class="form-group">
												<label>Mobile Number</label>
													<input class="form-control"  type = "number" name = "mobilenumber" placeholder="Please enter 10 digit Mobile Number" required="true">
											</div>
											
											<div class="form-group">
											<label>Image</label>
											<input type="file" name="image"required> 
											</div>
																			
											<div class="form-group">
												<label>Account</label>
													<select class = "form-control" name = "account">
														<option><?php echo $row1 ['account']?></option>
														<option></option>
														<option>Active</option>			
													</select>
											</div>
												<button name = "update" type="submit" class="btn btn-primary">Update</button>
												 <button name = "cancel" type="reset" class="btn btn-success">Cancel</button>
										 	</div>
										 </form>
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
			$voters_id=$_POST['voters_id'];
			$id_number=$_POST['id_number'];
			$password=$_POST['password'];
			$firstname=$_POST['firstname'];
			$lastname=$_POST['lastname'];
			$gender=$_POST['gender'];
			$mobilenumber=$_POST['mobilenumber'];
			$account=$_POST['account'];
			$status=$_POST['status'];
			$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name= addslashes($_FILES['image']['name']);
			$image_size= getimagesize($_FILES['image']['tmp_name']);
			move_uploaded_file($_FILES["image"]["tmp_name"],"../images/voters/" . $_FILES["image"]["name"]);			
			$location="../images/voters/" . $_FILES["image"]["name"];
		
	
			$conn->query("UPDATE voters SET id_number = '$id_number', password = '$password' firstname = '$firstname', lastname = '$lastname', gender = '$gender', mobilenumber = '$mobilenumber',account = '$account', status = '$status', img='$location' WHERE voters_id = '$voters_id'")or die(mysqli_error());
			echo "<script> window.location='candidate.php' </script>";
		}	
	?>