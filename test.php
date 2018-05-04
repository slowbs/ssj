<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Data Tables</title>

		<!-- นำเข้า  CSS จาก Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
		<!-- นำเข้า  Javascript จาก  Jquery -->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-html5-1.5.1/b-print-1.5.1/datatables.min.css"/>
 
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-html5-1.5.1/b-print-1.5.1/datatables.min.js"></script>
	

		<script type="text/javascript">
			//คำสั่ง Jquery เริ่มทำงาน เมื่อ โหลดหน้า Page เสร็จ 
			$(function(){
				//กำหนดให้  Plug-in dataTable ทำงาน ใน ตาราง Html ที่มี id เท่ากับ example
				$('#example').dataTable();
			});
		</script>
  </head>
  <body>
  <div class="container">
  
<h1>Data Tables </h1>

		<table class="table table-bordered" id="example">
				<thead>
					<tr>
						<th>id</th>
						<th>name</th>
						<th>price</th>
						<th>date</th>
						<th>Start date</th>
					</tr>
				</thead>
				<tbody>
                <tr>
                <?php
include 'db.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, name, price, date FROM testthai"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->FetchAll(PDO::FETCH_ASSOC); 

    foreach($result as $row){ 
        ?> <td> <?php echo $row['id']; ?> </td>
         <td> <?php echo $row['name']; ?> </td>
         <td> <?php echo $row['price']; ?> </td>
         <td> <?php echo $row['date']; ?> </td>
         <td><a class="openModal btn btn-warning" data-id="<?php echo $row['id'] ?>" data-toggle="modal" 
         href="#myModal">
        แก้ไข</a>
         <a href="delete.php?id= <?php echo $row['id']; ?>" class="btn btn-danger" role="button" 
         onclick="return confirm('ยืนยันที่จะลบ?')");>ลบ</a></td>
         </tr>
         
<?php 
}
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>

				</tbody>
			</table>
		</div>
  </body>
</html>