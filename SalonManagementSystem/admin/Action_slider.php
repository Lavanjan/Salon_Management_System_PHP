<?php
//action.php
if (isset($_POST["action"])) {
    $connect = mysqli_connect("localhost", "root", "", "Beauty");
    if ($_POST["action"] == "fetch") {
        $query = "SELECT * FROM promotion_slide ORDER BY id DESC";
        $result = mysqli_query($connect, $query);
        $output = '
   <table class="table table-bordered table-striped">  
    <tr>
     <th width="2%">ID</th>
     <th width="20%">Image</th>
<!--    <th width="40%">Description</th>-->
     <th width="5%">Change</th>
     <th width="5%">Remove</th>
    </tr>
  ';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '

    <tr>
     <td>' . $row["id"] . '</td>
     <td>
      <img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" height="150" width="450" class="img-thumbnail" />
     </td>
    
     <td><button type="button" name="update" class="btn btn-info bt-xs update" id="' . $row["id"] . '">Update</button></td>
     <td><button type="button" name="delete" class="btn btn-danger bt-xs delete" id="' . $row["id"] . '">Remove</button></td>
    </tr>
   ';
        }
        $output .= '</table>';
        echo $output;
    }

    if ($_POST["action"] == "insert") {
//        $image = $_FILES['image']['tmp_name'];
//        $img = file_get_contents($image);
//        $sql = 'insert into styles (image) values(?)';
//
//        $stmt = mysqli_prepare($connect, $sql);
//        mysqli_stmt_bind_param($stmt, 's', $img);
//        mysqli_stmt_execute($stmt);
//        var_dump($stmt);
//        $check = mysqli_stmt_affected_rows($stmt);
//        if($check == 1){
//            $msg  = "Image Inserted into Database.";
//        }else{
//            $msg  = "Image Insert failed.";
//        }
//        echo $msg;
//        mysqli_close($connect);

        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $query = "INSERT INTO promotion_slide(image) VALUES ('$file')";
        if (mysqli_query($connect, $query)) {
            echo 'Image Inserted into Database';
        }else{
            echo 'Image Insert failed';
        }
    }
    if ($_POST["action"] == "update") {
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $query = "UPDATE promotion_slide SET image = '$file' WHERE id = '" . $_POST["image_id"] . "'";
        if (mysqli_query($connect, $query)) {
            echo 'Image Updated into Database';
        }
    }
    if ($_POST["action"] == "delete") {
        $query = "DELETE FROM promotion_slide WHERE id = '" . $_POST["image_id"] . "'";
        if (mysqli_query($connect, $query)) {
            echo 'Image Deleted from Database';
        }
    }
}
?>
