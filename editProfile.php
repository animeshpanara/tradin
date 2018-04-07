<?php
session_start();
if(isset($_SESSION['notVerified']))
{
	header('Location:verifyMail.php');
}
if (!isset($_SESSION['userLogged'])) {
	header("Location:index.php");
}
include_once('dbconfig.php'); 
$uname=$_SESSION['userLogged'];
$result="";
$user=mysqli_fetch_assoc(mysqli_query($dbase,"SELECT * FROM `users` WHERE `uname`='$uname'"));
$fname=$user['fname'];
$lname=$user['lname'];
$email=$user['email'];
$mobno=$user['mobno'];
$propic=$user['propic'];
$pass=$user['pass'];
if (isset($_POST['edit'])) {
	$fnameNew=$_POST['fname'];
	$lnameNew=$_POST['lname'];
	$emailNew=$_POST['email'];
	$mobnoNew=$_POST['mobno'];
	$unameNew=$_POST['uname'];
	if (isset($_POST['pass']) && !empty($_POST['pass'])) {
		$pass=$_POST['pass'];
		$pass=md5($pass);	
	}
	
	// $cpass=$_POST['cpass'];
	// $secque=$_POST['secque'];
	// $secans=$_POST['secans'];
	if ($_FILES['propic']['tmp_name']!='') {
		$location='propics/';
		if($propic!="client.png")
			unlink($location.$propic);
		$tmp_name=$_FILES['propic']['tmp_name'];
		$name=$_FILES['propic']['name'];
		$name=explode('.', $name);
		$name=$name[1];
		$name=$uname.'.'.$name;
		$propic=$name;
		// echo "<script>console.log('$propic')</script>";
		move_uploaded_file($tmp_name,$location.$name);
	}
	else{
		$name='client.png';
	}
	$userData=mysqli_query($dbase,"SELECT `email`,`uname` FROM `users` WHERE `uname`<>'$uname'");
	while ($data=mysqli_fetch_assoc($userData)) {
		$mailid=$data['email'];
		$mailid=$mailid[0];
		$userName=$data['uname'];
		if ($emailNew==$mailid) {
			$result="<span style='color: red;'>User with such Email-ID already exists.</span>";
			$emailNew="";	
			break;
		}
		if($unameNew==$userName){
			$result="<span style='color: blue;'>User with such user name already exists.</span>";
			$unameNew="";
			break;
		}
	}
	if($emailNew!="" && $unameNew!="")
	{
		$_SESSION['userLogged']=$unameNew;
		// if($unameNew!=$uname && $propic!="client")
		// {
		// 	rename('propics/'.$, newname)
		// }
		if($emailNew!=$email)
		{
			$verifyPass='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$verifyPass=str_shuffle($verifyPass);
			$verifyPass=substr($verifyPass,0,8);
			$subject = 'Verification for TradIn';
			$headers = "From: admin@tradin.com\r\n";
			$headers .= "Reply-To: comebackgogo7@gmail.com\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			mail($emailNew,$subject, "Your verification code is $verifyPass.<br><br>Regards,<br>Team TradIn",$headers);
			$_SESSION['notVerified']="notVerified";
			// $_SESSION['login']=$uname;
			$verified=$verifyPass;
			// mysqli_query($dbase,"INSERT INTO `users` VALUES ('$fname','$lname','$email','$mobno','$uname','$pass','$name','$verified')");
			mysqli_query($dbase,"UPDATE `users` SET `fname`='$fnameNew', `lname`='$lnameNew',	`email`='$emailNew', `mobno`='$mobnoNew',`uname`='$unameNew', `pass`='$pass', `propic`='$propic', `verified`='$verified' WHERE `uname`='$uname'  ");
			header('Location:verifyMail.php');
		}
		else
		{
			mysqli_query($dbase,"UPDATE `users` SET `fname`='$fnameNew', `lname`='$lnameNew', `mobno`='$mobnoNew',`uname`='$unameNew', `pass`='$pass', `propic`='$propic' WHERE `uname`='$uname' ");
			header('Location:index.php');
		}
	}
		
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>TradIN</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/mobtab.css">
</head>
<body>
	<div class="containerp">
		<?php include_once('header.php'); ?>
		<div class="rowp">
			<div class="icont">
				<div id="signupBox">
					<div id="signupWordDiv"><span id="signupWord">Edit Profile</span></div>
					<form name="editProfile" id="signup" enctype="multipart/form-data" action="editProfile.php" method="post">
						<table id="signupTable">
							<tr>
								<td colspan="2">
									<?php echo "$result"; ?>
								</td>
							</tr>
							<tr>
								<td colspan="2"><p class="formRemark"><span class="starImp">*</span> Denotes Mandatory Fields</p></td>
							</tr>
							<tr>
								<td class="signTd"><label for="fname" class="slabels">First Name<span class="starImp">*</span> :</label></td>
								<td><span class="starImpm">*</span><input type="text" name="fname" class="signupips" placeholder="Enter Your First Name" value="<?php echo $fname; ?>"></td>
							</tr>
							<tr>
								<td class="signTd"><label for="lname" class="slabels">Last Name<span class="starImp">*</span> :</label></td>
								<td><span class="starImpm">*</span><input type="text" name="lname" class="signupips" placeholder="Enter Your Last Name" value="<?php echo $lname; ?>"></td>
							</tr>
							<tr>
								<td class="signTd"><label for="email" class="slabels">Email-ID<span class="starImp">*</span> :</label></td>
								<td><span class="starImpm">*</span><input type="text" name="email" class="signupips" placeholder="Enter Your Email-ID" value="<?php echo $email; ?>"></td>
							</tr>
							<tr>
								<td class="signTd"><label for="mobno" class="slabels">Mobile Number:</label></td>
								<td><span class="starImpm">*</span><input type="text" name="mobno" class="signupips" placeholder="Enter Mobile Number" value="<?php echo $mobno; ?>"></td>
							</tr>
							<tr>
								<td class="signTd"><label for="uname" class="slabels">User Name<span class="starImp">*</span> :</label></td>
								<td><span class="starImpm">*</span><input type="text" name="uname" class="signupips" placeholder="Enter Your User Name" value="<?php echo $uname; ?>"></td>
							</tr>
							<tr>
								<td class="signTd"><label for="pass" class="slabels">New Password<span class="starImp"></span> :</label></td>
								<td><span class="starImpm"></span><input type="password" name="pass" class="signupips" placeholder="Enter Your Password"></td>
							</tr>
							<tr>
								<td class="signTd"><label for="cpass" class="slabels">Confirm NewPassword<span class="starImp"></span> :</label></td>
								<td><span class="starImpm"></span><input type="password" name="cpass" class="signupips" placeholder="Confirm Password"></td>
							</tr>
							<!-- <tr>
								<td class="signTd"><label for="cpass" class="slabels">Security Question<span class="starImp">*</span> :</label></td>
								<td>
									<p style="color: #607d8b;">In case you forget your password</p>
									<span class="starImpm">*</span>
									<select class="signupips" name="secque">
										<option class="signupopt" value="">Security Question</option>
										<option class="signupopt" value="1">Question1</option>
										<option class="signupopt" value="2">Question2</option>
										<option class="signupopt" value="3">Question3</option>
										<option class="signupopt" value="4">Question4</option>
										<option class="signupopt" value="5">Question5</option>
									</select>
								</td>
							</tr>
							<tr>
								<td class="signTd"><label for="secans" class="slabels">Security Answer<span class="starImp">*</span> :</label></td>
								<td><span class="starImpm">*</span><input type="text" name="secans" class="signupips" placeholder="Confirm Password"></td>
							</tr> -->
							<tr>
								<td class="signTd"><label for="propic" class="slabels">Profile Picture :</label></td>
								<td>
									<div class="uploadDiv btn btn-info">
										<span id="compup">Upload New</span>
    									<span id="mobtabup">Upload New Profile Picture</span>
    									<input type="file" accept=".jpg,.jpeg,.png" class="uploadProPic" name="propic" 
    										onchange="profileLoad(this)"/>
									</div>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<img style="margin-bottom: 10px;" src="propics/<?php echo $propic ?>" id="userProfilePic"  >
								</td>
							</tr>
							<tr>
								<td>
									<span onclick="removeProfilePic();" style="cursor: pointer;color: red;font-size: 15px;">Remove</span>
									<!-- <button class="btn btn-danger" onclick="removeProfilePic()">Remove</button> -->
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<input type="submit" name="edit" class="btn btn-primary" value="DONE" id="signupBtn">
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/int.js"></script>
<script type="text/javascript" src="js/restapi.js"></script>
<!-- <script type="text/javascript" src='js/validate.js'></script> -->
</html>