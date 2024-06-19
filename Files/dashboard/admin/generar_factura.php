<?php
require '../../include/db_conn.php';
page_protect();
$etid=$_GET['id_inscripcion'];
$pid=$_GET['id_plan'];
$uid=$_GET['id_usuarioo'];



					$sql = "Select * from usuarios u 
          INNER JOIN inscripciones e 
          ON
          u.id_usuario=e.id_usuarioo
          INNER JOIN planes p 
          where p.id_plan=e.id_plan and id_usuario='".$uid."' and e.id_inscripcion='".$etid."'";
					$res=mysqli_query($con, $sql);
					 if($res){
						      	$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
				
						      }
				
					

?>
<!doctype html>

<html>
<head>
<meta charset="utf-8">
<title>Iron Gym</title>
<style>


#space
{
line-height:0.5cm;
}
</style>
<script>function myFunction()
	{
		var prt=document.getElementById("print");
		var WinPrint=window.open('','','left=0,top=0,width=800,height=900,tollbar=0,scrollbars=0,status=0');
		WinPrint.document.write(prt.innerHTML);
		WinPrint.document.close();
		WinPrint.focus();
		WinPrint.print();
		WinPrint.close();
		setPageHeight("297mm");
		setPageWidth("210mm");
		setHtmlZoom(100);
		//window.location.replace("index.php?query=");
	}
		</script>
</head>

<body>
<br><input type="button" class="a1-btn a1-green" value="IMPRIMIR FACTURA" onclick="myFunction()">
 <div id=print>
					
	
							
<table id =space width="760" height="397" border="0" align="center">
  <tr>
    <td width="222" height="198"><img src="iron.png" width="114" height="115"  alt=""/></td>
    <td width="317"><p><strong>IRON GYM</strong></p>
      <p>Jilotepec de Abasolo, Mexico</p>
      <p>Emiliano Zapata, Cruz de denho</p></td>
    <td height="198"><p>Numero Serial : <?php echo $row['id_inscripcion'] ?></p>
      <p>&nbsp;</p>
      <p>Fecha : <?php echo $row['fecha_pago']?></p></td>
    </tr>
   
  <tr>
    <td height="118" colspan="3"><p>Recibido con agradecimiento de : <?php echo $row['nombre_usuario']?></p>
      <p>Una suma de pesos Mexicanos : <?php echo $row['monto']?></p>
      <p>A cuenta del plan de membresía: <?php echo $row['nombre_plan']?></p></td>
    </tr>
  
  <tr>
    <td height="73" colspan="2"><p>&nbsp;</p></td>
    <td width="207"><p>&nbsp;</p>
      <p>Firma</p></td>
  </tr>
</table>

</div>
</body>
</html>