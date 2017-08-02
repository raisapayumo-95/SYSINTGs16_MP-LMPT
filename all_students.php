<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>University Data</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">University</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            
			<!--end-->
            <li><a href="#">Help</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
	
    <div class="container-fluid">
	  <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="user_all_students_php.php"><b>All Students</b></a></li>
			<li><a href="#"><b>Universities </b><span class="sr-only">(current)</span></a></li>
			<ul class="nav nav-sidebar-2">
			<li><a href="all_ateneo_students_php.php"><b>Ateneo De Manila University</b></a></li>
			<li><a href="all_dlsu_students_php.php"><b>De La Salle University</b></a></li>
			<li><a href="all_lpu_students_php.php"><b>Lycuem of the Philippines University</b></a></li>
			<li><a href="all_mit_students_php.php"><b>Mapua Institute of Technology</b></a></li>
			<li><a href="all_sti_students_php.php"><b>Systems Technology Institute</b></a></li>
			<li><a href="all_ust_students_php.php"><b>University of Santo Tomas</b></a></li>
			<li><a href="all_up_students_php.php"><b>University of the Philippines</b></a></li>
			</ul>
          </ul>
        </div>
        
        </div>
      </div>
	   <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	  
          <h1 class="page-header">All Students</h1>
		  
		 <?php 
			$servername = "localhost";
			$username = "root";
			$password = "September1497";
			$dbname = "university_data";
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			$sql = "SELECT firstname, surname, birthday, university FROM student";
			$resultuser=mysqli_query($conn,$sql);
			$total = 0;
			while ($rowresult=mysqli_fetch_array($resultuser,MYSQLI_ASSOC))
			{ 
				$total += 1;
			}
			echo 'Total: '. $total.' Student/s';
			
		?>
		<br>
		  
			<style>
				table, th, td {
					border: 1px solid black;
					border-collapse: collapse;
				}
			</style>

			<?php
			/* $servername = "localhost";
			$username = "root";
			$password = "12345";
			$dbname = "university_data";
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname); */
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			
			if (isset($_POST['asc']))
			{
				$sql = "SELECT firstname, surname, birthday, university , truncate(datediff(date(now()), birthday)/365.25,0)  FROM student ORDER BY surname";
				$result = $conn->query($sql);
			}
			else if (isset($_POST['desc']))
			{
				$sql = "SELECT firstname, surname, birthday, university, truncate(datediff(date(now()), birthday)/365.25,0)  FROM student ORDER BY surname DESC";
				$result = $conn->query($sql);
			}
			else
			{
				$sql = "SELECT firstname, surname, birthday, university, truncate(datediff(date(now()), birthday)/365.25,0)  FROM student";
				$result = $conn->query($sql);
			}
			if ($result->num_rows > 0) {
				// output data of each row
				echo '<div class="table-responsive"> 
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>First Name</th>
								<th>Surname</th>
								<th>Birthday</th>
								<th>Age</th>
								<th>University</th>
							</tr>
						</thead>
					<tbody>
												';
				while($row = $result->fetch_assoc()) {
					
					$fname=$row["firstname"];
					$sname=$row["surname"];
					$bday=$row["birthday"];
					$age = $row["truncate(datediff(date(now()), birthday)/365.25,0)"];
					$univ=$row["university"];
					
					echo "<tr>
							<td>$fname</td>
							<td>$sname</td>
							<td>$bday</td>
							<td>$age</td>
							<td>$univ</td>
							</tr>";
												
					
				}
				echo 	'</tbody>
						</table>
						</div>';
			} else {
				echo "0 results";
			}
			$conn->close();
			?>
			<form method = "post">
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					<button name="asc" type="submit" class="btn btn-default">Ascending</button>
					<button name="desc" type="submit" class="btn btn-default">Descending</button>
					</div>
				</div>
			</form>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>