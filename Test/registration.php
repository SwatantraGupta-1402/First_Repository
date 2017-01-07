
<?php
/* filename : add_contact.php
 * Here we have Add Contact Detail of Guest and Show in Table format
 * created on 15-09-2015
 * created by Swatantra gupta
*/
error_reporting(0);
include("config.php");
//$sql_query = "SELECT * FROM user";
//$result = mysqli_query($con, $sql_query);
//echo $intUserId = $_POST['user_id'];
// On submitting form below function will execute.

       if(isset($_POST['submit'])) {
				
				$strName =  $_POST['name'];
				$strEmailId =  $_POST['email'];
				$strUsername = $_POST['username'];
				$strPassword =  $_POST['password'];	
				$strCPassword =  $_POST['confirm_pass'];
				if($strPassword != $strCPassword) {
					echo "<b>Password Does not match....</b>";
			  		} 
			  		elseif($strUsername !=''||$strEmailId !='') {
			  			echo "Star";
						$add_contact_check_query = "SELECT * FROM user WHERE email= '$strEmailId' OR username='$strUsername'";
						$add_contact_chk_result = mysqli_query($con, $add_contact_check_query);
						$array_row = mysqli_fetch_array($add_contact_chk_result, MYSQLI_NUM);
						if($array_row[0]>1) {
							echo "<b>Record already exist...</b>.";
						} 
					 
				} 
				else {
				//Insert Query of SQL
				     $add_contact_query = "INSERT INTO user
				    			  (
				    			  `name`,
				    			   `email`,
				    			   `username`,
				    			   `password`,
				    			   `confirm_pass`
				    			   )
				    			  VALUES
				    			  (
				    			   '".$strName."',
				    			   '".$strEmailId."', 
				    			   '".$strUsername."',
				    			   '".$strPassword."',
				    			   '".$strCPassword."'
				    			   )";
				    			   //die();
					$add_contact_query_result = mysqli_query($con, $add_contact_query);
					if($add_contact_query_result) {
						echo "<b> Contact Added successfully .......</b>"; 
	   	        	} else {
						echo " opps some issue to add Contact in Db ......."; 
					}				
    			//} 
     		}
     	}
		//Closing Connection with Server
	    mysqli_close($con);
	 // end else

   
//php code ends here
?>	
<!DOCTYPE html>
<html lang="en">
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- Website CSS style -->
		
		<link rel="stylesheet" type="text/css" href="style.css">

		<!-- Website Font style -->
	    
		<title>Admin</title>
	</head>
	<body>
		<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Company Name</h1>
	               		<hr />
	               	</div>
	            </div> 
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="registration.php">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Your Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name" required="required" />
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email" required="required"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Username</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username" required="required"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password" required="required"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="confirm_pass" id="confirm"  placeholder="Confirm your Password" required="required"/>
									
								</div>
							</div>
						</div>
							<button type="" value="submit" name="submit" class="btn btn-primary"/>Log In</button>
					</form>
				</div>
			</div>
		</div>
		<!--<script type="text/javascript" src="assets/js/bootstrap.js"></script>-->
	</body>
</html>