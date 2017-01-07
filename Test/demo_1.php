
<?php

/* filename : add_contact.php
 * Here we have Add Contact Detail of Guest and Show in Table format
 * created on 15-09-2015
 * created by Swatantra gupta
*/
include("../includes/config.php");
$num_rec_per_page=10;
$add_cnct_query = "SELECT calling_code,iso2 AS code FROM country_code";
$add_cnct_query_result = mysql_query($add_cnct_query);
	
$add_query = "SELECT * FROM user_contact_detail WHERE user_contact_id='$IntUserId'";
$add_result_query = mysql_query($add_query);
$arry_row = mysql_fetch_array($add_result_query);
// Session Start Here
session_start();
$session_info = $_SESSION['user_session_info'];
$strUserName = $session_info['user_name'];
$intUserId = $session_info['user_id']; 
$dt = new DateTime();
//Query Start for Showing data in table
error_reporting(1);
if (isset($_GET["page"])) {
	$page  = $_GET["page"]; 
} else {
		$page=1; 
} 
$start_from = ($page-1) * $num_rec_per_page;
$add_conct_query = "SELECT * FROM user_contact_detail where user_id = $intUserId LIMIT $start_from, $num_rec_per_page";
$add_conct_query_result = mysql_query($add_conct_query);
?>
<?php
$strCUserNameError ="";
$strEmailIdError ="";
$intTelephoneError ="";

// On submitting form below function will execute.
if(isset($_POST['submit'])) {
	if (empty($_POST["contact_user_name"])) {
		$strCUserNameError = "User Name is required";
	} else {
		$strCUserName = validateInput($_POST["contact_user_name"]);
		// check Event name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/",$strCUserName)) {
			$strCUserNameError = "Only letters and white space allowed";
		}
	}
	if (empty($_POST["email_id"])) {
		$strEmailIdError = "Email Id is required";
	} else {
		$strEmailId = validateInput($_POST["email_id"]);
		// check Event Address only contains letters and whitespace
		if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$strEmailId)) {
			$strEmailIdError = "Only Alphanumeric letters are allowed";
		}
	}
	if (empty($_POST["mobile_no"])) {
		$intTelephoneError = "Mobile Number is required";
	
	} else {
		$intTelephoneNo = validateInput($_POST["mobile_no"]);
		// check if Mobile No syntax is valid or not
		if (!preg_match("/^[789][0-9]{9}$/",$intTelephoneNo)) {
			$intTelephoneError = "Invalid Mobile Number format";
		}
	}
	
		if(''!=$strCUserNameError || ''!=$strEmailIdError || ''!=$intTelephoneError) {
		$err_msg = " Please fill the below fields!";	
		} else {

       if(isset($_POST['submit']) && 'add_contact' == $_POST['submit'] ) {
				$intUserContactId = $_POST['user_contact_id'];
				$strCUserName =  $_POST['contact_user_name'];
				$strEmailId =  $_POST['email_id'];
				$intCountryCode = $_POST['country_code'];
				$intMobileNo =  $_POST['mobile_no'];	
			  		if($strUserName !=''||$strEmailId !='') {
						$add_contact_check_query = "SELECT * FROM user_contact_detail WHERE email_id= '$strEmailId' OR mobile_no='$intMobileNo' AND user_id='$intUserId'";
						$add_contact_chk_result = mysql_query($add_contact_check_query);
						$array_row = mysql_fetch_array($add_contact_chk_result);
						if($array_row[0]>0) {
							$success_msg = "Record already exist...";
						} else {
							
				//Insert Query of SQL
				    $add_contact_query = "INSERT INTO user_contact_detail
				    			  (`user_id`,
				    			  `user_contact_id`,
				    			   `contact_user_name`,
				    			   `email_id` ,
				    			   `country_code`,
				    			   `mobile_no`,
				    			   `created_by`,
				    			   `created_on`)
				    			  VALUES
				    			  ('".$intUserId."',
				    			  '".$intUserContactId."',
				    			   '".$strCUserName."',
				    			   '".$strEmailId."', 
				    			   '".$intCountryCode."',
				    			   '".$intMobileNo."',
				    			   '".$strUserName."',
				    			   '".$dt->format('Y-m-d H:i:s')."'
				    			   )";
					$add_contact_query_result = mysql_query($add_contact_query);
					if($add_contact_query_result) {
						$success_msg = " Contact Added successfully ......."; 
	   	        	} else {
						$error_msg = " opps some issue to add Contact in Db ......."; 
					}				
    			} 
     		}
     	}
		//Closing Connection with Server
	    mysql_close($connection);
	} // end else
}
   
