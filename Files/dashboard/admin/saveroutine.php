<?php
	require '../../include/db_conn.php';
	page_protect();
	
		
		$rname=$_POST["rname"];
		$day1=$_POST["day1"];
		$day2=$_POST["day2"];
		$day3=$_POST["day3"];
	    $day4=$_POST["day4"];
		$day5=$_POST["day5"];
		$day6=$_POST["day6"];
		
		// Limitar la longitud de los datos a 65535 caracteres (límite del tipo TEXT en MySQL)
		$day1 = substr($day1, 0, 65535);
		$day2 = substr($day2, 0, 65535);
		$day3 = substr($day3, 0, 65535);
		$day4 = substr($day4, 0, 65535);
		$day5 = substr($day5, 0, 65535);
		$day6 = substr($day6, 0, 65535);
		
		$sql="insert into horario(nombre_horario,dia1,dia2,dia3,dia4,dia5,dia6) values('$rname','$day1','$day2','$day3','$day4','$day5','$day6')";
	
		$result=mysqli_query($con,$sql);
		if($result){	
		
			echo "<head><script>alert('Rutina añadida');</script></head></html>";
			echo "<meta http-equiv='refresh' content='0; url=addroutine.php'>";
		}else{
			echo "<head><script>alert('Rutina añadida fallida');</script></head></html>";
			echo mysqli_error($con);
		}
	
	
?>