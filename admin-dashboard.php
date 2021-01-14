<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin-dashboard.css">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="">
        <div class="admin-title">
            <div class="col-md-12 header header-text text-center">
                Admin's Dashboard
            </div>
        </div>
        <div class="admin-background">
        <div class="row d-flex justify-content-center">
            <div class="card align-items-center ml-5 mt-3 shadow-sm doctor">
                <img src="pics/doctors.png" class="card-img-top doctor-image">
                <div class="card-body text-center">
                    <a href="manager-doctors.php" class="btn btn-dark text-decoration-none">Doctor's manager</a>
                </div>
            </div>
            <div class="card align-items-center ml-5 mt-3 shadow-sm patient" style="width: 18rem;">
                <img src="pics/patient.png" class="card-img-top patient-image">
                <div class="card-body text-center">
                    <a href="manager-patients.php" class="btn btn-dark text-decoration-none">Patient's manager</a>
                </div>
            </div>
        </div>
          </div>
    </div>
</body>

</html>
