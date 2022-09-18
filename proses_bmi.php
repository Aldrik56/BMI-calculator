<?php
session_start();

if (empty($_POST['nama']) || empty($_POST['age']) || empty($_POST['gender']) || empty($_POST['height']) || empty($_POST['weight'])) {
    $error_message = "<div class='alert alert-danger col-3 mx-auto'>All fields are required. Please fill all required fields and submit again.</div>";
    $_SESSION['error_message'] = $error_message;
    header("Location: index.php");
    exit;
}

$weight=$_POST['weight'];
$height=$_POST['height'] ;
function calculator(int $weight,int $height) {
    $result= round($weight / ($height * $height / 10000),2);
    return $result;
};
function statuscal(int $bmi){
    if($bmi <18.5){
        return "Underweight";
    }else if($bmi <=24.9){
        return "Normal";
    }else if($bmi <=29.9){
        return "Overweight";
    }else{
        return "Obese";
    }
}
function color($status){
    if($status=="Normal"){
        return "alert-info";
    }else if($status=="Underweight"){
        return "alert-secondary";
    }else if($status=="Overweight"){
        return "alert-warning";
    }else if($status=="Obese"){
        return "alert-danger";
    }
}
$bmi = calculator($weight,$height);
$status = statuscal($bmi);
$index=0;

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
    <div class="mx-auto">
        <h3 class="text-center">BMI Result</h3>
        <div class="mx-auto col-3 my-2">
            <b>For the information you entered :</b><br>
            Name : <?= $_POST['nama']?><br>
            Age  : <?= $_POST['age']?><br>
            Gender  : <?= ($_POST['gender']=="m"?"Lak-laki" : "Perempuan")?><br>
            Height  : <?= $_POST['height']?><br>
            weight  : <?= $_POST['weight']?><br>
            <div class=" alert <?=color($status)?> mx-auto">
                Your BMI is <?="<b>".$bmi."</b>" ?> indicating your weight is <?="<b>".$status."</b>"?> category for adults of your height
            </div>
        </div>
        <div class="mx-auto col-3">
            <h4><b>BMI Category</b></h4>
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col"><b>BMI</b></th>
                        <th scope="col"><b>Weight Status</b></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Below 18.5</td>
                        <td>Underweight</td>
                    </tr>
                    <tr>
                        <td>18.5 - 24.9</td>
                        <td>Normal</td>
                    </tr>
                    <tr>
                        <td>25.0 - 29.9</td>
                        <td>Overweight</td>
                    </tr>
                    <tr>
                        <td>30.0 and above</td>
                        <td>Obese</td>
                    </tr>
                </tbody>
            </table>
            <div class="d-grid gap-2 col-5 mx-auto">
                <button class="btn btn-primary" onClick= "location.href='index.php';"> Calculate Again</button>
                <button class="btn btn-primary" onClick= "location.href='history.php';"> View History</button>
            </div>
        </div>
    </div>
</body>
</html>
<?php
if(!isset($_COOKIE['cookie_index'])) {
    setcookie('cookie_index', 0);
    $index = 0;

    $dataBMI = array(
        "name" => $_POST['nama'],
        "age" => $_POST['age'],
        "gender" => $_POST['gender'],
        "height" => $_POST['height'],
        "weight" => $_POST['weight'],
        "bmi" => $bmi,
        "status" => $status
    );
    setcookie("dataBMI[$index]", json_encode($dataBMI));
     
} else {
    setcookie('cookie_index', $_COOKIE['cookie_index'] + 1);
    $index = $_COOKIE['cookie_index'] + 1;

    $dataBMI = array(
        "name" => $_POST['nama'],
        "age" => $_POST['age'],
        "gender" => $_POST['gender'],
        "height" => $_POST['height'],
        "weight" => $_POST['weight'],
        "bmi" => $bmi,
        "status" => $status
    );
    setcookie("dataBMI[$index]", json_encode($dataBMI));
}?>

