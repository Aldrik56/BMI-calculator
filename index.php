<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="navbar-nav mx-auto">
            <a class="nav-item nav-link font-weight-bold active" href="#" style="color:white"><strong>BMI Calculator</strong></a>
            <a class="nav-item nav-link" href="bmi_index.php" style="color:white">Calculator</a>
            <a class="nav-item nav-link" href="history_bmi.php" style="color:white">History</a>
        </div>
    </nav>
    <div >
        <h3 class="text-center">BMI calculator</h3>
        <?php
        if (isset($_SESSION['error_message'])) {
            echo $_SESSION['error_message'];
            unset($_SESSION['error_message']);
        }
        ?>
        <form action="proses_bmi.php" class="col-3 mx-auto" method="post">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" name="nama" id="nama">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Age</label>
                <input type="number" min="0" max="400" class="form-control" name="age" id="nama">
            </div>
            <label for="">Gender</label>
            <input type="radio" value="m" name="gender">Male 
            <input type="radio" value="f" name="gender"> Female
            <br><br/>
            <div class="mb-3">
                <label for="" class="form-label">Height</label>
                <input type="number" min="0" max="400" class="form-control" name="height">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Weight</label>
                <input type="number" min="0" max="400" class="form-control" name="weight">
            </div>
            <div class="d-grid gap-2 col-5 mx-auto">
                <button class="btn btn-primary"> Calculate BMI</button>
            </div>
        </form>
    </div>
</body>
</html>