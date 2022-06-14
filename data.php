<?php

		$conn = mysqli_connect("localhost", "root", "", "pascal");
		
        $sql="SELECT * from bookings";
        $result = mysqli_query($conn, $sql);
        $data=array();
            while($row = mysqli_fetch_assoc($result)) 
            {
                $data[]=$row;
            }
            echo json_encode($data);

?>