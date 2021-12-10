<?php
include "../config/database_connect.php";
session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<title>Profile</title>
	<style type="text/css">
		.wrapper {
			width: 300px;
			margin: 0 auto;
			color: white;
		}
	</style>
</head>

<body style="background-color: #fff; ">
	<div class="container">
		<form action="" method="post">

			<button type="button" onclick="window.location.href='stocklist.php'" class="btn btn-warning">TRADE NOW</button>


			<button type="button" onclick="window.location.href='index.php'" class="btn btn-warning">BACK TO HOME</button>


		</form>
		<div class="wrapper">
			<?php
			$q = mysqli_query($connection, "SELECT * FROM person where email='$_SESSION[user]' ;");
			?>
			<h2 style="text-align: center;">My Profile</h2>

			<?php
			$row = mysqli_fetch_assoc($results);

			echo "<div style='text-align: center'>
 					<img class='img-circle' height=110 width=120 src='../assets/img/profile.png'
 				</div>";
			?>
			<div style="text-align: center;"> <b>Welcome, echo fname </b>
				<h4>
					<?php echo $_SESSION['user']; ?>
				</h4>
			</div>
			<?php
			echo "<b>";
			echo "<table class='table table-bordered'>";
			echo "<tr>";
			echo "<td>";
			echo "<b> First Name: </b>";
			echo "</td>";

			echo "<td>";
			echo $row['fname'];
			echo "</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td>";
			echo "<b> Last Name: </b>";
			echo "</td>";
			echo "<td>";
			echo $row['lname'];
			echo "</td>";
			echo "</tr>";


			echo "<tr>";
			echo "<td>";
			echo "<b> Contact: </b>";
			echo "</td>";
			echo "<td>";
			echo $row['tel'];
			echo "</td>";
			echo "</tr>";


			echo "<tr>";
			echo "<td>";
			echo "<b> Email: </b>";
			echo "</td>";
			echo "<td>";
			echo $row['email'];
			echo "</td>";
			echo "</tr>";




			echo "</table>";
			echo "</b>";
			?>
		</div>
	</div>
</body>

</html>