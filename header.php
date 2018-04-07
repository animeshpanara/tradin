<div id="bars"><i class="fa fa-bars"></i></div>
<div class="mobmenubar">
	<div id="arrowback"><i class="fa fa-arrow-left"></i></div>
	<div class="mobmenus">
		<ul class="mobmenuul">
			<li class="mobmenuli"  onclick="location.href='index.php'"><i class="fa fa-home"></i>HOME</li>
			<?php
				if (!isset($_SESSION['userLogged'])) {
					echo "
					<li class=\"mobmenuli\" onclick=\"location.href='login.php'\"><i class=\"fa fa-user\"></i>LOGIN</li>
					<li class=\"mobmenuli\" onclick=\"location.href='signup.php'\"><i class=\"fa fa-user-plus\"></i>SIGN&nbsp;UP</li>
					";
				}
			?>
			<!-- activeMenumob -->
			<li class="mobmenuli" onclick="location.href='buy.php'"><i class="fa fa-shopping-cart"></i>BUY</li>
			<li class="mobmenuli" onclick="location.href='sell.php'"><i class="fa fa fa-handshake-o"></i>SELL</li>
			<li class="mobmenuli" onclick="location.href='aboutus.php'"><i class="fa fa fa-certificate"></i>ABOUT</li>
			<li class="mobmenuli" onclick="location.href='contactus.php'"><i class="fa fa fa-envelope"></i>CONTACT US</li>
		</ul>
	</div>
</div>
<?php
if(isset($_POST['logout']))
{
	session_start();
	session_unset();
	session_destroy();
	header("location:index.php");
}
if (isset($_SESSION['userLogged'])) {
	$uname=$_SESSION['userLogged'];
	$names=mysqli_fetch_assoc(mysqli_query($dbase,"SELECT `fname`,`lname`,`propic` FROM `users` WHERE `uname`='$uname'"));
	$fname=$names['fname'];
	$lname=$names['lname'];
	$propic=$names['propic'];
}
?>
<div class="dropParent"></div>
<div class="drop">
	<ul>
		<?php
		echo "<li style='border-bottom:1px solid #fff; margin: 5px;'>Logged In as:<br>$fname $lname</li>";
		?>
		<li style="cursor: pointer;" onclick="location.href='editProfile.php'">Edit Profile</li>
		<li><form action="header.php" method="post"><input type="submit" value="LogOut" name="logout" class="logoutBtn"></form></li>
	</ul>
</div>
<div class="rowp menubar">
	<div class="icont">
		<div class="col-3">
			<?php
			if (isset($_SESSION['userLogged'])) {
				echo "<div class='loggedDiv'>";
				echo "<div><img class=\"profilePic\" src=\"propics/$propic\"></div>";
				echo "<div class='caretDiv'><span class='caret'></span></div>";
				echo "</div>";
			}
			?>
		</div>
		<div class="col-9">
			<ul class="menuul">
				<!-- activeMenu -->
				<li class="menuli" onclick="location.href='index.php'">HOME</li>
				<?php
					if (!isset($_SESSION['userLogged'])) {
						echo "
						<li class=\"menuli\" onclick=\"location.href='login.php'\">LOGIN</li>
						<li class=\"menuli\" onclick=\"location.href='signup.php'\">SIGN&nbsp;UP</li>
						";
					}
				?>
				<li class="menuli" onclick="location.href='buy.php'">BUY</li>
				<li class="menuli" onclick="location.href='sell.php'">SELL</li>
				<li class="menuli" onclick="location.href='aboutus.php'">ABOUT&nbsp;US</li>
				<li class="menuli" onclick="location.href='contactus.php'">CONTACT&nbsp;US</li>
			</ul>
		</div>
	</div>
</div>