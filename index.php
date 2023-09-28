<?php 
require_once('./operation.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>image upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    </style>
</head>

<body>
<h1 class="text-center my-3">Registration Form</h1>
    <div class="container d-flex justify-content-center">
      <form action="display.php" method="post" class="w-50" enctype="multipart/form-data">
        <?php inputFields("Username","username","","text")?>
        <?php inputFields("Mobile","mobile","","text")?>
        <?php inputFields("", "file","","file")?>
        <button class="btn btn-dark" type="submit"name="submit">Submit</button>
        </form>
    </div>
</body>
</html>