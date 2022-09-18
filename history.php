<?php
    function history($index){
        for ($i=0;$i<$index;$i++){
            $dataBMI=json_decode($_COOKIE['dataBMI'][$i],associative : true);
            if($dataBMI['status']=="Normal"){
                $table_color="table-info";
            }else if($dataBMI['status']=="Underweight"){
                $table_color="table-secondary";
            }else if($dataBMI['status']=="Overweight"){
                $table_color="table-warning";
            }else if($dataBMI['status']=="Obese"){
                $table_color="table-danger";
            }
            echo "<tr class='{$table_color}'>";
            // echo '<tr class="'.$table_color.'">';
            echo "<td>{$dataBMI['name']}</td>";
            echo "<td>{$dataBMI['age']}</td>";
            echo "<td>{$dataBMI['gender']}</td>";
            echo "<td>{$dataBMI['height']}</td>";
            echo "<td>{$dataBMI['weight']}</td>";
            echo "<td>{$dataBMI['bmi']}</td>";
            echo "<td>{$dataBMI['status']}</td>";
            echo "</tr>";
        }
    }
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
    <div class="mx-auto col-4">
        <table class="table">
            <thead class="table-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Gender</th>
                <th scope="col">Height</th>
                <th scope="col">Weight</th>
                <th scope="col">BMI</th>
                <th scope="col">Category</th>
            </tr>
            </thead>
            <tbody>
                <?=history($_COOKIE['cookie_index']+1) ?>
            </tbody>
        </table>
        <div class="d-grid gap-2 col-5 mx-auto">
            <button class="btn btn-primary" onClick= "location.href='index.php';">Back to home</button>    
        </div>    
    </div>

</body>
</html>

