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
			<li class="mobmenuli" onclick="location.href='buy.php'"><i class="fa fa-shopping-cart"></i>&nbsp;BUY</li>
			<li class="mobmenuli" onclick="location.href='sell.php'"><i class="fa fa fa-handshake-o"></i>&nbsp;SELL</li>
			<li class="mobmenuli" onclick="location.href='chatMain.php'"><i class="fa fa fa-comments"></i>&nbsp;CHATS</li>
			<li class="mobmenuli" onclick="location.href='aboutus.php'"><i class="fa fa fa-certificate"></i>&nbsp;ABOUT</li>
			<li class="mobmenuli" onclick="location.href='contactus.php'"><i class="fa fa fa-envelope"></i>&nbsp;CONTACT US</li>

		</ul>
	</div>
</div>
<?php
if(isset($_POST['logout']))
{
	session_start();
	$uname=$_SESSION["userLogged"];
	include_once('dbconfig.php');
	session_unset();
	session_destroy();
	$time=time()+3.5*60*60;
	mysqli_query($dbase,"UPDATE `users` SET `status`='$time' WHERE `uname`='$uname' ");
	header("location:index.php");
}
if (isset($_SESSION['userLogged'])) {
	$uname=$_SESSION['userLogged'];
	$names=mysqli_fetch_assoc(mysqli_query($dbase,"SELECT `fname`,`lname`,`propic` FROM `users` WHERE `uname`='$uname'"));
	$fname=$names['fname'];
	$lname=$names['lname'];
	$propic=$names['propic'];

	$notifications=mysqli_query($dbase,"SELECT * FROM `notifications` WHERE `notify`='$uname' ORDER BY `time` DESC");
	$totalNoti=0;
	$totalRead=0;
	$notiTables="";
}
?>
<div class="dropParent"></div>
<div class="notiTabDiv">
	<?php
		if (isset($_SESSION['userLogged'])) {
		while($notification=mysqli_fetch_assoc($notifications))
		{
			$minTime=$notification['time'];
			$notify=$notification['notify'];
			$notifier=$notification['notifier'];
			$category=$notification['category'];
			$count=$notification['count'];
			$aid=$notification['aid'];
			if($category=="chat")
			{
				$locationToGo='chat.php?chatWith='.$notifier.'&chat=Chat+with+Seller';
			}
			else if($category=="auctionAvail")
			{
				$locationToGo='auction.php?for='.$notify.'&item='.$aid;
			}
			else if($category=="auction")
			{
				$locationToGo='activeAuctions.php';
			}
			//add more cate here

			if($notifier!="")
			{
				$propicNot=mysqli_fetch_assoc(mysqli_query($dbase,"SELECT `propic` FROM `users` WHERE `uname`='$notifier'"));
				$propicNot=$propicNot['propic'];
			}
			else
			{
				$notifier = "Admin";
				$propicNot="admin.png";
			}
			$notificationText=$notification['notification'];
			if($notification['readBy']=='0')
			{
				$totalNoti++;
				$notiTables.="
				<div class=\"notiTablesDivParent\"><table onclick=\"location.href='$locationToGo'\" class='notiTables unread'>
					<tr>
						<td><img src='propics/$propicNot'>";
				if($count>1)
				{
					$notiTables.="<span class=\"countSpan\" >$count</span>";
				}
				$notiTables.="</td>
						<td class=\"notText\">$notifier : $notificationText</td>
							</tr>
						</table></div>
						";
			}
			else
			{
				$notiTables.="
				<div class=\"notiTablesDivParent\"><table onclick=\"location.href='$locationToGo'\" class=\"notiTables\">
					<tr>
						<td><img src='propics/$propicNot'>";
						if($count>1)
						{
							$notiTables.="<span class=\"countSpan\" >$count</span>";
						}
					$notiTables.="</td>
						<td class=\"notText\">$notifier : $notificationText</td>
					</tr>
				</table></div>
				";
			}
		}
		if($totalNoti>0)
		{
			$bellIcon="<i id=\"notiBell\" onclick=\"readAllNoti()\" class=\"fa fa-bell\">$totalNoti</i>";
		}
		else
		{
			$bellIcon="<i id=\"notiBell\" onclick=\"readAllNoti()\" class=\"fa fa-bell\">$totalNoti</i>";
		}
		if($notiTables=="")
			$notiTables="<div class='notiTablesDivParent'><table class='notiTables'>
			<tr>
				<td class='notText'>No Notifications Yet!</td>
			</tr>
		</table></div>";
		echo "$notiTables";
	}
	?>
</div>
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
				echo $bellIcon;
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
				<li class="menuli" onclick="location.href='chatMain.php'">CHATS</li>
				<li class="menuli" onclick="location.href='aboutus.php'">ABOUT&nbsp;US</li>
				<li class="menuli" onclick="location.href='contactus.php'">CONTACT&nbsp;US</li>
			</ul>
		</div>
	</div>
</div>