<?php
require '../../include/db_conn.php';
$id_plan=$_GET['q'];
$query="select * from planes where id_plan='".$id_plan."'";
$res=mysqli_query($con,$query);
if($res){
	$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
	// echo "<tr><td>".$row['monto']."</td></tr>";
	echo "<tr>
		<td height='35'>MONTO:</td>
		<td height='35'>&nbsp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<input id='boxx' type='text' value='$".$row['monto']."' readonly></td></tr>
		<tr>
		<td height='35'>VALIDEZ:</td>
		<td height='35'>&nbsp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<input type='text' id='boxx' value='".$row['validez']."' readonly></td>
		</tr>
	";
}
