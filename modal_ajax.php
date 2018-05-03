<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h4 id="modalTitle" class="modal-title"></h4>
</div>
<div class="modal-body">
<?php $id = isset($_GET['id']) ? $_GET['id'] : ''; 
     //echo "ID: $id "?>
         <div class="container">
            <h1><?php echo "ID: $id" ?> </h1>
<form action="insert.php" method="POST"> 
<?php
include 'db.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM testthai where id = $id"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->FetchAll(PDO::FETCH_ASSOC); 

    foreach($result as $row){ ?>
          <label for="name">ชื่อ - สกุล</label>
          <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>">
          <input type="text" class="form-control" name="price" value="<?php echo $row['price'] ?>">
          <input type="text" class="form-control" name="date" value="<?php echo $row['date'] ?>">
<?php
}
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
<div class="modal-footer">
<button type="submit" class="btn btn-primary">Submit</button>
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</form>
</div>

</div>