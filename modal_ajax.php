<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h4 id="modalTitle" class="modal-title"></h4>
</div>
<div class="modal-body">
<?php $id = isset($_GET['id']) ? $_GET['id'] : ''; 
     //echo "ID: $id "?>
         <div class="container">
            <h1>Insert Form</h1>
            <form action="insert.php" method="POST"> 
                    <div class="form-group">
                      <label for="name">ชื่อ - สกุล</label>
                      <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="ชื่อ - สกุล" name="name">
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                      <label for="price">ราคา</label>
                      <input type="text" class="form-control" id="price" placeholder="ราคา" name="price">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    </div>

</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary">Submit</button>
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>