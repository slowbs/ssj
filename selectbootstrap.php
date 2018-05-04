<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-html5-1.5.1/b-print-1.5.1/datatables.min.css"/>
 
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-html5-1.5.1/b-print-1.5.1/datatables.min.js"></script>

</head>
<body>
<?php include 'header.php'; ?>
<div class="container-fluid">
  <h2>Hover Rows</h2>
  <table class="table table-hover" id="example">
    <!--<input class="form-control" id="myInput" type="text" placeholder="Search..">-->
    <thead>
      <tr>
        <th>ID</th>
        <th>ชื่อ - สกุล</th>
        <th>ราคา</th>
        <th>วันที่</th>
        <th>test</th>
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

<!-- Call modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>

<!--script call modal from id-->
<script>
  $('.openModal').click(function(){
      var id = $(this).attr('data-id');
      $.ajax({url:"modal_ajax.php?id="+id,cache:false,success:function(result){
          $(".modal-content").html(result);
      }});
  });
</script>

  <script>
                $('#example').dataTable();
  </script>

</body>
</html>
