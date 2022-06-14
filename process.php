<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>
<style>
    		body {
  background-color: white;
  margin: 0;
  overflow-x: hidden;
}

.topnav {
  background-color: white;
  overflow: hidden;
  padding: 20px;
  width: 100%;
  margin: 0;
  border-bottom: solid 1px #3a3a3a;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: #242222;
  text-align: center;
  padding: 14px 40px;
  text-decoration: none;
  font-size: 19px;
  font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: #04aa6d;
  color: white;
}
@media print {
  .hidden-print {
    display: none !important;
  }
}
</style>
<body>
<nav>
      <div class="topnav">
        <a class="navbar-brand" href="/">
          <img src="logo.svg" alt="Ampere Logo" class="logo_img" "/>
        </a>
        <a href="C:\xampp\htdocs\EMV-Site-2\index.html">Products</a>
        <a href="finance.html">Purchase</a>
        <a href="about_us.html">About</a>
      </div>
    </nav>
	<center>
		<?php

		// servername => localhost
		// username => root
		// password => empty
		// database name => staff
		$conn = mysqli_connect("localhost", "root", "", "pascal");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 5 values from the form data(input)
		$fname = $_REQUEST['fname'];
		$contact = $_REQUEST['contact'];
		$mail = $_REQUEST['user_email'];
		$address = $_REQUEST['address'];
		
		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO bookings(fname,contact,user_email,address) VALUES ('$fname',
			'$contact','$mail','$address')";
		
		if(mysqli_query($conn, $sql))
        {
			echo "<h3>===========I N V O I C E==========="
				."</h3>";
            } 
            else
            {
                echo "ERROR: Hush! Sorry $sql. "
                    . mysqli_error($conn);
            }
            echo "Name:".$fname;
            echo "<br>";
            echo "Contact No.:".$contact;
            echo "<br>";
            echo "E-Mail:".$mail;
            echo "<br>";
            echo "Address:".$address;
		// Close connection
		mysqli_close($conn);
		?><br><br>
        <button class="hidden-print" onclick="window.print()">Print Bill</button>
        <br><br>
        <a class="hidden-print" href="show_customers.php">TRACK YOUR ORDER</a>
	</center>
    </script>
</body>

</html>