//php code ends here
function validateInput($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>	
		
<?php include('header.php'); ?>
<div class="inner-wrapper">
<?php include('sidebar.php'); ?>
	<div class="admin-contant">
	<?php include('top_menu.php'); ?>
        </div>
     <div class="guest-list">Add Contact</div>
        <div class="adminpg">
			<form action="add_contact.php" method="post" class="form_user" id="add_contact">
				<p style="color:green;font-size:18px;"><?php if(isset($success_msg)) { echo $success_msg; } ?></p>
        		<label>User Name<span class="error" style="color:red;">* <?php echo $strCUserNameError;?></label>
        		<input type="text" placeholder="Enter User Name" name="contact_user_name" id="contact_user_name" value="">
        		<label>Email Id <span class="error" style="color:red;">* <?php echo $strEmailIdError;?></label></label>
        		<input type="text" placeholder="Please Enter Email Id" name="email_id" id="email_id" value="">
        		<div class="">
        		<label>Telephone: <span class="error" style="color:red;">* <?php echo $intTelephoneError;?></label>
					<select class="small" data-val="true" id="CountryID" name="country_code">
						<?php while($row = mysql_fetch_array($add_cnct_query_result, MYSQL_ASSOC)) { ?>
						<option name="<?php echo "+".$row['calling_code']; ?>" value="<?php echo "+".$row['calling_code']; ?>"<?php if('US' == $row['code']) echo "selected" ; ?>><?php echo "+".$row['calling_code']; ?></option>
						<?php } ?>	
            		</select>
					<input class="in medium" style="width:56%;" name="mobile_no" id="mobile_no" type="text" value="" placeholder="Please Enter Your Mobile No"/>
				</div>
					<button class="sub-bton" name="submit" type="submit" onclick="" value='add_contact'>Add Contact</button>
					<br>
			<div class="guest-list">User Contact List</div>
        		<table class="table-guest" id="table_event">
        			<tr>
            			<th>User Contact ID</th>
                		<th>User Name</th>
                		<th>Email ID</th>
                		<th>Mobile No</th>
            		</tr>
						<?php while($arrRow = mysql_fetch_array($add_conct_query_result, MYSQL_ASSOC)) { ?>
 	       			<tr>
                		<td><?php echo $arrRow['user_contact_id'] ?></td>
                		<td><?php echo $arrRow['contact_user_name']; ?></td>
                		<td><?php echo $arrRow['email_id']; ?></td>
                		<td><?php echo $arrRow['mobile_no']; ?></td>
            		</tr>
						<?php } ?>            
            	</table>
            	<div class="pg">
					<?php 
						$ed_sql_query = "SELECT * FROM user_contact_detail where user_id = $intUserId"; 
						$ed_q_result = mysql_query($ed_sql_query); //run the query
						$total_records = mysql_num_rows($ed_q_result);  //count number of records
						$total_pages = ceil($total_records / $num_rec_per_page); 
						for ($i=1; $i<=$total_pages; $i++) {
					?>
						<a href='add_contact.php?page=<?php echo $i; ?>'><?php echo $i; ?></a>
					<?php } ?>	
       			</div>
       			</form>
       		  </div>
       	 </div>
       </div>
    </div>
</div>
