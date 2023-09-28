<?php

include('./connect.php');
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $mobile = $_POST['mobile'];
    $image = $_FILES['file'];
    // echo $username;
    // echo "<br>";
    // echo $mobile;
    // echo "<br>";
    // print_r($image);

    $imagefilename = $image['name'];
    // print_r($imagefilename);
    // echo "<br>";
    $imagefileerror = $image['error'];
    // print_r($imagefileerror);
    // echo "<br>";
    $imagefiletemp = $image['tmp_name'];
    // print_r($imagefiletemp);
    //echo "<br>";S
    $filename_separate = explode('.', $imagefilename);
    // print_r($filename_separate);
    // echo "<br>";
    $file_extention = strtolower(end($filename_separate));
    // print_r($file_extention);
    //echo "<br>";
    $extention = array('jpeg', 'jpg', 'png');
    if (in_array($file_extention, $extention)) {
        $upload_image = 'images/' . $imagefilename;
        move_uploaded_file($imagefiletemp, $upload_image);
        $sql = "insert into `img` (name,mobile,image) values ('$username','$mobile','$upload_image')";
        $result = mysqli_query($conn, $sql);
        // if ($result) {
        //     echo
        //     '<div class="alert alert-success" role="alert">
        //     <strong> Data inserted successfully<strong>
        //       </div>';
        // } else {
        //     die(mysqli_error($conn));
        // }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<style>
    img {
        width: 200px;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1 class="text-center my-4">User Data</h1>
    <div class="container mt-5 d-flex justify-content-center">
        <table class="table table-bordered w-50">
            <thead class="table-dark">
                <tr>
                    <th scope="col">S1</th>
                    <th scope="col">Username</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "Select * from `img` ";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $name = $row['Name'];
                    $image = $row['image'];
                    echo '<tr>
                  <td>' . $id . '</td>
                  <td>' . $name . '</td>
                  <td><img src=' . $image . ' /></td>
              </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>